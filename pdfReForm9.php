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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestforAcademicDocumentsForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RequestforAcademicDocumentsForm.pdf'" /> -->
    <title>Request for Academic Documents Form</title>
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
    //
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
    //Current
    $in1 = $_POST['in1'] ?? null;
    $in2 = $_POST['in2'] ?? null;
    $in3 = $_POST['in3'] ?? null;
    $spa = $_POST['spa'] ?? null;
    $student = $_POST['student'] ?? null;
    $numTH = $_POST['numTH'] ?? "";
    $numEN = $_POST['numEN'] ?? "";
    $transcript_1 = $_POST['transcript_1'] ?? null;
    $inX1 = $_POST['inX1'] ?? null;
    $inX2 = $_POST['inX2'] ?? null;
    $numTH_1 = $_POST['numTH_1'] ?? "";
    $numEN_1 = $_POST['numEN_1'] ?? "";
    $currentOther = $_POST['currentOther'] ?? null;
    $currentOther_1 = $_POST['currentOther_1'] ?? "";
    //Graduation
    $graduation = $_POST['graduation'] ?? null;
    $ch1 = $_POST['ch1'] ?? null;
    $ch2 = $_POST['ch2'] ?? null;
    $THnum = $_POST['THnum'] ?? "";
    $ENnum = $_POST['ENnum'] ?? "";
    $transcript_2 = $_POST['transcript_2'] ?? null;
    $ch_1 = $_POST['ch_1'] ?? null;
    $ch_2 = $_POST['ch_2'] ?? null;
    $THnum1 = $_POST['THnum1'] ?? "";
    $ENnum1 = $_POST['ENnum1'] ?? "";
    $graduationOther = $_POST['graduationOther'] ?? null;
    $graduationOther_1 = $_POST['graduationOther_1'] ?? "";

    //date
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

    $birthDayTH = $dateBookDays . '&nbsp;' . $dateMouth[1] . '&nbsp;' . $dateBookYears;
    $birthDayEN = $dateBookDays . '&nbsp;' . $dateMouth[3] . '&nbsp;' . $dateYears;
    ?>
</head>

<body>
    <?php
    $style = '<style>p{margin-left: auto; margin-right: auto; text-align:center;}</style>';
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

    $pagecount = $mpdf->setSourceFile('pdf/registerForm9.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    //background:red;
    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 18);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:205px; left:605px; width:20px; text-align:center; font-size:18px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:205px; left:640px; width:45px; text-align:center; font-size:18px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:205px; left:693px; width:40px; text-align:center; font-size:18px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:253px; left:251px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:253px; left:367px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:251px; left:520px; width:40px; text-align:center; font-size:18px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:253px; left:635px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:253px; left:693px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    }
    // Student ID
    $topStudentID = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($topStudentID, '315'); //398
        } else {
            array_push($topStudentID, '318'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[0]}px; left:238px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[1]}px; left:261px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[2]}px; left:285px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[3]}px; left:308px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[4]}px; left:330px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[5]}px; left:353px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[6]}px; left:375px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[7]}px; left:400px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[8]}px; left:422px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[9]}px; left:445px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[10]}px; left:468px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[11]}px; left:490px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[13]}px; left:525px; font-size:18px;'>" . $studentid[13] . "</div>");
    // identification ID
    $top = array();
    for ($i = 0; $i <= 16; $i++) {
        if ($identification[$i] == '0') {
            array_push($top, '341'); //398
        } else {
            array_push($top, '344'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:293px; font-size:18px;'>" . $identification[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:327px; font-size:18px;'>" . $identification[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:350px; font-size:18px;'>" . $identification[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:373px; font-size:18px;'>" . $identification[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:395px; font-size:18px;'>" . $identification[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:428px; font-size:18px;'>" . $identification[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:452px; font-size:18px;'>" . $identification[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:475px; font-size:18px;'>" . $identification[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:498px; font-size:18px;'>" . $identification[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:522px; font-size:18px;'>" . $identification[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:554px; font-size:18px;'>" . $identification[13] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[14]}px; left:577px; font-size:18px;'>" . $identification[14] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[16]}px; left:608px; font-size:18px;'>" . $identification[16] . "</div>");
    //name
    $mpdf->WriteHTML('<div style="position:absolute; top:381px; left:330px; width:425px; text-align:center; font-size:18px">' . $name . '</div>');
    //name en
    $mpdf->WriteHTML('<div style="position:absolute; top:430px; left:290px; width:460px; text-align:center; font-size:18px">' . $name1 . '</div>');
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:480px; left:65px; width:165px; text-align:center; font-size:18px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:480px; left:323px; width:185px; text-align:center; font-size:18px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:480px; left:560px; width:190px; text-align:center; font-size:18px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:577px; left:100px; width:650px; font-size:18px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:625px; left:80px; width:230px; text-align:center; font-size:18px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:625px; left:390px; width:360px; text-align:center; font-size:18px">' . $mobile . '</div>');
    //b date
    $mpdf->WriteHTML('<div style="position:absolute; top:528px; left:175px; width:225px; text-align:center; font-size:18px">' . $birthDayTH . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:528px; left:470px; width:280px; text-align:center; font-size:18px">' . $birthDayEN . '</div>');
    //Current
    if ($in1 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:725px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:725px; left:220px; width:60px; text-align:center; font-size:18px">' . $spa . '</div>');
    }
    if ($student != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:771px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        if ($in2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:771px; left:280px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:770px; left:325px; width:30px; text-align:center; font-size:18px">' . $numTH . '</div>');
        }
        if ($in3 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:771px; left:425px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:770px; left:485px; width:30px; text-align:center; font-size:18px">' . $numEN . '</div>');
        }
    }
    if ($transcript_1 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:817px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        if ($inX1 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:817px; left:280px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:816px; left:325px; width:30px; text-align:center; font-size:18px">' . $numTH_1 . '</div>');
        }
        if ($inX2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:817px; left:425px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:816px; left:485px; width:30px; text-align:center; font-size:18px">' . $numEN_1 . '</div>');
        }
    }
    if ($currentOther != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:863px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:860px; left:118px; width:250px; text-align:center; font-size:18px">' . $currentOther_1 . '</div>');
    }
    //Graduated
    if ($graduation != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:932px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        if ($ch1 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:932px; left:280px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:931px; left:325px; width:30px; text-align:center; font-size:18px">' . $THnum . '</div>');
        }
        if ($ch2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:932px; left:425px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:931px; left:485px; width:30px; text-align:center; font-size:18px">' . $ENnum . '</div>');
        }
    }
    if ($transcript_2 != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:977px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        if ($ch_1 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:977px; left:280px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:976px; left:325px; width:30px; text-align:center; font-size:18px">' . $THnum1 . '</div>');
        }
        if ($ch_2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:977px; left:425px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:976px; left:485px; width:30px; text-align:center; font-size:18px">' . $ENnum1 . '</div>');
        }
    }
    if ($graduationOther != "") {
        $mpdf->WriteHTML('<div style="position:absolute; top:1023px; left:40px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1021px; left:118px; width:250px; text-align:center; font-size:18px">' . $graduationOther_1 . '</div>');
    }

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 18);
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 206; //+3
    } else if (mb_strlen($name, "UTF-8") > 35) {
        $sizePrefix = 16;
        $topPrefix = 203;
    } else {
        $sizePrefix = 18;
        $topPrefix = 202;
    }
    $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:458px; width:200px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name . "</div>");
    // $mpdf->Output('RequestforAcademicDocumentsForm.pdf');
    $mpdf->Output('RequestforAcademicDocumentsForm.pdf');
    ?>
</body>

</html>