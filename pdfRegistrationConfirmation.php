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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RegistrationConfirmationFormForGraduateStudents.pdf'" />
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="styles.css">
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

        //ชื่อนักศึกษา
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $fnameTh = $_POST['fnameTh'];
        $lnameTh = $_POST['lnameTh'];
        $fnameEn = $_POST['fnameEn'];
        $lnameEn = $_POST['lnameEn'];

        $studentid = $_POST['studentid']; //รหัสนักศึกษา
        $idNum = $_POST['idNum']; //บัตรประชาชน

        $faculty = $_POST['faculty'];
        $major = $_POST['major'];
        $field = $_POST['field'];

        //วันเกิด
        $date = $_POST['birthDay'];
        $dateYears =  $date[0] . $date[1] . $date[2] . $date[3];
        $dateYears = (int)$dateYears + 543;
        $dateMonth = $date[5] . $date[6];
        $dateDays = $date[8] . $date[9];
        $dateDays = (int)$dateDays;
        $dateMonth = (int)$dateMonth;
        $dateMonthTxt = checkMonth($dateMonth);

        $age = $_POST['age'];
        $ethnicity = $_POST['ethnicity'];
        $nationality = $_POST['nationality'];
        $religion = $_POST['religion'] ?? '';

        $bloodType = $_POST['bloodType'];
        $heightCm = $_POST['heightCm'];
        $weightKg = $_POST['weightKg'];

        $disability = $_POST['disability'] ?? '';
        $specialSkill = $_POST['specialSkill'] ?? '';

        $degreeApplied = $_POST['degreeApplied'];
        $facultyApplied = $_POST['facultyApplied'];
        $gpa = $_POST['gpa'];
        $qualificationApplied = $_POST['qualificationApplied'];
        $majorApplied = $_POST['majorApplied'];
        $university = $_POST['university'];

        //ที่อยู่ตามทะเบียนบ้าน
        $houseNo = $_POST['houseNo']; //บ้านเลขที่
        $villageNo = $_POST['villageNo'] ?? ''; //หมู่ที่
        $village = $_POST['village'] ?? ''; //หมู่บ้าน
        $alleyLane = $_POST['alleyLane'] ?? ''; //ตรอก/ซอบ
        $road = $_POST['road'] ?? ''; //ถนน
        $subDistrictSubArea = $_POST['subDistrictSubArea']; //ตำบล/แขวง
        $district = $_POST['district']; //อำเภอ/เขต
        $province = $_POST['province']; //จังหวัด
        $postalCode = $_POST['postalCode']; //รหัสไปรษณีย์
        $telHome = $_POST['telHome'] ?? ''; //โทรศัพทืบ้าน
        $mobile = $_POST['mobile']; //โทรศัพท์มือถือ
        $email = $_POST['email'] ?? ''; //อีเมล

        $currentAddress = $_POST['currentAddress'];

        $workAddress = $_POST['workAddress'] ?? '';
        $telWorkplace = $_POST['telWorkplace'] ?? '';

        $prefixFather = $_POST['prefixFather'];
        $otherPrefixFather = $_POST['otherPrefixFather'] ?? '';
        $fnameFather = $_POST['fnameFather'];
        $lnameFather = $_POST['lnameFather'];
        $occupationFather = $_POST['occupationFather'] ?? '';
        $mobileFather = $_POST['mobileFather'] ?? '';

        $prefixMother = $_POST['prefixMother'];
        $otherPrefixMother = $_POST['otherPrefixMother'] ?? '';
        $fnameMother = $_POST['fnameMother'];
        $lnameMother = $_POST['lnameMother'];
        $occupationMother = $_POST['occupationMother'] ?? '';
        $mobileMother = $_POST['mobileMother'] ?? '';

        $parentStatus = $_POST['parentStatus'];
        $parentStatusOther = $_POST['parentStatusOther'] ?? '';

        $fatherIncome = $_POST['fatherIncome'] ?? '';
        $motherIncome = $_POST['motherIncome'] ?? '';
        $guardianIncome = $_POST['guardianIncome'] ?? '';

        $numberOfBroSis = $_POST['numberOfBroSis'] ?? '';
        $numberOfBroSisSchool = $_POST['numberOfBroSisSchool'] ?? '';
        $numberOfBroSisWork = $_POST['numberOfBroSisWork'] ?? '';

        $prefixSpouse = $_POST['prefixSpouse'] ?? '';
        $otherPrefixSpouse = $_POST['otherPrefixSpouse'] ?? '';
        $fnameSpouse = $_POST['fnameSpouse'] ?? '';
        $lnameSpouse = $_POST['lnameSpouse'] ?? '';
        $occupationSpouse = $_POST['occupationSpouse'] ?? '';
        $mobileSpouse = $_POST['mobileSpouse'] ?? '';

        $prefixPersonEmergency = $_POST['prefixPersonEmergency'];
        $otherPrefixPersonEmergency = $_POST['otherPrefixPersonEmergency'] ?? '';
        $fnamePersonEmergency = $_POST['fnamePersonEmergency'];
        $lnamePersonEmergency = $_POST['lnamePersonEmergency'];
        $relationshipPersonEmergency = $_POST['relationshipPersonEmergency'];
        $addressPersonEmergency = $_POST['addressPersonEmergency'];


        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $nameTh = $prefix . $fnameTh . "&nbsp;" . $lnameTh;

        $prefixFather = checkPrefix($prefixFather, $otherPrefixFather);
        $nameFather = $prefixFather . $fnameFather . "&nbsp;" . $lnameFather;
        $prefixFnameFather = $prefixFather . $fnameFather;

        $prefixMother = checkPrefix($prefixMother, $otherPrefixMother);
        $nameMother = $prefixMother . $fnameMother . "&nbsp;" . $lnameMother;
        $prefixFnameMother = $prefixMother . $fnameMother;

        $prefixSpouse = checkPrefix($prefixSpouse, $otherPrefixSpouse);
        $nameSpouse = $prefixSpouse . $fnameSpouse . "&nbsp;" . $lnameSpouse;
        $prefixFnameSpouse = $prefixSpouse . $fnameSpouse;

        $prefixPersonEmergency = checkPrefix($prefixPersonEmergency, $otherPrefixPersonEmergency);
        $namePersonEmergency = $prefixPersonEmergency . $fnamePersonEmergency . "&nbsp;" . $lnamePersonEmergency;
        $prefixFnamePersonEmergency = $prefixPersonEmergency . $fnamePersonEmergency;

        if ($prefix == 'นาย') {
            $prefix = "Mr.";
        } else if ($prefix == 'นาง') {
            $prefix = "Mrs.";
        } else if ($prefix == 'นางสาว') {
            $prefix = "Miss";
        }

        $fnameEn = $prefix . $fnameEn;

        //fnameEn
        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormRegistrationConfirmation.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);

        // ------------------paf page 1--------------------
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R');

        $mpdf->WriteHTML('<div style="position:absolute; top:405px; left:348px; font-size:16px; width:395px;">' . $nameTh . '</div>');

        //รหัสนักศึกษา
        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '449');
            } else {
                array_push($topStu, '451');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:200px; font-size:16px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:217px; font-size:16px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:234px; font-size:16px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:250px; font-size:16px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:266px; font-size:16px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:282px; font-size:16px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:298px; font-size:16px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:315px; font-size:16px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:331px; font-size:16px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:348px; font-size:16px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:364px; font-size:16px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:380px; font-size:16px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:403px; font-size:16px;'>" . $studentid[13] . "</div>");

        //รหัสบัตรประชาชน
        $topId = array();
        for ($i = 0; $i <= 12; $i++) {
            if ($idNum[$i] == '0') {
                array_push($topId, '449');
            } else {
                array_push($topId, '451');
            }
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[0]}px; left:563px; font-size:16px;'>" . $idNum[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[1]}px; left:584px; font-size:16px;'>" . $idNum[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[2]}px; left:599px; font-size:16px;'>" . $idNum[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[3]}px; left:614px; font-size:16px;'>" . $idNum[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[4]}px; left:629px; font-size:16px;'>" . $idNum[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[5]}px; left:650px; font-size:16px;'>" . $idNum[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[6]}px; left:665px; font-size:16px;'>" . $idNum[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[7]}px; left:680px; font-size:16px;'>" . $idNum[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[8]}px; left:695px; font-size:16px;'>" . $idNum[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[9]}px; left:710px; font-size:16px;'>" . $idNum[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[10]}px; left:730px; font-size:16px;'>" . $idNum[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[11]}px; left:745px; font-size:16px;'>" . $idNum[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topId[12]}px; left:767px; font-size:16px;'>" . $idNum[12] . "</div>");

        if (mb_strlen($faculty, 'UTF-8') > 31) {
            $size = 12;
            $top = 496;
        } else if (mb_strlen($faculty, 'UTF-8') > 24) {
            $size = 14;
            $top = 494;
        } else {
            $size = 18;
            $top = 491;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:117px; font-size:" . $size . "px; width:162px;'>" . $faculty . "</div>");

        if (mb_strlen($major, 'UTF-8') > 30) {
            $size = 12;
            $top = 496;
        } else if (mb_strlen($major, 'UTF-8') > 23) {
            $size = 14;
            $top = 494;
        } else {
            $size = 18;
            $top = 491;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:385px; font-size:" . $size . "px; width:140px;'>" . $major . "</div>");

        if (mb_strlen($field, 'UTF-8') > 32) {
            $size = 12;
            $top = 496;
        } else if (mb_strlen($field, 'UTF-8') > 25) {
            $size = 14;
            $top = 494;
        } else {
            $size = 18;
            $top = 491;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:587px; font-size:" . $size . "px; width:165px;'>" . $field . "</div>");

        $mpdf->WriteHTML('<div style="position:absolute; top:536px; left:406px; font-size:16px; width:344px;">' . $fnameEn . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:580px; left:263px; font-size:16px; width:487px;">' . $lnameEn . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:128px; font-size:16px; width:28px; text-align:center;">' . $dateDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:190px; font-size:16px; width:96px; text-align:center;">' . $dateMonthTxt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:323px; font-size:16px; width:27px; text-align:center;">' . $dateYears . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:389px; font-size:16px; width:16px; text-align:center;">' . $age . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:497px; font-size:16px; width:44px; text-align:center;">' . $ethnicity . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:590px; font-size:16px; width:50px; text-align:center;">' . $nationality . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:624px; left:691px; font-size:16px; width:57px; text-align:center;">' . $religion . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:668px; left:134px; font-size:16px; width:30px; text-align:center;">' . $bloodType . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:668px; left:209px; font-size:16px; width:42px; text-align:center;">' . $heightCm . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:668px; left:317px; font-size:16px; width:61px; text-align:center;">' . $weightKg . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:668px; left:461px; font-size:16px; width:290px;">' . $disability . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:712px; left:231px; font-size:16px; width:520px;">' . $specialSkill . '</div>');


        if (mb_strlen($degreeApplied, 'UTF-8') > 20) {
            $size = 8;
            $top = 763;
        } else if (mb_strlen($degreeApplied, 'UTF-8') > 16) {
            $size = 12;
            $top = 759;
        } else {
            $size = 16;
            $top = 755;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:207px; font-size:' . $size . 'px; width:89px;">' . $degreeApplied . '</div>');

        if (mb_strlen($facultyApplied, 'UTF-8') > 32) {
            $size = 12;
            $top = 759;
        } else if (mb_strlen($facultyApplied, 'UTF-8') > 28) {
            $size = 14;
            $top = 757;
        } else {
            $size = 16;
            $top = 755;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:333px; font-size:' . $size . 'px; width:167px;">' . $facultyApplied . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:755px; left:613px; font-size:16px;">' . $gpa . '</div>');


        if (mb_strlen($qualificationApplied, 'UTF-8') > 72) {
            $size = 12;
            $top = 803;
        } else if (mb_strlen($qualificationApplied, 'UTF-8') > 63) {
            $size = 14;
            $top = 801;
        } else {
            $size = 16;
            $top = 800;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:385px; font-size:' . $size . 'px; width:368px;">' . $qualificationApplied . '</div>');

        if (mb_strlen($majorApplied, 'UTF-8') > 78) {
            $size = 12;
            $top = 846;
        } else if (mb_strlen($majorApplied, 'UTF-8') > 68) {
            $size = 14;
            $top = 844;
        } else {
            $size = 16;
            $top = 842;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:353px; font-size:' . $size . 'px; width:397px;">' . $majorApplied . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:887px; left:154px; font-size:16px;">' . $university . '</div>');


        if (mb_strlen($workAddress, 'UTF-8') > 91) {
            $size = 10;
            $top = 935;
        } else if (mb_strlen($workAddress, 'UTF-8') > 78) {
            $size = 12;
            $top = 933;
        } else if (mb_strlen($workAddress, 'UTF-8') > 68) {
            $size = 14;
            $top = 931;
        } else {
            $size = 16;
            $top = 929;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:188px; font-size:' . $size . 'px; width:397px;">' . $workAddress . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:929px; left:654px; font-size:16px;">' . $telWorkplace . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:973px; left:191px; font-size:16px; width:86px; text-align:center;">' . $houseNo . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:973px; left:333px; font-size:16px; width:152; text-align:center;">' . $village . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:973px; left:524px; font-size:16px; width:27px; text-align:center;">' . $villageNo . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:973px; left:619px; font-size:16px; width:128px;">' . $alleyLane . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:1017px; left:121px; font-size:16px; width:162px;">' . $road . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1017px; left:358px; font-size:16px; width:126px;">' . $subDistrictSubArea . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1017px; left:562px; font-size:16px; width:180px;">' . $district . '</div>');


        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);

        $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:127px; font-size:16px; width:136px; text-align:center;">' . $province . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:350px; font-size:16px; width:59px; text-align:center;">' . $postalCode . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:470px; font-size:16px; width:105px; text-align:center;">' . $telHome . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:657px; font-size:16px; width:93px; text-align:center;">' . $mobile . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:114px; left:207px; font-size:16px; width:541px;">' . $currentAddress . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:158px; left:154px; font-size:16px; width:541px;">' . $email . '</div>');

        if (mb_strlen($prefixFnameFather, 'UTF-8') > 30) {
            $size = 10;
            $top = 186;
        } else if (mb_strlen($prefixFnameFather, 'UTF-8') > 25) {
            $size = 12;
            $top = 184;
        } else if (mb_strlen($prefixFnameFather, 'UTF-8') > 22) {
            $size = 14;
            $top = 182;
        } else {
            $size = 16;
            $top = 180;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:127px; font-size:' . $size . 'px; width:132px; text-align:center;">' . $prefixFnameFather . '</div>');

        if (mb_strlen($lnameFather, 'UTF-8') > 25) {
            $size = 10;
            $top = 186;
        } else if (mb_strlen($lnameFather, 'UTF-8') > 22) {
            $size = 12;
            $top = 184;
        } else if (mb_strlen($lnameFather, 'UTF-8') > 19) {
            $size = 14;
            $top = 182;
        } else {
            $size = 16;
            $top = 180;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:319px; font-size:' . $size . 'px; width:112px; text-align:center;">' . $lnameFather . '</div>');

        if (mb_strlen($occupationFather, 'UTF-8') > 22) {
            $size = 10;
            $top = 186;
        } else if (mb_strlen($occupationFather, 'UTF-8') > 19) {
            $size = 12;
            $top = 184;
        } else if (mb_strlen($occupationFather, 'UTF-8') > 16) {
            $size = 14;
            $top = 182;
        } else {
            $size = 16;
            $top = 180;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:478px; font-size:' . $size . 'px; width:98px; text-align:center;">' . $occupationFather . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:639px; font-size:16px; width:106px; text-align:center;">' . $mobileFather . '</div>');

        if (mb_strlen($prefixFnameMother, 'UTF-8') > 29) {
            $size = 10;
            $top = 230;
        } else if (mb_strlen($prefixFnameMother, 'UTF-8') > 24) {
            $size = 12;
            $top = 228;
        } else if (mb_strlen($prefixFnameMother, 'UTF-8') > 21) {
            $size = 14;
            $top = 226;
        } else {
            $size = 16;
            $top = 224;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:137px; font-size:' . $size . 'px; width:125px; text-align:center;">' . $prefixFnameMother . '</div>');


        if (mb_strlen($lnameMother, 'UTF-8') > 25) {
            $size = 10;
            $top = 230;
        } else if (mb_strlen($lnameMother, 'UTF-8') > 22) {
            $size = 12;
            $top = 228;
        } else if (mb_strlen($lnameMother, 'UTF-8') > 19) {
            $size = 14;
            $top = 226;
        } else {
            $size = 16;
            $top = 224;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:319px; font-size:' . $size . 'px; width:112px; text-align:center;">' . $lnameMother . '</div>');

        if (mb_strlen($occupationMother, 'UTF-8') > 22) {
            $size = 10;
            $top = 230;
        } else if (mb_strlen($occupationMother, 'UTF-8') > 19) {
            $size = 12;
            $top = 228;
        } else if (mb_strlen($occupationMother, 'UTF-8') > 16) {
            $size = 14;
            $top = 226;
        } else {
            $size = 16;
            $top = 224;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:478px; font-size:' . $size . 'px; width:98px; text-align:center;">' . $occupationMother . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:224px; left:639px; font-size:16px; width:106px; text-align:center;">' . $mobileMother . '</div>');

        if ($parentStatus == 'married') {
            $mpdf->WriteHTML('<div style="position:absolute; top:264px; left:225px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($parentStatus == 'separated') {
            $mpdf->WriteHTML('<div style="position:absolute; top:264px; left:306px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($parentStatus == 'divorced') {
            $mpdf->WriteHTML('<div style="position:absolute; top:264px; left:387px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($parentStatus == 'other') {
            $mpdf->WriteHTML('<div style="position:absolute; top:264px; left:460px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:166px; font-size:16px; width:104px; text-align:center;">' . $fatherIncome . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:413px; font-size:16px; width:82px; text-align:center;">' . $motherIncome . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:643px; font-size:16px; width:80px; text-align:center;">' . $guardianIncome . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:353px; left:186px; font-size:16px; width:30px; text-align:center;">' . $numberOfBroSis . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:353px; left:408px; font-size:16px; width:50px; text-align:center;">' . $numberOfBroSisSchool . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:353px; left:639px; font-size:16px; width:60px; text-align:center;">' . $numberOfBroSisWork . '</div>');

        if (mb_strlen($prefixFnameSpouse, 'UTF-8') > 28) {
            $size = 10;
            $top = 397;
        } else if (mb_strlen($prefixFnameSpouse, 'UTF-8') > 24) {
            $size = 12;
            $top = 395;
        } else if (mb_strlen($prefixFnameSpouse, 'UTF-8') > 21) {
            $size = 14;
            $top = 393;
        } else {
            $size = 16;
            $top = 391;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:195px; font-size:' . $size . 'px; width:123px; text-align:center;">' . $prefixFnameSpouse . '</div>');

        if (mb_strlen($lnameSpouse, 'UTF-8') > 23) {
            $size = 10;
            $top = 397;
        } else if (mb_strlen($lnameSpouse, 'UTF-8') > 20) {
            $size = 12;
            $top = 395;
        } else if (mb_strlen($lnameSpouse, 'UTF-8') > 17) {
            $size = 14;
            $top = 393;
        } else {
            $size = 16;
            $top = 391;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:370px; font-size:' . $size . 'px; width:103px; text-align:center;">' . $lnameSpouse . '</div>');

        if (mb_strlen($occupationSpouse, 'UTF-8') > 18) {
            $size = 10;
            $top = 397;
        } else if (mb_strlen($occupationSpouse, 'UTF-8') > 15) {
            $size = 12;
            $top = 395;
        } else if (mb_strlen($occupationSpouse, 'UTF-8') > 13) {
            $size = 14;
            $top = 393;
        } else {
            $size = 16;
            $top = 391;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:512px; font-size:' . $size . 'px; width:79px; text-align:center;">' . $occupationSpouse . '</div>');
        
        $mpdf->WriteHTML('<div style="position:absolute; top:391px; left:648px; font-size:16px; width:92px; text-align:center;">' . $mobileSpouse . '</div>');

        if (mb_strlen($prefixFnamePersonEmergency, 'UTF-8') > 24) {
            $size = 10;
            $top = 441;
        } else if (mb_strlen($prefixFnamePersonEmergency, 'UTF-8') > 21) {
            $size = 12;
            $top = 439;
        } else if (mb_strlen($prefixFnamePersonEmergency, 'UTF-8') > 18) {
            $size = 14;
            $top = 437;
        } else {
            $size = 16;
            $top = 435;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:265px; font-size:' . $size . 'px; width:108px; text-align:center;">' . $prefixFnamePersonEmergency . '</div>');

        if (mb_strlen($lnamePersonEmergency, 'UTF-8') > 24) {
            $size = 10;
            $top = 441;
        } else if (mb_strlen($lnamePersonEmergency, 'UTF-8') > 20) {
            $size = 12;
            $top = 439;
        } else if (mb_strlen($lnamePersonEmergency, 'UTF-8') > 18) {
            $size = 14;
            $top = 437;
        } else {
            $size = 16;
            $top = 435;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:430px; font-size:' . $size . 'px; width:105px; text-align:center;">' . $lnamePersonEmergency . '</div>');
         
        $mpdf->WriteHTML('<div style="position:absolute; top:435px; left:624px; font-size:16px; width:118px; text-align:center;">' . $relationshipPersonEmergency . '</div>');
        
        $mpdf->WriteHTML('<div style="position:absolute; top:477px; left:124px; font-size:16px; width:625px;">' . $addressPersonEmergency . '</div>');
        
        if (mb_strlen($nameTh, 'UTF-8') > 38) {
            $size = 10;
            $top = 609;
        } else if (mb_strlen($nameTh, 'UTF-8') > 34) {
            $size = 12;
            $top = 607;
        } else if (mb_strlen($nameTh, 'UTF-8') > 30) {
            $size = 14;
            $top = 605;
        } else {
            $size = 16;
            $top = 603;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:563px; font-size:' . $size . 'px; width:144px; text-align:center;">' . $nameTh . '</div>');
         
        // pdf output
        $mpdf->Output('RegistrationConfirmationFormForGraduateStudents.pdf');
        ?>

    </div>

</body>

</html>