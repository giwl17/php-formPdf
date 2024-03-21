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
date_default_timezone_set('asia/bangkok');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/Adding&WithdrawingCourseRequestForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/Adding&WithdrawingCourseRequestForm.pdf'" /> -->
    <title>Adding/ Withdrawing Course Request Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
    <?php
    //name th
    $fname = $_POST['fname'] ?? "";
    $lname = $_POST['lname'] ?? "";
    $prefix = $_POST['prefixInput'] ?? "";
    $other = $_POST['otherPref'] ?? "";
    $prefixname = checkPrefix($prefix, $other);
    $name = $prefixname . $fname . '&nbsp;' . $lname;
    //
    $level = $_POST['LevelsInput'] ?? "";
    $type = $_POST['plan'] ?? "";
    $program = $_POST['program'] ?? "";
    $studentid = $_POST['studentid'] ?? "";
    $faculty = $_POST['faculty'] ?? "";
    $major = $_POST['major'] ?? "";
    $subject = $_POST['subject'] ?? "";
    $address = $_POST['textarea_address'] ?? "";
    $telephone = $_POST['telephone'] ?? "";
    $mobile = $_POST['mobile_phone'] ?? "";
    $semester = $_POST['semester'] ?? "";
    $academicYear = $_POST['academicYear'] ?? "";
    $addWithDraw = $_POST['addWithDraw'] ?? "";
    //addWithDraw 0
    $item = $_POST['item'] ?? "";
    $courseCode = $_POST['courseCode'] ?? "";
    $courseTitle = $_POST['courseTitle'] ?? "";
    $theory = $_POST['theory'] ?? "";
    $practice = $_POST['practice'] ?? "";
    $SEC = $_POST['SEC'] ?? "";
    $times = $_POST['times'] ?? "";
    $sum = checkSumTotal((int)$theory, (int)$practice);
    //addWithDraw 1
    $item1 = $_POST['item1'] ?? "";
    $courseCode1 = $_POST['courseCode1'] ?? "";
    $courseTitle1 = $_POST['courseTitle1'] ?? "";
    $theory1 = $_POST['theory1'] ?? "";
    $practice1 = $_POST['practice1'] ?? "";
    $SEC1 = $_POST['SEC1'] ?? "";
    $times1 = $_POST['times1'] ?? "";
    $sum1 = checkSumTotal((int)$theory1, (int)$practice1);
    //addWithDraw 2
    $item2 = $_POST['item2'] ?? "";
    $courseCode2 = $_POST['courseCode2'] ?? "";
    $courseTitle2 = $_POST['courseTitle2'] ?? "";
    $theory2 = $_POST['theory2'] ?? "";
    $practice2 = $_POST['practice2'] ?? "";
    $SEC2 = $_POST['SEC2'] ?? "";
    $times2 = $_POST['times2'] ?? "";
    $sum2 = checkSumTotal((int)$theory2, (int)$practice2);
    //addWithDraw 3
    $item3 = $_POST['item3'] ?? "";
    $courseCode3 = $_POST['courseCode3'] ?? "";
    $courseTitle3 = $_POST['courseTitle3'] ?? "";
    $theory3 = $_POST['theory3'] ?? "";
    $practice3 = $_POST['practice3'] ?? "";
    $SEC3 = $_POST['SEC3'] ?? "";
    $times3 = $_POST['times3'] ?? "";
    $sum3 = checkSumTotal((int)$theory3, (int)$practice3);
    //addWithDraw 4
    $item4 = $_POST['item4'] ?? "";
    $courseCode4 = $_POST['courseCode4'] ?? "";
    $courseTitle4 = $_POST['courseTitle4'] ?? "";
    $theory4 = $_POST['theory4'] ?? "";
    $practice4 = $_POST['practice4'] ?? "";
    $SEC4 = $_POST['SEC4'] ?? "";
    $times4 = $_POST['times4'] ?? "";
    $sum4 = checkSumTotal((int)$theory4, (int)$practice4);
    //date
    $date = date("Y-m-d");
    $dmy = date_create($date);
    $d = date_format($dmy, "d ");
    $m = date_format($dmy, "m ");
    $yea = date_format($dmy, "Y ");
    $y = (int)$yea + 543;
    $mTxt = array();
    $mTxt = checkMouth((int)$m);
    ?>
