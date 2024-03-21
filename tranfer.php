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
            'R' => 'THSarabun.ttf',
            'I' => 'THSarabun Italic.ttf',
            'B' => 'THSarabun Bold.ttf',
            'BI' => 'THSarabun Bold Italic.ttf',
        ]
    ],
    'default_font' => 'sarabun'
]);
//$mpdf = new \Mpdf\Mpdf();
//ob_start() //เริ่มต้นเก็บข้อมูลในหน่วยความจำ
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/thesis.pdf'" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <!-- <link rel="stylesheet" href="styles.css"> -->

    <style>
        .oval {
            width: 160px;
            height: 80px;
            background: #a84909;
            border-radius: 40px;
        }
    </style>
</head>

<body>
    <center>
        <!-- <h1>Loading...</h1> -->
    </center>
    <div class="center">
        <?php
        function space($x)
        {
            $b = '';
            for ($a = 0; $a < $x; $a++) {
                $b .= "&nbsp;";
            }
            return $b;
        }
        //name
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'];

        //ข้อมูลการศึกษา
        $level = $_POST['LevelsInput'];
        $type = $_POST['inputState'];
        $studentid = $_POST['studentid'];
        $faculty = $_POST['faculty'];
        $major = $_POST['major'];
        $field = $_POST['field'];
        $plan = $_POST['plan'];

        //address
        // $province = $_POST['province'];
        // $amphoe = $_POST['amphoe'];
        // $district = $_POST['district'];
        // $IDpost = $_POST['IDpost'];
        // $home_num = $_POST['home_num'];
        // $alley = $_POST['alley'];
        // $street = $_POST['street'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];


        //รายละเอียดการขอสอบเค้าโครงฯ
        $titleTH = $_POST['titleTH'];
        $titleEN = $_POST['titleEN'];
        $flexRadioDefault = $_POST['chooseThesis'];
        // $date = $_POST['datepicker'];
        $time = $_POST['time'];
        $copy = $_POST['copy'];


        //รายชื่อคณกรรมการ
        $lname0 = $_POST['lname0'];
        $fname0 = $_POST['fname0'];
        $prefixC0 = $_POST['prefixC0'];
        $otherPrefixC0 = $_POST['otherPrefixC0'];

        $lname1 = $_POST['lname1'];
        $fname1 = $_POST['fname1'];
        $prefixC1 = $_POST['prefixC1'];
        $otherPrefixC1 = $_POST['otherPrefixC1'];

        $lname2 = $_POST['lname2'];
        $fname2 = $_POST['fname2'];
        $prefixC2 = $_POST['prefixC2'];
        $otherPrefixC2 = $_POST['otherPrefixC2'];

        $lname3 = $_POST['lname3'];
        $fname3 = $_POST['fname3'];
        $prefixC3 = $_POST['prefixC3'];
        $otherPrefixC3 = $_POST['otherPrefixC3'];

        $lname4 = $_POST['lname4'];
        $fname4 = $_POST['fname4'];
        $prefixC4 = $_POST['prefixC4'];
        $otherPrefixC4 = $_POST['otherPrefixC4'];

        $lname5 = $_POST['lname5'];
        $fname5 = $_POST['fname5'];
        $prefixC5 = $_POST['prefixC5'];
        $otherPrefixC5 = $_POST['otherPrefixC5'];

        $prefixAdvisor = $_POST['prefixAdvisor'];
        $otherPrefixAdvisor = $_POST['otherPrefixAdvisor'];
        $fnameAdvisor = $_POST['fnameAdvisor'];
        $lnameAdvisor = $_POST['lnameAdvisor'];

        $prefixCoAdvisor = $_POST['prefixCoAdvisor'];
        $otherPrefixCoAdvisor = $_POST['otherPrefixCoAdvisor'];
        $fnameCoAdvisor = $_POST['fnameCoAdvisor'];
        $lnameCoAdvisor = $_POST['lnameCoAdvisor'];

        $prefixCurriculum = $_POST['prefixCurriculum'];
        $otherPrefixCurriculum = $_POST['otherPrefixCurriculum'];
        $fnameCurriculum = $_POST['fnameCurriculum'];
        $lnameCurriculum = $_POST['lnameCurriculum'];

        $chairman_fac = $_POST['chairman_fac'];
        $otherPrefixchairman_fac = $_POST['otherPrefixchairman_fac'];
        $fnamechairman_fac = $_POST['fnamechairman_fac'];
        $lnamechairman_fac = $_POST['lnamechairman_fac'];
        //สถานที่
        $time = $_POST['time'];
        $room = $_POST['room'];
        $building = $_POST['building'];
        $kana = $_POST['kana'];
        // $notification = $_POST['notification'];
        // $office_phone = $_POST['office_phone'];
        // $office_email = $_POST['office_email'];
        // $plan = $_POST['plan'];
        date_default_timezone_set('Asia/Bangkok');
        $dateT = date("Y-m-d");
        $dmy = date_create($dateT);
        $d = date_format($dmy, "d ");
        $m = date_format($dmy, "m ");
        $yea = date_format($dmy, "Y ");
        $y = (int)$yea + 543;
        $mTxt = array();
        $mTxt = checkMouth((int)$m);
        $today = date("d-m-Y");
        //Date
        // $dateYears =  $date[0] . $date[1] . $date[2] . $date[3];
        // $dateMouth = $date[5] . $date[6];
        // $dateDays = $date[8] . $date[9];
        // // $dateYears = (int)$dateYears + 543;
        // $Year = (int)$dateYears;
        // $Years = (int)$dateYears + 543;
        // $dateDays = (int)$dateDays;
        // $dateMouthTxt = array();
        // $dateMouthTxt = checkMouth((int)$dateMouth);

        $dateBook = $_POST['datepicker'] ?? "";
        $dateBookYears = $dateBook[0] . $dateBook[1] . $dateBook[2] . $dateBook[3];
        $dateYears = (int)$dateBookYears;
        $dateBookYears = (int)$dateBookYears + 543;
        $dateBookMouth = $dateBook[5].$dateBook[6];
        $dateMouth = array();
        $dateMouth = checkMouth($dateBookMouth);
        $dateBookDays = $dateBook[8] . $dateBook[9];
        $birthDayTH = (int)$dateBookDays . '&nbsp;' . $dateMouth[1] . '&nbsp;' . $dateBookYears;

        function checkMouth($val)
        {
            $mouth = array('');
            if ($val == 1) {
                $mouth = array('ม.ค.', 'มกราคม', 'JAN', 'January');
            }
            if ($val == 2) {
                $mouth = array('ก.พ.', 'กุมภาพันธ์', 'FEB', 'February');
            }
            if ($val == 3) {
                $mouth = array('มี.ค.', 'มีนาคม', 'MAR', 'March');
            }
            if ($val == 4) {
                $mouth = array('เม.ย.', 'เมษายน', 'APR', 'April');
            }
            if ($val == 5) {
                $mouth = array('พ.ค.', 'พฤษภาคม', 'MAY', 'May');
            }
            if ($val == 6) {
                $mouth = array('มิ.ย.', 'มิถุนายน', 'JUN', 'June');
            }
            if ($val == 7) {
                $mouth = array('ก.ค.', 'กรกฎาคม', 'JUL', 'July');
            }
            if ($val == 8) {
                $mouth = array('ส.ค.', 'สิงหาคม', 'AUG', 'August');
            }
            if ($val == 9) {
                $mouth = array('ก.ย.', 'กันยายน', 'SEP', 'September');
            }
            if ($val == 0) {
                $mouth = array('ต.ค.', 'ตุลาคม', 'OCT', 'October');
            }
            if ($val == 11) {
                $mouth = array('พ.ย.', 'พฤศจิกายน', 'NOV', 'November');
            }
            if ($val == 12) {
                $mouth = array('ธ.ค.', 'ธันวาคม', 'DEC', 'December');
            }
            return $mouth;
        }
        //name
        if ($prefix != "other") {
            $name = $prefix . $fname . '&nbsp; &nbsp;  ' . $lname;
        } else {
            $name = $other . $fname . '&nbsp; &nbsp;  ' . $lname;
        }

        if ($prefixC0 != "other") {
            $name0 = $prefixC0 . $fname0 . '&nbsp; &nbsp;  ' . $lname0;
        } else {
            $name0 = $otherPrefixC0 . $fname0 . '&nbsp; &nbsp;  ' . $lname0;
        }

        if ($prefixC1 != "other") {
            $name1 = $prefixC1 . $fname1 . '&nbsp; &nbsp;  ' . $lname1;
        } else {
            $name1 = $otherPrefixC1 . $fname1 . '&nbsp; &nbsp;  ' . $lname1;
        }

        if ($prefixC2 != "other") {
            $name2 = $prefixC2 . $fname2 . '&nbsp; &nbsp;  ' . $lname2;
        } else {
            $name2 = $otherPrefixC2 . $fname2 . '&nbsp; &nbsp;  ' . $lname2;
        }

        if ($prefixC3 != "other") {
            $name3 = $prefixC3 . $fname3 . '&nbsp; &nbsp;  ' . $lname3;
        } else {
            $name3 = $otherPrefixC3 . $fname3 . '&nbsp; &nbsp;  ' . $lname3;
        }

        if ($prefixC4 != "other") {
            $name4 = $prefixC4 . $fname4 . '&nbsp; &nbsp;  ' . $lname4;
        } else {
            $name4 = $otherPrefixC4 . $fname4 . '&nbsp; &nbsp;  ' . $lname4;
        }

        if ($prefixC5 != "other") {
            $name5 = $prefixC5 . $fname5 . '&nbsp; &nbsp;  ' . $lname5;
        } else {
            $name5 = $otherPrefixC5 . $fname5 . '&nbsp; &nbsp;  ' . $lname5;
        }

        if ($prefixAdvisor != "other") {
            $nameAdvisor = $prefixAdvisor . $fnameAdvisor . '&nbsp; &nbsp;  ' . $lnameAdvisor;
        } else {
            $nameAdvisor = $otherPrefixAdvisor . $fnameAdvisor . '&nbsp; &nbsp;  ' . $lnameAdvisor;
        }

        if ($prefixCoAdvisor != "other") {
            $nameCoAdvisor = $prefixCoAdvisor . $fnameCoAdvisor . '&nbsp; &nbsp;  ' . $lnameCoAdvisor;
        } else {
            $nameCoAdvisor = $otherPrefixCoAdvisor . $fnameCoAdvisor . '&nbsp; &nbsp;  ' . $lnameCoAdvisor;
        }

        if ($prefixCurriculum != "other") {
            $nameCurriculum = $prefixCurriculum . $fnameCurriculum . '&nbsp; &nbsp;  ' . $lnameCurriculum;
        } else {
            $nameCurriculum = $otherPrefixCurriculum . $fnameCurriculum . '&nbsp; &nbsp;  ' . $lnameCurriculum;
        }
        if ($chairman_fac != "other") {
            $namechairman_fac = $chairman_fac . $fnamechairman_fac . '&nbsp; &nbsp;  ' . $lnamechairman_fac;
        } else {
            $namechairman_fac = $otherPrefixchairman_fac . $fnamechairman_fac . '&nbsp; &nbsp;  ' . $lnamechairman_fac;
        }



        $pagecount = $mpdf->SetSourceFile('thesis3.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $tplId3 = $mpdf->ImportPage(3);
        $tplId4 = $mpdf->ImportPage(4);
        //<p> &#10003;</p>

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R', 18);
        //Date
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:570px; width:20px; text-align:center; font-size:20px">' . (int)$d . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:600px; width:42px; text-align:center; font-size:20px">' . $mTxt[0] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:665px; width:40px; text-align:center; font-size:20px">' . $y . '</div>');


        // $mpdf->WriteHTML('<div style="position:absolute; top:180px; left:575px; font-size:20px; width: 500px;">' . $today[0] . $today[1] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $today[3] . $today[4] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        //     . $today[6] . $today[7] . $today[8] . $today[9] . '</div>');
        //Check Degree
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:225px; left:171px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:225px; left:325x; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        $mpdf->WriteHTML('<div style="position:absolute; top: 221px; left:628px; font-size:20px; width: 47px;">' . $plan . '</div>');

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top: 247px;; left:120px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:245px; left:228px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }



        $mpdf->WriteHTML('<div style="position:absolute; top: 279px;; left:350px; font-size:20px;">' . $name . '</div>');
        // Student ID
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:262; font-size:20px">' . $studentid[0] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:290; font-size:20px">' . $studentid[1] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:318; font-size:20px">' . $studentid[2] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:346; font-size:20px">' . $studentid[3] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:374; font-size:20px">' . $studentid[4] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:402; font-size:20px">' . $studentid[5] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:430; font-size:20px">' . $studentid[6] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:458; font-size:20px">' . $studentid[7] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:486; font-size:20px">' . $studentid[8] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:514; font-size:20px">' . $studentid[9] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:542; font-size:20px">' . $studentid[10] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:570; font-size:20px">' . $studentid[11] . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:355px; left:615; font-size:20px">' . $studentid[13] . '</div>');

        $top_id = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($top_id, '352');
            } else {
                array_push($top_id, '355');
            }
        }
        // Student ID
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[0] . 'px; left: 262px; font-size:20px">' . $studentid[0] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[1] . 'px; left: 290px; font-size:20px">' . $studentid[1] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[2] . 'px; left: 318px; font-size:20px">' . $studentid[2] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[3] . 'px; left: 346px; font-size:20px">' . $studentid[3] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[4] . 'px; left: 374px; font-size:20px">' . $studentid[4] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[5] . 'px; left: 402px; font-size:20px">' . $studentid[5] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[6] . 'px; left: 430px; font-size:20px">' . $studentid[6] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[7] . 'px; left: 458px; font-size:20px">' . $studentid[7] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[8] . 'px; left: 486px; font-size:20px">' . $studentid[8] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[9] . 'px; left: 514px; font-size:20px">' . $studentid[9] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[10] . 'px; left: 542px; font-size:20px">' . $studentid[10] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[11] . 'px; left: 570px; font-size:20px">' . $studentid[11] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top_id[13] . 'px; left: 615px; font-size:20px">' . $studentid[13] . '</div>');
        
        if (strlen($field) > 26) {
            $size_field = 16;
            $top_field = 429;
        } else {
            $size_field = 20;
            $top_field = 425;
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:400px; left:150; font-size:20px">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:400px; left:520; font-size:20px">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:'.$top_field.'px; left:198px; font-size:'.$size_field.'px; width: 179px;">' . $field . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:425px; left:50; font-size:20px; width: 698px;">' .
            space(120).$address
            . '</div>');

        if ($telephone != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:475px; left:200; font-size:20px; width: 5000px;">' . $telephone . '</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:475px; left:590; font-size:20px; width: 5000px;">' . $mobile . '</div>');

        //Date of Approval of the proposal
        // $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:183; font-size:20px; width:100px;">' . $dateDays . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:330; font-size:20px;">' . $dateMouthTxt . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:540px; left:485; font-size:20px; width:100px;">' . $dateYears . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:546px; left:70; font-size:20px; width:650px; word-break: break-all;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $titleTH . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:563px; left:100; font-size:20px; width: 5000px;">' . $titleTH . '</div>');
        // $mpdf->WriteHTML('<div style="position:absolute; top:620px; left:100; font-size:20px; width: 5000px;">' . $titleEN . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:594px; left:70px; font-size:20px; width:650px; word-break: break-all;"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $titleEN . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:644px; left:450; font-size:20px; width: 100px;">' . $copy . '</div>');


        $mpdf->WriteHTML('<div style="position:absolute; top: 740px;; left:508px; font-size:20px; width: 220px; height: 35px; text-align: center;">' . $name . '</div>');
        if ($flexRadioDefault == 'dissertation') {
            $mpdf->WriteHTML('<div style="position:absolute; top:789px; left:268px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($flexRadioDefault == 'thesis') {
            $mpdf->WriteHTML('<div style="position:absolute; top:789px; left:455px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        // else{
        //     $mpdf->WriteHTML('<div style="position:absolute; top:789px; left:455px; font-size:20px; font-family:helvetica;">&#x2713;</div>'); 
        // }
        // else if ($flexRadioDefault == 'Thesis') {
        //     $mpdf->WriteHTML('<div style="position:absolute; top:789px; left:268px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        // }

        $mpdf->WriteHTML('<div style="position:absolute; top: 924px; left:75px; font-size:20px; width: 5000px;">' . $name0 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 945px; left:75px; font-size:20px; width: 5000px;">' . $name1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 966px; left:75px; font-size:20px; width: 5000px;">' . $name2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 987px; left:75px; font-size:20px; width: 5000px;">' . $name3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 1008px; left:75px; font-size:20px; width: 5000px;">' . $name4 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 1029px; left:75px; font-size:20px; width: 5000px;">' . $nameAdvisor . '</div>');

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);
        // $mpdf->Write(0, 'page2');
        // $mpdf->WriteHTML('<div style="position:absolute; top:30px; left:355px; font-size:20px; width:100px; ">' . $birthDayTH . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:60px; left:355px; font-size:20px; width:100px; ">' . $dateBookDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:60px;; left:510px; font-size:20px; width:100px;" >' . $dateBookMouth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:60px; left:695px; font-size:20px; width:100px; ">' . $dateBookYears . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:83px;; left:150px; font-size:20px">' . $time . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:83px;; left:480px; font-size:20px;width: 1000px;">' . $room . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:108px;; left:160px; font-size:20px;width: 1000px;">' . $building . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:108px;; left:480px; font-size:20px;width: 1000px;">' . $kana . '</div>');
        // if ($notification == "stdOradvisor") {
        //     $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:60px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        // } elseif ($notification == "office") {
        //     $mpdf->WriteHTML('<div style="position:absolute; top:305px; left:60px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        //     $mpdf->WriteHTML('<div style="position:absolute; top:362px; left:350px; font-size:20px; width: 100px;">' . $office_phone . '</div>');
        //     $mpdf->WriteHTML('<div style="position:absolute; top:390px; left:200px; font-size:20px">' . $office_email . '</div>');
        // }
        $mpdf->WriteHTML('<div style="position:absolute; top:565px; left:185px; font-size:20px; width: 220px; height: 35px; text-align: center;" >' . $nameAdvisor . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:659px; left:185px; font-size:20px; width: 220px; height: 35px; text-align: center;" >' . $nameCoAdvisor . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1023px; left:179px; font-size:20px; width: 165px; height: 35px; text-align: center; " >' . $nameCurriculum . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:782px; left:355px; font-size:20px; width:100px; ">' . $dateBookDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:782px;; left:510px; font-size:20px; width:100px;" >' . $dateBookMouth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:782px; left:695px; font-size:20px; width:100px; ">' . $dateBookYears . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:805px;; left:213px; font-size:20px">' . $time . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:805px;; left:517px; font-size:20px;width: 1000px;">' . $room . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:830px;; left:206px; font-size:20px;width: 1000px;">' . $building . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:830px;; left:520px; font-size:20px;width: 1000px;">' . $kana . '</div>');
        // background-color: coral;
        // echo '<script>
        // </script>';
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId3);
        // $mpdf->Write(0, 'page3');
        if (strlen($namechairman_fac) > 100) {
            $size = 15;
            $top = 425;
        } else {
            $size = 20;
            $top = 422;
        }
        $html = "<div  style='position:absolute; top:{$top}px; left:145px; font-size:{$size}px; width: 165px; text-align: center;' >  $namechairman_fac </div>";
        $mpdf->WriteHTML($html);
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId4);
        // $mpdf->Write(0, 'page4');
        // Output PDF to browser or file
        $mpdf->Output('thesis.pdf');
        ?>

        <!-- <a href="thesis.pdf">download</a> -->
    </div>

</body>

</html>