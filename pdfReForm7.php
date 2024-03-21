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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestforGraduationForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RequestforGraduationForm.pdf'" /> -->
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
</head>

<body>
    <?php
    //name th
    $fname = $_POST['fname'] ?? "";
    $lname = $_POST['lname'] ?? "";
    $prefix = $_POST['prefixInput'] ?? "";
    $other = $_POST['otherPref'] ?? "";
    $prefixname = checkPrefix($prefix, $other);
    $name = $prefixname . $fname . '&nbsp;' . $lname;
    //name en
    $fname1 = $_POST['fname1'] ?? "";
    $lname1 = $_POST['lname1'] ?? "";
    $prefix1 = $_POST['prefixInput1'] ?? "";
    $other1 = $_POST['otherPref1'] ?? "";
    $prefixname1 = checkPrefix($prefix1, $other1);
    $name1 = $prefixname1 . $fname1 . '&nbsp;' . $lname1;

    $level = $_POST['LevelsInput'] ?? "";
    $type = $_POST['plan'] ?? "";
    $levelG = $_POST['LevelsInput1'] ?? "";
    $typeG = $_POST['plan1'] ?? "";
    $program = $_POST['program'] ?? "";
    $identification = $_POST['identification'] ?? "";
    $studentid = $_POST['studentid'] ?? "";
    $faculty = $_POST['faculty'] ?? "";
    $major = $_POST['major'] ?? "";
    $subject = $_POST['subject'] ?? "";
    $address = $_POST['textarea_address'] ?? "";
    $telephone = $_POST['telephone'] ?? "";
    $mobile = $_POST['mobile_phone'] ?? "";
    $gpa = $_POST['gpa'] ?? "";

    $academicYear = $_POST['academicYear'] ?? "";
    $semester = $_POST['semester'] ?? "";
    $evidence1 = $_POST['evidence1'] ?? null;
    $evidence2 = $_POST['evidence2'] ?? null;
    $evidence3 = $_POST['evidence3'] ?? null;
    $evidence4 = $_POST['evidence4'] ?? null;

    $date = date("Y-m-d");
    $dmy = date_create($date);
    $d = date_format($dmy, "d ");
    $m = date_format($dmy, "m ");
    $yea = date_format($dmy, "Y ");
    $y = (int)$yea + 543;
    $mTxt = array();
    $mTxt = checkMouth((int)$m);
    //
    $dateBook = $_POST['dateBook'] ?? "";
    $dateBookYears = $dateBook[0] . $dateBook[1] . $dateBook[2] . $dateBook[3];
    $dateYears = (int)$dateBookYears;
    $dateBookYears = (int)$dateBookYears + 543;
    $dateBookMouth = $dateBook[5] . $dateBook[6];
    $dateMouth = array();
    $dateMouth = checkMouth((int)$dateBookMouth);
    $dateBookDays = $dateBook[8] . $dateBook[9];

    $birthDayTH = (int)$dateBookDays . '&nbsp;' . $dateMouth[1] . '&nbsp;' . $dateBookYears;
    $birthDayEN = (int)$dateBookDays . '&nbsp;' . $dateMouth[3] . '&nbsp;' . $dateYears;

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

    function checkPrefix($prefix, $other)
    {
        if ($prefix == 'other') {
            return $other;
        } else {
            return $prefix;
        }
    }
    //background:red;
    $pagecount = $mpdf->setSourceFile('pdf/registerForm7.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);
    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 16);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:158px; left:605px; width:20px; text-align:center; font-size:16px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:158px; left:625px; width:42px; text-align:center; font-size:16px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:158px; left:670px; width:45px; text-align:center; font-size:16px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:195px; left:260px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:195px; left:350px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:195px; left:482px; width:35px; text-align:center; font-size:16px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:195px; left:578px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:195px; left:633px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    }
    //name th
    if ($prefix == 'other') {
        $mpdf->WriteHTML('<div style="position:absolute; top:232px; left:295px; width:445px; text-align:center; font-size:16px">' . $name . '</div>');
    } else {
        $mpdf->WriteHTML('<div style="position:absolute; top:232px; left:295px; width:445px; text-align:center; font-size:16px">' . $name . '</div>');
    }
    //name en
    if ($prefix1 == 'other') {
        $mpdf->WriteHTML('<div style="position:absolute; top:268px; left:195px; width:540px; text-align:center; font-size:16px">' . $name1 . '</div>');
    } else {
        $mpdf->WriteHTML('<div style="position:absolute; top:268px; left:195px; width:540px; text-align:center; font-size:16px">' . $name1 . '</div>');
    }
    // Student ID
    $topStudentID = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($topStudentID, '321'); //398
        } else {
            array_push($topStudentID, '324'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[0]}px; left:240px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[1]}px; left:265px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[2]}px; left:287px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[3]}px; left:310px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[4]}px; left:333px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[5]}px; left:356px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[6]}px; left:378px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[7]}px; left:402px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[8]}px; left:425px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[9]}px; left:447px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[10]}px; left:470px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[11]}px; left:492px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[13]}px; left:525px; font-size:18px;'>" . $studentid[13] . "</div>");
    // identification ID
    $top = array();
    for ($i = 0; $i <= 16; $i++) {
        if ($identification[$i] == '0') {
            array_push($top, '361'); //398
        } else {
            array_push($top, '364'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:330px; font-size:18px;'>" . $identification[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:362px; font-size:18px;'>" . $identification[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:385px; font-size:18px;'>" . $identification[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:408px; font-size:18px;'>" . $identification[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:430px; font-size:18px;'>" . $identification[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:465px; font-size:18px;'>" . $identification[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:487px; font-size:18px;'>" . $identification[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:510px; font-size:18px;'>" . $identification[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:533px; font-size:18px;'>" . $identification[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:557px; font-size:18px;'>" . $identification[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:589px; font-size:18px;'>" . $identification[13] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[14]}px; left:612px; font-size:18px;'>" . $identification[14] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[16]}px; left:644px; font-size:18px;'>" . $identification[16] . "</div>");
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:400px; left:110px; width:160px; text-align:center; font-size:16px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:400px; left:351px; width:160px; text-align:center; font-size:16px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:400px; left:557px; width:175px; text-align:center; font-size:16px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:477px; left:138px; width:600px; font-size:16px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:514px; left:123px; width:160px; text-align:center; font-size:16px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:514px; left:352px; width:125px; text-align:center; font-size:16px">' . $mobile . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:514px; left:558px; width:170px; text-align:center; font-size:16px">' . $gpa . '</div>');
    //b date
    $mpdf->WriteHTML('<div style="position:absolute; top:435px; left:205px; width:220px; text-align:center; font-size:16px">' . $birthDayTH . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:435px; left:495px; width:240px; text-align:center; font-size:16px">' . $birthDayEN . '</div>');
    //graduation
    if ($levelG == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:710px; left:88px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        if ($typeG == '1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:678px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        } else if ($typeG == '2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:720px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        }
    } else if ($levelG == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:858px; left:88px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        if ($typeG == '1.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:805px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        } else if ($typeG == '1.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:848px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        } else if ($typeG == '2.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:889px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        } else if ($typeG == '2.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:932px; left:183px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
        }
    }
    //Requirements
    if ($evidence1 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:685px; left:260px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    if ($evidence2 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:769px; left:260px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    if ($evidence3 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:853px; left:260px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    if ($evidence4 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:917px; left:260px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 16);

    //name
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 234;
    } else {
        $sizePrefix = 16;
        $topPrefix = 233;
    }
    if ($prefix == 'other') {
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:503px; width:185px; font-size:" . $sizePrefix . "px; text-align: center;' >"  . $name . "</div>");
    } else {
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:503px; width:185px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name . "</div>");
    }
    //
    if ($semester == '1') {
        $mpdf->WriteHTML('<div style="position:absolute; top:94px; left:410px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($semester == "2") {
        $mpdf->WriteHTML('<div style="position:absolute; top:94px; left:447px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($semester == "summer") {
        $mpdf->WriteHTML('<div style="position:absolute; top:94px; left:485px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    }
    $mpdf->WriteHTML('<div style="position:absolute; top:94px; left:630px; width:45px; text-align:center; font-size:16px">' . $academicYear . '</div>');

    $mpdf->Output('RequestforGraduationForm.pdf');
    ?>
</body>

</html>