</head>

<body>
    <?php
    $style = '<style>p{margin-left: auto; margin-right: auto; text-align:center;}</style>';
    //list0
    $showCourseCode = '<div style="position:absolute; top:658px; left:182px; width:78px; height:45px; text-align:center; font-size:16px"><p>' . $courseCode . '</p></div>';
    $showCourseTitle = '<div style="position:absolute; top:658px; left:260px; width:160px; height:45px; text-align:center; font-size:16px"><p>' . $courseTitle . '</p></div>';
    $showTheory = '<div style="position:absolute; top:658px; left:422px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $theory . '</p></div>';
    $showPractice = '<div style="position:absolute; top:658px; left:478px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $practice . '</p></div>';
    $showSum = '<div style="position:absolute; top:658px; left:533px; width:45px; height:45px; text-align:center; font-size:16px"><p>' . $sum . '</p></div>';
    $showSEC = '<div style="position:absolute; top:658px; left:580px; width:35px; height:45px; text-align:center; font-size:16px"><p>' . $SEC . '</p></div>';
    $showTimes = '<div style="position:absolute; top:658px; left:616px; width:70px; height:45px; text-align:center; font-size:16px"><p>' . $times . '</p></div>';
    //list1
    $showCourseCode1 = '<div style="position:absolute; top:698px; left:182px; width:78px; height:45px; text-align:center; font-size:16px"><p>' . $courseCode . '</p></div>';
    $showCourseTitle1 = '<div style="position:absolute; top:698px; left:260px; width:160px; height:45px; text-align:center; font-size:16px"><p>' . $courseTitle1 . '</p></div>';
    $showTheory1 = '<div style="position:absolute; top:698px; left:422px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $theory1 . '</p></div>';
    $showPractice1 = '<div style="position:absolute; top:698px; left:478px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $practice1 . '</p></div>';
    $showSum1 = '<div style="position:absolute; top:698px; left:533px; width:45px; height:45px; text-align:center; font-size:16px"><p>' . $sum1 . '</p></div>';
    $showSEC1 = '<div style="position:absolute; top:698px; left:580px; width:35px; height:45px; text-align:center; font-size:16px"><p>' . $SEC1 . '</p></div>';
    $showTimes1 = '<div style="position:absolute; top:698px; left:616px; width:70px; height:45px; text-align:center; font-size:16px"><p>' . $times1 . '</p></div>';
    //list2
    $showCourseCode2 = '<div style="position:absolute; top:740px; left:182px; width:78px; height:45px; text-align:center; font-size:16px"><p>' . $courseCode2 . '</p></div>';
    $showCourseTitle2 = '<div style="position:absolute; top:740px; left:260px; width:160px; height:45px; text-align:center; font-size:16px"><p>' . $courseTitle2 . '</p></div>';
    $showTheory2 = '<div style="position:absolute; top:740px; left:422px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $theory1 . '</p></div>';
    $showPractice2 = '<div style="position:absolute; top:740px; left:478px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $practice2 . '</p></div>';
    $showSum2 = '<div style="position:absolute; top:740px; left:533px; width:45px; height:45px; text-align:center; font-size:16px"><p>' . $sum1 . '</p></div>';
    $showSEC2 = '<div style="position:absolute; top:740px; left:580px; width:35px; height:45px; text-align:center; font-size:16px"><p>' . $SEC2 . '</p></div>';
    $showTimes2 = '<div style="position:absolute; top:740px; left:616px; width:70px; height:45px; text-align:center; font-size:16px"><p>' . $times2 . '</p></div>';
    //list3
    $showCourseCode3 = '<div style="position:absolute; top:785px; left:182px; width:78px; height:45px; text-align:center; font-size:16px"><p>' . $courseCode3 . '</p></div>';
    $showCourseTitle3 = '<div style="position:absolute; top:785px; left:260px; width:160px; height:45px; text-align:center; font-size:16px"><p>' . $courseTitle3 . '</p></div>';
    $showTheory3 = '<div style="position:absolute; top:785px; left:422px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $theory3 . '</p></div>';
    $showPractice3 = '<div style="position:absolute; top:785px; left:478px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $practice3 . '</p></div>';
    $showSum3 = '<div style="position:absolute; top:785px; left:533px; width:45px; height:45px; text-align:center; font-size:16px"><p>' . $sum3 . '</p></div>';
    $showSEC3 = '<div style="position:absolute; top:785px; left:580px; width:35px; height:45px; text-align:center; font-size:16px"><p>' . $SEC3 . '</p></div>';
    $showTimes3 = '<div style="position:absolute; top:785px; left:616px; width:70px; height:45px; text-align:center; font-size:16px"><p>' . $times3 . '</p></div>';
    //list4
    $showCourseCode4 = '<div style="position:absolute; top:828px; left:182px; width:78px; height:45px; text-align:center; font-size:16px"><p>' . $courseCode4 . '</p></div>';
    $showCourseTitle4 = '<div style="position:absolute; top:828px; left:260px; width:160px; height:45px; text-align:center; font-size:16px"><p>' . $courseTitle4 . '</p></div>';
    $showTheory4 = '<div style="position:absolute; top:828px; left:422px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $theory4 . '</p></div>';
    $showPractice4 = '<div style="position:absolute; top:828px; left:478px; width:50px; height:45px; text-align:center; font-size:16px"><p>' . $practice4 . '</p></div>';
    $showSum4 = '<div style="position:absolute; top:828px; left:533px; width:45px; height:45px; text-align:center; font-size:16px"><p>' . $sum4 . '</p></div>';
    $showSEC4 = '<div style="position:absolute; top:828px; left:580px; width:35px; height:45px; text-align:center; font-size:16px"><p>' . $SEC4 . '</p></div>';
    $showTimes4 = '<div style="position:absolute; top:828px; left:616px; width:70px; height:45px; text-align:center; font-size:16px"><p>' . $times4 . '</p></div>';

    function checkMouth($val)
    {
        $mouth = array();
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
    function checkPrefix($prefix, $other)
    {
        if ($prefix == 'other') {
            return $other;
        } else {
            return $prefix;
        }
    }

    function checkSumTotal($t, $p)
    {
        if ($t == 0 && $p == 0) {
            $sumTotal = '';
        } else {
            $sumTotal = $t + $p;
        }
        return $sumTotal;
    }
    $pagecount = $mpdf->setSourceFile('pdf/registerForm3.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 18);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:523px; width:20px; text-align:center; font-size:18px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:553px; width:42px; text-align:center; font-size:18px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:608px; width:60px; text-align:center; font-size:18px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:251px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:365px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:520px; width:35px; text-align:center; font-size:18px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:624px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:690px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    // Check Prefix name
    if (mb_strlen($name, "UTF-8") > 45) {
        $size = 14;
        $top = 976; //+3
    } else if (mb_strlen($name, "UTF-8") > 35) {
        $size = 16;
        $top = 973; //+1
    } else {
        $size = 18;
        $top = 972;
    }
    $mpdf->WriteHTML('<div style="position:absolute; top:315px; left:283px; width:470px; text-align:center; font-size:18px">' .  $name . '</div>');
    $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top . "px; left:470px; width:235px; font-size:" . $size . "px; text-align: center;' >" . $name . "</div>");

    // Student ID
    $topStudentID = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($topStudentID, '365'); //398
        } else {
            array_push($topStudentID, '368'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[0]}px; left:237px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[1]}px; left:260px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[2]}px; left:282px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[3]}px; left:305px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[4]}px; left:328px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[5]}px; left:350px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[6]}px; left:373px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[7]}px; left:397px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[8]}px; left:419px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[9]}px; left:442px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[10]}px; left:465px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[11]}px; left:488px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[13]}px; left:523px; font-size:18px;'>" . $studentid[13] . "</div>");
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:389px; left:66px; width:190px; text-align:center; font-size:18px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:389px; left:350px; width:175px; text-align:center; font-size:18px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:389px; left:575px; width:180px; text-align:center; font-size:18px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:438px; left:100px; width:650px; font-size:18px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:479px; left:80px; width:260px; text-align:center; font-size:18px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:479px; left:415px; width:340px; text-align:center; font-size:18px">' . $mobile . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:521px; left:351px; width:90px; text-align:center; font-size:18px">' . $semester . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:521px; left:505px; width:95px; text-align:center; font-size:18px">' . $academicYear . '</div>');

    //add withDraw
    //background:red;
    if ($addWithDraw == '1') {
        //0
        if ($item == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:655px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //list0
        $mpdf->WriteHTML($showCourseCode);
        $mpdf->WriteHTML($showCourseTitle);
        $mpdf->WriteHTML($showTheory);
        $mpdf->WriteHTML($showPractice);
        $mpdf->WriteHTML($showSum);
        $mpdf->WriteHTML($showSEC);
        $mpdf->WriteHTML($showTimes);
    } else if ($addWithDraw == '2') {
        //0
        if ($item == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:655px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //1
        if ($item1 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item1 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:717px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //list0
        $mpdf->WriteHTML($showCourseCode);
        $mpdf->WriteHTML($showCourseTitle);
        $mpdf->WriteHTML($showTheory);
        $mpdf->WriteHTML($showPractice);
        $mpdf->WriteHTML($showSum);
        $mpdf->WriteHTML($showSEC);
        $mpdf->WriteHTML($showTimes);
        //list1
        $mpdf->WriteHTML($showCourseCode1);
        $mpdf->WriteHTML($showCourseTitle1);
        $mpdf->WriteHTML($showTheory1);
        $mpdf->WriteHTML($showPractice1);
        $mpdf->WriteHTML($showSum1);
        $mpdf->WriteHTML($showSEC1);
        $mpdf->WriteHTML($showTimes1);
    } else if ($addWithDraw == '3') {
        //0
        if ($item == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:655px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //1
        if ($item1 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item1 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:717px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //2
        if ($item2 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:739px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item2 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:760px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //list0
        $mpdf->WriteHTML($showCourseCode);
        $mpdf->WriteHTML($showCourseTitle);
        $mpdf->WriteHTML($showTheory);
        $mpdf->WriteHTML($showPractice);
        $mpdf->WriteHTML($showSum);
        $mpdf->WriteHTML($showSEC);
        $mpdf->WriteHTML($showTimes);
        //list1
        $mpdf->WriteHTML($showCourseCode1);
        $mpdf->WriteHTML($showCourseTitle1);
        $mpdf->WriteHTML($showTheory1);
        $mpdf->WriteHTML($showPractice1);
        $mpdf->WriteHTML($showSum1);
        $mpdf->WriteHTML($showSEC1);
        $mpdf->WriteHTML($showTimes1);
        //list2
        $mpdf->WriteHTML($showCourseCode2);
        $mpdf->WriteHTML($showCourseTitle2);
        $mpdf->WriteHTML($showTheory2);
        $mpdf->WriteHTML($showPractice2);
        $mpdf->WriteHTML($showSum2);
        $mpdf->WriteHTML($showSEC2);
        $mpdf->WriteHTML($showTimes2);
    } else if ($addWithDraw == '4') {
        //0
        if ($item == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:655px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //1
        if ($item1 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item1 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:717px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //2
        if ($item2 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:739px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item2 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:760px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //3
        if ($item3 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:781px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item3 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:801px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //list0
        $mpdf->WriteHTML($showCourseCode);
        $mpdf->WriteHTML($showCourseTitle);
        $mpdf->WriteHTML($showTheory);
        $mpdf->WriteHTML($showPractice);
        $mpdf->WriteHTML($showSum);
        $mpdf->WriteHTML($showSEC);
        $mpdf->WriteHTML($showTimes);
        //list1
        $mpdf->WriteHTML($showCourseCode1);
        $mpdf->WriteHTML($showCourseTitle1);
        $mpdf->WriteHTML($showTheory1);
        $mpdf->WriteHTML($showPractice1);
        $mpdf->WriteHTML($showSum1);
        $mpdf->WriteHTML($showSEC1);
        $mpdf->WriteHTML($showTimes1);
        //list2
        $mpdf->WriteHTML($showCourseCode2);
        $mpdf->WriteHTML($showCourseTitle2);
        $mpdf->WriteHTML($showTheory2);
        $mpdf->WriteHTML($showPractice2);
        $mpdf->WriteHTML($showSum2);
        $mpdf->WriteHTML($showSEC2);
        $mpdf->WriteHTML($showTimes2);
        //list3
        $mpdf->WriteHTML($showCourseCode3);
        $mpdf->WriteHTML($showCourseTitle3);
        $mpdf->WriteHTML($showTheory3);
        $mpdf->WriteHTML($showPractice3);
        $mpdf->WriteHTML($showSum3);
        $mpdf->WriteHTML($showSEC3);
        $mpdf->WriteHTML($showTimes3);
    } else if ($addWithDraw == '5') {
        //0
        if ($item == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:655px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //1
        if ($item1 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item1 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:717px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //2
        if ($item2 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:739px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item2 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:760px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //3
        if ($item3 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:781px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item3 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:801px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //4
        if ($item4 == 'Add') {
            $mpdf->WriteHTML('<div style="position:absolute; top:823px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($item4 == 'WithDraw') {
            $mpdf->WriteHTML('<div style="position:absolute; top:843px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //list0
        $mpdf->WriteHTML($showCourseCode);
        $mpdf->WriteHTML($showCourseTitle);
        $mpdf->WriteHTML($showTheory);
        $mpdf->WriteHTML($showPractice);
        $mpdf->WriteHTML($showSum);
        $mpdf->WriteHTML($showSEC);
        $mpdf->WriteHTML($showTimes);
        //list1
        $mpdf->WriteHTML($showCourseCode1);
        $mpdf->WriteHTML($showCourseTitle1);
        $mpdf->WriteHTML($showTheory1);
        $mpdf->WriteHTML($showPractice1);
        $mpdf->WriteHTML($showSum1);
        $mpdf->WriteHTML($showSEC1);
        $mpdf->WriteHTML($showTimes1);
        //list2
        $mpdf->WriteHTML($showCourseCode2);
        $mpdf->WriteHTML($showCourseTitle2);
        $mpdf->WriteHTML($showTheory2);
        $mpdf->WriteHTML($showPractice2);
        $mpdf->WriteHTML($showSum2);
        $mpdf->WriteHTML($showSEC2);
        $mpdf->WriteHTML($showTimes2);
        //list3
        $mpdf->WriteHTML($showCourseCode3);
        $mpdf->WriteHTML($showCourseTitle3);
        $mpdf->WriteHTML($showTheory3);
        $mpdf->WriteHTML($showPractice3);
        $mpdf->WriteHTML($showSum3);
        $mpdf->WriteHTML($showSEC3);
        $mpdf->WriteHTML($showTimes3);
        //list4
        $mpdf->WriteHTML($showCourseCode4);
        $mpdf->WriteHTML($showCourseTitle4);
        $mpdf->WriteHTML($showTheory4);
        $mpdf->WriteHTML($showPractice4);
        $mpdf->WriteHTML($showSum4);
        $mpdf->WriteHTML($showSEC4);
        $mpdf->WriteHTML($showTimes4);
    }

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 18);

    $mpdf->Output('Adding&WithdrawingCourseRequestForm.pdf');
    ?>
</body>

</html>