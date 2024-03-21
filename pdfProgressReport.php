<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once __DIR__ . '/vendor/autoload.php';
$defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
$fontData = $defaultFontConfig['fontdata'];

$mpdf = new \Mpdf\Mpdf([
    'format' => 'Letter',
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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/DissertationThesisIndependentStudyProgressReportForm.pdf'" />
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

        //ข้อมูลผู้ทำดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ
        $studentid = $_POST['studentid']; // รหัสนักศึกษา
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $group = $_POST['group'];

        $telephone = $_POST['telephone'] ?? '';
        $curriculum = $_POST['curriculum'] ?? '';

        $startSemesterOf์Term = $_POST['startSemesterOf์Term'];
        $startSemesterOfYears = $_POST['startSemesterOfYears'];
        $gpx = $_POST['gpx'];

        //การศึกษา
        $faculty = $_POST['faculty']; // คณะ
        $major = $_POST['major']; //สาขาวิชา/วิชาเอก
        $field = $_POST['field']; // แขนงวิชา

        //ที่อยู่ระหว่างทำดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ
        $houseNo = $_POST['houseNo']; //บ้านเลขที่
        $villageNo = $_POST['villageNo']; //หมู่ที่
        $village = $_POST['village']; //หมู่บ้าน
        $alleyLane = $_POST['alleyLane']; //ตรอก/ซอบ
        $road = $_POST['road']; //ถนน
        $subDistrictSubArea = $_POST['subDistrictSubArea']; //ตำบล/แขวง
        $district = $_POST['district']; //อำเภอ/เขต
        $province = $_POST['province']; //จังหวัด
        $postalCode = $_POST['postalCode']; //รหัสไปรษณีย์
        $telHome = $_POST['telHome']; //โทรศัพทืบ้าน
        $telWorkplace = $_POST['telWorkplace']; //โทรศัพท์ที่ทำงาน
        $mobile = $_POST['mobile']; //โทรศัพท์มือถือ
        $fax = $_POST['fax']; //โทรเลข
        $email = $_POST['email']; //อีเมล

        $thesisNameTh1 = $_POST['thesisNameTh1'];
        $thesisNameEn1 = $_POST['thesisNameEn1'];
        $prefixAdGroup1 = $_POST['prefixAdGroup1'];
        $fnameAdGroup1 = $_POST['fnameAdGroup1'];
        $lnameAdGroup1 = $_POST['lnameAdGroup1'];
        $otherPrefixAdGroup1 = $_POST['otherPrefixAdGroup1'];
        $mobileAdGroup1 = $_POST['mobileAdGroup1'];
        $emailAdGroup1 = $_POST['emailAdGroup1'];

        $prefixAd1 = $_POST['prefixAd1'];
        $otherPrefixAd1 = $_POST['otherPrefixAd1'];
        $fnameAd1 = $_POST['fnameAd1'];
        $lnameAd1 = $_POST['lnameAd1'];
        $mobileAd1 = $_POST['mobileAd1'];
        $emailAd1 = $_POST['emailAd1'];

        $prefixCoAd1 = $_POST['prefixCoAd1'];
        $otherPrefixCoAd1 = $_POST['otherPrefixCoAd1'];
        $fnameCoAd1 = $_POST['fnameCoAd1'];
        $lnameCoAd1 = $_POST['lnameCoAd1'];
        $mobileCoAd1 = $_POST['mobileCoAd1'];
        $emailCoAd1 = $_POST['emailCoAd1'];

        $thesisNameTh2 = $_POST['thesisNameTh2'];
        $thesisNameEn2 = $_POST['thesisNameEn2'];
        $prefixAdGroup2 = $_POST['prefixAdGroup2'];
        $fnameAdGroup2 = $_POST['fnameAdGroup2'];
        $lnameAdGroup2 = $_POST['lnameAdGroup2'];
        $otherPrefixAdGroup2 = $_POST['otherPrefixAdGroup2'];
        $mobileAdGroup2 = $_POST['mobileAdGroup2'];
        $emailAdGroup2 = $_POST['emailAdGroup2'];

        $prefixAd2 = $_POST['prefixAd2'];
        $otherPrefixAd2 = $_POST['otherPrefixAd2'];
        $fnameAd2 = $_POST['fnameAd2'];
        $lnameAd2 = $_POST['lnameAd2'];
        $mobileAd2 = $_POST['mobileAd2'];
        $emailAd2 = $_POST['emailAd2'];

        $prefixCoAd2 = $_POST['prefixCoAd2'];
        $otherPrefixCoAd2 = $_POST['otherPrefixCoAd2'];
        $fnameCoAd2 = $_POST['fnameCoAd2'];
        $lnameCoAd2 = $_POST['lnameCoAd2'];
        $mobileCoAd2 = $_POST['mobileCoAd2'];
        $emailCoAd2 = $_POST['emailCoAd2'];

        //ข้อมูลการสอบหัวข้อ
        $semesterExam = $_POST['semesterExam'];
        $dateExam = $_POST['dateExam'];
        $prefixExamCom1 = $_POST['prefixExamCom1'];
        $otherPrefixExamCom1 = $_POST['otherPrefixExamCom1'];
        $fnameExamCom1 = $_POST['fnameExamCom1'];
        $lnameExamCom1 = $_POST['lnameExamCom1'];

        $prefixExamCom2 = $_POST['prefixExamCom2'];
        $otherPrefixExamCom2 = $_POST['otherPrefixExamCom2'];
        $fnameExamCom2 = $_POST['fnameExamCom2'];
        $lnameExamCom2 = $_POST['lnameExamCom2'];

        $prefixExamCom3 = $_POST['prefixExamCom3'];
        $otherPrefixExamCom3 = $_POST['otherPrefixExamCom3'];
        $fnameExamCom3 = $_POST['fnameExamCom3'];
        $lnameExamCom3 = $_POST['lnameExamCom3'];

        $prefixExamCom4 = $_POST['prefixExamCom4'];
        $otherPrefixExamCom4 = $_POST['otherPrefixExamCom4'];
        $fnameExamCom4 = $_POST['fnameExamCom4'];
        $lnameExamCom4 = $_POST['lnameExamCom4'];

        $prefixExamCom5 = $_POST['prefixExamCom5'];
        $otherPrefixExamCom5 = $_POST['otherPrefixExamCom5'];
        $fnameExamCom5 = $_POST['fnameExamCom5'];
        $lnameExamCom5 = $_POST['lnameExamCom5'];

        //Date
        $date = $_POST['dateExam'] ?? '';
        $dateTxt = '';
        if ($date != '') {
            $dateYears =  $date[0] . $date[1] . $date[2] . $date[3];
            $dateYears = (int)$dateYears + 543;
            $dateMonth = $date[5] . $date[6];
            $dateDays = $date[8] . $date[9];
            $dateDays = (int)$dateDays;
            $dateMonthTxt = '';
            $dateMonth = (int)$dateMonth;
            $dateMonthTxt = checkMonth($dateMonth);
            $dateTxt = $dateDays . '/' . $dateMonth . '/' . $dateYears;
        }


        // ประวัติการนำเสนอ/ตีพิมพ์เผยแพร่ ผลงาน
        $nameConference1 = $_POST['nameConference1'];
        $titleConference1 = $_POST['titleConference1'];
        $dateConference1 = $_POST['dateConference1'] ?? '';
        $dateCon1Txt = '';
        if ($dateConference1 != '') {
            $dateYearsCon1 =  $dateConference1[0] . $dateConference1[1] . $dateConference1[2] . $dateConference1[3];
            $dateYearsCon1 = (int)$dateYearsCon1 + 543;
            $dateMonthCon1 = $dateConference1[5] . $dateConference1[6];
            $dateDaysCon1 = $dateConference1[8] . $dateConference1[9];
            $dateDaysCon1 = (int)$dateDaysCon1;
            $dateMonthCon1Txt = '';
            $dateMonthCon1 = (int)$dateMonthCon1;
            $dateMonthCon1Txt = checkMonth($dateMonthCon1);
            $dateCon1Txt = $dateDaysCon1 . '/' . $dateMonthCon1 . '/' . $dateYearsCon1;
        }
        $placeConference1 = $_POST['placeConference1'] ?? '';

        $nameConference2 = $_POST['nameConference2'] ?? '';
        $titleConference2 = $_POST['titleConference2'] ?? '';
        $dateConference2 = $_POST['dateConference2'] ?? '';
        $dateCon2Txt = '';
        if ($dateConference2 != '') {
            $dateYearsCon2 =  $dateConference2[0] . $dateConference2[1] . $dateConference2[2] . $dateConference2[3];
            $dateYearsCon2 = (int)$dateYearsCon2 + 543;
            $dateMonthCon2 = $dateConference2[5] . $dateConference2[6];
            $dateDaysCon2 = $dateConference2[8] . $dateConference2[9];
            $dateDaysCon2 = (int)$dateDaysCon2;
            $dateMonthCon2Txt = '';
            $dateMonthCon2 = (int)$dateMonthCon2;
            $dateMonthCon2Txt = checkMonth($dateMonthCon2);
            $dateCon2Txt = $dateDaysCon2 . '/' . $dateMonthCon2 . '/' . $dateYearsCon2;
        }
        $placeConference2 = $_POST['placeConference2'] ?? '';

        $numTransfer1 = $_POST['numTransfer1'];

        $prefix1 = $_POST['prefix1'];
        $otherPrefix1 = $_POST['otherPrefix1'] ?? '';
        $fname1 = $_POST['fname1'];
        $lname1 = $_POST['lname1'];

        $prefix2 = $_POST['prefix2'] ?? '';
        $otherPrefix2 = $_POST['otherPrefix2'] ?? '';
        $fname2 = $_POST['fname2'] ?? '';
        $lname2 = $_POST['lname2'] ?? '';

        $prefix3 = $_POST['prefix3'] ?? '';
        $otherPrefix3 = $_POST['otherPrefix3'] ?? '';
        $fname3 = $_POST['fname3'] ?? '';
        $lname3 = $_POST['lname3'] ?? '';

        $prefix4 = $_POST['prefix4'] ?? '';
        $otherPrefix4 = $_POST['otherPrefix4'] ?? '';
        $fname4 = $_POST['fname4'] ?? '';
        $lname4 = $_POST['lname4'] ?? '';

        $prefix5 = $_POST['prefix5'] ?? '';
        $otherPrefix5 = $_POST['otherPrefix5'] ?? '';
        $fname5 = $_POST['fname5'] ?? '';
        $lname5 = $_POST['lname5'] ?? '';

        $prefix6 = $_POST['prefix6'] ?? '';
        $otherPrefix6 = $_POST['otherPrefix6'] ?? '';
        $fname6 = $_POST['fname6'] ?? '';
        $lname6 = $_POST['lname6'] ?? '';

        $prefix7 = $_POST['prefix7'] ?? '';
        $otherPrefix7 = $_POST['otherPrefix7'] ?? '';
        $fname7 = $_POST['fname7'] ?? '';
        $lname7 = $_POST['lname7'] ?? '';

        $prefix8 = $_POST['prefix8'] ?? '';
        $otherPrefix8 = $_POST['otherPrefix8'] ?? '';
        $fname8 = $_POST['fname8'] ?? '';
        $lname8 = $_POST['lname8'] ?? '';

        $numTransfer2 = $_POST['numTransfer2'];

        $prefix1_1 = $_POST['prefix1_1'];
        $otherPrefix1_1 = $_POST['otherPrefix1_1'] ?? '';
        $fname1_1 = $_POST['fname1_1'];
        $lname1_1 = $_POST['lname1_1'];

        $prefix2_1 = $_POST['prefix2_1'] ?? '';
        $otherPrefix2_1 = $_POST['otherPrefix2_1'] ?? '';
        $fname2_1 = $_POST['fname2_1'] ?? '';
        $lname2_1 = $_POST['lname2_1'] ?? '';

        $prefix3_1 = $_POST['prefix3_1'] ?? '';
        $otherPrefix3_1 = $_POST['otherPrefix3_1'] ?? '';
        $fname3_1 = $_POST['fname3_1'] ?? '';
        $lname3_1 = $_POST['lname3_1'] ?? '';

        $prefix4_1 = $_POST['prefix4_1'] ?? '';
        $otherPrefix4_1 = $_POST['otherPrefix4_1'] ?? '';
        $fname4_1 = $_POST['fname4_1'] ?? '';
        $lname4_1 = $_POST['lname4_1'] ?? '';

        $prefix5_1 = $_POST['prefix5_1'] ?? '';
        $otherPrefix5_1 = $_POST['otherPrefix5_1'] ?? '';
        $fname5_1 = $_POST['fname5_1'] ?? '';
        $lname5_1 = $_POST['lname5_1'] ?? '';

        $prefix6_1 = $_POST['prefix6_1'] ?? '';
        $otherPrefix6_1 = $_POST['otherPrefix6_1'] ?? '';
        $fname6_1 = $_POST['fname6_1'] ?? '';
        $lname6_1 = $_POST['lname6_1'] ?? '';

        $prefix7_1 = $_POST['prefix7_1'] ?? '';
        $otherPrefix7_1 = $_POST['otherPrefix7_1'] ?? '';
        $fname7_1 = $_POST['fname7_1'] ?? '';
        $lname7_1 = $_POST['lname7_1'] ?? '';

        $prefix8_1 = $_POST['prefix8_1'] ?? '';
        $otherPrefix8_1 = $_POST['otherPrefix8_1'] ?? '';
        $fname8_1 = $_POST['fname8_1'] ?? '';
        $lname8_1 = $_POST['lname8_1'] ?? '';

        // รายงานความก้าวหน้า
        $numReport = $_POST['numReport'];
        $progressReport1 = $_POST['progressReport1'];
        $progressReport2 = $_POST['progressReport2'];
        $progressReport3 = $_POST['progressReport3'];
        $progressReport4 = $_POST['progressReport4'];
        $progressReport5 = $_POST['progressReport5'];
        $progressReport6 = $_POST['progressReport6'];
        $progressReport7 = $_POST['progressReport7'];
        $progressReport8 = $_POST['progressReport8'];
        $progressReport9 = $_POST['progressReport9'];
        $progressReport10 = $_POST['progressReport10'];
        $progressReport11 = $_POST['progressReport11'];
        $progressReport12 = $_POST['progressReport12'];
        $progressReport13 = $_POST['progressReport13'];
        $progressReport14 = $_POST['progressReport14'];
        $progressReport15 = $_POST['progressReport15'];

        $dateReport1 = $_POST['dateReport1'];
        $dateReport2 = $_POST['dateReport2'] ?? '';
        $dateReport3 = $_POST['dateReport3'] ?? '';
        $dateReport4 = $_POST['dateReport4'] ?? '';
        $dateReport5 = $_POST['dateReport5'] ?? '';
        $dateReport6 = $_POST['dateReport6'] ?? '';
        $dateReport7 = $_POST['dateReport7'] ?? '';
        $dateReport8 = $_POST['dateReport8'] ?? '';
        $dateReport9 = $_POST['dateReport9'] ?? '';
        $dateReport10 = $_POST['dateReport10'] ?? '';
        $dateReport11 = $_POST['dateReport11'] ?? '';
        $dateReport12 = $_POST['dateReport12'] ?? '';
        $dateReport13 = $_POST['dateReport13'] ?? '';
        $dateReport14 = $_POST['dateReport14'] ?? '';
        $dateReport15 = $_POST['dateReport15'] ?? '';

        $dateReport1Txt = '';
        $dateReport2Txt = '';
        $dateReport3Txt = '';
        $dateReport4Txt = '';
        $dateReport5Txt = '';
        $dateReport6Txt = '';
        $dateReport7Txt = '';
        $dateReport8Txt = '';
        $dateReport9Txt = '';
        $dateReport10Txt = '';
        $dateReport11Txt = '';
        $dateReport12Txt = '';
        $dateReport13Txt = '';
        $dateReport14Txt = '';
        $dateReport15Txt = '';

        if ($dateReport1 != '') {
            $dateYearsReport1 =  $dateReport1[0] . $dateReport1[1] . $dateReport1[2] . $dateReport1[3];
            $dateYearsReport1 = (int)$dateYearsReport1 + 543;
            $dateMonthReport1 = $dateReport1[5] . $dateReport1[6];
            $dateDaysReport1 = $dateReport1[8] . $dateReport1[9];
            $dateDaysReport1 = (int)$dateDaysReport1;
            $dateReport1Txt = $dateDaysReport1 . '/' . $dateMonthReport1 . '/' . $dateYearsReport1;
        }

        if ($dateReport2 != '') {
            $dateYearsReport2 =  $dateReport2[0] . $dateReport2[1] . $dateReport2[2] . $dateReport2[3];
            $dateYearsReport2 = (int)$dateYearsReport2 + 543;
            $dateMonthReport2 = $dateReport2[5] . $dateReport2[6];
            $dateDaysReport2 = $dateReport2[8] . $dateReport2[9];
            $dateDaysReport2 = (int)$dateDaysReport2;
            $dateReport2Txt = $dateDaysReport2 . '/' . $dateMonthReport2 . '/' . $dateYearsReport2;
        }

        if ($dateReport3 != '') {
            $dateYearsReport3 =  $dateReport3[0] . $dateReport3[1] . $dateReport3[2] . $dateReport3[3];
            $dateYearsReport3 = (int)$dateYearsReport3 + 543;
            $dateMonthReport3 = $dateReport3[5] . $dateReport3[6];
            $dateDaysReport3 = $dateReport3[8] . $dateReport3[9];
            $dateDaysReport3 = (int)$dateDaysReport3;
            $dateReport3Txt = $dateDaysReport3 . '/' . $dateMonthReport3 . '/' . $dateYearsReport3;
        }

        if ($dateReport4 != '') {
            $dateYearsReport4 =  $dateReport4[0] . $dateReport4[1] . $dateReport4[2] . $dateReport4[3];
            $dateYearsReport4 = (int)$dateYearsReport4 + 543;
            $dateMonthReport4 = $dateReport4[5] . $dateReport4[6];
            $dateDaysReport4 = $dateReport4[8] . $dateReport4[9];
            $dateDaysReport4 = (int)$dateDaysReport4;
            $dateReport4Txt = $dateDaysReport4 . '/' . $dateMonthReport4 . '/' . $dateYearsReport4;
        }

        if ($dateReport5 != '') {
            $dateYearsReport5 =  $dateReport5[0] . $dateReport5[1] . $dateReport5[2] . $dateReport5[3];
            $dateYearsReport5 = (int)$dateYearsReport5 + 543;
            $dateMonthReport5 = $dateReport5[5] . $dateReport5[6];
            $dateDaysReport5 = $dateReport5[8] . $dateReport5[9];
            $dateDaysReport5 = (int)$dateDaysReport5;
            $dateReport5Txt = $dateDaysReport5 . '/' . $dateMonthReport5 . '/' . $dateYearsReport5;
        }

        if ($dateReport6 != '') {
            $dateYearsReport6 =  $dateReport6[0] . $dateReport6[1] . $dateReport6[2] . $dateReport6[3];
            $dateYearsReport6 = (int)$dateYearsReport6 + 543;
            $dateMonthReport6 = $dateReport6[5] . $dateReport6[6];
            $dateDaysReport6 = $dateReport6[8] . $dateReport6[9];
            $dateDaysReport6 = (int)$dateDaysReport6;
            $dateReport6Txt = $dateDaysReport6 . '/' . $dateMonthReport6 . '/' . $dateYearsReport6;
        }

        if ($dateReport7 != '') {
            $dateYearsReport7 =  $dateReport7[0] . $dateReport7[1] . $dateReport7[2] . $dateReport7[3];
            $dateYearsReport7 = (int)$dateYearsReport7 + 543;
            $dateMonthReport7 = $dateReport7[5] . $dateReport7[6];
            $dateDaysReport7 = $dateReport7[8] . $dateReport7[9];
            $dateDaysReport7 = (int)$dateDaysReport7;
            $dateReport7Txt = $dateDaysReport7 . '/' . $dateMonthReport7 . '/' . $dateYearsReport7;
        }

        if ($dateReport8 != '') {
            $dateYearsReport8 =  $dateReport8[0] . $dateReport8[1] . $dateReport8[2] . $dateReport8[3];
            $dateYearsReport8 = (int)$dateYearsReport8 + 543;
            $dateMonthReport8 = $dateReport8[5] . $dateReport8[6];
            $dateDaysReport8 = $dateReport8[8] . $dateReport8[9];
            $dateDaysReport8 = (int)$dateDaysReport8;
            $dateReport8Txt = $dateDaysReport8 . '/' . $dateMonthReport8 . '/' . $dateYearsReport8;
        }

        if ($dateReport9 != '') {
            $dateYearsReport9 =  $dateReport9[0] . $dateReport9[1] . $dateReport9[2] . $dateReport9[3];
            $dateYearsReport9 = (int)$dateYearsReport9 + 543;
            $dateMonthReport9 = $dateReport9[5] . $dateReport9[6];
            $dateDaysReport9 = $dateReport9[8] . $dateReport9[9];
            $dateDaysReport9 = (int)$dateDaysReport9;
            $dateReport9Txt = $dateDaysReport9 . '/' . $dateMonthReport9 . '/' . $dateYearsReport9;
        }

        if ($dateReport10 != '') {
            $dateYearsReport10 =  $dateReport10[0] . $dateReport10[1] . $dateReport10[2] . $dateReport10[3];
            $dateYearsReport10 = (int)$dateYearsReport10 + 543;
            $dateMonthReport10 = $dateReport10[5] . $dateReport10[6];
            $dateDaysReport10 = $dateReport10[8] . $dateReport10[9];
            $dateDaysReport10 = (int)$dateDaysReport10;
            $dateReport10Txt = $dateDaysReport10 . '/' . $dateMonthReport10 . '/' . $dateYearsReport10;
        }

        if ($dateReport11 != '') {
            $dateYearsReport11 =  $dateReport11[0] . $dateReport11[1] . $dateReport11[2] . $dateReport11[3];
            $dateYearsReport11 = (int)$dateYearsReport11 + 543;
            $dateMonthReport11 = $dateReport11[5] . $dateReport11[6];
            $dateDaysReport11 = $dateReport11[8] . $dateReport11[9];
            $dateDaysReport11 = (int)$dateDaysReport11;
            $dateReport11Txt = $dateDaysReport11 . '/' . $dateMonthReport11 . '/' . $dateYearsReport11;
        }

        if ($dateReport12 != '') {
            $dateYearsReport12 =  $dateReport12[0] . $dateReport12[1] . $dateReport12[2] . $dateReport12[3];
            $dateYearsReport12 = (int)$dateYearsReport12 + 543;
            $dateMonthReport12 = $dateReport12[5] . $dateReport12[6];
            $dateDaysReport12 = $dateReport12[8] . $dateReport12[9];
            $dateDaysReport12 = (int)$dateDaysReport12;
            $dateReport12Txt = $dateDaysReport12 . '/' . $dateMonthReport12 . '/' . $dateYearsReport12;
        }

        if ($dateReport13 != '') {
            $dateYearsReport13 =  $dateReport13[0] . $dateReport13[1] . $dateReport13[2] . $dateReport13[3];
            $dateYearsReport13 = (int)$dateYearsReport13 + 543;
            $dateMonthReport13 = $dateReport13[5] . $dateReport13[6];
            $dateDaysReport13 = $dateReport13[8] . $dateReport13[9];
            $dateDaysReport13 = (int)$dateDaysReport13;
            $dateReport13Txt = $dateDaysReport13 . '/' . $dateMonthReport13 . '/' . $dateYearsReport13;
        }

        if ($dateReport14 != '') {
            $dateYearsReport14 =  $dateReport14[0] . $dateReport14[1] . $dateReport14[2] . $dateReport14[3];
            $dateYearsReport14 = (int)$dateYearsReport14 + 543;
            $dateMonthReport14 = $dateReport14[5] . $dateReport14[6];
            $dateDaysReport14 = $dateReport14[8] . $dateReport14[9];
            $dateDaysReport14 = (int)$dateDaysReport14;
            $dateReport14Txt = $dateDaysReport14 . '/' . $dateMonthReport14 . '/' . $dateYearsReport14;
        }

        if ($dateReport15 != '') {
            $dateYearsReport15 =  $dateReport15[0] . $dateReport15[1] . $dateReport15[2] . $dateReport15[3];
            $dateYearsReport15 = (int)$dateYearsReport15 + 543;
            $dateMonthReport15 = $dateReport15[5] . $dateReport15[6];
            $dateDaysReport15 = $dateReport15[8] . $dateReport15[9];
            $dateDaysReport15 = (int)$dateDaysReport15;
            $dateReport15Txt = $dateDaysReport15 . '/' . $dateMonthReport15 . '/' . $dateYearsReport15;
        }


        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;

        $prefixAdGroup1 = checkPrefix($prefixAdGroup1, $otherPrefixAdGroup1);
        $nameAdGroup1 = $prefixAdGroup1 . $fnameAdGroup1 . "&nbsp;" . $lnameAdGroup1;

        $prefixAd1 = checkPrefix($prefixAd1, $otherPrefixAd1);
        $nameAd1 = $prefixAd1 . $fnameAd1 . "&nbsp;" . $lnameAd1;

        $prefixCoAd1 = checkPrefix($prefixCoAd1, $otherPrefixCoAd1);
        $nameCoAd1 = $prefixCoAd1 . $fnameCoAd1 . "&nbsp;" . $lnameCoAd1;

        $prefixAdGroup2 = checkPrefix($prefixAdGroup2, $otherPrefixAdGroup2);
        $nameAdGroup2 = $prefixAdGroup2 . $fnameAdGroup2 . "&nbsp;" . $lnameAdGroup2;

        $prefixAd2 = checkPrefix($prefixAd2, $otherPrefixAd2);
        $nameAd2 = $prefixAd2 . $fnameAd2 . "&nbsp;" . $lnameAd2;

        $prefixCoAd2 = checkPrefix($prefixCoAd2, $otherPrefixCoAd2);
        $nameCoAd2 = $prefixCoAd2 . $fnameCoAd2 . "&nbsp;" . $lnameCoAd2;

        $prefixExamCom1 = checkPrefix($prefixExamCom1, $otherPrefixExamCom1);
        $nameExamCom1 = $prefixExamCom1 . $fnameExamCom1 . "&nbsp;" . $lnameExamCom1;

        $prefixExamCom2 = checkPrefix($prefixExamCom2, $otherPrefixExamCom2);
        $nameExamCom2 = $prefixExamCom2 . $fnameExamCom2 . "&nbsp;" . $lnameExamCom2;

        $prefixExamCom3 = checkPrefix($prefixExamCom3, $otherPrefixExamCom3);
        $nameExamCom3 = $prefixExamCom3 . $fnameExamCom3 . "&nbsp;" . $lnameExamCom3;

        $prefixExamCom4 = checkPrefix($prefixExamCom4, $otherPrefixExamCom4);
        $nameExamCom4 = $prefixExamCom4 . $fnameExamCom4 . "&nbsp;" . $lnameExamCom4;

        $prefixExamCom5 = checkPrefix($prefixExamCom5, $otherPrefixExamCom5);
        $nameExamCom5 = $prefixExamCom5 . $fnameExamCom5 . "&nbsp;" . $lnameExamCom5;

        $prefix1 = checkPrefix($prefix1, $otherPrefix1);
        $name1 = $prefix1 . $fname1 . "&nbsp;" . $lname1;

        $prefix2 = checkPrefix($prefix2, $otherPrefix2);
        $name2 = $prefix2 . $fname2 . "&nbsp;" . $lname2;

        $prefix3 = checkPrefix($prefix3, $otherPrefix3);
        $name3 = $prefix3 . $fname3 . "&nbsp;" . $lname3;

        $prefix4 = checkPrefix($prefix4, $otherPrefix4);
        $name4 = $prefix4 . $fname4 . "&nbsp;" . $lname4;

        $prefix5 = checkPrefix($prefix5, $otherPrefix5);
        $name5 = $prefix5 . $fname5 . "&nbsp;" . $lname5;

        $prefix6 = checkPrefix($prefix6, $otherPrefix6);
        $name6 = $prefix6 . $fname6 . "&nbsp;" . $lname6;

        $prefix7 = checkPrefix($prefix7, $otherPrefix7);
        $name7 = $prefix7 . $fname7 . "&nbsp;" . $lname7;

        $prefix8 = checkPrefix($prefix8, $otherPrefix8);
        $name8 = $prefix8 . $fname8 . "&nbsp;" . $lname8;

        $prefix1_1 = checkPrefix($prefix1_1, $otherPrefix1_1);
        $name1_1 = $prefix1_1 . $fname1_1 . "&nbsp;" . $lname1_1;

        $prefix2_1 = checkPrefix($prefix2_1, $otherPrefix2_1);
        $name2_1 = $prefix2_1 . $fname2_1 . "&nbsp;" . $lname2_1;

        $prefix3_1 = checkPrefix($prefix3_1, $otherPrefix3_1);
        $name3_1 = $prefix3_1 . $fname3_1 . "&nbsp;" . $lname3_1;

        $prefix4_1 = checkPrefix($prefix4_1, $otherPrefix4_1);
        $name4_1 = $prefix4_1 . $fname4_1 . "&nbsp;" . $lname4_1;

        $prefix5_1 = checkPrefix($prefix5_1, $otherPrefix5_1);
        $name5_1 = $prefix5_1 . $fname5_1 . "&nbsp;" . $lname5_1;

        $prefix6_1 = checkPrefix($prefix6_1, $otherPrefix6_1);
        $name6_1 = $prefix6_1 . $fname6_1 . "&nbsp;" . $lname6_1;

        $prefix7_1 = checkPrefix($prefix7_1, $otherPrefix7_1);
        $name7_1 = $prefix7_1 . $fname7_1 . "&nbsp;" . $lname7_1;

        $prefix8_1 = checkPrefix($prefix8_1, $otherPrefix8_1);
        $name8_1 = $prefix8_1 . $fname8_1 . "&nbsp;" . $lname8_1;


        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormProgressReport.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $tplId3 = $mpdf->ImportPage(3);
        $tplId4 = $mpdf->ImportPage(4);

        // ------------------paf page 1--------------------
        $mpdf->AddPage('L');
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R');

        //หลักสูตร
        if (getStrLenTH($curriculum) > 30) {
            $size = 16;
            $top = 193;
        } else if (getStrLenTH($curriculum) > 27) {
            $size = 18;
            $top = 191;
        } else {
            $size = 20;
            $top = 189;
        }
        $numCurriculum = getStrLenTH($curriculum);
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:196px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $curriculum . '</div>');

        //คณะ
        if (getStrLenTH($faculty) > 37) {
            $size = 16;
            $top = 193;
        } else if (getStrLenTH($faculty) > 33) {
            $size = 18;
            $top = 191;
        } else {
            $size = 20;
            $top = 189;
        }
        $numFaculty = getStrLenTH($faculty);
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:437px; font-size:' . $size . 'px; width:245px; text-align:center;">' . $faculty . '</div>');

        //ชื่อนักศึกษา
        if (getStrLenTH($name) > 38) {
            $size = 14;
            $top = 334;
        } else if (getStrLenTH($name) > 34) {
            $size = 16;
            $top = 332;
        } else {
            $size = 18;
            $top = 330;
        }
        $num = getStrLenTH($name);
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:170px; font-size:' . $size . 'px; width:192px; text-align:center;">' . $name . '</div>');

        //รหัสนักศึกษา
        $mpdf->WriteHTML('<div style="position:absolute; top:330px; left:465px; font-size:18px;">' . $studentid . '</div>');
        //กลุ่ม
        $mpdf->WriteHTML('<div style="position:absolute; top:330px; left:627px; font-size:18px; width:95px; text-align:center;">' . $group . '</div>');
        //สาขาวิชา/วิชาเอก
        if (getStrLenTH($major) > 22) {
            $size = 12;
            $top = 336;
        } else if (getStrLenTH($major) > 19) {
            $size = 14;
            $top = 334;
        } else if (getStrLenTH($major) > 17) {
            $size = 16;
            $top = 332;
        } else {
            $size = 18;
            $top = 330;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:841px; font-size:' . $size . 'px; width:113px; text-align:center;">' . $major . '</div>');

        //แขนงวิชา
        if (getStrLenTH($field) > 33) {
            $size = 12;
            $top = 396;
        } else if (getStrLenTH($field) > 29) {
            $size = 14;
            $top = 394;
        } else if (getStrLenTH($field) > 26) {
            $size = 16;
            $top = 392;
        } else {
            $size = 18;
            $top = 390;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:203px; font-size:' . $size . 'px; width:165px; text-align:center;">' . $field . '</div>');
        //ภาคการเรียนที่
        $mpdf->WriteHTML('<div style="position:absolute; top:390px; left:510px; font-size:18px;">' . $startSemesterOf์Term . '</div>');
        //ปี
        $mpdf->WriteHTML('<div style="position:absolute; top:390px; left:552px; font-size:18px;">' . $startSemesterOfYears . '</div>');
        //เกรดเฉลี่ยสะสม
        $mpdf->WriteHTML('<div style="position:absolute; top:390px; left:817px; font-size:18px; width:134px; text-align:center;">' . $gpx . '</div>');

        //บ้านเลขที่
        if (getStrLenTH($houseNo) > 7) {
            $size = 14;
            $top = 546;
        } else {
            $size = 18;
            $top = 542;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:203px; font-size:' . $size . 'px; width:46px; text-align:center;">' . $houseNo . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:542px; left:285px; font-size:18px; width:33px; text-align:center;">' . $villageNo . '</div>');

        if (getStrLenTH($village) > 15) {
            $size = 12;
            $top = 547;
        } else if (getStrLenTH($village) > 12) {
            $size = 14;
            $top = 546;
        } else {
            $size = 18;
            $top = 542;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:379px; font-size:' . $size . 'px; width:80px; text-align:center;">' . $village . '</div>');

        if (getStrLenTH($alleyLane) > 19) {
            $size = 12;
            $top = 547;
        } else if (getStrLenTH($alleyLane) > 15) {
            $size = 14;
            $top = 546;
        } else {
            $size = 18;
            $top = 542;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:534px; font-size:' . $size . 'px; width:100px; text-align:center;">' . $alleyLane . '</div>');

        if (getStrLenTH($road) > 22) {
            $size = 12;
            $top = 547;
        } else if (getStrLenTH($road) > 17) {
            $size = 14;
            $top = 546;
        } else {
            $size = 18;
            $top = 542;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:674px; font-size:' . $size . 'px; width:116px; text-align:center;">' . $road . '</div>');

        if (getStrLenTH($subDistrictSubArea) > 14) {
            $size = 12;
            $top = 547;
        } else if (getStrLenTH($subDistrictSubArea) > 11) {
            $size = 14;
            $top = 546;
        } else {
            $size = 18;
            $top = 542;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:878px; font-size:' . $size . 'px; width:72px; text-align:center;">' . $subDistrictSubArea . '</div>');

        if (getStrLenTH($district) > 17) {
            $size = 12;
            $top = 607;
        } else if (getStrLenTH($district) > 13) {
            $size = 14;
            $top = 606;
        } else {
            $size = 18;
            $top = 602;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:213px; font-size:' . $size . 'px; width:88px; text-align:center;">' . $district . '</div>');

        if (getStrLenTH($province) > 17) {
            $size = 12;
            $top = 607;
        } else if (getStrLenTH($province) > 13) {
            $size = 14;
            $top = 606;
        } else {
            $size = 18;
            $top = 602;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:354px; font-size:' . $size . 'px; width:88px; text-align:center;">' . $province . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:602px; left:530px; font-size:18px; width:70px; text-align:center;">' . $postalCode . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:602px; left:700px; font-size:18px; width:70px; text-align:center;">' . $telHome . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:604px; left:895px; font-size:16px; width:60px; text-align:center;">' . $telWorkplace . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:662px; left:234px; font-size:18px; width:80px; text-align:center;">' . $mobile . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:662px; left:374px; font-size:18px; width:80px; text-align:center;">' . $fax . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:662px; left:523px; font-size:18px; width:430px;">' . $email . '</div>');

        // ------------------paf page 2--------------------
        $mpdf->AddPage('L');
        $mpdf->UseTemplate($tplId2);

        if (getStrLenTH($thesisNameTh1) > 93) {
            $size = 12;
            $top = 101;
        } else if (getStrLenTH($thesisNameTh1) > 72) {
            $size = 14;
            $top = 99;
        } else {
            $size = 18;
            $top = 95;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:475px; font-size:' . $size . 'px; width:472px;">' . $thesisNameTh1 . '</div>');

        if (getStrLenTH($thesisNameEn1) > 90) {
            $size = 12;
            $top = 156;
        } else if (getStrLenTH($thesisNameEn1) > 70) {
            $size = 14;
            $top = 155;
        } else {
            $size = 18;
            $top = 151;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:497px; font-size:' . $size . 'px; width:457px;">' . $thesisNameEn1 . '</div>');

        if (getStrLenTH($nameAdGroup1) > 59) {
            $size = 14;
            $top = 211;
        } else if (getStrLenTH($nameAdGroup1) > 53) {
            $size = 16;
            $top = 210;
        } else {
            $size = 18;
            $top = 207;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:271px; font-size:' . $size . 'px; width:312px;">' . $nameAdGroup1 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:207px; left:656px; font-size:18px; width:111px; text-align:center;">' . $mobileAdGroup1 . '</div>');

        if (getStrLenTH($emailAdGroup1) > 23) {
            $size = 12;
            $top = 213;
        } else if (getStrLenTH($emailAdGroup1) > 20) {
            $size = 14;
            $top = 211;
        } else if (getStrLenTH($emailAdGroup1) > 18) {
            $size = 16;
            $top = 210;
        } else {
            $size = 18;
            $top = 207;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:830px; font-size:' . $size . 'px; width:121px;">' . $emailAdGroup1 . '</div>');


        if (getStrLenTH($nameAd1) > 37) {
            $size = 12;
            $top = 268;
        } else if (getStrLenTH($nameAd1) > 33) {
            $size = 14;
            $top = 267;
        } else if (getStrLenTH($nameAd1) > 30) {
            $size = 16;
            $top = 264;
        } else {
            $size = 18;
            $top = 262;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:511px; font-size:' . $size . 'px; width:154px;">' . $nameAd1 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:264px; left:728px; font-size:16px; width:69px; text-align:center;">' . $mobileAd1 . '</div>');


        if (getStrLenTH($emailAd1) > 19) {
            $size = 12;
            $top = 268;
        } else if (getStrLenTH($emailAd1) > 16) {
            $size = 14;
            $top = 267;
        } else {
            $size = 18;
            $top = 262;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:853px; font-size:' . $size . 'px; width:98px;">' . $emailAd1 . '</div>');


        if (getStrLenTH($nameCoAd1) > 37) {
            $size = 12;
            $top = 323;
        } else if (getStrLenTH($nameCoAd1) > 32) {
            $size = 14;
            $top = 322;
        } else if (getStrLenTH($nameCoAd1) > 30) {
            $size = 16;
            $top = 320;
        } else {
            $size = 18;
            $top = 318;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:511px; font-size:' . $size . 'px; width:154px;">' . $nameCoAd1 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:320px; left:728px; font-size:16px; width:69px; text-align:center;">' . $mobileCoAd1 . '</div>');

        if (getStrLenTH($emailCoAd1) > 19) {
            $size = 12;
            $top = 323;
        } else if (getStrLenTH($emailCoAd1) > 16) {
            $size = 14;
            $top = 322;
        } else {
            $size = 18;
            $top = 318;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:853px; font-size:' . $size . 'px; width:98px;">' . $emailCoAd1 . '</div>');

        if (getStrLenTH($thesisNameTh2) > 93) {
            $size = 12;
            $top = 470;
        } else if (getStrLenTH($thesisNameTh2) > 72) {
            $size = 14;
            $top = 469;
        } else {
            $size = 18;
            $top = 465;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:475px; font-size:' . $size . 'px; width:472px;">' . $thesisNameTh2 . '</div>');

        if (getStrLenTH($thesisNameEn2) > 90) {
            $size = 12;
            $top = 526;
        } else if (getStrLenTH($thesisNameEn2) > 70) {
            $size = 14;
            $top = 525;
        } else {
            $size = 18;
            $top = 521;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:497px; font-size:' . $size . 'px; width:457px;">' . $thesisNameEn2 . '</div>');

        if (getStrLenTH($nameAdGroup2) > 59) {
            $size = 14;
            $top = 581;
        } else if (getStrLenTH($nameAdGroup2) > 53) {
            $size = 16;
            $top = 579;
        } else {
            $size = 18;
            $top = 577;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:271px; font-size:' . $size . 'px; width:312px;">' . $nameAdGroup2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:577px; left:656px; font-size:18px; width:111px; text-align:center;">' . $mobileAdGroup2 . '</div>');
        if (getStrLenTH($emailAdGroup2) > 23) {
            $size = 12;
            $top = 583;
        } else if (getStrLenTH($emailAdGroup2) > 20) {
            $size = 14;
            $top = 581;
        } else if (getStrLenTH($emailAdGroup2) > 18) {
            $size = 16;
            $top = 579;
        } else {
            $size = 18;
            $top = 577;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:830px; font-size:' . $size . 'px; width:121px;">' . $emailAdGroup2 . '</div>');

        if (getStrLenTH($nameAd2) > 37) {
            $size = 12;
            $top = 639;
        } else if (getStrLenTH($nameAd2) > 33) {
            $size = 14;
            $top = 637;
        } else if (getStrLenTH($nameAd2) > 30) {
            $size = 16;
            $top = 635;
        } else {
            $size = 18;
            $top = 633;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:511px; font-size:' . $size . 'px; width:154px;">' . $nameAd2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:635px; left:728px; font-size:16px; width:69px; text-align:center;">' . $mobileAd2 . '</div>');


        if (getStrLenTH($emailAd2) > 19) {
            $size = 12;
            $top = 639;
        } else if (getStrLenTH($emailAd2) > 16) {
            $size = 14;
            $top = 637;
        } else {
            $size = 18;
            $top = 633;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:853px; font-size:' . $size . 'px; width:98px;">' . $emailAd2 . '</div>');

        if (getStrLenTH($nameCoAd2) > 37) {
            $size = 12;
            $top = 694;
        } else if (getStrLenTH($nameCoAd2) > 32) {
            $size = 14;
            $top = 694;
        } else if (getStrLenTH($nameCoAd2) > 30) {
            $size = 16;
            $top = 692;
        } else {
            $size = 18;
            $top = 690;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:511px; font-size:' . $size . 'px; width:154px;">' . $nameCoAd2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:692px; left:728px; font-size:16px; width:69px; text-align:center;">' . $mobileCoAd2 . '</div>');

        if (getStrLenTH($emailCoAd2) > 19) {
            $size = 12;
            $top = 694;
        } else if (getStrLenTH($emailCoAd2) > 16) {
            $size = 14;
            $top = 692;
        } else {
            $size = 18;
            $top = 690;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:853px; font-size:' . $size . 'px; width:98px;">' . $emailCoAd2 . '</div>');
        // ------------------paf page 3--------------------
        $mpdf->AddPage('L');
        $mpdf->UseTemplate($tplId3);

        if (getStrLenTH($nameExamCom1) > 36) {
            $size = 16;
            $top = 188;
        } else if (getStrLenTH($nameExamCom1) > 33) {
            $size = 18;
            $top = 186;
        } else {
            $size = 20;
            $top = 184;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:103px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $nameExamCom1 . '</div>');

        if (getStrLenTH($nameExamCom2) > 36) {
            $size = 16;
            $top = 217;
        } else if (getStrLenTH($nameExamCom2) > 33) {
            $size = 18;
            $top = 215;
        } else {
            $size = 20;
            $top = 213;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:103px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $nameExamCom2 . '</div>');

        if (getStrLenTH($nameExamCom3) > 36) {
            $size = 16;
            $top = 248;
        } else if (getStrLenTH($nameExamCom3) > 33) {
            $size = 18;
            $top = 246;
        } else {
            $size = 20;
            $top = 242;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:103px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $nameExamCom3 . '</div>');

        if (getStrLenTH($nameExamCom4) > 36) {
            $size = 16;
            $top = 275;
        } else if (getStrLenTH($nameExamCom4) > 33) {
            $size = 18;
            $top = 273;
        } else {
            $size = 20;
            $top = 271;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:103px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $nameExamCom4 . '</div>');

        if (getStrLenTH($nameExamCom5) > 36) {
            $size = 16;
            $top = 304;
        } else if (getStrLenTH($nameExamCom5) > 33) {
            $size = 18;
            $top = 302;
        } else {
            $size = 20;
            $top = 300;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:103px; font-size:' . $size . 'px; width:200px; text-align:center;">' . $nameExamCom5 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:235px; left:319px; font-size:30px; width:200px; text-align:center;">' . $semesterExam . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:235px; left:537px; font-size:30px; width:200px; text-align:center;">' . $dateTxt . '</div>');

        if ($nameConference1 != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:575px; left:64px; font-size:24px;">1</div>');
        }
        if ($nameConference2 != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:685px; left:64px; font-size:24px;">2</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:535px; left:108px; font-size:20px; width:216px;">' . $nameConference1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:645px; left:108px; font-size:20px; width:216px;">' . $nameConference2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:535px; left:500px; font-size:20px; width:198px;">' . $titleConference1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:645px; left:500px; font-size:20px; width:198px;">' . $titleConference2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:575px; left:710px; font-size:24px; width:175px; text-align:center;">' . $dateCon1Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:685px; left:710px; font-size:24px; width:175px; text-align:center;">' . $dateCon2Txt . '</div>');

        $mpdf->WriteHTML("<div style='position:absolute; top:535px; left:904px; font-size:20px; width:109px; height:100px;'>$placeConference1</div>");
        $mpdf->WriteHTML('<div style="position:absolute; top:645px; left:904px; font-size:20px; width:116px;">' . $placeConference2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:535px; left:337px; font-size:14px; width:150px;  line-height:13px;">' . $name1);
        if ($fname2 != '') {
            $mpdf->WriteHTML("<br> $name2");
        }
        if ($fname3 != '') {
            $mpdf->WriteHTML("<br> $name3");
        }
        if ($fname4 != '') {
            $mpdf->WriteHTML("<br> $name4");
        }
        if ($fname5 != '') {
            $mpdf->WriteHTML("<br> $name5");
        }
        if ($fname6 != '') {
            $mpdf->WriteHTML("<br> $name6");
        }
        if ($fname7 != '') {
            $mpdf->WriteHTML("<br> $name7");
        }
        if ($fname8 != '') {
            $mpdf->WriteHTML("<br> $name8");
        }
        $mpdf->WriteHTML('</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:645px; left:337px; font-size:14px; width:150px; line-height:13px;">' . $name1_1);
        if ($fname2_1 != '') {
            $mpdf->WriteHTML("<br> $name2_1");
        }
        if ($fname3_1 != '') {
            $mpdf->WriteHTML("<br> $name3_1");
        }
        if ($fname4_1 != '') {
            $mpdf->WriteHTML("<br> $name4_1");
        }
        if ($fname5_1 != '') {
            $mpdf->WriteHTML("<br> $name5_1");
        }
        if ($fname6_1 != '') {
            $mpdf->WriteHTML("<br> $name6_1");
        }
        if ($fname7_1 != '') {
            $mpdf->WriteHTML("<br> $name7_1");
        }
        if ($fname8_1 != '') {
            $mpdf->WriteHTML("<br> $name8_1");
        }
        $mpdf->WriteHTML('</div>');


        // ------------------paf page 4--------------------
        $mpdf->AddPage('L');
        $mpdf->UseTemplate($tplId4);

        $top = 300;
        for ($i = 1; $i <= $numReport; $i++) {
            $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:44px; font-size:20px; width:50px; text-align:center;">' . $i . '</div>');
            $top = $top + 29;
        }


        if (getStrLenTH($progressReport1) > 46) {
            $size = 12;
            $top = 298;
        } else if (getStrLenTH($progressReport1) > 37) {
            $size = 16;
            $top = 302;
        } else {
            $size = 20;
            $top = 300;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:300px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport1Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport1 . '</div>');


        if (getStrLenTH($progressReport2) > 46) {
            $size = 12;
            $top = 327;
        } else if (getStrLenTH($progressReport2) > 37) {
            $size = 16;
            $top = 331;
        } else {
            $size = 20;
            $top = 329;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:329px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport2Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport2 . '</div>');

        if (getStrLenTH($progressReport3) > 46) {
            $size = 12;
            $top = 356;
        } else if (getStrLenTH($progressReport3) > 37) {
            $size = 16;
            $top = 360;
        } else {
            $size = 20;
            $top = 358;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:358px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport3Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport3 . '</div>');

        if (getStrLenTH($progressReport4) > 46) {
            $size = 12;
            $top = 385;
        } else if (getStrLenTH($progressReport4) > 37) {
            $size = 16;
            $top = 389;
        } else {
            $size = 20;
            $top = 387;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:387px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport4Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport4 . '</div>');

        if (getStrLenTH($progressReport5) > 46) {
            $size = 12;
            $top = 414;
        } else if (getStrLenTH($progressReport5) > 37) {
            $size = 16;
            $top = 418;
        } else {
            $size = 20;
            $top = 416;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:416px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport5Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport5 . '</div>');

        if (getStrLenTH($progressReport6) > 46) {
            $size = 12;
            $top = 440;
        } else if (getStrLenTH($progressReport6) > 37) {
            $size = 16;
            $top = 447;
        } else {
            $size = 20;
            $top = 445;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:445px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport6Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport6 . '</div>');

        if (getStrLenTH($progressReport7) > 46) {
            $size = 12;
            $top = 469;
        } else if (getStrLenTH($progressReport7) > 37) {
            $size = 16;
            $top = 476;
        } else {
            $size = 20;
            $top = 474;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:474px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport7Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport7 . '</div>');

        if (getStrLenTH($progressReport8) > 46) {
            $size = 12;
            $top = 498;
        } else if (getStrLenTH($progressReport8) > 37) {
            $size = 16;
            $top = 505;
        } else {
            $size = 20;
            $top = 503;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:503px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport8Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport8 . '</div>');

        if (getStrLenTH($progressReport9) > 46) {
            $size = 12;
            $top = 527;
        } else if (getStrLenTH($progressReport9) > 37) {
            $size = 16;
            $top = 534;
        } else {
            $size = 20;
            $top = 532;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:532px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport9Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport9 . '</div>');

        if (getStrLenTH($progressReport10) > 46) {
            $size = 12;
            $top = 556;
        } else if (getStrLenTH($progressReport10) > 37) {
            $size = 16;
            $top = 562;
        } else {
            $size = 20;
            $top = 561;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:561px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport10Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport10 . '</div>');

        if (getStrLenTH($progressReport11) > 46) {
            $size = 12;
            $top = 585;
        } else if (getStrLenTH($progressReport11) > 37) {
            $size = 16;
            $top = 592;
        } else {
            $size = 20;
            $top = 590;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:590px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport11Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport11 . '</div>');

        if (getStrLenTH($progressReport12) > 46) {
            $size = 12;
            $top = 614;
        } else if (getStrLenTH($progressReport12) > 37) {
            $size = 16;
            $top = 621;
        } else {
            $size = 20;
            $top = 619;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:619px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport12Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport12 . '</div>');

        if (getStrLenTH($progressReport13) > 46) {
            $size = 12;
            $top = 640;
        } else if (getStrLenTH($progressReport13) > 37) {
            $size = 16;
            $top = 650;
        } else {
            $size = 20;
            $top = 648;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:648px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport13Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport13 . '</div>');

        if (getStrLenTH($progressReport14) > 46) {
            $size = 12;
            $top = 669;
        } else if (getStrLenTH($progressReport14) > 37) {
            $size = 16;
            $top = 679;
        } else {
            $size = 20;
            $top = 677;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:677px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport14Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport14 . '</div>');

        if (getStrLenTH($progressReport15) > 46) {
            $size = 12;
            $top = 698;
        } else if (getStrLenTH($progressReport15) > 37) {
            $size = 16;
            $top = 708;
        } else {
            $size = 20;
            $top = 706;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:706px; left:103px; font-size:20px; width:80px; text-align:center;">' . $dateReport15Txt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute;  top:' . $top . 'px; left:190px; font-size:' . $size . 'px; width:272px;">' . $progressReport15 . '</div>');
        // pdf output
        $mpdf->Output('DissertationThesisIndependentStudyProgressReportForm.pdf');
        ?>

    </div>

</body>

</html>