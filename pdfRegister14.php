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
date_default_timezone_set('Asia/Bangkok');
//$mpdf = new \Mpdf\Mpdf();
//ob_start() //เริ่มต้นเก็บข้อมูลในหน่วยความจำ
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestIncompleteScoreLevel.pdf'" />
    <!-- <meta http-equiv="refresh" content="2; url='http://localhost/Test/RequestIncompleteScoreLevel.pdf'" /> -->

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
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
        $address = $_POST['address'];
        // $province = $_POST['province'];
        // $amphoe = $_POST['amphoe'];
        // $district = $_POST['district'];
        // $IDpost = $_POST['IDpost'];
        // $home_num = $_POST['home_num'];
        // $alley = $_POST['alley'];
        // $street = $_POST['street'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];


        //รายละเอียดการขอสอบเค้าโครงฯ
        $titleTH = $_POST['titleTH'];
        $titleEN = $_POST['titleEN'];
        $flexRadioDefault = $_POST['chooseThesis'];
        $date = $_POST['datepicker'];
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

        $semeter = $_POST['semeter'];
        $academic_year = $_POST['academic_year'];


        $course_id1 = $_POST['course_id1'];
        $course_title1 = $_POST['course_title1'];
        $section1 = $_POST['section1'];
        $lecturer_prefix1 = $_POST['lecturer_prefix1'];
        $lecturer_otherPrefix1 = $_POST['lecturer_otherPrefix1'];
        $lecturer_fname1 = $_POST['lecturer_fname1'];
        $lecturer_lname1 = $_POST['lecturer_lname1'];

        $course_id2 = $_POST['course_id2'];
        $course_title2 = $_POST['course_title2'];
        $section2 = $_POST['section2'];
        $lecturer_prefix2 = $_POST['lecturer_prefix2'];
        $lecturer_otherPrefix2 = $_POST['lecturer_otherPrefix2'];
        $lecturer_fname2 = $_POST['lecturer_fname2'];
        $lecturer_lname2 = $_POST['lecturer_lname2'];

        $course_id3 = $_POST['course_id3'];
        $course_title3 = $_POST['course_title3'];
        $section3 = $_POST['section3'];
        $lecturer_prefix3 = $_POST['lecturer_prefix3'];
        $lecturer_otherPrefix3 = $_POST['lecturer_otherPrefix3'];
        $lecturer_fname3 = $_POST['lecturer_fname3'];
        $lecturer_lname3 = $_POST['lecturer_lname3'];
        //สถานที่
        $time = $_POST['time'];
        $room = $_POST['room'];
        $building = $_POST['building'];
        $kana = $_POST['kana'];
        // $notification = $_POST['notification'];
        // $office_phone = $_POST['office_phone'];
        // $office_email = $_POST['office_email'];
        // $plan = $_POST['plan'];

        $date = date("Y-m-d");
        $dmy = date_create($date);
        $d = date_format($dmy, "d ");
        $m = date_format($dmy, "m ");
        $yea = date_format($dmy, "Y ");
        $y = (int)$yea + 543;
        $mTxt = array();
        $mTxt = checkMouth((int)$m);
        //Date
        $dateYears =  $date[0] . $date[1] . $date[2] . $date[3];
        $dateMouth = $date[5] . $date[6];
        $dateDays = $date[8] . $date[9];
        $dateYears = (int)$dateYears + 543;
        $dateDays = (int)$dateDays;
        $dateMouthTxt = '';
        $dateMouth = (int)$dateMouth;
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
            if ($val == 10) {
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
        //address
        // $address = "จังหวัด " . $province . "  อำเภอ / เขต " . $amphoe . "  ตำบล / แขวง " . $district;
        $today = date("d-m-Y");
        function space($x)
        {
            $b = '';
            for ($a = 0; $a < $x; $a++) {
                $b .= "&nbsp;";
            }
            return $b;
        }
        //name
        if ($prefix != "other") {
            $name = $prefix . $fname . space(10) . $lname;
        } else {
            $name = $other . $fname . space(10) . $lname;
        }
        if ($prefixAdvisor != "other") {
            $nameAdvisor = $prefixAdvisor . $fnameAdvisor . '&nbsp; &nbsp;  ' . $lnameAdvisor;
        } else {
            $nameAdvisor = $otherPrefixAdvisor . $fnameAdvisor . '&nbsp; &nbsp;  ' . $lnameAdvisor;
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
        if ($lecturer_prefix1 != 'other') {
            $lecturer_name1 = $lecturer_prefix1 . $lecturer_fname1 . '&nbsp; &nbsp;' . $lecturer_lname1;
        } else {
            $lecturer_name1 = $lecturer_otherPrefix1 . $lecturer_fname1 . '&nbsp; &nbsp;' . $lecturer_lname1;
        }

        if ($lecturer_prefix2 != 'other') {
            $lecturer_name2 = $lecturer_prefix2 . $lecturer_fname2 . '&nbsp; &nbsp;' . $lecturer_lname2;
        } else {
            $lecturer_name2 = $lecturer_otherPrefix2 . $lecturer_fname2 . '&nbsp; &nbsp;' . $lecturer_lname2;
        }

        if ($lecturer_prefix3 != 'other') {
            $lecturer_name3 = $lecturer_prefix3 . $lecturer_fname3 . '&nbsp; &nbsp;' . $lecturer_lname3;
        } else {
            $lecturer_name3 = $lecturer_otherPrefix3 . $lecturer_fname3 . '&nbsp; &nbsp;' . $lecturer_lname3;
        }
        $pagecount = $mpdf->SetSourceFile('pdf/register14.pdf');
        // $pagecount = $mpdf->SetSourceFile('register14.pdf');

        $tplId1 = $mpdf->ImportPage(1);
        // $tplId2 = $mpdf->ImportPage(2);
        // $tplId3 = $mpdf->ImportPage(3);
        // $tplId4 = $mpdf->ImportPage(4);
        //<p> &#10003;</p>

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R', 18);
        // $mpdf->WriteHTML('<div style="position:absolute; top:219px; left:610px; font-size:20px; width: 500px;">' . $today[0] . $today[1] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;' . $today[3] . $today[4] . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
        //     . $today[6] . $today[7] . $today[8] . $today[9] . '</div>');
        //Date
        $mpdf->WriteHTML('<div style="position:absolute; top:219px; left:610px; width:20px; text-align:center; font-size:20px">' . (int)$d . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:219px; left:637px; width:42px; text-align:center; font-size:20px">' . $mTxt[0] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:219px; left:695px; width:40px; text-align:center; font-size:20px">' . $y . '</div>');

        //Check Degree
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:265px; left:250px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:265px; left:365x; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        $mpdf->WriteHTML('<div style="position:absolute; top: 265px; left:520px; font-size:20px;width:500px;">' . $plan . '</div>');
        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top: 265px; left:632px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:265px; left:698px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        $mpdf->WriteHTML('<div style="position:absolute; top: 334px; left:350px; font-size:20px">' . $name . '</div>');
        $top = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($top, '381');
            } else {
                array_push($top, '384');
            }
        }
        // Student ID
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[0] . 'px; left: 225px; font-size:20px">' . $studentid[0] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[1] . 'px; left: 248px; font-size:20px">' . $studentid[1] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[2] . 'px; left: 271px; font-size:20px">' . $studentid[2] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[3] . 'px; left: 294px; font-size:20px">' . $studentid[3] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[4] . 'px; left: 317px; font-size:20px">' . $studentid[4] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[5] . 'px; left: 340px; font-size:20px">' . $studentid[5] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[6] . 'px; left: 363px; font-size:20px">' . $studentid[6] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[7] . 'px; left: 386px; font-size:20px">' . $studentid[7] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[8] . 'px; left: 409px; font-size:20px">' . $studentid[8] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[9] . 'px; left: 432px; font-size:20px">' . $studentid[9] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[10] . 'px; left: 455px; font-size:20px">' . $studentid[10] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[11] . 'px; left: 478px; font-size:20px">' . $studentid[11] . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top[13] . 'px; left: 512px; font-size:20px">' . $studentid[13] . '</div>');

        // if (strlen($namechairman_fac) > 100) {
        //     $size = 15;
        //     $top = 425;
        // } else {
        //     $size = 20;
        //     $top = 422;
        // }
        $mpdf->WriteHTML('<div style="position:absolute; top:422px; left: 110px; font-size:20px">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:422px; left: 360px; font-size:20px">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:422px; left: 578px; font-size:20px">' . $field . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:472px; left: 110px; font-size:20px">' . $address . '</div>');



        if ($telephone != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:516px; left: 105px; font-size:20px; width: 5000px;">' . $telephone . '</div>');
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:516px; left: 375px; font-size:20px; width: 5000px;">' . $mobile . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:610px; left: 495px; font-size:20px; width: 5000px;">' . $semeter . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 610px; left: 587px; font-size:20px; width: 5000px;">' . $academic_year . '</div>');


        if (strlen($lecturer_name1) > 20) {
            $size_name1 = 16;
            $top_name1 = 746;
        } else {
            $size_name1 = 20;
            $top_name1 = 742;
        }

        

        if (strlen($course_title1) > 29) {
            $size_course1 = 16;
            $top_course1 = 743;
        } else {
            $size_course1 = 20;
            $top_course1 = 740;
        }
        if (strlen($course_title2) > 29) {
            $size_course2 = 16;
            $top_course2 = 767;
        } else {
            $size_course2 = 20;
            $top_course2 = 764;
        }
        if (strlen($course_title3) > 29) {
            $size_course3 = 16;
            $top_course3 = 792;
        } else {
            $size_course3 = 20;
            $top_course3 = 789;
        }

        if ($course_id2 != "") {
            $no2 = 2;
        }
        if ($course_id3 != "") {
            $no3 = 3;
        }
        // // background-color: yellow;
        $mpdf->WriteHTML('<div style="position:absolute; top: 740px; left: 38px; font-size:20px; width: 58px; height:26px;text-align: center;  ">1</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 740px; left: 95px; font-size:20px; width: 106px; height:35px;text-align: center;  ">' . $course_id1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: ' . $top_course1 . 'px; left: 200px; font-size:' . $size_course1 . 'px; width: 207px;">' . $course_title1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 740px; left: 440px; font-size:20px; width: 5000px;">' . $section1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: '.$top_name1.'px; left: 481px; font-size:16px; width: 120px; height:35px;  text-align: center;">' . $lecturer_name1 . '</div>');
       
//         $fontSize = 20; // Initial font size
//         $maxWidth = 123; // Maximum width of the container
//         // Calculate the text length
//         $textLength = strlen($lecturer_name1);
        
//         // Adjust the font size based on text length
//         if ($textLength > 0) {
//             $fontSize = min($fontSize, $maxWidth / $textLength);
//         }
//        $mpdf->WriteHTML('
//     <div style="position:absolute; top: 740px; left: 481px;  height:35px;width: 123px;  ">
//       <table style="width: 100%; background-color: yellow;font-size:'.$fontSize.'px;">
//       <tr>
//       <td>
//       '. $lecturer_name1 .'
//       </td>
//       </tr>
//       </table>
//       </div>
// ');

        $mpdf->WriteHTML('<div style="position:absolute; top: 764px; left: 38px; font-size:20px; width: 58px; height:26px;text-align: center;  ">' . $no2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 764px; left: 95px; font-size:20px; width: 106px; height:26px;text-align: center;  ">' . $course_id2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: ' . $top_course2 . 'px; left: 200px; font-size:' . $size_course2 . 'px; width: 207px;">' . $course_title2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 764px; left: 440px; font-size:20px; width: 5000px;">' . $section2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 764px; left: 481px; font-size:14px; width: 5000px;width: 113px;line-height: 0.7;text-align: center;">' . $lecturer_name2 . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top: 789px; left: 38px; font-size:20px; width: 58px; height:26px;text-align: center;  ">' . $no3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 789px; left: 95px; font-size:20px; width: 106px; height:26px;text-align: center;  ">' . $course_id3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: ' . $top_course3 . 'px; left: 200px; font-size:' . $size_course3 . 'px; width: 207px;">' . $course_title3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 789px; left: 440px; font-size:20px; width: 5000px;">' . $section3 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top: 789px; left: 481px; font-size:14px; width: 5000px;width: 113px;line-height: 0.7;text-align: center;">' . $lecturer_name3 . '</div>');


        if ($prefix != "other") {
            $name = $prefix . $fname . space(2) . $lname;
        } else {
            $name = $other . $fname . space(2) . $lname;
        }
        if (strlen($name) > 30) {
            $size_name = 16;
            $top_name = 887;
        } else {
            $size_name = 20;
            $top_name = 880;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top: 880px; left:463px; font-size:20px;width: 189px; height:26px;text-align: center;">  ' . $name . '</div>');


        // if (strlen($nameAdvisor) > 30) {
        //     $size_nameAdvisor = 16;
        //     $top_nameAdvisor= 979;
        // } else {
        //     $size_nameAdvisor = 20;
        //     $top_nameAdvisor = 981;
        // }
        $mpdf->WriteHTML('<div style="position:absolute; top: 981px; left:463px; font-size:20px;width: 189px; height:35px;text-align: center;">  ' . $nameAdvisor . '</div>');



        $mpdf->Output('RequestIncompleteScoreLevel.pdf');
        ?>

        <!-- <a href="thesis.pdf">download</a> -->
    </div>

</body>

</html>