<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestForChangeOfAdvisorForm.pdf'" />
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <div class="center">
        <?php
        function checkMonth($data)
        {
            if ($data == '01') {
                return 'มกราคม';
            }
            if ($data == '02') {
                return 'กุมภาพันธ์';
            }
            if ($data == '03') {
                return 'มีนาคม';
            }
            if ($data == '04') {
                return 'เมษายน';
            }
            if ($data == '05') {
                return 'พฤษภาคม';
            }
            if ($data == '06') {
                return 'มิถุนายน';
            }
            if ($data == '07') {
                return 'กรกฎาคม';
            }
            if ($data == '08') {
                return 'สิงหาคม';
            }
            if ($data == '09') {
                return 'กันยายน';
            }
            if ($data == '10') {
                return 'ตุลาคม';
            }
            if ($data == '11') {
                return 'พฤศจิกายน';
            }
            if ($data == '12') {
                return 'ธันวาคม';
            }
        }

        function checkMonthShort($data)
        {
            if ($data == '01') {
                return 'ม.ค.';
            }
            if ($data == '02') {
                return 'ก.พ.';
            }
            if ($data == '03') {
                return 'มี.ค.';
            }
            if ($data == '04') {
                return 'เม.ย.';
            }
            if ($data == '05') {
                return 'พ.ค.';
            }
            if ($data == '06') {
                return 'มิ.ย.';
            }
            if ($data == '07') {
                return 'ก.ค.';
            }
            if ($data == '08') {
                return 'ส.ค.';
            }
            if ($data == '09') {
                return 'ก.ย.';
            }
            if ($data == '10') {
                return 'ต.ค.';
            }
            if ($data == '11') {
                return 'พ.ย.';
            }
            if ($data == '12') {
                return 'ธ.ค.';
            }
        }

        function checkPrefix($prefix, $other)
        {
            if ($prefix != '') {
                if ($prefix == 'other') {
                    return $other;
                } else {
                    return $prefix;
                }
            } else {
                return '';
            }
        }

        function plus(int $number)
        {
            if ($number == 0) {
                $plus = 3;
            } else {
                $plus = 0;
            }
            return $plus;
        }

        date_default_timezone_set('asia/bangkok');
        $currentDate = date("Y-m-d");
        $dateCreate = date_create($currentDate);
        $currentDay = date_format($dateCreate, " d");
        $currentMonth = date_format($dateCreate, " m");
        $currentYears = date_format($dateCreate, "Y ");
        $currentYears = (int)$currentYears + 543; 

        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $level = $_POST['LevelsInput'];
        $type = $_POST['inputState'];
        $studentid = $_POST['studentid'];
        $faculty = $_POST['faculty'];
        $major = $_POST['major'];
        $field = $_POST['field'];

        $plantype = $_POST['plan'] ?? '';

        //รายชื่ออาจารย์ที่ปรึกษาเดิม (Current Advisor Name)
        $prefixInputCurAd1 = $_POST['prefixInputCurAd1'];
        $otherPrefixCurAd1 = $_POST['otherPrefixCurAd1'] ?? '';
        $fnameCurAd1 = $_POST['fnameCurAd1'];
        $lnameCurAd1 = $_POST['lnameCurAd1'];
        $prefixInputCurAd2 = $_POST['prefixInputCurAd2'] ?? '';
        $otherPrefixCurAd2 = $_POST['otherPrefixCurAd2'] ?? '';
        $fnameCurAd2 = $_POST['fnameCurAd2'] ?? '';
        $lnameCurAd2 = $_POST['lnameCurAd2'] ?? '';

        //รายชื่ออาจารย์ที่ปรึกษใหม่ (New Advisor Name)
        $prefixInputNewAd1 = $_POST['prefixInputNewAd1'];
        $otherPrefixNewAd1 = $_POST['otherPrefixNewAd1'] ?? '';
        $fnameNewAd1 = $_POST['fnameNewAd1'];
        $lnameNewAd1 = $_POST['lnameNewAd1'];
        $prefixInputNewAd2 = $_POST['prefixInputNewAd2'];
        $otherPrefixNewAd2 = $_POST['otherPrefixNewAd2'] ?? '';
        $fnameNewAd2 = $_POST['fnameNewAd2'] ?? '';
        $lnameNewAd2 = $_POST['lnameNewAd2'] ?? '';

        //รายชื่อผู้ที่เกี่ยวข้อง 
        //ประธานกรรมการบริหารหลักสูตร
        $prefixCurriculum = $_POST['prefixCurriculum'] ?? '';
        $otherPrefixCurriculum = $_POST['otherPrefixCurriculum'] ?? '';
        $fnameCurriculum = $_POST['fnameCurriculum'] ?? '';
        $lnameCurriculum = $_POST['lnameCurriculum'] ?? '';
        //ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ
        $prefixGraduate = $_POST['prefixGraduate'] ?? '';
        $otherPrefixGraduate = $_POST['otherPrefixGraduate'] ?? '';
        $fnameGraduate = $_POST['fnameGraduate'] ?? '';
        $lnameGraduate = $_POST['lnameGraduate'] ?? '';


        //ข้อมูลติดต่อ
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];

        $name = $fname . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lname;
        $nameCurAd1 = $fnameCurAd1 . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameCurAd1;
        $nameCurAd2 = $fnameCurAd2 . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameCurAd2;
        $nameNewAd1 = $fnameNewAd1 . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameNewAd1;
        $nameNewAd2 = $fnameNewAd2 . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameNewAd2;

        $curAd1Degree = $_POST['curAd1Degree'];
        $curAd1Program = $_POST['curAd1Program'];
        $curAd1Faculty = $_POST['curAd1Faculty'];
        $curAd1Department = $_POST['curAd1Department'];
        $curAd2Degree = $_POST['curAd2Degree'];
        $curAd2Program = $_POST['curAd2Program'];
        $curAd2Faculty = $_POST['curAd2Faculty'];
        $curAd2Department = $_POST['curAd2Department'];

        $newAd1Degree = $_POST['newAd1Degree'];
        $newAd1Program = $_POST['newAd1Program'];
        $newAd1Faculty = $_POST['newAd1Faculty'];
        $newAd1Department = $_POST['newAd1Department'];
        $newAd2Degree = $_POST['newAd2Degree'];
        $newAd2Program = $_POST['newAd2Program'];
        $newAd2Faculty = $_POST['newAd2Faculty'];
        $newAd2Department = $_POST['newAd2Department'];

        $pagecount = $mpdf->SetSourceFile('pdf/pdfForm07.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $tplId3 = $mpdf->ImportPage(3);
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R', 18);

        //current date
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:587px; font-size:18px; width:50px;">' . (int)$currentDay . '</div>');
        $txtCurrentMonth = checkMonthShort($currentMonth);
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:610px; font-size:18px; width:50px; text-align:center;">' . $txtCurrentMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:680px; font-size:18px; width:50px">' . $currentYears . '</div>');

        //Check Degree
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:253px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:368px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'graduate') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:132px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:627px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:692px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        //plan type $plantype
        $mpdf->WriteHTML('<div style="position:absolute; top: 273px; left:525px; font-size:18px; width:50px">' . $plantype . '</div>');

        //Check Prefix name
        if ($prefixCurriculum == 'other') {
            $fullnameCurriculum = $otherPrefixCurriculum . $fnameCurriculum . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameCurriculum;
        } else {
            $fullnameCurriculum = $prefixCurriculum . $fnameCurriculum . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameCurriculum;
        }

        if ($prefixGraduate == 'other') {
            $fullnameGraduate = $otherPrefixGraduate . $fnameGraduate . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameGraduate;
        } else {
            $fullnameGraduate = $prefixGraduate . $fnameGraduate . "&nbsp;&nbsp;&nbsp;&nbsp;" . $lnameGraduate;
        }

        if ($prefixInputCurAd1 == 'other') {
            $fullnameCurAd1 = $otherPrefixCurAd1 . $nameCurAd1;
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:110px; font-size:18px">' . $fullnameCurAd1 . '</div>');
        } else {
            $fullnameCurAd1 = $prefixInputCurAd1 . $nameCurAd1;
            $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:110px; font-size:18px">' . $fullnameCurAd1 . '</div>');
        }

        if ($prefixInputCurAd2 == 'other') {
            $fullnameCurAd2 = $otherPrefixCurAd2 . $nameCurAd2;
            $mpdf->WriteHTML('<div style="position:absolute; top:749px; left:110px; font-size:18px">' . $fullnameCurAd2 . '</div>');
        } else {
            $fullnameCurAd2 = $prefixInputCurAd2 . $nameCurAd2;
            $mpdf->WriteHTML('<div style="position:absolute; top:749px; left:110px; font-size:18px">' . $fullnameCurAd2 . '</div>');
        }

        if ($prefixInputNewAd1 == 'other') {
            $fullnameNewAd1 = $otherPrefixNewAd1 . $nameNewAd1;
            $mpdf->WriteHTML('<div style="position:absolute; top:896px; left:110px; font-size:18px">' . $fullnameNewAd1 . '</div>');
        } else {
            $fullnameNewAd1 = $prefixInputNewAd1 . $nameNewAd1;
            $mpdf->WriteHTML('<div style="position:absolute; top:896px; left:110px; font-size:18px">' . $fullnameNewAd1 . '</div>');
        }

        if ($prefixInputNewAd2 == 'other') {
            $fullnameNewAd2 = $otherPrefixNewAd2 . $nameNewAd2;
            $mpdf->WriteHTML('<div style="position:absolute; top:969px; left:110px; font-size:18px">' . $fullnameNewAd2 . '</div>');
        } else {
            $fullnameNewAd2 = $prefixInputNewAd2 . $nameNewAd2;
            $mpdf->WriteHTML('<div style="position:absolute; top:969px; left:110px; font-size:18px">' . $fullnameNewAd2 . '</div>');
        }

        if ($prefix == 'other') {
            $fullname = $otherPrefixCurAd1 . $name;
            $mpdf->WriteHTML('<div style="position:absolute; top:344px; left:315px; font-size:18px">' . $fullname . '</div>');
        } else {
            $fullname = $prefix . $name;
            $mpdf->WriteHTML('<div style="position:absolute; top:344px; left:315px; font-size:18px">' . $fullname . '</div>');
        }

        // Student ID
        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '391');
            } else {
                array_push($topStu, '394');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:228px; font-size:20px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:251px; font-size:20px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:274px; font-size:20px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:298px; font-size:20px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:321px; font-size:20px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:343px; font-size:20px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:366px; font-size:20px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:390px; font-size:20px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:414px; font-size:20px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:433px; font-size:20px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:457px; font-size:20px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:480px; font-size:20px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:514px; font-size:20px;'>" . $studentid[13] . "</div>");

        $mpdf->WriteHTML('<div style="position:absolute; top:431px; left:80; font-size:18px; width:170px;">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:431px; left:360; font-size:18px; width:160px;">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:431px; left:590; font-size:18px; width:160px;">' . $field . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:480px; left:120; font-size:18px; width:625px;">' . $address . '</div>');

        if ($telephone != '') {
            $mpdf->WriteHTML('<div style="position:absolute; top:527px; left:100; font-size:18px">' . $telephone . '</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:527px; left:380; font-size:18px">' . $mobile . '</div>');



        $mpdf->WriteHTML('<div style="position:absolute; top:675px; left:470px; font-size:18px; width:280px;">' . $curAd1Degree . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:699px; left:200px; font-size:18px; width:280px;">' . $curAd1Program . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:699px; left:465px; font-size:18px; width:280px;">' . $curAd1Faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:724px; left:220px; font-size:18px; width:280px;">' . $curAd1Department . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:749px; left:470px; font-size:18px; width:280px;">' . $curAd2Degree  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:773px; left:200px; font-size:18px; width:280px;">' . $curAd2Program  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:773px; left:465px; font-size:18px; width:280px;">' . $curAd2Faculty  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:798px; left:220px; font-size:18px; width:280px;">' . $curAd2Department . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:896px; left:470px; font-size:18px; width:280px;">' . $newAd1Degree . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:920px; left:200px; font-size:18px; width:280px;">' . $newAd1Program . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:920px; left:465px; font-size:18px; width:280px;">' . $newAd1Faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:945px; left:220px; font-size:18px; width:280px;">' . $newAd1Department . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:969px; left:470px; font-size:18px; width:280px;">' . $newAd2Degree  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:993px; left:200px; font-size:18px; width:280px;">' . $newAd2Program  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:993px; left:465px; font-size:18px; width:280px;">' . $newAd2Faculty  . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:1018px; left:220px; font-size:18px; width:280px;">' . $newAd2Department . '</div>');


        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);

        if (strlen($fullname) > 57) {
            $size = 14;
            $top = 88;
        } else if (strlen($fullname) > 54) {
            $size = 16;
            $top = 84;
        } else {
            $size = 18;
            $top = 84;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:472px; font-size:' . $size . 'px; width:185px; text-align:center;">' . $fullname . '</div>');

        if (strlen($fullnameCurAd1) > 56) {
            $size = 14;
            $top = 234;
        } else if (strlen($fullnameCurAd1) > 52) {
            $size = 16;
            $top = 232;
        } else {
            $size = 18;
            $top = 230;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:168px; font-size:' . $size . 'px; width:185px; text-align:center;">' . $fullnameCurAd1 . '</div>');

        if (strlen($fullnameCurAd2) > 56) {
            $size = 14;
            $top = 483;
        } else if (strlen($fullnameCurAd2) > 52) {
            $size = 16;
            $top = 481;
        } else {
            $size = 18;
            $top = 479;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:304px; left:168px; font-size:' . $size . 'px; width:185px; text-align:center;">' . $fullnameCurAd2 . '</div>');

        if (strlen($fullnameNewAd1) > 56) {
            $size = 14;
            $top = 483;
        } else if (strlen($fullnameNewAd1) > 52) {
            $size = 16;
            $top = 481;
        } else {
            $size = 18;
            $top = 479;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:474px; left:168px; font-size:' . $size . 'px; width:185px; text-align:center;">' . $fullnameNewAd1 . '</div>');
        if (strlen($fullnameNewAd2) > 57) {
            $size = 14;
            $top = 483;
        } else if (strlen($fullnameNewAd2) > 54) {
            $size = 16;
            $top = 481;
        } else {
            $size = 18;
            $top = 479;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:548px; left:168px; font-size:' . $size . 'px; width:185px; text-align:center;">' . $fullnameNewAd2 . '</div>');

        if (strlen($fullnameCurriculum) > 51) {
            $size = 14;
            $top = 871;
        } else if (strlen($fullnameCurriculum) > 48) {
            $size = 16;
            $top = 869;
        } else {
            $size = 18;
            $top = 867;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:180px; font-size:' . $size . 'px; width:162px; text-align:center;">' . $fullnameCurriculum . '</div>');
        // ------------------paf page 3--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId3);

        if (strlen($fullnameGraduate) > 51) {
            $size = 14;
            $top = 483;
        } else if (strlen($fullnameGraduate) > 48) {
            $size = 16;
            $top = 481;
        } else {
            $size = 18;
            $top = 479;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:198px; font-size:' . $size . 'px; width:160px; text-align:center;">' . $fullnameGraduate . '</div>');

        // pdf output
        $mpdf->Output('RequestForChangeOfAdvisorForm.pdf');

        ?>

    </div>

</body>

</html>