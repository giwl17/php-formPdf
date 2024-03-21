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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/GeneralRequestForm.pdf'" />
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

        //ความประสงค์, เนื่องจาก
        $wouldLikeTo = $_POST['wouldLikeTo'];
        $reasons = $_POST['reasons'];

        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;

        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormGeneralRequest.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);

        // ------------------paf page 1--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R');

        //current date
        $txtCurrentMouth = CheckMouthShort($currentMouth);
        $txtCurrentDate = (int)$currentDay . " " . $txtCurrentMouth . " " . $currentYears;
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:567px; font-size:18px; width:25px; text-align:center;">' . $currentDay . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:605px; font-size:18px; width:42px; text-align:center;">' . $txtCurrentMouth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:227px; left:658px; font-size:18px; width:42px; text-align:center;">' . $currentYears . '</div>');

        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:218px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:314px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML('<div style="position:absolute; top:251px; left:460px; font-size:18px; width:42px; text-align:center;">' . $plantype . '</div>');

        if ($type == 'normal') {
            $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:582px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'special') {
            $mpdf->WriteHTML('<div style="position:absolute; top:250px; left:653px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '367');
            } else {
                array_push($topStu, '370');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:208px; font-size:18px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:228px; font-size:18px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:250px; font-size:18px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:272px; font-size:18px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:294px; font-size:18px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:316px; font-size:18px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:337px; font-size:18px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:358px; font-size:18px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:379px; font-size:18px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:400px; font-size:18px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:423px; font-size:18px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:444px; font-size:18px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:476px; font-size:18px;'>" . $studentid[13] . "</div>");

        $mpdf->WriteHTML('<div style="position:absolute; top:321px; left:360px; font-size:18px; width:370px;">' . $name . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:410px; left:120px; font-size:18px; width:170px; text-align:center;">' . $faculty . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:410px; left:407px; font-size:18px; width:155px; text-align:center;">' . $major . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:410px; left:625px; font-size:18px; width:110px; text-align:center;">' . $field . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:458px; left:165px; font-size:18px; width:579px;">' . $address . '</div>');

        $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:143px; font-size:18px; width:166px; text-align:center;">' . $telephone . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:502px; left:405px; font-size:18px; width:133px; text-align:center;">' . $mobile . '</div>');

        $wouldLikeTo = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$wouldLikeTo";
        $mpdf->WriteHTML('<div style="position:absolute; top:571px; left:100px; font-size:18px; width:640px;">' . $wouldLikeTo . '</div>'); //ประมาณ 260 ตัวอักษร

        $reasons = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$reasons";
        $mpdf->WriteHTML('<div style="position:absolute; top:646px; left:100px; font-size:18px; width:640px;">' . $reasons . '</div>'); //ประมาณ 250 ตัวอักษร


         if (mb_strlen($name, 'UTF-8') > 37) {
            $size = 14;
            $top = 869;
        } else if (mb_strlen($name, 'UTF-8') > 33) {
            $size = 16;
            $top = 866;
        } else {
            $size = 18;
            $top = 864;
        }
        $num = mb_strlen($name, 'UTF-8');
        $mpdf->WriteHTML('<div style="position:absolute; top:' . $top .'px; left:463px; font-size:' . $size .'px; width:186px; text-align:center;">' . $name .'</div>');
        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);

        // pdf output
        $mpdf->Output('GeneralRequestForm.pdf');
        ?>

    </div>

</body>

</html>