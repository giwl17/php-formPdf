<?php
require_once __DIR__ . '/vendor/autoload.php';
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'fontDir' => array_merge($fontDirs, [
        __DIR__ . '/tmp',
    ]),
    'fontdata' => $fontData + [ // lowercase letters only in font key
        'sarabun' => [
            'R' => 'THSarabunNew.ttf',
            'I' => 'THSarabunNew Italic.ttf',
            'B' => 'THSarabunNew Bold.ttf',
            'BI' => 'THSarabunNew BoldItalic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestFormExamination.pdf'" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
</head>

<body>
    <div class="center">
        <?php
        function checkMonth($data)
        {
            if ($data == '01') {
                return 'มกราคม';
            }
            if ($data == '02') {
                return 'กุมภาพันธ์';
            }
            if ($data == '03') {
                return 'มีนาคม';
            }
            if ($data == '04') {
                return 'เมษายน';
            }
            if ($data == '05') {
                return 'พฤษภาคม';
            }
            if ($data == '06') {
                return 'มิถุนายน';
            }
            if ($data == '07') {
                return 'กรกฎาคม';
            }
            if ($data == '08') {
                return 'สิงหาคม';
            }
            if ($data == '09') {
                return 'กันยายน';
            }
            if ($data == '10') {
                return 'ตุลาคม';
            }
            if ($data == '11') {
                return 'พฤศจิกายน';
            }
            if ($data == '12') {
                return 'ธันวาคม';
            }
        }

        function checkMonthShort($data)
        {
            if ($data == '01') {
                return 'ม.ค.';
            }
            if ($data == '02') {
                return 'ก.พ.';
            }
            if ($data == '03') {
                return 'มี.ค.';
            }
            if ($data == '04') {
                return 'เม.ย.';
            }
            if ($data == '05') {
                return 'พ.ค.';
            }
            if ($data == '06') {
                return 'มิ.ย.';
            }
            if ($data == '07') {
                return 'ก.ค.';
            }
            if ($data == '08') {
                return 'ส.ค.';
            }
            if ($data == '09') {
                return 'ก.ย.';
            }
            if ($data == '10') {
                return 'ต.ค.';
            }
            if ($data == '11') {
                return 'พ.ย.';
            }
            if ($data == '12') {
                return 'ธ.ค.';
            }
        }

        function checkPrefix($prefix, $other)
        {
            if ($prefix != '') {
                if ($prefix == 'other') {
                    return $other;
                } else {
                    return $prefix;
                }
            } else {
                return '';
            }
        }

        // Convert a string to an array with multibyte string
        function getMBStrSplit($string, $split_length = 1)
        {
            mb_internal_encoding('UTF-8');
            mb_regex_encoding('UTF-8');
            $split_length = ($split_length <= 0) ? 1 : $split_length;
            $mb_strlen = mb_strlen($string, 'utf-8');
            $array = array();
            $i = 0;

            while ($i < $mb_strlen) {
                $array[] = mb_substr($string, $i, $split_length);
                $i = $i + $split_length;
            }
            return $array;
        }
        // Get string length for Character Thai
        function getStrLenTH($string)
        {
            $array = getMBStrSplit($string);
            $count = 0;
            foreach ($array as $value) {
                $ascii = ord(iconv("UTF-8", "TIS-620", $value));
                if (!($ascii == 209 ||  ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238))) {
                    $count += 1;
                }
            }
            return $count;
        }

        date_default_timezone_set('asia/bangkok');
        $currentDate = date("Y-m-d");
        $dateCreate = date_create($currentDate);
        $currentDay = date_format($dateCreate, " d");
        $currentMonth = date_format($dateCreate, " m");
        $currentYears = date_format($dateCreate, "Y ");
        $currentYears = (int)$currentYears + 543;

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? null;
        $level = $_POST['LevelsInput'];
        $type = $_POST['inputState'];
        $studentid = $_POST['studentid'];
        $faculty = $_POST['faculty'];
        $major = $_POST['major'];
        $field = $_POST['field'];

        $plantype = $_POST['plan'];

        //ข้อมูลติดต่อ
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];
        $textAddress = $address;

        $titleTH = $_POST['titleTH'];
        $titleEN = $_POST['titleEN'];
        $flexRadioDefault = $_POST['flexRadioDefault'];
        $date = $_POST['datepicker'];
        $check1 = $_POST['check1'] ?? null;
        $check2 = $_POST['check2'] ?? null;
        $check3 = $_POST['check3'] ?? null;
        $check4 = $_POST['check4'] ?? null;

        $fname1 = $_POST['fname1'] ?? '';
        $lname1 = $_POST['lname1'] ?? '';

        $fname2 = $_POST['fname2'] ?? '';
        $lname2 = $_POST['lname2'] ?? '';

        $fname3 = $_POST['fname3'] ?? '';
        $lname3 = $_POST['lname3'] ?? '';

        $fname4 = $_POST['fname4'] ?? '';
        $lname4 = $_POST['lname4'] ?? '';

        $fname5 = $_POST['fname5'] ?? '';
        $lname5 = $_POST['lname5'] ?? '';

        $fname6 = $_POST['fname6'] ?? '';
        $lname6 = $_POST['lname6'] ?? '';

        //อาจารย์ที่ปรึกษาหลัก
        $fnameMajor = $_POST['fnameMajor'];
        $lnameMajor = $_POST['lnameMajor'];

        //อาจารย์ที่ปรึกษาร่วม
        $fnameCoAdvisor = $_POST['fnameCoAdvisor'];
        $lnameCoAdvisor = $_POST['lnameCoAdvisor'];

        //ประธานกรรมการบริหารหลักสูตร 
        $fnameCurriculum = $_POST['fnameCurriculum'];
        $lnameCurriculum = $_POST['lnameCurriculum'];

        //ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ
        $fnameGraduate = $_POST['fnameGraduate'];
        $lnameGraduate = $_POST['lnameGraduate'];

        $prefix1 = $_POST['prefixInput1'] ?? '';
        $prefix2 = $_POST['prefixInput2'] ?? '';
        $prefix3 = $_POST['prefixInput3'] ?? '';
        $prefix4 = $_POST['prefixInput4'] ?? '';
        $prefix5 = $_POST['prefixInput5'] ?? '';

        $prefixMajor = $_POST['prefixMajor'] ?? '';
        $prefixCoAdvisor = $_POST['prefixCoAdvisor'] ?? '';
        $prefixCurriculum = $_POST['prefixCurriculum'] ?? '';
        $prefixGraduate = $_POST['prefixGraduate'] ?? '';

        $other1 = $_POST['otherPrefix1'] ?? '';
        $other2 = $_POST['otherPrefix2'] ?? '';
        $other3 = $_POST['otherPrefix3'] ?? '';
        $other4 = $_POST['otherPrefix4'] ?? '';
        $other5 = $_POST['otherPrefix5'] ?? '';

        $otherMajor = $_POST['otherPrefixMajor'] ?? '';
        $otherCoAdvisor = $_POST['otherPrefixCoAdvisor'] ?? '';
        $otherCurriculum = $_POST['otherPrefixCurriculum'] ?? '';
        $otherGraduate = $_POST['otherPrefixGraduate'] ?? '';

        $prefixMajor = checkPrefix($prefixMajor, $otherMajor);
        $prefixCoAdvisor = checkPrefix($prefixCoAdvisor, $otherCoAdvisor);
        $prefixCurriculum = checkPrefix($prefixCurriculum, $otherCurriculum);
        $prefixGraduate = checkPrefix($prefixGraduate, $otherGraduate);

        $nameMajor = $prefixMajor . $fnameMajor . "&nbsp;" . $lnameMajor;
        $nameCoAdvisor = $prefixCoAdvisor . $fnameCoAdvisor . "&nbsp;" . $lnameCoAdvisor;
        $nameCurriculum = $prefixCurriculum . $fnameCurriculum . "&nbsp;" . $lnameCurriculum;
        $nameGraduate = $prefixGraduate . $fnameGraduate . "&nbsp;" . $lnameGraduate;

        if ($prefix1 != '') {
            if ($prefix1 == 'other') {
                $name1 = $other1 . $fname1 . "&nbsp;" . $lname1;
            } else {
                $name1 = $prefix1 . $fname1 . "&nbsp;" . $lname1;
            }
        } else {
            $name1 = '';
        }

        if ($prefix2 != '') {
            if ($prefix2 == 'other') {
                $name2 = $other2 . $fname2 . "&nbsp;" . $lname2;
            } else {
                $name2 = $prefix2 . $fname2 . "&nbsp;" . $lname2;
            }
        } else {
            $name2 = '';
        }

        if ($prefix3 != '') {
            if ($prefix3 == 'other') {
                $name3 = $other3 . $fname3 . "&nbsp;" . $lname3;
            } else {
                $name3 = $prefix3 . $fname3 . "&nbsp;" . $lname3;
            }
        } else {
            $name3 = '';
        }

        if ($prefix4 != '') {
            if ($prefix4 == 'other') {
                $name4 = $other4 . $fname4 . "&nbsp;" . $lname4;
            } else {
                $name4 = $prefix4 . $fname4 . "&nbsp;" . $lname4;
            }
        } else {
            $name4 = '';
        }

        if ($prefix5 != '') {
            if ($prefix5 == 'other') {
                $name5 = $other5 . $fname5 . "&nbsp;" . $lname5;
            } else {
                $name5 = $prefix5 . $fname5 . "&nbsp;" . $lname5;
            }
        } else {
            $name5 = '';
        }

        //รายละเอียดสถานที่ขอสอบ
        $dateBook = $_POST['dateBook'];
        $dateBookYears = $dateBook[0] . $dateBook[1] . $dateBook[2] . $dateBook[3];
        $dateBookYears = (int)$dateBookYears + 543;
        $dateBookMonth = $dateBook[5] . $dateBook[6];
        $dateBookMonth = checkMonth($dateBookMonth);

        $dateBookDays = $dateBook[8] . $dateBook[9];
        $dateBookTime = $dateBook[11] . $dateBook[12] . $dateBook[13] . $dateBook[14] . $dateBook[15];

        $place = $_POST['place'];
        $building = $_POST['building'];
        $facultyPlace = $_POST['facultyPlace'];

        //Date
        $dateYears =  $date[0] . $date[1] . $date[2] . $date[3];
        $dateYears = (int)$dateYears + 543;
        $dateMonth = $date[5] . $date[6];
        $dateDays = $date[8] . $date[9];
        $dateDays = (int)$dateDays;
        $dateMonthTxt = '';
        $dateMonth = (int)$dateMonth;
        $dateMonthTxt = checkMonth($dateMonth);

        $name = $fname . "&nbsp;" . $lname;
        $pagecount = $mpdf->SetSourceFile('pdf/form-2.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $tplId3 = $mpdf->ImportPage(3);
        //<p> &#10003;</p>
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R', 18);

        //current date
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:585px; font-size:20px; width:50px;">' . $currentDay . '</div>');
        $txtCurrentMonth = checkMonthShort($currentMonth);
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:615px; font-size:20px; width:50px; text-align:center;">' . $txtCurrentMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:676px; font-size:20px; width:50px">' . $currentYears . '</div>');

        //Check Degree
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:225px; left:168px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:225px; left:325x; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:243px; left:130px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:243px; left:236px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        //plan type $plantype
        $mpdf->WriteHTML('<div style="position:absolute; top: 221px;px; left:660px; font-size:20px; width:50px">' . $plantype . '</div>');

        // ชื่อนักศึกษา
        if ($prefix == 'other') {
            $fullname = $other . $name;
            $mpdf->WriteHTML('<div style="position:absolute; top:290px; left:346x; font-size:20px">' . $fullname . '</div>');
        } else {
            $fullname = $prefix . $name;
            $mpdf->WriteHTML('<div style="position:absolute; top:290px; left:346x; font-size:20px">' . $fullname . '</div>');
        }

        //ชื่อนักศึกษาตรงลายเซ็น
        if (mb_strlen($fullname, 'UTF-8') > 43) { //ได้ไม่เกิน 42
            $size = 14;
            $top = 980;
        } else if (mb_strlen($fullname, 'UTF-8') > 39) { //ได้ไม่เกิน 37 ตัว
            $size = 16;
            $top = 978;
        } else if (mb_strlen($fullname, 'UTF-8') > 35) { //ได้ไม่เกิน 33 ตัว
            $size = 18;
            $top = 976;
        } else { //ได้ไม่เกิน 29 ตัว
            $size = 20;
            $top = 975;
        }
        $num = mb_strlen($fullname);
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:478px; font-size:' . $size . 'px; width:220px; text-align:center;">' . $fullname . '</div>');

        //รหัสนักศึกษา
        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '352');
            } else {
                array_push($topStu, '355');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:262px; font-size:20px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:290px; font-size:20px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:318px; font-size:20px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:346px; font-size:20px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:374px; font-size:20px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:402px; font-size:20px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:430px; font-size:20px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:458px; font-size:20px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:486px; font-size:20px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:514px; font-size:20px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:542px; font-size:20px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:570px; font-size:20px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:615px; font-size:20px;'>" . $studentid[13] . "</div>");

        if (mb_strlen($faculty, 'UTF-8') > 22) {
            $size = 14;
            $top = 406;
        } else if (mb_strlen($faculty, 'UTF-8') > 19) {
            $size = 16;
            $top = 404;
        } else if (mb_strlen($faculty, 'UTF-8') > 17) {
            $size = 18;
            $top = 402;
        } else {
            $size = 20;
            $top = 400;
        }
        //25 ตัวอักษร
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:132; font-size:' . $size . 'px; width:130px; text-align:center;">' . $faculty . '</div>');

        if (mb_strlen($major, 'UTF-8') > 29) {
            $size = 16;
            $top = 404;
        } else if (mb_strlen($major, 'UTF-8') > 26) {
            $size = 18;
            $top = 402;
        } else {
            $size = 20;
            $top = 400;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:545; font-size:' . $size . 'px; width:206px; text-align:center;">' . $major . '</div>');

        if (mb_strlen($field, 'UTF-8') > 29) {
            $size = 16;
            $top = 429;
        } else if (mb_strlen($field, 'UTF-8') > 26) {
            $size = 18;
            $top = 427;
        } else {
            $size = 20;
            $top = 425;
        } //33 ตัวอักษร
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:207; font-size:' . $size . 'px; width:195px; text-align:center;">' . $field . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:450px; left:50; font-size:20px">' . $textAddress . '</div>');

        if ($telephone != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:472px; left:200; font-size:20px">' . $telephone . '</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:472px; left:583; font-size:20px">' . $mobile . '</div>');

        //Date of Approval of the proposal
        $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:183; font-size:20px; width:100px;">' . (int)$dateDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:330; font-size:20px;">' . $dateMonthTxt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:485; font-size:20px; width:100px;">' . $dateYears . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:563px; left:70; font-size:20px; width:650px; word-break: break-all;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $titleTH . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:611px; left:70; font-size:20px; width:650px; word-break: break-all;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $titleEN . '</div>');

        if ($flexRadioDefault == 'Dissertation') {
            $mpdf->WriteHTML('<div style="position:absolute; top:662px; left:340px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($flexRadioDefault == 'Thesis') {
            $mpdf->WriteHTML('<div style="position:absolute; top:662px; left:530px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($check1 != null) {
            $mpdf->WriteHTML('<div style="position:absolute; top:757px; left:88px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            $copyAbstarct = $_POST['copyAbstarct'];
            $mpdf->WriteHTML('<div style="position:absolute; top:758px; left:388px; font-size:20px; width:100px;">' . $copyAbstarct . '</div>');
        }
        if ($check2 != null) {
            $mpdf->WriteHTML('<div style="position:absolute; top:782px; left:88px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            $hardCopy = $_POST['hardCopy'];
            $mpdf->WriteHTML('<div style="position:absolute; top:782px; left:530px; font-size:20px; width:100px;">' . $hardCopy . '</div>');
        }
        if ($check3 != null) {
            $mpdf->WriteHTML('<div style="position:absolute; top:805px; left:88px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($check4 != null) {
            $mpdf->WriteHTML('<div style="position:absolute; top:829px; left:88px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);
        if ($flexRadioDefault == 'Dissertation') {
            $mpdf->WriteHTML('<div style="position:absolute; top:84px; left:325px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($flexRadioDefault == 'Thesis') {
            $mpdf->WriteHTML('<div style="position:absolute; top:84px; left: 492px;px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:176px; left:100px; font-size:20px">' . $name1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:198px; left:100px; font-size:20px">' . $name2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:100px; font-size:20px">' . $name3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:100px; font-size:20px">' . $name4 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:263px; left:100px; font-size:20px">' . $name5 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:284px; left:100px; font-size:20px">' . $nameMajor . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:328px; left:350px; font-size:20px; width:100px">' . (int)$dateBookDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:328px; left:485px; font-size:20px; width:107px; text-align:center;">' . $dateBookMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:328px; left:690px; font-size:20px; width:100px">' . $dateBookYears . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:352px; left:140px; font-size:20px; width:100px">' . $dateBookTime . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:352px; left:472px; font-size:20px; width:100px;">' . $place . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:377px; left:180px; font-size:20px; width:100px">' . $building . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:377px; left:493px; font-size:20px; width:100px">' . $facultyPlace . '</div>');

        //รายชื่อผู้ทรงคุณวุฒิ
        if (getStrLenTH($nameMajor) > 43) {
            $size = 14;
            $top = 862;
        } else if (getStrLenTH($nameMajor) > 39) {
            $size = 16;
            $top = 860;
        } else if (getStrLenTH($nameMajor) > 36) {
            $size = 18;
            $top = 858;
        } else {
            $size = 20;
            $top = 856;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:186px; font-size:' . $size . 'px; width:220px; text-align:center;">' . $nameMajor . '</div>');

        if (getStrLenTH($nameCoAdvisor) > 43) {
            $size = 14;
            $top = 958;
        } else if (getStrLenTH($nameCoAdvisor) > 39) {
            $size = 16;
            $top = 956;
        } else if (getStrLenTH($nameCoAdvisor) > 36) {
            $size = 18;
            $top = 954;
        } else {
            $size = 20;
            $top = 952;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:186px; font-size:' . $size . 'px; width:220px; text-align:center;">' . $nameCoAdvisor . '</div>');

        // ------------------paf page 3--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId3);


        $mpdf->WriteHTML('<div style="position:absolute; top:85px; left:195px; font-size:20px; width:45px; text-align:center;">' . (int)$dateBookDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:85px; left:341px; font-size:20px; width:106px; text-align:center;">' . $dateBookMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:85px; left:537px; font-size:20px; width:68px; text-align:center;">' . $dateBookYears . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:108px; left:197px; font-size:20px; width:125px; text-align:center;">' . $dateBookTime . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:108px; left:530px; font-size:20px; width:217px;">' . $place . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:133px; left:225px; font-size:20px; width:194px; text-align:center;">' . $building . '</div>');

        if (getStrLenTH($facultyPlace) > 36) {
            $size = 14;
            $top = 139;
        } else if (getStrLenTH($facultyPlace) > 32) {
            $size = 16;
            $top = 137;
        } else if (getStrLenTH($facultyPlace) > 29) {
            $size = 18;
            $top = 135;
        } else {
            $size = 20;
            $top = 133;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:532px; font-size:' . $size . 'px; width:211px; text-align:center;">' . $facultyPlace . '</div>');

        //ราชชื่อผู้ทรงคุณวุฒิ $nameCurriculum
        if (mb_strlen($nameCurriculum, 'UTF-8') > 37) {
            $size = 14;
            $top = 306;
        } else if (mb_strlen($nameCurriculum, 'UTF-8') > 33) {
            $size = 16;
            $top = 304;
        } else if (mb_strlen($nameCurriculum, 'UTF-8') > 30) {
            $size = 18;
            $top = 302;
        } else {
            $size = 20;
            $top = 300;
        }
        $numCur = mb_strlen($nameCurriculum);
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:167px; font-size:' . $size . 'px; text-align:center; width:180px;">' . $nameCurriculum . '</div>');

        if (mb_strlen($nameGraduate, 'UTF-8') > 35) {
            $size = 14;
            $top = 740;
        } else if (mb_strlen($nameGraduate, 'UTF-8') > 32) {
            $size = 16;
            $top = 738;
        } else if (mb_strlen($nameGraduate, 'UTF-8') > 29) {
            $size = 18;
            $top = 736;
        } else {
            $size = 20;
            $top = 734;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:143px; font-size:' . $size . 'px; text-align:center; width:174px;">' . $nameGraduate . '</div>');

        // pdf output
        $mpdf->Output('RequestFormExamination.pdf');

        ?>
    </div>

</body>

</html>