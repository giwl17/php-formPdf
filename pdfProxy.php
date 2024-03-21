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
    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/ProxyForm.pdf'" />
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
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];
        $address = $_POST['address'];

        //ข้อมูลการศึกษา
        $faculty = $_POST['faculty']; // คณะ
        $major = $_POST['major']; //สาขาวิชา/วิชาเอก
        $field = $_POST['field']; // แขนง

        //รายละเอียดการมอบฉันทะ
        $idenNumber = $_POST['idenNumber']; // บัตร ปชช
        $issuedBy = $_POST['issuedBy']; // ออกโดย
        $dateIssue = $_POST['dateIssue']; // วันออกบัตร
        $dateExpriry = $_POST['dateExpriry']; // วันหมดอายุ

        //ผู้รับมอบฉันทะ
        $prefixProxy = $_POST['prefixInputProxy'];
        $otherProxy = $_POST['otherPrefixProxy'] ?? '';
        $fnameProxy = $_POST['fnameProxy'];
        $lnameProxy = $_POST['lnameProxy'];
        $idenNumberProxy = $_POST['idenNumberProxy'];
        $issuedByProxy = $_POST['issuedByProxy'];
        $dateIssueProxy = $_POST['dateIssueProxy'];
        $dateExpriryProxy = $_POST['dateExpriryProxy'];

        //เอกสาร
        $docStuCert = $_POST['docStuCert'] ?? '';
        $docDegree = $_POST['docDegree'] ?? '';
        $docTranscript = $_POST['docTranscript'] ?? '';
        $docGraduation = $_POST['docGraduation'] ?? '';
        $docOther = $_POST['docOther'] ?? '';
        $docOtherInput = $_POST['docOtherInput'] ?? '';

        //เนื่องจาก
        $reasons = $_POST['reasons'];

        //วันออกบัตร
        $dateIssueYears =  $dateIssue[0] . $dateIssue[1] . $dateIssue[2] . $dateIssue[3];
        $dateIssueYears = (int)$dateIssueYears + 543;
        $dateIssueMonth = $dateIssue[5] . $dateIssue[6];
        $dateIssueDays = $dateIssue[8] . $dateIssue[9];
        $dateIssueDays = (int)$dateIssueDays;
        $dateIssueMonth = (int)$dateIssueMonth;
        $dateIssueMonthTxt = checkMonth($dateIssueMonth);
        $dateIssueTxt = "$dateIssueDays $dateIssueMonthTxt $dateIssueYears";

        //วันออกบัตรผู้รับมอบฉันทะ
        $dateIssueProxyYears =  $dateIssueProxy[0] . $dateIssueProxy[1] . $dateIssueProxy[2] . $dateIssueProxy[3];
        $dateIssueProxyYears = (int)$dateIssueProxyYears + 543;
        $dateIssueProxyMonth = $dateIssueProxy[5] . $dateIssueProxy[6];
        $dateIssueProxyDays = $dateIssueProxy[8] . $dateIssueProxy[9];
        $dateIssueProxyDays = (int)$dateIssueProxyDays;
        $dateIssueProxyMonth = (int)$dateIssueProxyMonth;
        $dateIssueProxyMonthTxt = checkMonth($dateIssueProxyMonth);
        $dateIssueProxyTxt = "$dateIssueProxyDays $dateIssueProxyMonthTxt $dateIssueProxyYears";

        //วันหมดอายุ
        $dateExpriryYears =  $dateExpriry[0] . $dateExpriry[1] . $dateExpriry[2] . $dateExpriry[3];
        $dateExpriryYears = (int)$dateExpriryYears + 543;
        $dateExpriryMonth = $dateExpriry[5] . $dateExpriry[6];
        $dateExpriryDays = $dateExpriry[8] . $dateExpriry[9];
        $dateExpriryDays = (int)$dateExpriryDays;
        $dateExpriryMonth = (int)$dateExpriryMonth;
        $dateExpriryMonthTxt = checkMonth($dateExpriryMonth);
        $dateExpriryTxt = "$dateExpriryDays $dateExpriryMonthTxt $dateExpriryYears";

        //วันหมดอายุ ผู้รับมอบฉันทะ
        $dateExpriryProxyYears =  $dateExpriryProxy[0] . $dateExpriryProxy[1] . $dateExpriryProxy[2] . $dateExpriryProxy[3];
        $dateExpriryProxyYears = (int)$dateExpriryProxyYears + 543;
        $dateExpriryProxyMonth = $dateExpriryProxy[5] . $dateExpriryProxy[6];
        $dateExpriryProxyDays = $dateExpriryProxy[8] . $dateExpriryProxy[9];
        $dateExpriryProxyDays = (int)$dateExpriryProxyDays;
        $dateExpriryProxyMonth = (int)$dateExpriryProxyMonth;
        $dateExpriryProxyMonthTxt = checkMonth($dateExpriryProxyMonth);
        $dateExpriryProxyTxt = "$dateExpriryProxyDays $dateExpriryProxyMonthTxt $dateExpriryProxyYears";

        //ชื่อ
        $prefix = checkPrefix($prefix, $other);
        $name = $prefix . $fname . "&nbsp;" . $lname;

        //ชื่อผู้รับมอบฉันทะ
        $prefixProxy = checkPrefix($prefixProxy, $otherProxy);
        $nameProxy = $prefixProxy . $fnameProxy . "&nbsp;" . $lnameProxy;

        $pagecount = $mpdf->SetSourceFile('pdf/pdfFormProxy.pdf');
        $tplId1 = $mpdf->ImportPage(1);
        $tplId2 = $mpdf->ImportPage(2);
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId1);

        $mpdf->SetFont('sarabun', 'R');

        //เวลาปัจจุบัน
        $txtCurrentMonth = CheckMonthShort($currentMonth);
        $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:572px; font-size:18px; width:20px; text-align:center;">' . (int)$currentDay . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:610px; font-size:18px; width:40px; text-align:center;">' . $txtCurrentMonth . '</div>');
        $mpdf->WriteHTML('<div style="position:absolute; top:204px; left:661px; font-size:18px; width:40px; text-align:center;">' . $currentYears . '</div>');

        //ชื่อนักศึกษา
        $mpdf->WriteHTML("<div style='position:absolute; top:254px; left:374px; font-size:18px;'>$name</div>");

        //รหัสนักศึกษา
        $topStu = array();
        for ($i = 0; $i <= 13; $i++) {
            if ($studentid[$i] == '0') {
                array_push($topStu, '302');
            } else {
                array_push($topStu, '305');
            }
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[0]}px; left:209px; font-size:18px;'>" . $studentid[0] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[1]}px; left:232px; font-size:18px;'>" . $studentid[1] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[2]}px; left:255px; font-size:18px;'>" . $studentid[2] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[3]}px; left:278px; font-size:18px;'>" . $studentid[3] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[4]}px; left:302px; font-size:18px;'>" . $studentid[4] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[5]}px; left:324px; font-size:18px;'>" . $studentid[5] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[6]}px; left:347px; font-size:18px;'>" . $studentid[6] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[7]}px; left:370px; font-size:18px;'>" . $studentid[7] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[8]}px; left:393px; font-size:18px;'>" . $studentid[8] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[9]}px; left:415px; font-size:18px;'>" . $studentid[9] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[10]}px; left:438px; font-size:18px;'>" . $studentid[10] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[11]}px; left:461px; font-size:18px;'>" . $studentid[11] . "</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:{$topStu[13]}px; left:495px; font-size:18px;'>" . $studentid[13] . "</div>");

        //คณะ
        if (mb_strlen($faculty, 'UTF-8') > 31) { //36 อักษร
            $size = 14;
            $top = 369;
        } else if (mb_strlen($faculty, 'UTF-8') > 28) {
            $size = 16;
            $top = 367;
        } else {
            $size = 18;
            $top = 365;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:115px; font-size:" . $size . "px; width:185px; text-align:center;'>$faculty</div>");
        //สาขาวิชา
        if (mb_strlen($major, 'UTF-8') > 28) { //32 อักษร
            $size = 14;
            $top = 369;
        } else if (mb_strlen($major, 'UTF-8') > 25) {
            $size = 16;
            $top = 367;
        } else {
            $size = 18;
            $top = 365;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:400px; font-size:" . $size . "px; width:165px; text-align:center;'>$major</div>");
        //แขนง
        if (mb_strlen($field, 'UTF-8') > 18) { //21 อักษร        
            $size = 14;
            $top = 369;
        } else if (mb_strlen($field, 'UTF-8') > 16) {
            $size = 16;
            $top = 367;
        } else {
            $size = 18;
            $top = 365;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:626px; font-size:" . $size . "px; width:108px; text-align:center;'>$field</div>");

        //ที่อยู่ 87 อักษร
        $mpdf->WriteHTML("<div style='position:absolute; top:414px; left:160px; font-size:18px; width:570px;'>$address</div>");

        //โทรศัพท์ โทรศัพท์มือถือ
        $mpdf->WriteHTML("<div style='position:absolute; top:464px; left:135px; font-size:18px; width:175px; text-align:center;'>$telephone</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:464px; left:405px; font-size:18px; width:130px; text-align:center;'>$mobile</div>");

        //บัตรปชช ออกบัตรโดย
        $mpdf->WriteHTML("<div style='position:absolute; top:512px; left:253px; font-size:18px; width:170px; text-align:center;'>$idenNumber</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:512px; left:515px; font-size:18px; width:215px; text-align:center;'>$issuedBy</div>");

        //วันที่ออกบัตร วันหมดอายุ
        $mpdf->WriteHTML("<div style='position:absolute; top:561px; left:173px; font-size:18px; width:240px; text-align:center;'>$dateIssueTxt</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:561px; left:520px; font-size:18px; width:190px; text-align:center;'>$dateExpriryTxt</div>");

        //ชื่อผู้รับมอบฉันทะ
        $mpdf->WriteHTML("<div style='position:absolute; top:610px; left:420px; font-size:18px;'>$nameProxy</div>");

        //บัตรปชช ออกบัตรโดย (ผู้รับมอบฉันทะ)
        $mpdf->WriteHTML("<div style='position:absolute; top:660px; left:253px; font-size:18px; width:170px; text-align:center;'>$idenNumberProxy</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:660px; left:515px; font-size:18px; width:215px; text-align:center;'>$issuedByProxy</div>");

        //วันที่ออกบัตร วันหมดอายุ (ผู้รับมอบฉันทะ)
        $mpdf->WriteHTML("<div style='position:absolute; top:708px; left:173px; font-size:18px; width:240px; text-align:center;'>$dateIssueProxyTxt</div>");
        $mpdf->WriteHTML("<div style='position:absolute; top:708px; left:520px; font-size:18px; width:190px; text-align:center;'>$dateExpriryProxyTxt</div>");

        //เอกสาร
        if ($docStuCert == 'checked') {
            $mpdf->WriteHTML('<div style="position:absolute; top:807px; left:133px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($docDegree == 'checked') {
            $mpdf->WriteHTML('<div style="position:absolute; top:857px; left:133px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($docTranscript == 'checked') {
            $mpdf->WriteHTML('<div style="position:absolute; top:807px; left:373px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($docGraduation == 'checked') {
            $mpdf->WriteHTML('<div style="position:absolute; top:857px; left:373px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
        }
        if ($docOther == 'checked') {
            $mpdf->WriteHTML('<div style="position:absolute; top:906px; left:133px; font-size:18px; font-family:helvetica;">&#x2713;</div>');
            $mpdf->WriteHTML("<div style='position:absolute; top:903px; left:195px; font-size:18px;'>$docOtherInput</div>");
        }

        $mpdf->WriteHTML("<div style='position:absolute; top:952px; left:90px; font-size:18px; width:640;'>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;$reasons</div>");
        // ------------------paf page 2--------------------
        $mpdf->AddPage();
        $mpdf->UseTemplate($tplId2);


        if (mb_strlen($name, 'UTF-8') > 37) {
            $size = 14;
            $top = 244;
        } else if (mb_strlen($name, 'UTF-8') > 33) {
            $size = 16;
            $top = 242;
        } else {
            $size = 18;
            $top = 240;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:373px; font-size:" . $size . "px; width:186px; text-align:center;'>$name</div>");


        if (mb_strlen($nameProxy, 'UTF-8') > 37) {
            $size = 14;
            $top = 318;
        } else if (mb_strlen($nameProxy, 'UTF-8') > 33) {
            $size = 16;
            $top = 316;
        } else {
            $size = 18;
            $top = 314;
        }
        $mpdf->WriteHTML("<div style='position:absolute; top:" . $top . "px; left:373px; font-size:" . $size . "px; width:186px; text-align:center;'>$nameProxy</div>");


        // pdf output
        $mpdf->Output('ProxyForm.pdf');

        ?>

    </div>

</body>

</html>