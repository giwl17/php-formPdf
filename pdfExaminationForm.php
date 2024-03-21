<?php
// use Mpdf\Mpdf;
require_once __DIR__ . '/vendor/autoload.php';
$defaultConfig = (new \Mpdf\Config\ConfigVariables())->getDefaults();
$fontDirs = $defaultConfig['fontDir'];

$defaultFontConfig = (new \Mpdf\Config\FontVariables())->getDefaults();
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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/QualifyingExaminationForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/QualifyingExaminationForm.pdf'" /> -->
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
        $other2 = $_POST['otherPref2'];
        $prefixname2 = checkPrefix($prefix2, $other2);
        $name2 = $prefixname2 . $fname2 . '&nbsp;' . $lname2;
        //
        $level = $_POST['LevelsInput'] ?? "";
        $type = $_POST['plan'] ?? "";
        $program = $_POST['program'] ?? "";
        $course = $_POST['course'] ?? "";
        $studentid = $_POST['studentid'] ?? "";
        $faculty = $_POST['faculty'] ?? "";
        $major = $_POST['major'] ?? "";
        $telephone = $_POST['telephone'] ?? "";
        //committee 1
        $prefix3 = $_POST['prefixInput3'] ?? "";
        $other3 = $_POST['otherPref3'] ?? "";
        $fname3 = $_POST['fname3'] ?? "";
        $lname3 = $_POST['lname3'] ?? "";
        $prefixname3 = checkPrefix($prefix3, $other3);
        $nameCommittee1 = $prefixname3 . $fname3 . '&nbsp;' . $lname3;
        //committee 2
        $prefix4 = $_POST['prefixInput4'] ?? "";
        $other4 = $_POST['otherPref4'] ?? "";
        $fname4 = $_POST['fname4'] ?? "";
        $lname4 = $_POST['lname4'] ?? "";
        $prefixname4 = checkPrefix($prefix4, $other4);
        $nameCommittee2 = $prefixname4 . $fname4 . '&nbsp;' . $lname4;
        //committee 3
        $prefix5 = $_POST['prefixInput5'] ?? "";
        $other5 = $_POST['otherPref5'] ?? "";
        $fname5 = $_POST['fname5'] ?? "";
        $lname5 = $_POST['lname5'] ?? "";
        $prefixname5 = checkPrefix($prefix5, $other5);
        $nameCommittee3 = $prefixname5 . $fname5 . '&nbsp;' . $lname5;
        //committee 4
        $prefix6 = $_POST['prefixInput6'] ?? "";
        $other6 = $_POST['otherPref6'] ?? "";
        $fname6 = $_POST['fname6'] ?? "";
        $lname6 = $_POST['lname6'] ?? "";
        $prefixCommittee4 = checkPrefix($prefix6, $other6);
        $nameCommittee4 = $prefixCommittee4 . $fname6 . '&nbsp;' . $lname6;
        //
        $place = $_POST['place'] ?? "";
        $building = $_POST['building'] ?? "";
        $faculty1 = $_POST['faculty1'] ?? "";
        //
        $date = date("Y-m-d");
        $dmy = date_create($date);
        $d = date_format($dmy, "d ");
        $m = date_format($dmy, "m ");
        $yea = date_format($dmy, "Y ");
        $y = (int)$yea + 543;
        $mTxt = checkMouth((int)$m);
        //
        $dateBook = $_POST['dateBook'] ?? "";
        $dateBookYears = $dateBook[0] . $dateBook[1] . $dateBook[2] . $dateBook[3];
        $dateBookYears = (int)$dateBookYears + 543;
        $dateBookMouth = $dateBook[5] . $dateBook[6];
        $dateBookMouth = checkMouth((int)$dateBookMouth);
        $dateBookDays = $dateBook[8] . $dateBook[9];
        $dateBookTime = $dateBook[11] . $dateBook[12] . $dateBook[13] . $dateBook[14] . $dateBook[15];
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

        $pagecount = $mpdf->SetSourceFile('pdf/ExaminationForm.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R', 18);
        //Date
        $mpdf->WriteHTML('<div style="position:absolute; top:169px; left:475px; width:260px; text-align:center; font-size:20px">' . (int)$d . '&nbsp;&nbsp;' . $mTxt . '&nbsp;&nbsp;' . $y . '</div>');
        //name
        if (mb_strlen($name, "UTF-8") > 40) {
            $sizePrefix = 14;
            $topPrefix = 703;
        } else if (mb_strlen($name, "UTF-8") > 30) {
            $sizePrefix = 16;
            $topPrefix = 700;
        } else {
            $sizePrefix = 18;
            $topPrefix = 699;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:192px; left:470px; width:268px; text-align:center; font-size:20px">' . $name . '</div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix . "px; left:428px; width:214px; font-size:" . $sizePrefix . "px; text-align: center;' >" . $name . "</div>");
        // Student ID
        $mpdf->WriteHTML('<div style="position:absolute; top:216px; left:230px; width:170px; text-align:center; font-size:20px">' . $studentid . '</div>');
        //
        $mpdf->WriteHTML('<div style="position:absolute; top:216px; left:500px; width:240px; text-align:center; font-size:20px">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:240px; left:225px; width:225px; text-align:center; font-size:20px">' . $major . '</div>');
        if ($telephone != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:240px; left:645px; width:100px; text-align:center; font-size:20px">' . $telephone . '</div>');
        }
        //Check Degree 
        if ($level == 'Master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:262px; left:240px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'Doctoral') {
            $mpdf->WriteHTML('<div style="position:absolute; top:262px; left:392px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($type == 'ก1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:286px; left:239px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == '1.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:286px; left:440px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == '1.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:286px; left:490px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == '2.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:286px; left:540px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == '2.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:286px; left:590px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        // Type
        if ($program == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:72px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($program == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:215px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //course
        if ($course == 'thai') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:425px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($course == 'international') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:625px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        //
        $mpdf->WriteHTML('<div style="position:absolute; top:408px; left:257px; width:50px; text-align:center; font-size:20px">' . $dateBookDays . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:408px; left:392px; width:85px; text-align:center; font-size:20px">' . $dateBookMouth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:408px; left:545px; width:50px; text-align:center; font-size:20px">' . $dateBookYears . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:408px; left:665px; width:70px; text-align:center; font-size:20px">' . $dateBookTime . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:220px; width:87px; text-align:center; font-size:20px">' . $place . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:402px; width:97px; text-align:center; font-size:20px">' . $building . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:432px; left:580px; width:160px; text-align:center; font-size:20px">' . $faculty1 . '</div>');

        if (mb_strlen($name1, "UTF-8") > 38) {
            $sizePrefix1 = 14;
            $topPrefix1 = 976;
        } else if (mb_strlen($name1, "UTF-8") > 30) {
            $sizePrefix1 = 16;
            $topPrefix1 = 972;
        } else {
            $sizePrefix1 = 18;
            $topPrefix1 = 971;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:601px; left:82px; width:370px; font-size:20px">' . $name1 . '</div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $topPrefix1 . "px; left:230px; width:170px; font-size:" . $sizePrefix1 . "px; text-align: center;' >" . $name1 . "</div>");
        //Chairman
        $mpdf->WriteHTML('<div style="position:absolute; top:481px; left:82px; width:370px; font-size:20px">' . $name2 . '</div>');
        //committee 1
        $mpdf->WriteHTML('<div style="position:absolute; top:505px; left:82px; width:370px; font-size:20px">' . $nameCommittee1 . '</div>');
        //committee 2
        $mpdf->WriteHTML('<div style="position:absolute; top:530px; left:82px; width:370px; font-size:20px">' . $nameCommittee2 . '</div>');
        //committee 3
        $mpdf->WriteHTML('<div style="position:absolute; top:554px; left:82px; width:370px; font-size:20px">' .  $nameCommittee3 . '</div>');
        //committee 4
        $mpdf->WriteHTML('<div style="position:absolute; top:578px; left:82px; width:370px; font-size:20px">' . $nameCommittee4 . '</div>');

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);
        $mpdf->SetFont('sarabun', 'R', 18);

        // Import the last page of the source PDF file
        $mpdf->Output('QualifyingExaminationForm.pdf');
        ?>
    </div>
</body>

</html>