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

//$mpdf = new \Mpdf\Mpdf();
//ob_start() //เริ่มต้นเก็บข้อมูลในหน่วยความจำ
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/TurnitinApprovalForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/TurnitinApprovalForm.pdf'" /> -->
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
</head>

<body>
    <div class="center">
        <?php
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
        $fname2 = $_POST['fname2'] ?? "";
        $lname2 = $_POST['lname2'] ?? "";
        $prefix2 = $_POST['prefixInput2'] ?? "";
        $other2 = $_POST['otherPref2'] ?? "";
        $prefixname2 = checkPrefix($prefix2, $other2);
        $name2 = $prefixname2 . $fname2 . '&nbsp;' . $lname2;
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
        $titleTH = $_POST['titleTH'] ?? "";
        $titleEN = $_POST['titleEN'] ?? "";
        $percentage = $_POST['percentage'] ?? "";
        $language = $_POST['language'] ?? "";
        //        
        $prefix3 = $_POST['prefixC0'] ?? "";
        $other3 = $_POST['otherPrefixC0'] ?? "";
        $fname3 = $_POST['fname3'] ?? "";
        $lname3 = $_POST['lname3'] ?? "";
        $prefixname3 = checkPrefix($prefix3, $other3);
        $name3 = $prefixname3 . $fname3 . '&nbsp;' . $lname3;
        //
        $date = date("Y-m-d");
        $dmy = date_create($date);
        $d = date_format($dmy, "d ");
        $m = date_format($dmy, "m ");
        $yea = date_format($dmy, "Y ");
        $y = (int)$yea + 543;
        $mTxt = checkMouth((int)$m);
        //

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

        $pagecount = $mpdf->setSourceFile('pdf/10.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R', 18);
        //Date
        $mpdf->WriteHTML('<div style="position:absolute; top:226px; left:604px; width:18px; text-align:center; font-size:18px">' . (int)$d . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:226px; left:640px; width:42px; text-align:center; font-size:18px">' . $mTxt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:226px; left:695px; width:40px; text-align:center; font-size:18px">' . $y . '</div>');
        //Check Degree
        if ($level == 'Master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:278px; left:133px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'Doctoral') {
            $mpdf->WriteHTML('<div style="position:absolute; top:278px; left:233px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        // Type
        $mpdf->WriteHTML('<div style="position:absolute; top:275px; left:383px; width:35px; text-align:center; font-size:18px">' . $type . '</div>');
        if ($program == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:278px; left:455px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        } else if ($program == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:278px; left:545px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        //name
        if ($prefix == 'other') {
            $mpdf->WriteHTML('<div style="position:absolute; top:349px; left:295px; width:405px; text-align:center; font-size:18px">' . $name . '</div>');
        } else {
            $mpdf->WriteHTML('<div style="position:absolute; top:349px; left:295px; width:405px; text-align:center; font-size:18px">' . $name . '</div>');
        }
        // Student ID
        $top = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($top, '398');
            } else {
                array_push($top, '401');
            }
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:238px; font-size:18px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[1]}px; left:263px; font-size:18px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:285px; font-size:18px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:308px; font-size:18px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:330px; font-size:18px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:353px; font-size:18px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[6]}px; left:375px; font-size:18px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:398px; font-size:18px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:422px; font-size:18px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:445px; font-size:18px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:468px; font-size:18px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:490px; font-size:18px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:525px; font-size:18px;'>" . $studentid[13] . "</div>");
        //
        $mpdf->WriteHTML('<div style="position:absolute; top:436px; left:73px; width:190px; text-align:center; font-size:18px">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:436px; left:360px; width:175px; text-align:center; font-size:18px">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:436px; left:590px; width:125px; text-align:center; font-size:18px">' . $subject . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:485px; left:110px; width:640px; font-size:18px">' . '&nbsp;' . $address . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:534px; left:95px; width:190px; text-align:center; font-size:18px">' . $telephone . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:534px; left:360px; width:170px; text-align:center; font-size:18px">' . $mobile . '</div>');

        //Title
        $mpdf->WriteHTML('<div style="position:absolute; top:734px; left:148px; width:560px; font-size:18px">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            . $titleTH . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:783px; left:148px; width:560px; font-size:18px">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            . $titleEN . '</div>');

        //
        if ($prefix1 == 'other') {
            $mpdf->WriteHTML('<div style="position:absolute; top:855px; left:255px; width:450px; text-align:center; font-size:18px">' . $name1 . '</div>');
        } else {
            $mpdf->WriteHTML('<div style="position:absolute; top:855px; left:255px; width:450px; text-align:center; font-size:18px">' . $name1 . '</div>');
        }

        if ($prefix2 == 'other') {
            $mpdf->WriteHTML('<div style="position:absolute; top:880px; left:307px; width:400px; text-align:center; font-size:18px">' . $name2 . '</div>');
        } else {
            $mpdf->WriteHTML('<div style="position:absolute; top:880px; left:307px; width:400px; text-align:center; font-size:18px">' . $name2 . '</div>');
        }
        //
        if ($language == 'en') {
            $mpdf->WriteHTML('<div style="position:absolute; top:955px; left:260px; width:65px; text-align:center; font-size:18px">' . $percentage . '</div>');
        } else if ($language == 'th') {
            $mpdf->WriteHTML('<div style="position:absolute; top:930px; left:208px; width:120px; text-align:center; font-size:18px">' . $percentage . '</div>');
        }
        //background:red;
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);
        $mpdf->SetFont('sarabun', 'R', 18);
        //
        if (mb_strlen($name, "UTF-8") > 40) {
            $size = 14;
            $top = 122;
        } else if (mb_strlen($name, "UTF-8") > 30) {
            $size = 16;
            $top = 119;
        } else {
            $size = 18;
            $top = 118;
        }
        if ($prefix == 'other') {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top . "px; left:167px; width:190px; font-size:" . $size . "px; text-align: center;' >" .  $name . "</div>");
        } else {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top . "px; left:167px; width:190px; font-size:" . $size . "px; text-align: center;' >" . $name . "</div>");
        }
        //
        if (mb_strlen($name1, "UTF-8") > 40) {
            $size1 = 14;
            $top1 = 268;
        } else if (mb_strlen($name1, "UTF-8") > 30) {
            $size1 = 16;
            $top1 = 265;
        } else {
            $size1 = 18;
            $top1 = 264;
        }
        if ($prefix1 == 'other') {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top1 . "px; left:167px; width:190px; font-size:" . $size1 . "px; text-align: center;' >" . $name1 . "</div>");
        } else {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top1 . "px; left:167px; width:190px; font-size:" . $size1 . "px; text-align: center;' >" .  $name1 . "</div>");
        }
        //
        if (mb_strlen($name3, "UTF-8") > 40) {
            $size3 = 14;
            $top3 = 345;
        } else if (mb_strlen($name3, "UTF-8") > 30) {
            $size3 = 16;
            $top3 = 342;
        } else {
            $size3 = 18;
            $top3 = 337;
        }
        if ($prefix3 == 'other') {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top3 . "px; left:167px; width:190px; font-size:" . $size3 . "px; text-align: center;' >" . $name3 . "</div>");
        } else {
            $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top3 . "px; left:167px; width:190px; font-size:" . $size3 . "px; text-align: center;' >" . $name3 . "</div>");
        }

        // Import the last page of the source PDF file
        $mpdf->Output('TurnitinApprovalForm.pdf');
        ?>
    </div>
</body>

</html>