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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/ThesisProgressExaminationPermissionForm.pdf'" />
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <title>Document</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
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
        $currentMonth = date_format($dateCreate, " m");
        $currentYears = date_format($dateCreate, "Y ");
        $currentYears = (int)$currentYears + 543; 

        //ข้อมูลส่วนตัว
        $studentid = $_POST['studentid']; // รหัสนักศึกษา
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'] ?? '';
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];

        //การศึกษา
        $level = $_POST['LevelsInput']; // ระดับการศึกษา
        $plantype = $_POST['plan'] ?? ''; // แบบ แผน
        $type = $_POST['programType']; // ภาคปกติ-พิเศษ
        $course = $_POST['course']; // หลักสูตรไืทย-อังกฤษ        
        $faculty = $_POST['faculty']; // คณะ
        $field = $_POST['field']; // สาขาวิชา

        //รายละเอียดเค้าโครงฯ
        $titleTH = $_POST['titleTH'];
        $titleEN = $_POST['titleEN'];

        //รายละเอียดการขอสอบ
        $numberForm = $_POST['numberForm'] ?? ''; //จำนวนที่ยื่นแบบรายงานความก้าวหนานิพนธ์

        $place = $_POST['place']; // สถานที่/ห้อง
        $building = $_POST['building']; // อาคาร
        $facultyPlace = $_POST['facultyPlace']; // คณะ

        //วันขอสอบ
        $dateBook = $_POST['dateBook'];
        $dateBookYears = $dateBook[0] . $dateBook[1] . $dateBook[2] . $dateBook[3];
        $dateBookYears = (int)$dateBookYears + 543;
        $dateBookMonth = $dateBook[5] . $dateBook[6];
        $dateBookMonth = checkMonth($dateBookMonth);
        $dateBookDays = $dateBook[8] . $dateBook[9];
        $dateBookTime = $dateBook[11] . $dateBook[12] . $dateBook[13] . $dateBook[14] . $dateBook[15];

        //คณะกรรมการสอบ
        //ประธานกรรมการ
        $fnameExamChairman = $_POST['fnameExamChairman'] ?? '';
        $lnameExamChairman = $_POST['lnameExamChairman'] ?? '';
        $prefixExamChairman = $_POST['prefixExamChairman'] ?? '';
        $otherPrefixExamChairman = $_POST['otherPrefixExamChairman'] ?? '';
        //ประธานกรรมการบริหารหลักสูตร
        $fnameChairman = $_POST['fnameChairman'] ?? '';
        $lnameChairman = $_POST['lnameChairman'] ?? '';
        $prefixChairman = $_POST['prefixChairman'] ?? '';
        $otherPrefixChairman = $_POST['otherPrefixChairman'] ?? '';
        //กรรมการ 1
        $fnameCommittee1 = $_POST['fname1'] ?? '';
        $lnameCommittee1 = $_POST['lname1'] ?? '';
        $prefixCommittee1 = $_POST['prefixInput1'] ?? '';
        $otherPrefixCommittee1 = $_POST['otherPrefix1'] ?? '';
        //กรรมการ 2
        $fnameCommittee2 = $_POST['fname2'] ?? '';
        $lnameCommittee2 = $_POST['lname2'] ?? '';
        $prefixCommittee2 = $_POST['prefixInput2'] ?? '';
        $otherPrefixCommittee2 = $_POST['otherPrefix2'] ?? '';
        //กรรมการ 3
        $fnameCommittee3 = $_POST['fname3'] ?? '';
        $lnameCommittee3 = $_POST['lname3'] ?? '';
        $prefixCommittee3 = $_POST['prefixInput3'] ?? '';
        $otherPrefixCommittee3 = $_POST['otherPrefix3'] ?? '';
        //กรรมการ 4
        $fnameCommittee4 = $_POST['fname4'] ?? '';
        $lnameCommittee4 = $_POST['lname4'] ?? '';
        $prefixCommittee4 = $_POST['prefixInput4'] ?? '';
        $otherPrefixCommittee4 = $_POST['otherPrefix4'] ?? '';
        //ที่ปรึกษาหลัก
        $department = $_POST['department'] ?? '';
        $fnameMajor = $_POST['fnameMajor'] ?? '';
        $lnameMajor = $_POST['lnameMajor'] ?? '';
        $prefixMajor = $_POST['prefixMajor'] ?? '';
        $otherPrefixMajor = $_POST['otherPrefixMajor'] ?? '';
        //ที่ปรึกษาร่วม
        $fnameCoAdvisor = $_POST['fnameCoAdvisor'] ?? '';
        $lnameCoAdvisor = $_POST['lnameCoAdvisor'] ?? '';
        $prefixCoAdvisor = $_POST['prefixCoAdvisor'] ?? '';
        $otherPrefixCoAdvisor = $_POST['otherPrefixCoAdvisor'] ?? '';
        //คณบดี
        $fnameDean = $_POST['fnameDean'] ?? '';
        $lnameDean = $_POST['lnameDean'] ?? '';
        $prefixDean = $_POST['prefixDean'] ?? '';
        $otherPrefixDean = $_POST['otherPrefixDean'] ?? '';

        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;
        //ประธานกรรมการ
        $prefixExamChairman = checkPrefix($prefixExamChairman, $otherPrefixExamChairman);
        $nameExamChairman = $prefixExamChairman . $fnameExamChairman . "&nbsp;" . $lnameExamChairman;
        //ประธานกรรมการบริหารหลักสูตร
        $prefixChairman = checkPrefix($prefixChairman, $otherPrefixChairman);
        $nameChairman = $prefixChairman . $fnameChairman . "&nbsp;" . $lnameChairman;
        //กรรมการ 1
        $prefixCommittee1 = checkPrefix($prefixCommittee1, $otherPrefixCommittee1);
        $nameCommittee1 = $prefixCommittee1 . $fnameCommittee1 . "&nbsp;" . $lnameCommittee1;
        //กรรมการ 2
        $prefixCommittee2 = checkPrefix($prefixCommittee2, $otherPrefixCommittee2);
        $nameCommittee2 = $prefixCommittee2 . $fnameCommittee2 . "&nbsp;" . $lnameCommittee2;
        //กรรมการ 3
        $prefixCommittee3 = checkPrefix($prefixCommittee3, $otherPrefixCommittee3);
        $nameCommittee3 = $prefixCommittee3 . $fnameCommittee3 . "&nbsp;" . $lnameCommittee3;
        //กรรมการ 4
        $prefixCommittee4 = checkPrefix($prefixCommittee4, $otherPrefixCommittee4);
        $nameCommittee4 = $prefixCommittee4 . $fnameCommittee4 . "&nbsp;" . $lnameCommittee4;
        //ที่ปรึกษาหลัก
        $prefixMajor = checkPrefix($prefixMajor, $otherPrefixMajor);
        $nameMajor = $prefixMajor . $fnameMajor . "&nbsp;" . $lnameMajor;
        //ที่ปรึกษาร่วม
        $prefixCoAdvisor = checkPrefix($prefixCoAdvisor, $otherPrefixCoAdvisor);
        $nameCoAdvisor = $prefixCoAdvisor . $fnameCoAdvisor . "&nbsp;" . $lnameCoAdvisor;
        //คณะบดี
        $prefixDean = checkPrefix($prefixDean, $otherPrefixDean);
        $nameDean = $prefixDean . $fnameDean . "&nbsp;" . $lnameDean;

        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormProgress.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R');

        //current date
        $txtCurrentMonth = checkMonth($currentMonth);
        $txtCurrentDate = (int)$currentDay . " " . $txtCurrentMonth . " " . $currentYears;
        $mpdf->WriteHTML('<div style="position:absolute; top:167px; left:490px; font-size:20px; width:250px; text-align:center;">' . $txtCurrentDate . '</div>');
        $mpdf->WriteHTML("<div style='position:absolute; top:191px; left:370px; font-size:20px; width:370px;'>$name</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:215px; left:260px; font-size:20px; width:160px; text-align:center;'>$studentid</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:215px; left:530px; font-size:20px; width:215px; text-align:center;'>$faculty</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:238px; left:240px; font-size:20px; width:265px; text-align:center;'>$field</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:238px; left:585px; font-size:20px; width:157px; text-align:center;'>$mobile</div>");

        if ($level == 'master') {
            $mpdf->WriteHTML('<div style="position:absolute; top:260px; left:240px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($level == 'doctor') {
            $mpdf->WriteHTML('<div style="position:absolute; top:260px; left:392px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($plantype == '1.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:392px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($plantype == '1.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:442px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($plantype == '2.1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:491px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($plantype == '2.2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:543px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($plantype == 'ก1') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:239px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($plantype == 'ก2') {
            $mpdf->WriteHTML('<div style="position:absolute; top:285px; left:285px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($type == 'fulltime') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:92px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($type == 'parttime') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:253px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        if ($course == 'thai') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:424px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        } else if ($course == 'en') {
            $mpdf->WriteHTML('<div style="position:absolute; top:310px; left:570px; font-size:20px; font-family:helvetica;">&#x2713;</div>');
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:360px; left:270px; font-size:20px;'>$nameMajor</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:384px; left:160px; font-size:20px;'>$department</div>");

        $titleTH = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $titleTH;
        $mpdf->WriteHTML("<div style='position:absolute; top:472px; left:77px; font-size:20px; width:665px;'>$titleTH</div>"); //160 อักษร
        $titleEN = "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;" . $titleEN;
        $mpdf->WriteHTML("<div style='position:absolute; top:536px; left:77px; font-size:20px; width:665px;'>$titleEN</div>"); //170 อักษร

        $mpdf->WriteHTML("<div style='position:absolute; top:601px; left:355px; font-size:20px; width:32px; text-align:center;'>$numberForm</div>");

        $mpdf->WriteHTML("<div style='position:absolute; top:667px; left:280px; font-size:20px; width:32px; text-align:center;'>$dateBookDays</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:667px; left:406px; font-size:20px; width:70px; text-align:center;'>$dateBookMonth</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:667px; left:550px; font-size:20px; width:40px; text-align:center;'>$dateBookYears</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:667px; left:675px; font-size:20px; width:60px; text-align:center;'>$dateBookTime</div>");

        $mpdf->WriteHTML("<div style='position:absolute; top:694px; left:235px; font-size:18px; width:68px; text-align:center;'>$place</div>"); // 10 อักษร(18px)
        $mpdf->WriteHTML("<div style='position:absolute; top:694px; left:417px; font-size:18px; width:78px; text-align:center;'>$building</div>"); // 10 อักษร(18px)
        $mpdf->WriteHTML("<div style='position:absolute; top:694px; left:595px; font-size:18px; width:140px; text-align:center;'>$facultyPlace</div>"); // 20 อักษร(18px)


        $mpdf->WriteHTML("<div style='position:absolute; top:776px; left:90px; font-size:18px;'>$nameExamChairman</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:800px; left:90px; font-size:18px;'>$nameCommittee1</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:824px; left:90px; font-size:18px;'>$nameCommittee2</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:848px; left:90px; font-size:18px;'>$nameCommittee3</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:872px; left:90px; font-size:18px;'>$nameCommittee4</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:896px; left:90px; font-size:18px;'>$nameMajor</div>");

        if (mb_strlen($name,'UTF-8') > 37) {  // 36 นับคำนำหน้า
            $size = 14;
            $top = 996;
        }
        else if (mb_strlen($name,'UTF-8') > 33) {
            $size = 16;
            $top = 994;
        } else if (mb_strlen($name,'UTF-8') > 31) {
            $size = 18;
            $top = 992;
        } else {
            $size = 20;
            $top = 990;
        }
        $num = mb_strlen($name,'UTF-8');
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:420px; font-size:" . $size . "px; width:188px; text-align:center;'>$name</div>");

        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);

        if (mb_strlen($nameMajor,'UTF-8') > 37) {  // 36 นับคำนำหน้า
            $size = 14;
            $top = 343;
        }
        else if (mb_strlen($nameMajor,'UTF-8') > 33) {
            $size = 16;
            $top = 341;
        } else if (mb_strlen($nameMajor,'UTF-8') > 31) {
            $size = 18;
            $top = 339;
        } else {
            $size = 20;
            $top = 337;
        }
        $numMajor = mb_strlen($nameMajor,'UTF-8');
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:160px; font-size:" . $size . "px; width:188px; text-align:center;'>$nameMajor</div>");

        if (mb_strlen($nameCoAdvisor,'UTF-8') > 37) {  // 36 นับคำนำหน้า
            $size = 14;
            $top = 439;
        }
        else if (mb_strlen($nameCoAdvisor,'UTF-8') > 33) {
            $size = 16;
            $top = 437;
        } else if (mb_strlen($nameCoAdvisor,'UTF-8') > 31) {
            $size = 18;
            $top = 436;
        } else {
            $size = 20;
            $top = 434;
        }
        $numCoAd = strlen($nameCoAdvisor);
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:160px; font-size:" . $size . "px; width:188px; text-align:center;'>$nameCoAdvisor</div>");

        if (mb_strlen($nameChairman,'UTF-8') > 37) {  // 36 นับคำนำหน้า
            $size = 14;
            $top = 657;
        }
        else if (mb_strlen($nameChairman,'UTF-8') > 33) {
            $size = 16;
            $top = 654;
        } else if (mb_strlen($nameChairman,'UTF-8') > 31) {
            $size = 18;
            $top = 652;
        } else {
            $size = 20;
            $top = 650;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:160px; font-size:" . $size . "px; width:188px; text-align:center;'>$nameChairman</div>");

        if (mb_strlen($nameDean,'UTF-8') > 37) {  // 36 นับคำนำหน้า
            $size = 14;
            $top = 950;
        }
        else if (mb_strlen($nameDean,'UTF-8') > 33) {
            $size = 16;
            $top = 949;
        } else if (mb_strlen($nameDean,'UTF-8') > 31) {
            $size = 18;
            $top = 947;
        } else {
            $size = 20;
            $top = 944;
        }
        $numDean = strlen($nameDean);
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:160px; font-size:" . $size . "px; width:188px; text-align:center;'>$nameDean</div>");
        // pdf output
        $mpdf->Output('ThesisProgressExaminationPermissionForm.pdf');
        
        ?>
        <!-- <a href="output.pdf">asdasdasd</a> -->

    </div>

</body>

</html>