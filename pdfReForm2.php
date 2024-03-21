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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RegistrationForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RegistrationForm.pdf'" /> -->
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
    //lecturer 1
    $courseCode_1 = $_POST['courseCode_1'] ?? "";
    $courseTitle_1 = $_POST['courseTitle_1'] ?? "";
    $credit_1 = $_POST['credit_1'] ?? "";
    $money_1 = $_POST['money_1'] ?? "";
    $fname_1 = $_POST['fname_1'] ?? "";
    $lname_1 = $_POST['lname_1'] ?? "";
    $prefix_1 = $_POST['prefixInput_1'] ?? "";
    $other_1 = $_POST['otherPref_1'] ?? "";
    $prefixname_1 = checkPrefix($prefix_1, $other_1);
    $name_1 = $prefixname_1 . $fname_1 . '&nbsp;' . $lname_1;
    //lecturer 2
    $courseCode_2 = $_POST['courseCode_2'] ?? "";
    $courseTitle_2 = $_POST['courseTitle_2'] ?? "";
    $credit_2 = $_POST['credit_2'] ?? "";
    $money_2 = $_POST['money_2'] ?? "";
    $fname_2 = $_POST['fname_2'] ?? "";
    $lname_2 = $_POST['lname_2'] ?? "";
    $prefix_2 = $_POST['prefixInput_2'] ?? "";
    $other_2 = $_POST['otherPref_2'] ?? "";
    $prefixname_2 = checkPrefix($prefix_2, $other_2);
    $name_2 = $prefixname_2 . $fname_2 . '&nbsp;' . $lname_2;
    //lecturer 3
    $courseCode_3 = $_POST['courseCode_3'] ?? "";
    $courseTitle_3 = $_POST['courseTitle_3'] ?? "";
    $credit_3 = $_POST['credit_3'] ?? "";
    $money_3 = $_POST['money_3'] ?? "";
    $fname_3 = $_POST['fname_3'] ?? "";
    $lname_3 = $_POST['lname_3'] ?? "";
    $prefix_3 = $_POST['prefixInput_3'] ?? "";
    $other_3 = $_POST['otherPref_3'] ?? "";
    $prefixname_3 = checkPrefix($prefix_3, $other_3);
    $name_3 = $prefixname_3 . $fname_3 . '&nbsp;' . $lname_3;
    //lecturer 4
    $courseCode_4 = $_POST['courseCode_4'] ?? "";
    $courseTitle_4 = $_POST['courseTitle_4'] ?? "";
    $credit_4 = $_POST['credit_4'] ?? "";
    $money_4 = $_POST['money_4'] ?? "";
    $fname_4 = $_POST['fname_4'] ?? "";
    $lname_4 = $_POST['lname_4'] ?? "";
    $prefix_4 = $_POST['prefixInput_4'] ?? "";
    $other_4 = $_POST['otherPref_4'] ?? "";
    $prefixname_4 = checkPrefix($prefix_4, $other_4);
    $name_4 = $prefixname_4 . $fname_4 . '&nbsp;' . $lname_4;
    //lecturer 5
    $courseCode_5 = $_POST['courseCode_5'] ?? "";
    $courseTitle_5 = $_POST['courseTitle_5'] ?? "";
    $credit_5 = $_POST['credit_5'] ?? "";
    $money_5 = $_POST['money_5'] ?? "";
    $fname_5 = $_POST['fname_5'] ?? "";
    $lname_5 = $_POST['lname_5'] ?? "";
    $prefix_5 = $_POST['prefixInput_5'] ?? "";
    $other_5 = $_POST['otherPref_5'] ?? "";
    $prefixname_5 = checkPrefix($prefix_5, $other_5);
    $name_5 = $prefixname_5 . $fname_5 . '&nbsp;' . $lname_5;
    //
    $level = $_POST['LevelsInput'] ?? "";
    $type = $_POST['plan'] ?? "";
    $program = $_POST['program'] ?? "";
    $studentid = $_POST['studentid'] ?? "";
    $faculty = $_POST['faculty'] ?? "";
    $major = $_POST['major'] ?? "";
    $subject = $_POST['subject'] ?? "";
    $address = $_POST['textarea_address'] ?? "";
    $addWithDraw = $_POST['addWithDraw'] ?? "";
    $mobile = $_POST['mobile_phone'] ?? "";
    $IDcard = $_POST['cardID'] ?? "";
    $support = $_POST['support'] ?? "";
    $service = $_POST['service'] ?? "";
    $library = $_POST['library'] ?? "";
    $registration = $_POST['registration'] ?? "";
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
    //lecturer 1
    $showCourseCode_1 = '<div style="position:absolute; top:710px; left:88px; width:65px;  text-align:center; font-size:14px">' . $courseCode_1 . '</div>';
    $showCourseTitle_1 = '<div style="position:absolute; top:710px; left:153px; width:310px; text-align:center; font-size:16px">' . $courseTitle_1 . '</div>';
    $showName_1 = '<div style="position:absolute; top:710px; left:461px; width:130px; text-align:center; font-size:16px">' .  $name_1 . '</div>';
    $showCredit_1 = '<div style="position:absolute; top:710px; left:590px; width:65px; text-align:center; font-size:16px">' . $credit_1 . '</div>';
    $showMoney_1 = '<div style="position:absolute; top:710px; left:652px; width:104px; text-align:center; font-size:16px">' . $money_1 . '</div>';
    //lecturer 2
    $showCourseCode_2 = '<div style="position:absolute; top:734px; left:88px; width:65px;  text-align:center; font-size:14px">' . $courseCode_2 . '</div>';
    $showCourseTitle_2 = '<div style="position:absolute; top:734px; left:153px; width:310px; text-align:center; font-size:16px">' . $courseTitle_2 . '</div>';
    $showName_2 = '<div style="position:absolute; top:734px; left:461px; width:130px; text-align:center; font-size:16px">' .  $name_2 . '</div>';
    $showCredit_2 = '<div style="position:absolute; top:734px; left:590px; width:65px; text-align:center; font-size:16px">' . $credit_2 . '</div>';
    $showMoney_2 = '<div style="position:absolute; top:734px; left:652px; width:104px; text-align:center; font-size:16px">' . $money_2 . '</div>';
    //lecturer 3
    $showCourseCode_3 = '<div style="position:absolute; top:754px; left:88px; width:65px;  text-align:center; font-size:14px">' . $courseCode_3 . '</div>';
    $showCourseTitle_3 = '<div style="position:absolute; top:753px; left:153px; width:310px; text-align:center; font-size:16px">' . $courseTitle_3 . '</div>';
    $showName_3 = '<div style="position:absolute; top:753px; left:461px; width:130px; text-align:center; font-size:16px">' .  $name_3 . '</div>';
    $showCredit_3 = '<div style="position:absolute; top:753px; left:590px; width:65px; text-align:center; font-size:16px">' . $credit_3 . '</div>';
    $showMoney_3 = '<div style="position:absolute; top:753px; left:652px; width:104px; text-align:center; font-size:16px">' . $money_3 . '</div>';
    //lecturer 4
    $showCourseCode_4 = '<div style="position:absolute; top:776px; left:88px; width:65px;  text-align:center; font-size:14px">' . $courseCode_4 . '</div>';
    $showCourseTitle_4 = '<div style="position:absolute; top:775px; left:153px; width:310px; text-align:center; font-size:16px">' . $courseTitle_4 . '</div>';
    $showName_4 = '<div style="position:absolute; top:775px; left:461px; width:130px; text-align:center; font-size:16px">' .  $name_4 . '</div>';
    $showCredit_4 = '<div style="position:absolute; top:775px; left:590px; width:65px; text-align:center; font-size:16px">' . $credit_4 . '</div>';
    $showMoney_4 = '<div style="position:absolute; top:775px; left:652px; width:104px; text-align:center; font-size:16px">' . $money_4 . '</div>';
    //lecturer 5
    $showCourseCode_5 = '<div style="position:absolute; top:798px; left:88px; width:65px;  text-align:center; font-size:14px">' . $courseCode_5 . '</div>';
    $showCourseTitle_5 = '<div style="position:absolute; top:796px; left:153px; width:310px; text-align:center; font-size:16px">' . $courseTitle_5 . '</div>';
    $showName_5 = '<div style="position:absolute; top:796px; left:461px; width:130px; text-align:center; font-size:16px">' .  $name_5 . '</div>';
    $showCredit_5 = '<div style="position:absolute; top:796px; left:590px; width:65px; text-align:center; font-size:16px">' . $credit_5 . '</div>';
    $showMoney_5 = '<div style="position:absolute; top:796px; left:652px; width:104px; text-align:center; font-size:16px">' . $money_5 . '</div>';

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
    function Convert($amount_number)
    {
        $amount_number = number_format($amount_number, 2, ".", "");
        $pt = strpos($amount_number, ".");
        $number = $fraction = "";
        if ($pt === false)
            $number = $amount_number;
        else {
            $number = substr($amount_number, 0, $pt);
            $fraction = substr($amount_number, $pt + 1);
        }

        $ret = "";
        $baht = ReadNumber($number);
        if ($baht != "")
            $ret .= $baht . "บาท";

        $satang = ReadNumber($fraction);
        if ($satang != "")
            $ret .=  $satang . "สตางค์";
        else
            $ret .= "ถ้วน";
        return $ret;
    }

    function ReadNumber($number)
    {
        $position_call = array("แสน", "หมื่น", "พัน", "ร้อย", "สิบ", "");
        $number_call = array("", "หนึ่ง", "สอง", "สาม", "สี่", "ห้า", "หก", "เจ็ด", "แปด", "เก้า");
        $number = $number + 0;
        $ret = "";
        if ($number == 0) return $ret;
        if ($number > 1000000) {
            $ret .= ReadNumber(intval($number / 1000000)) . "ล้าน";
            $number = intval(fmod($number, 1000000));
        }

        $divider = 100000;
        $pos = 0;
        while ($number > 0) {
            $d = intval($number / $divider);
            $ret .= (($divider == 10) && ($d == 2)) ? "ยี่" : ((($divider == 10) && ($d == 1)) ? "" : ((($divider == 1) && ($d == 1) && ($ret != "")) ? "เอ็ด" : $number_call[$d]));
            $ret .= ($d ? $position_call[$pos] : "");
            $number = $number % $divider;
            $divider = $divider / 10;
            $pos++;
        }
        return $ret;
    }
    $pagecount = $mpdf->setSourceFile('pdf/registerForm2.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 18);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:190px; left:548px; width:20px; text-align:center; font-size:18px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:190px; left:577px; width:42px; text-align:center; font-size:18px">' . $mTxt[0] . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:190px; left:633px; width:60px; text-align:center; font-size:18px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:237px; left:251px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:237px; left:365px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:236px; left:520px; width:35px; text-align:center; font-size:18px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:237px; left:624px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:237px; left:690px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
    }
    // Check Prefix name
    if (mb_strlen($name, "UTF-8") > 45) {
        $size = 14;
        $top = 992; //+3
    } else if (mb_strlen($name, "UTF-8") > 35) {
        $size = 16;
        $top = 989; //+1
    } else {
        $size = 18;
        $top = 988;
    }
    $mpdf->WriteHTML('<div style="position:absolute; top:307px; left:283px; width:470px; text-align:center; font-size:18px">' .  $name . '</div>');
    $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top . "px; left:520px; width:180px; font-size:" . $size . "px; text-align: center;' >" . $name . "</div>");
    // Student ID
    $topStudentID = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($topStudentID, '356'); //398
        } else {
            array_push($topStudentID, '358'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[0]}px; left:167px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[1]}px; left:190px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[2]}px; left:213; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[3]}px; left:235; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[4]}px; left:260; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[5]}px; left:282px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[6]}px; left:305px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[7]}px; left:328px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[8]}px; left:350px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[9]}px; left:373px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[10]}px; left:397px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[11]}px; left:419px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$topStudentID[13]}px; left:453px; font-size:18px;'>" . $studentid[13] . "</div>");
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:405px; left:66px; width:190px; text-align:center; font-size:18px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:405px; left:350px; width:190px; text-align:center; font-size:18px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:405px; left:588px; width:150px; text-align:center; font-size:18px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:455px; left:100px; width:383px; font-size:18px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:455px; left:530px; width:170px; text-align:center; font-size:18px">' . $mobile . '</div>');
    //list
    $mpdf->WriteHTML('<div style="position:absolute; top:561px; left:652px; width:104px; text-align:center; font-size:16px">' . $IDcard . '</div>'); //+22
    $mpdf->WriteHTML('<div style="position:absolute; top:583px; left:652px; width:104px; text-align:center; font-size:16px">' . $support . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:605px; left:652px; width:104px; text-align:center; font-size:16px">' . $service . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:626px; left:652px; width:104px; text-align:center; font-size:16px">' . $library . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:648px; left:652px; width:104px; text-align:center; font-size:16px">' . $registration . '</div>');

    //
    if ($addWithDraw === '1') {
        $sumCourse = (int)$money_1;
        //lecturer 1
        $mpdf->WriteHTML($showCourseCode_1);
        $mpdf->WriteHTML($showCourseTitle_1);
        $mpdf->WriteHTML($showName_1);
        $mpdf->WriteHTML($showCredit_1);
        $mpdf->WriteHTML($showMoney_1);
    } else if ($addWithDraw == '2') {
        $sumCourse = (int)$money_1 + (int)$money_2;
        //lecturer 1
        $mpdf->WriteHTML($showCourseCode_1);
        $mpdf->WriteHTML($showCourseTitle_1);
        $mpdf->WriteHTML($showName_1);
        $mpdf->WriteHTML($showCredit_1);
        $mpdf->WriteHTML($showMoney_1);
        //lecturer 2
        $mpdf->WriteHTML($showCourseCode_2);
        $mpdf->WriteHTML($showCourseTitle_2);
        $mpdf->WriteHTML($showName_2);
        $mpdf->WriteHTML($showCredit_2);
        $mpdf->WriteHTML($showMoney_2);
    } else if ($addWithDraw == '3') {
        $sumCourse = (int)$money_1 + (int)$money_2 + (int)$money_3;
        //lecturer 1
        $mpdf->WriteHTML($showCourseCode_1);
        $mpdf->WriteHTML($showCourseTitle_1);
        $mpdf->WriteHTML($showName_1);
        $mpdf->WriteHTML($showCredit_1);
        $mpdf->WriteHTML($showMoney_1);
        //lecturer 2
        $mpdf->WriteHTML($showCourseCode_2);
        $mpdf->WriteHTML($showCourseTitle_2);
        $mpdf->WriteHTML($showName_2);
        $mpdf->WriteHTML($showCredit_2);
        $mpdf->WriteHTML($showMoney_2);
        //lecturer 3
        $mpdf->WriteHTML($showCourseCode_3);
        $mpdf->WriteHTML($showCourseTitle_3);
        $mpdf->WriteHTML($showName_3);
        $mpdf->WriteHTML($showCredit_3);
        $mpdf->WriteHTML($showMoney_3);
    } else if ($addWithDraw == '4') {
        $sumCourse = (int)$money_1 + (int)$money_2 + (int)$money_3 + (int)$money_4;
        //lecturer 1
        $mpdf->WriteHTML($showCourseCode_1);
        $mpdf->WriteHTML($showCourseTitle_1);
        $mpdf->WriteHTML($showName_1);
        $mpdf->WriteHTML($showCredit_1);
        $mpdf->WriteHTML($showMoney_1);
        //lecturer 2
        $mpdf->WriteHTML($showCourseCode_2);
        $mpdf->WriteHTML($showCourseTitle_2);
        $mpdf->WriteHTML($showName_2);
        $mpdf->WriteHTML($showCredit_2);
        $mpdf->WriteHTML($showMoney_2);
        //lecturer 3
        $mpdf->WriteHTML($showCourseCode_3);
        $mpdf->WriteHTML($showCourseTitle_3);
        $mpdf->WriteHTML($showName_3);
        $mpdf->WriteHTML($showCredit_3);
        $mpdf->WriteHTML($showMoney_3);
        //lecturer 4
        $mpdf->WriteHTML($showCourseCode_4);
        $mpdf->WriteHTML($showCourseTitle_4);
        $mpdf->WriteHTML($showName_4);
        $mpdf->WriteHTML($showCredit_4);
        $mpdf->WriteHTML($showMoney_4);
    } else if ($addWithDraw == '5') {
        $sumCourse = (int)$money_1 + (int)$money_2 + (int)$money_3 + (int)$money_4 + (int)$money_5;
        //lecturer 1
        $mpdf->WriteHTML($showCourseCode_1);
        $mpdf->WriteHTML($showCourseTitle_1);
        $mpdf->WriteHTML($showName_1);
        $mpdf->WriteHTML($showCredit_1);
        $mpdf->WriteHTML($showMoney_1);
        //lecturer 2
        $mpdf->WriteHTML($showCourseCode_2);
        $mpdf->WriteHTML($showCourseTitle_2);
        $mpdf->WriteHTML($showName_2);
        $mpdf->WriteHTML($showCredit_2);
        $mpdf->WriteHTML($showMoney_2);
        //lecturer 3
        $mpdf->WriteHTML($showCourseCode_3);
        $mpdf->WriteHTML($showCourseTitle_3);
        $mpdf->WriteHTML($showName_3);
        $mpdf->WriteHTML($showCredit_3);
        $mpdf->WriteHTML($showMoney_3);
        //lecturer 4
        $mpdf->WriteHTML($showCourseCode_4);
        $mpdf->WriteHTML($showCourseTitle_4);
        $mpdf->WriteHTML($showName_4);
        $mpdf->WriteHTML($showCredit_4);
        $mpdf->WriteHTML($showMoney_4);
        //lecturer 5
        $mpdf->WriteHTML($showCourseCode_5);
        $mpdf->WriteHTML($showCourseTitle_5);
        $mpdf->WriteHTML($showName_5);
        $mpdf->WriteHTML($showCredit_5);
        $mpdf->WriteHTML($showMoney_5);
    } else {
        $sumCourse = "";
    }
    $sum = (int)$IDcard + (int)$support + (int)$service + (int)$library + (int)$registration;
    $sumT = (int)$sumCourse + (int)$sum;
    $sumConvert = Convert($sumT);
    $sumTotal = (int)$sumT;
    $mpdf->WriteHTML('<div style="position:absolute; top:817px; left:652px; width:104px; height:65px; text-align:center; font-size:16px"><p>' . $sumTotal . '</p></div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:837px; left:165px; width:445px; text-align:center; font-size:16px">' . $sumConvert . '</div>');

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 18);

    $mpdf->Output('RegistrationForm.pdf');
    ?>
</body>

</html>