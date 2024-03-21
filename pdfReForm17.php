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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestFormforPostponingthePayments.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RequestFormforPostponingthePayments.pdf'" /> -->
    <title>Request Form for Postponing the Payments of Educational Maintenance, Registration Fee and Tuition Fee</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
</head>

<body>
    <?php
    $language = $_POST["language"] ?? "";
    $fname = $_POST['fname'] ?? "";
    $lname = $_POST['lname'] ?? "";
    $prefix = $_POST['prefixInput'] ?? "";
    $other = $_POST['otherPref'] ?? "";
    $prefixname = checkPrefix($prefix, $other);
    $name = $prefixname . $fname . '&nbsp;' . $lname;
    //
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
    $studentid = $_POST['studentid'] ?? "";
    $faculty = $_POST['faculty'] ?? "";
    $major = $_POST['major'] ?? "";
    $subject = $_POST['subject'] ?? "";
    $address = $_POST['textarea_address'] ?? "";
    $telephone = $_POST['telephone'] ?? "";
    $mobile = $_POST['mobile_phone'] ?? "";
    $enrolled = $_POST['enrolled'] ?? "";
    $academicYear = $_POST['academicYear'] ?? "";
    $email = $_POST['email'] ?? "";
    $options = $_POST['options'] ?? "";
    $scholarship = $_POST['scholarship'] ?? "";
    $nameScholarship_1 = $_POST['nameScholarship_1'] ?? "";
    $nameScholarship_2 = $_POST['nameScholarship_2'] ?? "";
    $pay = $_POST['pay'] ?? "";
    $payment = $_POST['payment'] ?? "";
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
    if ($dateBookYears == 543) {
        $dateBookYears = null;
    }
    $specify = $dateBookDays . '&nbsp;' . $dateMouth[1] . '&nbsp;' . $dateBookYears;
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
    $pagecount = $mpdf->setSourceFile('pdf/registerForm17.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 18);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:197px; left:605px; width:20px; text-align:center; font-size:18px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:197px; left:640px; width:45px; text-align:center; font-size:18px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:197px; left:695px; width:40px; text-align:center; font-size:18px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:250px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:365px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:520px; width:43px; text-align:center; font-size:18px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:635px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:242px; left:700px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    //name
    $mpdf->WriteHTML('<div style="position:absolute; top:333px; left:282px; width:465px; text-align:center; font-size:18px">' . $name . '</div>');
    // Student ID
    $top = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($top, '378'); //398
        } else {
            array_push($top, '381'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:160px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[1]}px; left:180px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:198px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:217px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:235px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:254px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[6]}px; left:272px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:292px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:311px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:331px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:348px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:366px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:394px; font-size:18px;'>" . $studentid[13] . "</div>");
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:423px; left:67px; width:190px; text-align:center; font-size:18px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:423px; left:350px; width:175px; text-align:center; font-size:18px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:423px; left:576px; width:175px; text-align:center; font-size:18px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:469px; left:100px; width:650px; font-size:18px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:515px; left:82px; width:255px; text-align:center; font-size:18px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:515px; left:418px; width:335px; text-align:center; font-size:18px">' . $mobile . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:560px; left:202px; width:40px; text-align:center; font-size:18px">' . $enrolled . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:560px; left:298px; width:50px; text-align:center; font-size:18px">' . $academicYear . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:560px; left:498px; width:118px; text-align:center; font-size:18px">' . $payment . '</div>');
    //choose
    if ($options == '1') {
        $mpdf->WriteHTML('<div style="position:absolute; top:648px; left:40px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        if ($scholarship == '1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:697px; left:248px; width:505px; text-align:center; font-size:18px">' . $nameScholarship_1 . '</div>');
        } else if ($scholarship == '2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:745px; left:85px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:746px; left:263px; width:495px; text-align:center; font-size:18px">' . $nameScholarship_2 . '</div>');
        }
    } else if ($options == '2') {
        $mpdf->WriteHTML('<div style="position:absolute; top:888px; left:40px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1010px; left:85px; width:225px; text-align:center; font-size:18px">' . $specify . '</div>');
    }
    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 18);
    //
    if ($options == '2') {
        // $mpdf->WriteHTML('<div style="position:absolute; top:80px; left:40px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        if ($pay == '1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:67px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML('<div style="position:absolute; top:70px; left:355px; width:215px; text-align:center; font-size:18px">' . $email . '</div>');
        } else if ($pay == '2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:143px; left:67px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
    }
    //name
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 294; //+3
    } else if (mb_strlen($name, "UTF-8") > 30) {
        $sizePrefix = 16;
        $topPrefix = 291; //+1
    } else {
        $sizePrefix = 18;
        $topPrefix = 290; //699
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:" . $topPrefix . "px; left:466px; width:196px; font-size:" . $sizePrefix . "px; text-align: center;' >"  . $name . "</div>");
    //
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 638; //+3
    } else {
        $sizePrefix = 16;
        $topPrefix = 635; ///+1
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:" . $topPrefix . "px; left:193px; width:118px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name1 . "</div>");

    $mpdf->Output('RequestFormforPostponingthePayments.pdf');
    ?>
</body>

</html>