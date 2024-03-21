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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/LeaveofAbsence.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/LeaveofAbsence.pdf'" /> -->
    <title>Leave of Absence/ Reinstatement of Student Status Request Form</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
</head>
<body>
<?php
    $fname = $_POST['fname'] ?? "";
    $lname = $_POST['lname'] ?? "";
    $prefix = $_POST['prefixInput'] ?? "";
    $other = $_POST['otherPref'] ?? "";
    $prefixname = checkPrefix($prefix, $other);
    $name = $prefixname . $fname . '&nbsp;' . $lname;

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
    $due = $_POST['due'] ?? "";
    $request = $_POST['request'] ?? "";
    $absence = $_POST['absence'] ?? "";
    $sm = $_POST['sm'] ?? "";
    $ay = $_POST['ay'] ?? "";
    $sm1 = $_POST['sm1'] ?? "";
    $ay1 = $_POST['ay1'] ?? "";

    $date = date("Y-m-d");
    $dmy = date_create($date);
    $d = date_format($dmy, "d ");
    $m = date_format($dmy, "m ");
    $yea = date_format($dmy, "Y ");
    $y = (int)$yea + 543;
    $mTxt = checkMouth($m);

    function checkMouth($val)
        {
            $mouth = '';
            if ($val == 1) {
                $mouth = 'ม.ค.';
            }
            if ($val == 2) {
                $mouth = 'ก.พ.';
            }
            if ($val == 3) {
                $mouth = 'มี.ค.';
            }
            if ($val == 4) {
                $mouth = 'เม.ย.';
            }
            if ($val == 5) {
                $mouth = 'พ.ค.';
            }
            if ($val == 6) {
                $mouth = 'มิ.ย.';
            }
            if ($val == 7) {
                $mouth = 'ก.ค.';
            }
            if ($val == 8) {
                $mouth = 'ส.ค.';
            }
            if ($val == 9) {
                $mouth = 'ก.ย.';
            }
            if ($val == 10) {
                $mouth = 'ต.ค.';
            }
            if ($val == 11) {
                $mouth = 'พ.ย.';
            }
            if ($val == 12) {
                $mouth = 'ธ.ค.';
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
    $pagecount = $mpdf->setSourceFile('pdf/registerForm6.pdf');
    $tplId1 = $mpdf->importPage(1);
    $tplId2 = $mpdf->importPage(2);

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId1);
    $mpdf->SetFont('sarabun', 'R', 18);
    //Date
    $mpdf->WriteHTML('<div style="position:absolute; top:207px; left:600px; width:30px; text-align:center; font-size:18px">' . (int)$d . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:207px; left:640px; width:42px; text-align:center; font-size:18px">' . $mTxt . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:207px; left:695px; width:40px; text-align:center; font-size:18px">' . $y . '</div>');
    //Check Degree
    if ($level == 'Master') {
        $mpdf->WriteHTML('<div style="position:absolute; top:255px; left:250px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    } else if ($level == 'Doctoral') {
        $mpdf->WriteHTML('<div style="position:absolute; top:255px; left:365px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    }
    // Type
    $mpdf->WriteHTML('<div style="position:absolute; top:255px; left:520px; width:43px; text-align:center; font-size:18px">' . $type . '</div>');
    if ($program == 'normal') {
        $mpdf->WriteHTML('<div style="position:absolute; top:255px; left:625px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    } else if ($program == 'special') {
        $mpdf->WriteHTML('<div style="position:absolute; top:255px; left:690px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    }
    //name
    if (mb_strlen($name, "UTF-8") > 40) {
        $sizePrefix = 14;
        $topPrefix = 1017;
    } else if (mb_strlen($name, "UTF-8") > 30) {
        $sizePrefix = 16;
        $topPrefix = 1014;
    } else {
        $sizePrefix = 18;
        $topPrefix = 1013; //699
    }
    if ($prefix == 'other') {
        $mpdf->WriteHTML('<div style="position:absolute; top:345px; left:280px; width:470px; text-align:center; font-size:18px">' . $name . '</div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:460px; width:182px; font-size:" . $sizePrefix . "px; text-align: center;' >"  . $name . "</div>");
    } else {
        $mpdf->WriteHTML('<div style="position:absolute; top:345px; left:280px; width:470px; text-align:center; font-size:18px">' . $name . '</div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:460px; width:182px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name . "</div>");
    }
    // Student ID
    $top = array();
    for ($i = 0; $i <= 13; $i++) {
        if ($studentid[$i] == '0') {
            array_push($top, '392'); //398
        } else {
            array_push($top, '395'); //401
        }
    }
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:240px; font-size:18px;'>" . $studentid[0] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[1]}px; left:265px; font-size:18px;'>" . $studentid[1] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:287px; font-size:18px;'>" . $studentid[2] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:310px; font-size:18px;'>" . $studentid[3] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:333px; font-size:18px;'>" . $studentid[4] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:356px; font-size:18px;'>" . $studentid[5] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[6]}px; left:378px; font-size:18px;'>" . $studentid[6] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:402px; font-size:18px;'>" . $studentid[7] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:425px; font-size:18px;'>" . $studentid[8] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:447px; font-size:18px;'>" . $studentid[9] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:470px; font-size:18px;'>" . $studentid[10] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:492px; font-size:18px;'>" . $studentid[11] . "</div>");
    $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:525px; font-size:18px;'>" . $studentid[13] . "</div>");
    //
    $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:67px; width:170px; text-align:center; font-size:18px">' . $faculty . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:335px; width:170px; text-align:center; font-size:18px">' . $major . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:560px; width:190px; text-align:center; font-size:18px">' . $subject . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:481px; left:100px; width:650px; font-size:18px">' . '&nbsp;' . $address . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:525px; left:82px; width:188px; text-align:center; font-size:18px">' . $telephone . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:525px; left:352px; width:140px; text-align:center; font-size:18px">' . $mobile . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:608px; left:640px; width:18px; text-align:center; font-size:18px">' . $semester . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:608px; left:720px; width:35px; text-align:center; font-size:18px">' . $academicYear . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:656px; width:700px; font-size:18px; line-height: 130%;">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            . $due . '</div>');
    //request
    if ($request == '1') {
        $mpdf->WriteHTML('<div style="position:absolute; top:608px; left:198px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    } else if ($request == '2') {
        $mpdf->WriteHTML('<div style="position:absolute; top:608px; left:325px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
    }
    $mpdf->WriteHTML('<div style="position:absolute; top:753px; left:290px; width:85px; text-align:center; font-size:18px">' . $absence . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:803px; left:253px; width:50px; text-align:center; font-size:18px">' . $sm . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:803px; left:365px; width:50px; text-align:center; font-size:18px">' . $ay . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:852px; left:253px; width:50px; text-align:center; font-size:18px">' . $sm1 . '</div>');
    $mpdf->WriteHTML('<div style="position:absolute; top:852px; left:365px; width:50px; text-align:center; font-size:18px">' . $ay1 . '</div>');

    $mpdf->AddPage();
    $mpdf->UseTemplate($tplId2);
    $mpdf->SetFont('sarabun', 'R', 18);

    $mpdf->Output('LeaveofAbsence.pdf');
    ?>
</body>
</html>