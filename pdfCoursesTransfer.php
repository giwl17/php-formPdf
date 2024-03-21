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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/CoursesTransferRequestForm.pdf'" />
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

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
            if ($prefix == 'other') {
                return $other;
            } else {
                return $prefix;
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
        //วันที่ปัจจุบัน
        date_default_timezone_set('asia/bangkok');
        $currentDate = date("Y-m-d");
        $dateCreate = date_create($currentDate);
        $currentDay = date_format($dateCreate, " d");
        $currentMonth = date_format($dateCreate, " m");
        $currentYears = date_format($dateCreate, "Y ");
        $currentYears = (int)$currentYears + 543;

        //ข้อมูลส่วนตัว
        $studentid = $_POST['studentid']; // รหัสนักศึกษา
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        //ผู้ที่เกี่ยวข้อง
        //อาจารย์ที่ปรึกษา
        $prefixMajor = $_POST['prefixMajor'];
        $otherPrefixMajor = $_POST['otherPrefixMajor'] ?? '';
        $fnameMajor = $_POST['fnameMajor'];
        $lnameMajor = $_POST['lnameMajor'];

        //ข้อมูลการศึกษา
        $faculty = $_POST['faculty']; // คณะ
        $major = $_POST['major']; //สาขาวิชา/วิชาเอก
        $field = $_POST['field']; // แขนง
        $level = $_POST['LevelsInput']; // ระดับการศึกษา
        $plantype = $_POST['plan']; // แผน/แบบ
        $type = $_POST['inputState']; //ภาค

        //เทียบโอน
        $numTransfer = $_POST['numTransfer'];
        //  สถาบันเดิม
        $courseId1 = $_POST['courseId1'];
        $courseId2 = $_POST['courseId2'] ?? '';
        $courseId3 = $_POST['courseId3'] ?? '';
        $courseId4 = $_POST['courseId4'] ?? '';

        $courseTitle1 = $_POST['courseTitle1'];
        $courseTitle2 = $_POST['courseTitle2'] ?? '';
        $courseTitle3 = $_POST['courseTitle3'] ?? '';
        $courseTitle4 = $_POST['courseTitle4'] ?? '';

        $creditT1 = $_POST['creditT1'];
        $creditT2 = $_POST['creditT2'] ?? '';
        $creditT3 = $_POST['creditT3'] ?? '';
        $creditT4 = $_POST['creditT4'] ?? '';

        $creditP1 = $_POST['creditP1'];
        $creditP2 = $_POST['creditP2'] ?? '';
        $creditP3 = $_POST['creditP3'] ?? '';
        $creditP4 = $_POST['creditP4'] ?? '';

        $grade1 = $_POST['grade1'];
        $grade2 = $_POST['grade2'] ?? '';
        $grade3 = $_POST['grade3'] ?? '';
        $grade4 = $_POST['grade4'] ?? '';
        //  ต้องการเทียบ...
        $toCourseId1 = $_POST['toCourseId1'];
        $toCourseId2 = $_POST['toCourseId2'] ?? '';
        $toCourseId3 = $_POST['toCourseId3'] ?? '';
        $toCourseId4 = $_POST['toCourseId4'] ?? '';

        $toCourseTitle1 = $_POST['toCourseTitle1'];
        $toCourseTitle2 = $_POST['toCourseTitle2'] ?? '';
        $toCourseTitle3 = $_POST['toCourseTitle3'] ?? '';
        $toCourseTitle4 = $_POST['toCourseTitle4'] ?? '';

        $toCreditT1 = $_POST['toCreditT1'];
        $toCreditT2 = $_POST['toCreditT2'] ?? '';
        $toCreditT3 = $_POST['toCreditT3'] ?? '';
        $toCreditT4 = $_POST['toCreditT4'] ?? '';

        $toCreditP1 = $_POST['toCreditP1'];
        $toCreditP2 = $_POST['toCreditP2'] ?? '';
        $toCreditP3 = $_POST['toCreditP3'] ?? '';
        $toCreditP4 = $_POST['toCreditP4'] ?? '';


        //หน่วยกิตรวม
        //  สถาบันเดิม
        $totalCredit1 = (int)$creditP1 + (int)$creditT1;
        $totalCredit2 = (int)$creditP2 + (int)$creditT2;
        $totalCredit3 = (int)$creditP3 + (int)$creditT3;
        $totalCredit4 = (int)$creditP4 + (int)$creditT4;
        //  ต้องการเทียบ..
        $toTotalCredit1 = (int)$toCreditP1 + (int)$toCreditT1;
        $toTotalCredit2 = (int)$toCreditP2 + (int)$toCreditT2;
        $toTotalCredit3 = (int)$toCreditP3 + (int)$toCreditT3;
        $toTotalCredit4 = (int)$toCreditP4 + (int)$toCreditT4;

        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;

        $prefixMajor = checkPrefix($prefixMajor, $otherPrefixMajor);
        $nameMajor = $prefixMajor . $fnameMajor . "&nbsp;" . $lnameMajor;

        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormCoursesTransfer.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R');

        //เวลาปัจจุบัน
        $txtCurrentMonth = CheckMonthShort($currentMonth);
        $mpdf->WriteHTML('<div style="position:absolute; top:222px; left:614px; font-size:18px; width:20px; text-align:center;">' . (int)$currentDay . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:222px; left:648px; font-size:18px; width:50px; text-align:center;">' . $txtCurrentMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:222px; left:705px; font-size:18px; width:35px; text-align:center;">' . $currentYears . '</div>');

        //ระดับการศึกษา
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:242px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:357px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top: 269px;px; left:510px; font-size:18px; width:35px; text-align:center;">' . $plantype . '</div>');

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:616px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:682px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }


        //ชื่อนักศึกษา
        $mpdf->WriteHTML("<div style='position:absolute; top:364px; left:310px; font-size:18px;'>$name</div>");

        //รหัสนักศึกษา
        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '413');
            } else {
                array_push($topStu, '416');
            }
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:156px; font-size:18px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:178px; font-size:18px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:202px; font-size:18px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:224px; font-size:18px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:246px; font-size:18px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:269px; font-size:18px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:292px; font-size:18px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:315px; font-size:18px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:336px; font-size:18px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:361px; font-size:18px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:385px; font-size:18px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:406px; font-size:18px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:441px; font-size:18px;'>" . $studentid[13] . "</div>");

        //คณะ
        if (mb_strlen($faculty, 'UTF-8') > 31) { //35 อักษร
            $size = 14;
            $top = 466;
        } else if (mb_strlen($faculty, 'UTF-8') > 27) {
            $size = 16;
            $top = 464;
        } else {
            $size = 18;
            $top = 462;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:61px; font-size:" . $size . "px; width:181px; text-align:center;'>$faculty</div>");
        //สาขาวิชา
        if (mb_strlen($major, 'UTF-8') > 29) { //33 อักษร
            $size = 14;
            $top = 466;
        } else if (mb_strlen($major, 'UTF-8') > 25) {
            $size = 16;
            $top = 464;
        } else {
            $size = 18;
            $top = 462;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:343px; font-size:" . $size . "px; width:168px; text-align:center;'>$major</div>");
        //แขนง
        if (mb_strlen($field, 'UTF-8') > 32) { //37 อักษร        
            $size = 14;
            $top = 466;
        } else if (mb_strlen($field, 'UTF-8') > 29) {
            $size = 16;
            $top = 464;
        } else {
            $size = 18;
            $top = 462;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:570px; font-size:" . $size . "px; width:189px; text-align:center;'>$field</div>");

        //ที่อยู่ 87 อักษร
        $mpdf->WriteHTML("<div style='position:absolute; top:510px; left:96px; font-size:18px; width:570px;'>$address</div>");

        //โทรศัพท์ โทรศัพท์มือถือ
        $mpdf->WriteHTML("<div style='position:absolute; top:560px; left:76px; font-size:18px; width:182px; text-align:center;'>$telephone</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:560px; left:348px; font-size:18px; width:138px; text-align:center;'>$mobile</div>");

        // ----รายการที่ 1----
        // รายวิชาสถาบันเดิม - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:17px; font-size:14px; width:33px; text-align:center;'>1</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:60px; font-size:14px; width:60px; text-align:center;'>$courseId1</div>");
        if (getStrLenTH($courseTitle1) > 48) {
            $size = 8;
            $lineHeight = 8;
        } else if (getStrLenTH($courseTitle1) > 40) {
            $size = 10;
            $lineHeight = 8;
        } else {
            $size = 12;
            $lineHeight = 10;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:128px; font-size:" . $size . "px; width:90px; line-height:" . $lineHeight . "px;'>" . $courseTitle1 . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:234px; font-size:14px;'>" . $creditT1 . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:265px; font-size:14px;'>" . $creditP1 . "</div>");
        $creditTotal1 =  (int)$creditT1 + (int)$creditP1;
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:287px; font-size:14px; width:30px; text-align:center;'>" . $creditTotal1 . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:323px; font-size:14px; width:42px; text-align:center;'>" . $grade1 . "</div>");
        // รายวิชาที่จะเทียบ - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:371px; font-size:14px; width:60px; text-align:center;'>$toCourseId1</div>");

        if (getStrLenTH($toCourseTitle1) > 32) {
            $size = 8;
            $lineHeight = 8;
        } else if (getStrLenTH($toCourseTitle1) > 26) {
            $size = 10;
            $lineHeight = 8;
        } else {
            $size = 12;
            $lineHeight = 10;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:437px; font-size:" . $size . "px; width:72px; line-height:" . $lineHeight . "px; '>" . $toCourseTitle1 . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:520px; font-size:14px;'>" . $toCreditT1 . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:544px; font-size:14px;'>" . $toCreditP1 . "</div>");
        $toCreditTotal1 =  (int)$toCreditT1 + (int)$toCreditP1;
        $mpdf->WriteHTML("<div style='position:absolute; top:817px; left:563px; font-size:14px; width:30px; text-align:center;'>" . $toCreditTotal1 . "</div>");

        // ----รายการที่ 2----
        if ($numTransfer != "1") {
            // รายวิชาสถาบันเดิม - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:17px; font-size:14px; width:33px; text-align:center;'>2</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:60px; font-size:14px; width:60px; text-align:center;'>$courseId2</div>");
            if (getStrLenTH($courseTitle2) > 48) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($courseTitle2) > 40) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:128px; font-size:" . $size . "px; width:90px; line-height:" . $lineHeight . "px;'>" . $courseTitle2 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:234px; font-size:14px;'>" . $creditT2 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:265px; font-size:14px;'>" . $creditP2 . "</div>");
            $creditTotal2 =  (int)$creditT2 + (int)$creditP2;
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:287px; font-size:14px; width:30px; text-align:center;'>" . $creditTotal2 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:323px; font-size:14px; width:42px; text-align:center;'>" . $grade2 . "</div>");
            // รายวิชาที่จะเทียบ - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:371px; font-size:14px; width:60px; text-align:center;'>$toCourseId2</div>");

            if (getStrLenTH($toCourseTitle2) > 32) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($toCourseTitle2) > 26) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:437px; font-size:" . $size . "px; width:72px; line-height:" . $lineHeight . "px; '>" . $toCourseTitle2 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:520px; font-size:14px;'>" . $toCreditT2 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:544px; font-size:14px;'>" . $toCreditP2 . "</div>");
            $toCreditTotal2 =  (int)$toCreditT2 + (int)$toCreditP2;
            $mpdf->WriteHTML("<div style='position:absolute; top:838px; left:563px; font-size:14px; width:30px; text-align:center;'>" . $toCreditTotal2 . "</div>");
        }

        // ----รายการที่ 3----
        if ($numTransfer != "1" && $numTransfer != "2") {
            // รายวิชาสถาบันเดิม - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:17px; font-size:14px; width:33px; text-align:center;'>3</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:60px; font-size:14px; width:60px; text-align:center;'>$courseId3</div>");
            if (getStrLenTH($courseTitle3) > 48) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($courseTitle3) > 40) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:128px; font-size:" . $size . "px; width:90px; line-height:" . $lineHeight . "px;'>" . $courseTitle3 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:234px; font-size:14px;'>" . $creditT3 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:265px; font-size:14px;'>" . $creditP3 . "</div>");
            $creditTotal3 =  (int)$creditT3 + (int)$creditP3;
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:287px; font-size:14px; width:30px; text-align:center;'>" . $creditTotal3 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:323px; font-size:14px; width:42px; text-align:center;'>" . $grade3 . "</div>");
            // รายวิชาที่จะเทียบ - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:371px; font-size:14px; width:60px; text-align:center;'>$toCourseId3</div>");

            if (getStrLenTH($toCourseTitle3) > 32) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($toCourseTitle3) > 26) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:437px; font-size:" . $size . "px; width:72px; line-height:" . $lineHeight . "px; '>" . $toCourseTitle3 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:520px; font-size:14px;'>" . $toCreditT3 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:544px; font-size:14px;'>" . $toCreditP3 . "</div>");
            $toCreditTotal3 =  (int)$toCreditT3 + (int)$toCreditP3;
            $mpdf->WriteHTML("<div style='position:absolute; top:858px; left:563px; font-size:14px; width:30px; text-align:center;'>" . $toCreditTotal3 . "</div>");
        }

        // ----รายการที่ 4---
        if ($numTransfer != "1" && $numTransfer != "2" && $numTransfer != "3") {
            // รายวิชาสถาบันเดิม - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:17px; font-size:14px; width:33px; text-align:center;'>4</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:60px; font-size:14px; width:60px; text-align:center;'>$courseId4</div>");
            if (getStrLenTH($courseTitle4) > 48) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($courseTitle4) > 40) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:128px; font-size:" . $size . "px; width:90px; line-height:" . $lineHeight . "px;'>" . $courseTitle4 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:234px; font-size:14px;'>" . $creditT4 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:265px; font-size:14px;'>" . $creditP4 . "</div>");
            $creditTotal4 =  (int)$creditT4 + (int)$creditP4;
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:287px; font-size:14px; width:30px; text-align:center;'>" . $creditTotal4 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:323px; font-size:14px; width:42px; text-align:center;'>" . $grade4 . "</div>");
            // รายวิชาที่จะเทียบ - รหัสวิชา ชื่อวิชา หน่วยกิตภาคทฤษฎี หน่วนกิตภาคปฏิบัติ เกรด
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:371px; font-size:14px; width:60px; text-align:center;'>$toCourseId4</div>");

            if (getStrLenTH($toCourseTitle4) > 32) {
                $size = 8;
                $lineHeight = 8;
            } else if (getStrLenTH($toCourseTitle4) > 26) {
                $size = 10;
                $lineHeight = 8;
            } else {
                $size = 12;
                $lineHeight = 10;
            }
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:437px; font-size:" . $size . "px; width:72px; line-height:" . $lineHeight . "px; '>" . $toCourseTitle4 . "</div>");

            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:520px; font-size:14px;'>" . $toCreditT4 . "</div>");
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:544px; font-size:14px;'>" . $toCreditP4 . "</div>");
            $toCreditTotal4 =  (int)$toCreditT4 + (int)$toCreditP4;
            $mpdf->WriteHTML("<div style='position:absolute; top:877px; left:563px; font-size:14px; width:30px; text-align:center;'>" . $toCreditTotal4 . "</div>");
        }


        if (mb_strlen($name, 'UTF-8') > 44) {
            $size = 12;
            $top = 938;
        } else if (mb_strlen($name, 'UTF-8') > 40) {
            $size = 14;
            $top = 936;
        } else {
            $size = 16;
            $top = 934;
        }
        $num = mb_strlen($name);
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:391px; font-size:" . $size . "px; width:205px; text-align:center;'>" . $name . "</div>");


        if (mb_strlen($nameMajor, 'UTF-8') > 44) {
            $size = 12;
            $top = 1022;
        } else if (mb_strlen($nameMajor, 'UTF-8') > 40) {
            $size = 14;
            $top = 1020;
        } else {
            $size = 16;
            $top = 1018;
        }
        $numMajor = mb_strlen($nameMajor);
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:391px; font-size:" . $size . "px; width:205px; text-align:center;'>" . $nameMajor . "</div>");
        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);


        // pdf output
        $mpdf->Output('CoursesTransferRequestForm.pdf');

        ?>

    </div>

</body>

</html>