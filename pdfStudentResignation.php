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

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/RequestFormForStudentResignation.pdf'" />
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles.css">

</head>

<body>
    <div class="center">
        <?php
        function checkMouth($data)
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

        function checkMouthShort($data)
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
            if ($prefix == 'other') {
                return $other;
            } else {
                return $prefix;
            }
        }

        // Convert a string to an array with multibyte string
        function getMBStrSplit($string, $split_length = 1)
        {
            mb_internal_encoding('UTF-8');
            mb_regex_encoding('UTF-8');
            $split_length = ($split_length <= 0) ? 1 : $split_length;
            $mb_strlen = mb_strlen($string, 'utf-8');
            $array = array();
            $i = 0;

            while ($i < $mb_strlen) {
                $array[] = mb_substr($string, $i, $split_length);
                $i = $i + $split_length;
            }
            return $array;
        }
        // Get string length for Character Thai
        function getStrLenTH($string)
        {
            $array = getMBStrSplit($string);
            $count = 0;
            foreach ($array as $value) {
                $ascii = ord(iconv("UTF-8", "TIS-620", $value));
                if (!($ascii == 209 ||  ($ascii >= 212 && $ascii <= 218) || ($ascii >= 231 && $ascii <= 238))) {
                    $count += 1;
                }
            }
            return $count;
        }

        //วันที่ปัจจุบัน
        date_default_timezone_set('asia/bangkok');
        $currentDate = date("Y-m-d");
        $dateCreate = date_create($currentDate);
        $currentDay = date_format($dateCreate, " d");
        $currentMouth = date_format($dateCreate, " m");
        $currentYears = date_format($dateCreate, "Y ");
        $currentYears = (int)$currentYears + 543;

        //ข้อมูลส่วนตัว
        $studentid = $_POST['studentid']; // รหัสนักศึกษา
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $telephone = $_POST['telephone'] ?? '';
        $address = $_POST['address'];

        //การศึกษา
        $level = $_POST['LevelsInput']; // ระดับการศึกษา
        $plantype = $_POST['plan'] ?? ''; // แบบ แผน
        $type = $_POST['inputState']; // ภาคปกติ-พิเศษ   
        $faculty = $_POST['faculty']; // คณะ
        $major = $_POST['major']; //สาขาวิชา/วิชาเอก
        $field = $_POST['field']; // แขนงวิชา

        //ขอลาออก
        $resignTerm = $_POST['resignTerm'];
        $resignYear = $_POST['resignYear'];
        $reasons = $_POST['reasons'];
        $attachment1 = $_POST['attachment1'];
        $attachment2 = $_POST['attachment2'] ?? '';
        $attachment3 = $_POST['attachment3'] ?? '';

        $prefixAdvisor = $_POST['prefixAdvisor'];
        $otherPrefixAdvisor = $_POST['otherPrefixAdvisor'] ?? '';
        $fnameAdvisor = $_POST['fnameAdvisor'];
        $lnameAdvisor = $_POST['lnameAdvisor'];

        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;

        $prefixAdvisor = checkPrefix($prefixAdvisor, $otherPrefixAdvisor);
        $nameAdvisor = $prefixAdvisor . $fnameAdvisor . "&nbsp;" . $lnameAdvisor;

        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormStudentResignation.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);

        // ------------------paf page 1--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R');

        //current date
        $txtCurrentMouth = CheckMouthShort($currentMouth);
        $txtCurrentDate = (int)$currentDay . " " . $txtCurrentMouth . " " . $currentYears;
        $mpdf->WriteHTML('<div style="position:absolute; top:224px; left:600px; font-size:18px; width:25px; text-align:center;">' . $currentDay . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:224px; left:645px; font-size:18px; width:46px; text-align:center;">' . $txtCurrentMouth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:224px; left:700px; font-size:18px; width:42px; text-align:center;">' . $currentYears . '</div>');

        //ระดับการศึกษา
        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:269px; left:243px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:269px; left:359px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:270px; left:510px; font-size:18px; width:42px; text-align:center;">' . $plantype . '</div>');

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:269px; left:626px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:269px; left:693px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:365px; left:300px; font-size:18px;">' . $name . '</div>');

        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '414');
            } else {
                array_push($topStu, '417');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:154px; font-size:18px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:178px; font-size:18px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:200px; font-size:18px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:222px; font-size:18px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:246px; font-size:18px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:268px; font-size:18px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:291px; font-size:18px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:314px; font-size:18px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:337px; font-size:18px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:360x; font-size:18px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:384px; font-size:18px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:407px; font-size:18px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:440px; font-size:18px;'>" . $studentid[13] . "</div>");

        $mpdf->WriteHTML('<div style="position:absolute; top:477px; left:60px; font-size:18px; width:183px; text-align:center;">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:477px; left:350px; font-size:18px; width:160px; text-align:center;">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:477px; left:575px; font-size:18px; width:175px; text-align:center;">' . $faculty . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:525px; left:110px; font-size:18px;">' . $address . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:575px; left:85px; font-size:18px; width:168px; text-align:center;">' . $telephone . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:575px; left:350px; font-size:18px; width:130px; text-align:center;">' . $mobile . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:650px; left:424px; font-size:18px;">' . $resignTerm . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:650px; left:515px; font-size:18px;">' . $resignYear . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:725px; left:40px; font-size:18px; width:715;" >' . $reasons . '</div>'); //215

        $mpdf->WriteHTML('<div style="position:absolute; top:823px; left:150px; font-size:18px; width:195;" >' . $attachment1 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:847px; left:150px; font-size:18px; width:195;" >' . $attachment2 . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:871px; left:150px; font-size:18px; width:195;" >' . $attachment3 . '</div>');


        if (mb_strlen($name, 'UTF-8') > 37) {
            $size = 14;
            $top = 993;
        } else if (mb_strlen($name, 'UTF-8') > 33) {
            $size = 16;
            $top = 993;
        } else {
            $size = 18;
            $top = 993;
        }
        $num = mb_strlen($name, 'UTF-8');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:458px; font-size:' . $size . 'px; width:168px; text-align:center;">' . $name . '</div>');

        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);



        if (getStrLenTH($nameAdvisor) > 44) {
            $size = 6;
            $top = 232;
        } else if (getStrLenTH($nameAdvisor) > 31) {
            $size = 8;
            $top = 231;
        } else if (getStrLenTH($nameAdvisor) > 31) {
            $size = 10;
            $top = 230;
        } else if (getStrLenTH($nameAdvisor) > 28) {
            $size = 12;
            $top = 228;
        } else if (getStrLenTH($nameAdvisor) > 25) {
            $size = 14;
            $top = 226;
        } else if (getStrLenTH($nameAdvisor) > 23) {
            $size = 16;
            $top = 224;
        } else {
            $size = 18;
            $top = 222;
        }
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top . 'px; left:192px; font-size:' . $size . 'px; width:112px; text-align:center;">' . $nameAdvisor . '</div>');

        // pdf output
        $mpdf->Output('RequestFormForStudentResignation.pdf');
        ?>

    </div>

</body>

</html>