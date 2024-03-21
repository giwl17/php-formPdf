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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestforGraduationRegistrationForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RequestforGraduationRegistrationForm.pdf'" /> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Request for Graduation Registration Form</title>
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
    $program = $_POST['program'] ?? "";
    $identification = $_POST['identification'] ?? "";
    $studentid = $_POST['studentid'] ?? "";
    $faculty = $_POST['faculty'] ?? "";
    $major = $_POST['major'] ?? "";
    $subject = $_POST['subject'] ?? "";
    $address = $_POST['textarea_address'] ?? "";
    $telephone = $_POST['telephone'] ?? "";
    $mobile = $_POST['mobile_phone'] ?? "";
    //address
    $house = $_POST['house'] ?? "";
    $moo = $_POST['moo'] ?? "";
    $village = $_POST['village'] ?? "";
    $road = $_POST['road'] ?? "";
    $soi = $_POST['soi'] ?? "";
    $sub_District = $_POST['sub_District'] ?? "";
    $district = $_POST['district'] ?? "";
    $province = $_POST['province'] ?? "";
    $postCode = $_POST['postCode'] ?? "";
    //
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
    if ($dateBookYears == 543) {
        $dateBookYears = null;
    }
    $birthDayTH = $dateBookDays . '&nbsp;' . $dateMouth[1] . '&nbsp;' . $dateBookYears;
    $birthDayEN = $dateBookDays . '&nbsp;' . $dateMouth[3] . '&nbsp;' . $dateYears;

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
    $pagecount = $mpdf->setSourceFile('pdf/registerForm8.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 16);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:186px; left:607px; width:20px; text-align:center; font-size:16px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:186px; left:637px; width:42px; text-align:center; font-size:16px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:186px; left:685px; width:40px; text-align:center; font-size:16px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:249px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:335px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:469px; width:35px; text-align:center; font-size:16px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:578px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:220px; left:638px; font-size:16px; font-family:helvetica;">&#x2713;</div>');
    }
    // Student ID
    $topStudentID = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($topStudentID, '295'); //398
        } else {
            array_push($topStudentID, '298'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[0]}px; left:220px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[1]}px; left:243px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[2]}px; left:265px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[3]}px; left:287px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[4]}px; left:310px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[5]}px; left:332px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[6]}px; left:354px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[7]}px; left:380px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[8]}px; left:402px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[9]}px; left:425px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[10]}px; left:448px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[11]}px; left:470px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[13]}px; left:503px; font-size:18px;'>" . $studentid[13] . "</div>");
    // identification ID
    $top = array();
    for ($i = 0; $i <= 16; $i++) {
        if ($identification[$i] == '0') {
            array_push($top, '336'); //398
        } else {
            array_push($top, '339'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:304px; font-size:18px;'>" . $identification[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:336px; font-size:18px;'>" . $identification[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:359px; font-size:18px;'>" . $identification[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:382px; font-size:18px;'>" . $identification[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:406px; font-size:18px;'>" . $identification[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:439px; font-size:18px;'>" . $identification[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:463px; font-size:18px;'>" . $identification[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:486px; font-size:18px;'>" . $identification[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:509px; font-size:18px;'>" . $identification[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:533px; font-size:18px;'>" . $identification[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:565px; font-size:18px;'>" . $identification[13] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[14]}px; left:588px; font-size:18px;'>" . $identification[14] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[16]}px; left:620px; font-size:18px;'>" . $identification[16] . "</div>");
    //name
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 783; //+3
    } else {
        $sizePrefix = 16;
        $topPrefix = 780;
    }
    $mpdf->WriteHTML('<div style="position:absolute; top:385px; left:312px; width:425px; text-align:center; font-size:16px">' . $name . '</div>');
    $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:473px; width:182px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name . "</div>");
    //name en
    $mpdf->WriteHTML('<div style="position:absolute; top:420px; left:325px; width:410px; text-align:center; font-size:16px">' . $name1 . '</div>');
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:458px; left:83px; width:165px; text-align:center; font-size:16px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:458px; left:327px; width:160px; text-align:center; font-size:16px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:458px; left:532px; width:200px; text-align:center; font-size:16px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:535px; left:114px; width:620px; font-size:16px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:571px; left:98px; width:285px; text-align:center; font-size:16px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:571px; left:453px; width:280px; text-align:center; font-size:16px">' . $mobile . '</div>');
    //b date
    $mpdf->WriteHTML('<div style="position:absolute; top:494px; left:178px; width:225px; text-align:center; font-size:16px">' . $birthDayTH . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:494px; left:470px; width:265px; text-align:center; font-size:16px">' . $birthDayEN . '</div>');

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 16);
    //
    //background:red;
    //1
    $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:127px; width:85px; text-align:center; font-size:16px">' . $prefix . $fname . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:290px; width:105px; text-align:center; font-size:16px">' . $lname . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:523px; left:172px; width:220px; text-align:center; font-size:16px">' . $studentid . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:544px; left:160px; width:65px; text-align:center; font-size:16px">' . $house . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:544px; left:290px; width:105px; text-align:center; font-size:16px">' . $village . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:106px; width:15px; text-align:center; font-size:16px">' . $moo . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:173px; width:76px; text-align:center; font-size:16px">' . $road . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:318px; width:77px; text-align:center; font-size:16px">' . $soi . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:586px; left:171px; width:72px; text-align:center; font-size:16px">' . $sub_District . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:586px; left:327px; width:70px; text-align:center; font-size:16px">' . $district . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:607px; left:135px; width:61px; text-align:center; font-size:16px">' . $province . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:607px; left:310px; width:85px; text-align:center; font-size:16px">' . $postCode . '</div>');
    //2
    $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:476px; width:85px; text-align:center; font-size:16px">' . $prefix . $fname . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:638px; width:105px; text-align:center; font-size:16px">' . $lname . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:523px; left:520px; width:220px; text-align:center; font-size:16px">' . $studentid . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:544px; left:504px; width:65px; text-align:center; font-size:16px">' . $house . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:544px; left:638px; width:105px; text-align:center; font-size:16px">' . $village . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:455px; width:15px; text-align:center; font-size:16px">' . $moo . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:522px; width:76px; text-align:center; font-size:16px">' . $road . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:564px; left:665px; width:77px; text-align:center; font-size:16px">' . $soi . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:586px; left:520px; width:72px; text-align:center; font-size:16px">' . $sub_District . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:586px; left:677px; width:70px; text-align:center; font-size:16px">' . $district . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:607px; left:483px; width:61px; text-align:center; font-size:16px">' . $province . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:607px; left:655px; width:85px; text-align:center; font-size:16px">' . $postCode . '</div>');

    $mpdf->Output('RequestforGraduationRegistrationForm.pdf');

    ?>
</body>

</html>