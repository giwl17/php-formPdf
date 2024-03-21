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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestForm.pdf'" />
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/EXform/RequestForm.pdf'" /> -->
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link rel="stylesheet" href="css/css2.css" rel="stylesheet">
</head>

<body>
    <div class="center">
        <?php
        $style = '<style>p{margin-left: auto; margin-right: auto; text-align:center;}</style>';
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
        $fname2 = $_POST['fname2'] ?? "";
        $lname2 = $_POST['lname2'] ?? "";
        $prefix2 = $_POST['prefixInput2'] ?? "";
        $other2 = $_POST['otherPref2'] ?? "";
        $prefixname2 = checkPrefix($prefix2, $other2);
        $name2 = $prefixname2 . $fname2 . '&nbsp;' . $lname2;
        //
        $prefix3 = $_POST['prefixC0'] ?? "";
        $other3 = $_POST['otherPrefixC0'] ?? "";
        $fname3 = $_POST['fname3'] ?? "";
        $lname3 = $_POST['lname3'] ?? "";
        $prefixname3 = checkPrefix($prefix3, $other3);
        $name3 = $prefixname3 . $fname3 . '&nbsp;' . $lname3;
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
        $qualification = $_POST['qualification'] ?? "";
        $qualification1 = $_POST['qualification1'] ?? "";
        $burden = $_POST['burden'] ?? "";
        $burden1 = $_POST['burden1'] ?? "";
        //
        $date = date("Y-m-d");
        $dmy = date_create($date);
        $d = date_format($dmy, "d ");
        $m = date_format($dmy, "m ");
        $yea = date_format($dmy, "Y ");
        $y = (int)$yea + 543;
        $mTxt = checkMouth((int)$m);
        //
        $by1 = $_POST['by'] ?? null;
        $credit = $_POST['credit'];
        $by2 = $_POST['by2'] ?? null;
        $credit2 = $_POST['credit2'] ?? null;
        $by3 = $_POST['by3'] ?? null;
        $grade = $_POST['grade'] ?? null;
        $by4 = $_POST['by4'] ?? null;
        $by5 = $_POST['by5'] ?? null;
        $ad1 = $_POST['ad1'] ?? null;
        $ad2 = $_POST['ad2'] ?? null;
        $ad3 = $_POST['ad3'] ?? null;

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

        $pagecount = $mpdf->SetSourceFile('pdf/01.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $tplId3 = $mpdf->ImportPage(3);
        $tplId4 = $mpdf->ImportPage(4);
        $tplId5 = $mpdf->ImportPage(5);

        //<p> &#10003;</p>
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);
        $mpdf->SetFont('sarabun', 'R', 18);
        // Date
        $mpdf->WriteHTML('<div style="position:absolute; top:198px; left:571px; width:18px; text-align:center; font-size:20px">' . (int)$d . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:198px; left:600px; width:40px; text-align:center; font-size:20px">' . $mTxt . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:198px; left:654px; width:60px; text-align:center; font-size:20px">' . $y . '</div>');
        //Check Degree
        if ($level == 'Master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:246px; left:250px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'Doctoral') {
            $mpdf->WriteHTML('<div style="position:absolute; top:246px; left:367px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        // Type
        $mpdf->WriteHTML('<div style="position:absolute; top:244px; left:520px; width: 35px; text-align:center; font-size:20px">' . $type . '</div>');
        if ($program == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:246px; left:624px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($program == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:246px; left:690px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        // Check Prefix name
        if (mb_strlen($name, "UTF-8") > 45) {
            $size = 14;
            $top = 1034;
        } else if (mb_strlen($name, "UTF-8") > 35) {
            $size = 16;
            $top = 1031;
        } else {
            $size = 18;
            $top = 1030;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:321px; left:320px; width:425px; text-align:center; font-size:20px">' .  $name . '</div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top . "px; left:473px; width:220px; font-size:" . $size . "px; text-align: center;' >" . $name . "</div>");
        // Student ID
        $top = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($top, '392');
            } else {
                array_push($top, '395');
            }
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[0]}px; left:262px; font-size:20px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[1]}px; left:290px; font-size:20px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[2]}px; left:318px; font-size:20px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[3]}px; left:346px; font-size:20px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[4]}px; left:374px; font-size:20px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[5]}px; left:402px; font-size:20px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[6]}px; left:430px; font-size:20px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[7]}px; left:458px; font-size:20px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[8]}px; left:486px; font-size:20px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[9]}px; left:514px; font-size:20px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[10]}px; left:542px; font-size:20px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[11]}px; left:570px; font-size:20px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$top[13]}px; left:615px; font-size:20px;'>" . $studentid[13] . "</div>");
        //
        $mpdf->WriteHTML('<div style="position:absolute; top:448px; left:73px;  width:213px; text-align:center; font-size:20px">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:448px; left:395; width:158px; text-align:center; font-size:20px">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:448px; left:618; width:125px; text-align:center; font-size:20px">' . $subject . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:503px; left:110px; width:640px; font-size:20px">' . '&nbsp;' . $address . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:553px; left:90px; width:215px; text-align:center; font-size:20px">' . $telephone . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:553px; left:395px; width:180px; text-align:center; font-size:20px">' . $mobile . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:660px; width:700px; font-size:20px">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            . $titleTH . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:717px; width:700px; font-size:20px">' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'
            . $titleEN . '</div>');

        if ($by1 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:773px; left:105px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            if ($language == "en") {
                $mpdf->WriteHTML('<div style="position:absolute; top:791px; left:510px; width:70px; text-align:center; font-size:20px">' . $credit . '</div>');
            } else {
                $mpdf->WriteHTML('<div style="position:absolute; top:771px; left:510px; width:70px; text-align:center; font-size:20px">' . $credit . '</div>');
            }
        }
        if ($by2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:814px; left:106px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            if ($language == "en") {
                $mpdf->WriteHTML('<div style="position:absolute; top:832px; left:512apx; width:70px; text-align:center; font-size:20px">' . $credit2 . '</div>');
            } else {
                $mpdf->WriteHTML('<div style="position:absolute; top:812px; left:512apx; width:70px; text-align:center; font-size:20px">' . $credit2 . '</div>');
            }
        }
        if ($by3 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:853px; left:106px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
            if ($language == 'en') {
                $mpdf->WriteHTML('<div style="position:absolute; top:872px; left:230px; width:65px; text-align:center; font-size:20px">' . $grade . '</div>');
            } else {
                $mpdf->WriteHTML('<div style="position:absolute; top:852px; left:287px; width:59px; text-align:center; font-size:20px">' . $grade . '</div>');
            }
        }
        if ($by4 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:893px; left:106px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($by5 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:933px; left:106px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);
        $mpdf->SetFont('sarabun', 'R', 18);
        if ($ad1 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:66px; left:194px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($ad2 != "") {
            $mpdf->WriteHTML('<div style="position:absolute; top:66px; left:318px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }
        // Name1
        if (mb_strlen($name1, "UTF-8") > 38) {
            $size1 = 14;
            $top1 = 518;
        } else if (mb_strlen($name1, "UTF-8") > 30) {
            $size1 = 16;
            $top1 = 515;
        } else {
            $size1 = 18;
            $top1 = 514;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:260px; left:180px; width:187px; height:60px; text-align:center; font-size:20px"><p>' . $name1 . '</p></div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top1 . "px; left:290px; width:166px; font-size:" . $size1 . "px; text-align: center;' >" . $name1 . "</div>");
        $mpdf->WriteHTML('<div style="position:absolute; top:260px; left:368px; width:227px; height:60px; text-align:center; font-size:20px"><p>'  . $qualification . '</p></div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:260px; left:597px; width:167px; height:60px; text-align:center; font-size:20px"><p>' . $burden . '</p></div>');
        //name2
        if (mb_strlen($name2, "UTF-8") > 38) {
            $size2 = 14;
            $top2 = 630;
        } else if (mb_strlen($name2, "UTF-8") > 30) {
            $size2 = 16;
            $top2 = 627;
        } else {
            $size2 = 18;
            $top2 = 626;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:320px; left:180px; width:187px; height:85px; text-align:center; font-size:20px"><p>' . $name2 . '</p></div>');
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top2 . "px; left:290px; width:166px; font-size:" . $size2 . "px; text-align: center;' >" . $name2 . "</div>");
        $mpdf->WriteHTML('<div style="position:absolute; top:320px; left:368px; width:227px; height:85px; text-align:center; font-size:20px"><p>'  . $qualification1 . '</p></div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:320px; left:597px; width:167px; height:85px; text-align:center; font-size:20px"><p>' . $burden1 . '</p></div>');

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId3);
        $mpdf->SetFont('sarabun', 'R', 18);

        if (mb_strlen($name3, "UTF-8") > 38) {
            $size3 = 14;
            $top3 = 124;
        } else if (mb_strlen($name3, "UTF-8") > 30) {
            $size3 = 16;
            $top3 = 121;
        } else {
            $size3 = 18;
            $top3 = 120;
        }
        $mpdf->WriteHTML("<div  style='position:absolute; top:" . $top3 . "px; left:290px; width:166px; font-size:" . $size3 . "px; text-align: center;' >" . $name3 . "</div>");

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId4);

        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId5);
        // Output PDF to browser or file
        $mpdf->Output('RequestForm.pdf');
        ?>
    </div>
</body>

</html>