<html lang="en">

<head>
    <meta charset="UTF-8">
    <!-- <meta http-equiv="X-UA-Compatible" content="IE=edge"> -->
    <!-- <meta http-equiv="refresh" content="0; url='http://localhost/Test/form9.pdf'" /> -->

    <meta http-equiv="refresh" content="0; url='https://elnventory.com/graden/form9.pdf'" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form 9</title>
    <style>
        body {
            line-height: 0.7in;
            visibility: hidden;
        }

        u {
            padding-bottom: 10px;
            text-decoration: none;

        }
    </style>
</head>

<body>
    <!-- <h1 style="text-align: center; visibility: visible;">Loading...</h1>
    <a style="visibility: visible;" href="form9.pdf">download</a> -->

    <?php

    use Mpdf\Tag\Span;

    require_once __DIR__ . '/vendor/autoload.php';
    $defaultConfig = (new Mpdf\Config\ConfigVariables())->getDefaults();
    $fontDirs = $defaultConfig['fontDir'];

    $defaultFontConfig = (new Mpdf\Config\FontVariables())->getDefaults();
    $fontData = $defaultFontConfig['fontdata'];
    // $mpdf->$useDictionaryLBR = true ; 
    $mpdf = new \Mpdf\Mpdf([
        'mode' => 'utf-8',
        'format' => 'A4',
        // .($orientation == 'L' ? '-L' : ''),
        // 'orientation' => 0,
        // 'default_font_size' => 16,
        // 'margin_left' => 9.906,
        'margin_left' => 8,
        'margin_right' => 7.62,
        'margin_top' => 9.906,
        // 'margin_bottom' => 9.398,
        'margin_bottom' => 9.398,
        'margin_header' => 0,
        'margin_footer' => 0,
        'fontDir' => array_merge($fontDirs, [
            __DIR__ . '/tmp',
        ]),
        'fontdata' => $fontData + [ // lowercase letters only in font key
            'sarabun' => [
                'R' => 'THSarabun.ttf',
                'I' => 'THSarabun Italic.ttf',
                'B' => 'THSarabun Bold.ttf',
                'BI' => 'THSarabun Bold Italic.ttf',
            ]
        ],
        'default_font' => 'sarabun'
    ]);
    //$mpdf = new \Mpdf\Mpdf();
    ob_start() //เริ่มต้นเก็บข้อมูลในหน่วยความจำ
    ?>


    <div style="position:absolute; top:0.5cm; left:0.5cm;font-size: 11pt;line-height:1in;">
        <table>
            <tr>
                <td>
                    <img src="https://media.discordapp.net/attachments/692826724169416784/1097358328537038918/20210202-logoRMUTT-color-01.png?width=386&height=670" alt="Flowers in Chania" width="50px" height="85px" class="bx bx-menu menu-icon" /> &nbsp;
                </td>
                <td>
                    <b>
                        มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี<br>
                        สำนักบัณฑิตศึกษา<br>
                        Rajamangala University of Technology Thanyaburi <br>
                        Office of Graduate Studies <br>


                    </b>
                </td>

            </tr>
        </table>
    </div>
    <div style="border: solid 1pt black; width: 2.4in; height:0.62in; text-align: center; position:absolute; top:0.5cm; right:0.5cm; padding: 1px; font-size: 14pt;">

        <b>
            กรุณากรอกเอกสารด้วยตัวบรรจง <br>
            Please write clearly in block letters
        </b>
    </div>
    <br><br><br><br><br>
    <div style="text-align: center; font-size: 16pt;line-height: 130%; ">
        <b>

            แบบรายงานการเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ เพื่อประกอบการสำเร็จการศึกษา <br>
            Dissertation/Thesis/Independent Study Publication for Graduation Report Form
        </b>


        <!-- <br style="line-height: 1cm;">
         <br style="line-height: 1cm;">
         <br style="line-height: 0.1cm;"> -->





    </div>
    <?php
    date_default_timezone_set('Asia/Bangkok');
    $date = date("Y-m-d");
    $dmy = date_create($date);
    $d = date_format($dmy, "d ");
    $m = date_format($dmy, "m ");
    $yea = date_format($dmy, "Y ");
    $y = (int)$yea + 543;
    $mTxt = array();
    $mTxt = checkMouth((int)$m);
    $today = (int)$d . '&nbsp;&nbsp;' . $mTxt[0] . '&nbsp;&nbsp;' . $y . '&nbsp;&nbsp;';
    function checkMouth($val)
    {
        $mouth = array('');
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
    echo '
    <div style="text-align: right;font-size: 14pt;padding-right: 0.5cm; padding-top: 1.1cm;">
        วันที่ Date <u> &nbsp; ' . $today . '&nbsp;&nbsp;</u>
    </div>
    ';
    ?>

    <?php
    function fill($text, $total)
    {

        for ($length = strlen($text); $length < $total; $length++) {
            $text = $text . '&nbsp;';
        }
        return $text;
    }

    function space($x)
    {
        $b = '';
        for ($a = 0; $a < $x; $a++) {
            $b .= "&nbsp;";
        }
        return $b;
    }
    $master = space(2);
    $doctor = space(2);
    $regular = space(2);
    $weekend = space(2);
    $private_radio = space(2);
    $public_radio = space(2);
    $public_total_th = space(10);
    $public_total_en = space(10);
    $private_total_th = space(10);
    $private_total_en = space(10);
    $public_agency_th = space(20);
    $public_agency_en = space(20);
    $total_published_nation_th = '';
    $total_published_nation_en = '';
    $total_published_inter_th = '';
    $total_published_inter_en = '';
    $total_present_nation_th = '';
    $total_present_nation_en = '';
    $total_present_inter_th = '';
    $total_present_inter_en = '';
    $nation_pdf1 = space(2);
    $inter_pdf1 = space(2);
    $nation_pdf2 = space(2);
    $inter_pdf2 = space(2);
    $nation_pdf3 = space(2);
    $inter_pdf3 = space(2);
    $nation_pdf4 = space(2);
    $inter_pdf4 = space(2);
    $nation_pdf5 = space(2);
    $inter_pdf5 = space(2);
    //th
    $percent1_th = space(4);
    $count_pre1_th = space(4);
    $total_paper_all1_th = space(4);
    $institution_host1_th = space(4);
    $institution_external1_th = space(4);
    $percent_all1_th = space(4);

    $percent2_th = space(4);
    $count_pre2_th = space(4);
    $total_paper_all2_th = space(4);
    $institution_host2_th = space(4);
    $institution_external2_th = space(4);
    $percent_all2_th = space(4);

    $percent3_th = space(4);
    $count_pre3_th = space(4);
    $total_paper_all3_th = space(4);
    $institution_host3_th = space(4);
    $institution_external3_th = space(4);
    $percent_all3_th = space(4);

    $percent4_th = space(4);
    $count_pre4_th = space(4);
    $total_paper_all4_th = space(4);
    $institution_host4_th = space(4);
    $institution_external4_th = space(4);
    $percent_all4_th = space(4);

    $percent5_th = space(4);
    $count_pre5_th = space(4);
    $total_paper_all5_th = space(4);
    $institution_host5_th = space(4);
    $institution_external5_th = space(4);
    $percent_all5_th = space(4);

    //en
    $percent1_en = space(4);
    $count_pre1_en = space(4);
    $total_paper_all1_en = space(4);
    $institution_host1_en = space(4);
    $institution_external1_en = space(4);
    $percent_all1_en = space(4);

    $percent2_en = space(4);
    $count_pre2_en = space(4);
    $total_paper_all2_en = space(4);
    $institution_host2_en = space(4);
    $institution_external2_en = space(4);
    $percent_all2_en = space(4);

    $percent3_en = space(4);
    $count_pre3_en = space(4);
    $total_paper_all3_en = space(4);
    $institution_host3_en = space(4);
    $institution_external3_en = space(4);
    $percent_all3_en = space(4);

    $percent4_en = space(4);
    $count_pre4_en = space(4);
    $total_paper_all4_en = space(4);
    $institution_host4_en = space(4);
    $institution_external4_en = space(4);
    $percent_all4_en = space(4);

    $percent5_en = space(4);
    $count_pre5_en = space(4);
    $total_paper_all5_en = space(4);
    $institution_host5_en = space(4);
    $institution_external5_en = space(4);
    $percent_all5_en = space(4);







    // $published_nation_radio = space(2);
    // $published_internation_radio = space(2);
    // $present_nation_radio = space(2);
    // $present_internation_radio = space(2);



    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $LevelsInput = $_POST['LevelsInput'];
        $plan = '<u>' . space(3) . $_POST['plan'] . space(2) . '</u>';
        $inputState = $_POST['inputState'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $prefix = $_POST['prefixInput'];
        $other = $_POST['otherPrefix'];
        $studentid = $_POST['studentid'];
        $faculty = $_POST['faculty'];
        $major = $_POST['major'];
        $field = $_POST['field'];
        $address = $_POST['address'];
        $telephone = $_POST['telephone'];
        $mobile = $_POST['mobile'];
        $titleTH = $_POST['titleTH'];
        $titleEN = $_POST['titleEN'];
        $total = $_POST['total'];
        $prefixAdvisor = $_POST['prefixAdvisor'];
        $nameAdvisor = $_POST['nameAdvisor'];
        $fnameAdvisor = $_POST['fnameAdvisor'];
        $lnameAdvisor = $_POST['lnameAdvisor'];










        // $total_private = $_POST['total_private'];
        // $total_public = $_POST['total_public'];
        isset($_POST['prefixCurriculum']) ? $prefixCurriculum = $_POST['prefixCurriculum'] : $prefixCurriculum = space(10);
        isset($_POST['otherPrefixCurriculum']) ? $otherPrefixCurriculum = $_POST['otherPrefixCurriculum'] : $otherPrefixCurriculum = space(10);
        isset($_POST['fnameCurriculum']) ? $fnameCurriculum = $_POST['fnameCurriculum'] : $fnameCurriculum = space(10);
        isset($_POST['lnameCurriculum']) ? $lnameCurriculum = $_POST['lnameCurriculum'] : $lnameCurriculum = space(10);


        isset($_POST['total_private']) ? $total_private = $_POST['total_private'] : $total_private = space(10);
        isset($_POST['total_public']) ? $total_public = $_POST['total_public'] : $total_public = space(10);
        isset($_POST['public_agency']) ? $public_agency = $_POST['public_agency'] : $public_agency = space(20);
        isset($_POST['published_nation']) ? $published_nation = $_POST['published_nation'] : $published_nation = space(3);
        isset($_POST['published_inter']) ? $published_inter = $_POST['published_inter'] : $published_inter = space(3);
        isset($_POST['present_nation']) ? $present_nation = $_POST['present_nation'] : $present_nation = space(3);
        isset($_POST['present_inter']) ? $present_inter = $_POST['present_inter'] : $present_inter = space(3);
        isset($_POST['total_published_nation']) ? $total_published_nation = $_POST['total_published_nation'] : $total_published_nation = '';
        isset($_POST['total_published_inter']) ? $total_published_inter = $_POST['total_published_inter'] : $total_published_inter = '';
        isset($_POST['total_present_nation']) ? $total_present_nation = $_POST['total_present_nation'] : $total_present_nation = '';
        isset($_POST['total_present_inter']) ? $total_present_inter = $_POST['total_present_inter'] : $total_present_inter = '';

        isset($_POST['pub_title1']) ? $pub_title1 = $_POST['pub_title1'] : $pub_title1 = '';
        isset($_POST['name_academic1']) ? $name_academic1 = $_POST['name_academic1'] : $name_academic1 = '';
        isset($_POST['issue_num1']) ? $issue_num1 = $_POST['issue_num1'] : $issue_num1 = '';
        isset($_POST['volume1']) ? $volume1 = $_POST['volume1'] : $volume1 = '';
        isset($_POST['month_year_pub1']) ? $month_year_pub1 = $_POST['month_year_pub1'] : $month_year_pub1 = '';
        isset($_POST['country_pub1']) ? $country_pub1 = $_POST['country_pub1'] : $country_pub1 = '';
        isset($_POST['database_name1']) ? $database_name1 = $_POST['database_name1'] : $database_name1 = '';
        isset($_POST['tier1']) ? $tier1 = $_POST['tier1'] : $tier1 = '';

        isset($_POST['pub_title2']) ? $pub_title2 = $_POST['pub_title2'] : $pub_title2 = '';
        isset($_POST['name_academic2']) ? $name_academic2 = $_POST['name_academic2'] : $name_academic2 = '';
        isset($_POST['issue_num2']) ? $issue_num2 = $_POST['issue_num2'] : $issue_num2 = '';
        isset($_POST['volume2']) ? $volume2 = $_POST['volume2'] : $volume2 = '';
        isset($_POST['month_year_pub2']) ? $month_year_pub2 = $_POST['month_year_pub2'] : $month_year_pub2 = '';
        isset($_POST['country_pub2']) ? $country_pub2 = $_POST['country_pub2'] : $country_pub2 = '';
        isset($_POST['database_name2']) ? $database_name2 = $_POST['database_name2'] : $database_name2 = '';
        isset($_POST['tier2']) ? $tier2 = $_POST['tier2'] : $tier2 = '';

        isset($_POST['pub_title3']) ? $pub_title3 = $_POST['pub_title3'] : $pub_title3 = '';
        isset($_POST['name_academic3']) ? $name_academic3 = $_POST['name_academic3'] : $name_academic3 = '';
        isset($_POST['issue_num3']) ? $issue_num3 = $_POST['issue_num3'] : $issue_num3 = '';
        isset($_POST['volume3']) ? $volume3 = $_POST['volume3'] : $volume3 = '';
        isset($_POST['month_year_pub3']) ? $month_year_pub3 = $_POST['month_year_pub3'] : $month_year_pub3 = '';
        isset($_POST['country_pub3']) ? $country_pub3 = $_POST['country_pub3'] : $country_pub3 = '';
        isset($_POST['database_name3']) ? $database_name3 = $_POST['database_name3'] : $database_name3 = '';
        isset($_POST['tier3']) ? $tier3 = $_POST['tier3'] : $tier3 = '';

        isset($_POST['pub_title4']) ? $pub_title4 = $_POST['pub_title4'] : $pub_title4 = '';
        isset($_POST['name_academic4']) ? $name_academic4 = $_POST['name_academic4'] : $name_academic4 = '';
        isset($_POST['issue_num4']) ? $issue_num4 = $_POST['issue_num4'] : $issue_num4 = '';
        isset($_POST['volume4']) ? $volume4 = $_POST['volume4'] : $volume4 = '';
        isset($_POST['month_year_pub4']) ? $month_year_pub4 = $_POST['month_year_pub4'] : $month_year_pub4 = '';
        isset($_POST['country_pub4']) ? $country_pub4 = $_POST['country_pub4'] : $country_pub4 = '';
        isset($_POST['database_name4']) ? $database_name4 = $_POST['database_name4'] : $database_name4 = '';
        isset($_POST['tier4']) ? $tier4 = $_POST['tier4'] : $tier4 = '';

        isset($_POST['pub_title5']) ? $pub_title5 = $_POST['pub_title5'] : $pub_title5 = '';
        isset($_POST['name_academic5']) ? $name_academic5 = $_POST['name_academic5'] : $name_academic5 = '';
        isset($_POST['issue_num5']) ? $issue_num5 = $_POST['issue_num5'] : $issue_num5 = '';
        isset($_POST['volume5']) ? $volume5 = $_POST['volume5'] : $volume5 = '';
        isset($_POST['month_year_pub5']) ? $month_year_pub5 = $_POST['month_year_pub5'] : $month_year_pub5 = '';
        isset($_POST['country_pub5']) ? $country_pub5 = $_POST['country_pub5'] : $country_pub5 = '';
        isset($_POST['database_name5']) ? $database_name5 = $_POST['database_name5'] : $database_name5 = '';
        isset($_POST['tier5']) ? $tier5 = $_POST['tier5'] : $tier5 = '';




        isset($_POST['pre_title1']) ? $pre_title1 = $_POST['pre_title1'] : $pre_title1 = '';
        isset($_POST['name_academic_pre1']) ? $name_academic_pre1 = $_POST['name_academic_pre1'] : $name_academic_pre1 = '';
        isset($_POST['radio_level1']) ? $radio_level1 = $_POST['radio_level1'] : $radio_level1 = '';
        // isset($_POST['radio_nation1']) ? $radio_nation1 = $_POST['radio_nation1'] : $radio_nation1 = '';
        // isset($_POST['radio_inter1']) ? $radio_inter1 = $_POST['radio_inter1'] : $radio_inter1 = '';
        isset($_POST['country_pre1']) ? $country_pre1 = $_POST['country_pre1'] : $country_pre1 = '';
        isset($_POST['date_pre1']) ? $date_pre1 = $_POST['date_pre1'] : $date_pre1 = '';
        isset($_POST['place_pre1']) ? $place_pre1 = $_POST['place_pre1'] : $place_pre1 = '';
        isset($_POST['percent1']) ? $percent1 = $_POST['percent1'] : $percent1 = '';
        isset($_POST['count_pre1']) ? $count_pre1 = $_POST['count_pre1'] : $count_pre1 = '';
        isset($_POST['total_paper_all1']) ? $total_paper_all1 = $_POST['total_paper_all1'] : $total_paper_all1 = '';
        isset($_POST['institution_host1']) ? $institution_host1 = $_POST['institution_host1'] : $institution_host1 = '';
        isset($_POST['institution_external1']) ? $institution_external1 = $_POST['institution_external1'] : $institution_external1 = '';
        isset($_POST['percent_all1']) ? $percent_all1 = $_POST['percent_all1'] : $percent_all1 = '';

        isset($_POST['pre_title2']) ? $pre_title2 = $_POST['pre_title2'] : $pre_title2 = '';
        isset($_POST['name_academic_pre2']) ? $name_academic_pre2 = $_POST['name_academic_pre2'] : $name_academic_pre2 = '';
        isset($_POST['radio_level2']) ? $radio_level2 = $_POST['radio_level2'] : $radio_level2 = '';
        // isset($_POST['radio_nation2']) ? $radio_nation2 = $_POST['radio_nation2'] : $radio_nation2 = '';
        // isset($_POST['radio_inter2']) ? $radio_inter2 = $_POST['radio_inter2'] : $radio_inter2 = '';
        isset($_POST['country_pre2']) ? $country_pre2 = $_POST['country_pre2'] : $country_pre2 = '';
        isset($_POST['date_pre2']) ? $date_pre2 = $_POST['date_pre2'] : $date_pre2 = '';
        isset($_POST['place_pre2']) ? $place_pre2 = $_POST['place_pre2'] : $place_pre2 = '';
        isset($_POST['percent2']) ? $percent2 = $_POST['percent2'] : $percent2 = '';
        isset($_POST['count_pre2']) ? $count_pre2 = $_POST['count_pre2'] : $count_pre2 = '';
        isset($_POST['total_paper_all2']) ? $total_paper_all2 = $_POST['total_paper_all2'] : $total_paper_all2 = '';
        isset($_POST['institution_host2']) ? $couinstitution_host2nt_pre2 = $_POST['couinstitution_host2nt_pre2'] : $institution_host2 = '';
        isset($_POST['institution_external2']) ? $institution_external2 = $_POST['institution_external2'] : $institution_external2 = '';
        isset($_POST['percent_all2']) ? $percent_all2 = $_POST['percent_all2'] : $percent_all2 = '';

        isset($_POST['pre_title3']) ? $pre_title3 = $_POST['pre_title3'] : $pre_title3 = '';
        isset($_POST['name_academic_pre3']) ? $name_academic_pre3 = $_POST['name_academic_pre3'] : $name_academic_pre3 = '';
        isset($_POST['radio_level3']) ? $radio_level3 = $_POST['radio_level3'] : $radio_level3 = '';
        // isset($_POST['radio_nation3']) ? $radio_nation3 = $_POST['radio_nation3'] : $radio_nation3 = '';
        // isset($_POST['radio_inter3']) ? $radio_inter3 = $_POST['radio_inter3'] : $radio_inter3 = '';
        isset($_POST['country_pre3']) ? $country_pre3 = $_POST['country_pre3'] : $country_pre3 = '';
        isset($_POST['date_pre3']) ? $date_pre3 = $_POST['date_pre3'] : $date_pre3 = '';
        isset($_POST['place_pre3']) ? $place_pre3 = $_POST['place_pre3'] : $place_pre3 = '';
        isset($_POST['percent3']) ? $percent3 = $_POST['percent3'] : $percent3 = '';
        isset($_POST['count_pre3']) ? $count_pre3 = $_POST['count_pre3'] : $count_pre3 = '';
        isset($_POST['total_paper_all3']) ? $total_paper_all3 = $_POST['total_paper_all3'] : $total_paper_all3 = '';
        isset($_POST['institution_host3']) ? $couinstitution_host3nt_pre3 = $_POST['couinstitution_host3nt_pre3'] : $institution_host3 = '';
        isset($_POST['institution_external3']) ? $institution_external3 = $_POST['institution_external3'] : $institution_external3 = '';
        isset($_POST['percent_all3']) ? $percent_all3 = $_POST['percent_all3'] : $percent_all3 = '';

        isset($_POST['pre_title4']) ? $pre_title4 = $_POST['pre_title4'] : $pre_title4 = '';
        isset($_POST['name_academic_pre4']) ? $name_academic_pre4 = $_POST['name_academic_pre4'] : $name_academic_pre4 = '';
        isset($_POST['radio_level4']) ? $radio_level4 = $_POST['radio_level4'] : $radio_level4 = '';
        // isset($_POST['radio_nation4']) ? $radio_nation4 = $_POST['radio_nation4'] : $radio_nation4 = '';
        // isset($_POST['radio_inter4']) ? $radio_inter4 = $_POST['radio_inter4'] : $radio_inter4 = '';
        isset($_POST['country_pre4']) ? $country_pre4 = $_POST['country_pre4'] : $country_pre4 = '';
        isset($_POST['date_pre4']) ? $date_pre4 = $_POST['date_pre4'] : $date_pre4 = '';
        isset($_POST['place_pre4']) ? $place_pre4 = $_POST['place_pre4'] : $place_pre4 = '';
        isset($_POST['percent4']) ? $percent4 = $_POST['percent4'] : $percent4 = '';
        isset($_POST['count_pre4']) ? $count_pre4 = $_POST['count_pre4'] : $count_pre4 = '';
        isset($_POST['total_paper_all4']) ? $total_paper_all4 = $_POST['total_paper_all4'] : $total_paper_all4 = '';
        isset($_POST['institution_host4']) ? $couinstitution_host4nt_pre4 = $_POST['couinstitution_host4nt_pre4'] : $institution_host4 = '';
        isset($_POST['institution_external4']) ? $institution_external4 = $_POST['institution_external4'] : $institution_external4 = '';
        isset($_POST['percent_all4']) ? $percent_all4 = $_POST['percent_all4'] : $percent_all4 = '';

        isset($_POST['pre_title5']) ? $pre_title5 = $_POST['pre_title5'] : $pre_title5 = '';
        isset($_POST['name_academic_pre5']) ? $name_academic_pre5 = $_POST['name_academic_pre5'] : $name_academic_pre5 = '';
        isset($_POST['radio_level5']) ? $radio_level5 = $_POST['radio_level5'] : $radio_level5 = '';
        // isset($_POST['radio_nation5']) ? $radio_nation5 = $_POST['radio_nation5'] : $radio_nation5 = '';
        // isset($_POST['radio_inter5']) ? $radio_inter5 = $_POST['radio_inter5'] : $radio_inter5 = '';
        isset($_POST['country_pre5']) ? $country_pre5 = $_POST['country_pre5'] : $country_pre5 = '';
        isset($_POST['date_pre5']) ? $date_pre5 = $_POST['date_pre5'] : $date_pre5 = '';
        isset($_POST['place_pre5']) ? $place_pre5 = $_POST['place_pre5'] : $place_pre5 = '';
        isset($_POST['percent5']) ? $percent5 = $_POST['percent5'] : $percent5 = '';
        isset($_POST['count_pre5']) ? $count_pre5 = $_POST['count_pre5'] : $count_pre5 = '';
        isset($_POST['total_paper_all5']) ? $total_paper_all5 = $_POST['total_paper_all5'] : $total_paper_all5 = '';
        isset($_POST['institution_host5']) ? $couinstitution_host5nt_pre5 = $_POST['couinstitution_host5nt_pre5'] : $institution_host5 = '';
        isset($_POST['institution_external5']) ? $institution_external5 = $_POST['institution_external5'] : $institution_external5 = '';
        isset($_POST['percent_all5']) ? $percent_all5 = $_POST['percent_all5'] : $percent_all5 = '';








        $language = $_POST['language'];



        //check radio
        if ($LevelsInput != null) {
            if ($LevelsInput == 'master') {
                $master = '<span style="font-family:helvetica;">&#x2713;</span>';
            } else if ($LevelsInput == 'doctor') {
                $doctor = '<span style="font-family:helvetica;">&#x2713;</span>';
            }
        }
        //check null
        if ($plan == '<u>' . space(3) . null . space(2) . '</u>') {
            $plan = '..............';
        }
        //check radio
        if ($inputState == 'normal') {
            $regular = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($inputState == 'special') {
            $weekend = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        //check name
        if ($prefix != "other") {
            $name = $prefix . $fname . space(10) . $lname;
        } else {
            $name = $other . $fname . space(10) . $lname;
        }

        if ($telephone == null) {
            $telephone = space(10);
        }

        if ($total == 'private') {
            $private_radio = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == "th") {
                $private_total_th = $total_private;
            } else {
                $private_total_en = $total_private;
            }
        } else if ($total == 'public') {
            $public_radio = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == "th") {
                $public_total_th = $total_public;
                $public_agency_th = $public_agency;
            } else {
                $public_total_en = $total_public;
                $public_agency_en = $public_agency;
            }
        }

        if ($published_nation == 'published_nation') {
            $published_nation = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == 'th') {
                $total_published_nation_th = $total_published_nation;
            } else {
                $total_published_nation_en = $total_published_nation;
            }
        }
        if ($published_inter == 'published_inter') {
            $published_inter = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == 'th') {
                $total_published_inter_th = $total_published_inter;
            } else {
                $total_published_inter_en = $total_published_inter;
            }
        }
        if ($present_nation == 'present_nation') {
            $present_nation = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == 'th') {
                $total_present_nation_th = $total_present_nation;
            } else {
                $total_present_nation_en = $total_present_nation;
            }
        }
        if ($present_inter == 'present_inter') {
            $present_inter = '<span style="font-family:helvetica;">&#x2713;</span>';
            if ($language == 'th') {
                $total_present_inter_th = $total_present_inter;
            } else {
                $total_present_inter_en = $total_present_inter;
            }
        }
        if ($radio_level1 == 'nation') {
            $nation_pdf1 = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($radio_level1 == 'inter') {
            $inter_pdf1 = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        if ($radio_level2 == 'nation') {
            $nation_pdf2 = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($radio_level2 == 'inter') {
            $inter_pdf2 = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        if ($radio_level3 == 'nation') {
            $nation_pdf3 = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($radio_level3 == 'inter') {
            $inter_pdf3 = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        if ($radio_level4 == 'nation') {
            $nation_pdf4 = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($radio_level4 == 'inter') {
            $inter_pdf4 = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        if ($radio_level5 == 'nation') {
            $nation_pdf5 = '<span style="font-family:helvetica;">&#x2713;</span>';
        } else if ($radio_level5 == 'inter') {
            $inter_pdf5 = '<span style="font-family:helvetica;">&#x2713;</span>';
        }
        if ($language == 'th') {
            $percent1_th =  $percent1;
            $count_pre1_th = $count_pre1;
            $total_paper_all1_th = $total_paper_all1;
            $institution_host1_th = $institution_host1;
            $institution_external1_th = $institution_external1;
            $percent_all1_th = $percent_all1;

            $percent2_th = $percent2;
            $count_pre2_th = $count_pre2;
            $total_paper_all2_th = $total_paper_all2;
            $institution_host2_th = $institution_host2;
            $institution_external2_th = $institution_external2;
            $percent_all2_th = $percent_all2;

            $percent3_th = $percent3;
            $count_pre3_th = $count_pre3;
            $total_paper_all3_th = $total_paper_all3;
            $institution_host3_th = $institution_host3;
            $institution_external3_th = $institution_external3;
            $percent_all3_th = $percent_all3;

            $percent4_th = $percent4;
            $count_pre4_th =  $count_pre4;
            $total_paper_all4_th = $total_paper_all4;
            $institution_host4_th = $institution_host4;
            $institution_external4_th = $institution_external4;
            $percent_all4_th = $percent_all4;

            $percent5_th = $percent5;
            $count_pre5_th = $count_pre5;
            $total_paper_all5_th = $total_paper_all5;
            $institution_host5_th = $institution_host5;
            $institution_external5_th = $institution_external5;
            $percent_all5_th = $percent_all5;
        } else if ($language == 'en') {
            $percent1_en =  $percent1;
            $count_pre1_en = $count_pre1;
            $total_paper_all1_en = $total_paper_all1;
            $institution_host1_en = $institution_host1;
            $institution_external1_en = $institution_external1;
            $percent_all1_en = $percent_all1;

            $percent2_en = $percent2;
            $count_pre2_en = $count_pre2;
            $total_paper_all2_en = $total_paper_all2;
            $institution_host2_en = $institution_host2;
            $institution_external2_en = $institution_external2;
            $percent_all2_en = $percent_all2;

            $percent3_en = $percent3;
            $count_pre3_en = $count_pre3;
            $total_paper_all3_en = $total_paper_all3;
            $institution_host3_en = $institution_host3;
            $institution_external3_en = $institution_external3;
            $percent_all3_en = $percent_all3;

            $percent4_en = $percent4;
            $count_pre4_en =  $count_pre4;
            $total_paper_all4_en = $total_paper_all4;
            $institution_host4_en = $institution_host4;
            $institution_external4_en = $institution_external4;
            $percent_all4_en = $percent_all4;

            $percent5_en = $percent5;
            $count_pre5_en = $count_pre5;
            $total_paper_all5_en = $total_paper_all5;
            $institution_host5_en = $institution_host5;
            $institution_external5_en = $institution_external5;
            $percent_all5_en = $percent_all5;
        }


        if ($prefixAdvisor != "other") {
            $nameAdvisor = $prefixAdvisor . $fnameAdvisor . space(10) . $lnameAdvisor;
        } else {
            $nameAdvisor = $otherPrefixAdvisor . $fnameAdvisor . space(10) . $lnameAdvisor;
        }
        if ($prefixCurriculum != "other") {
            $nameCurriculum = $prefixCurriculum . $fnameCurriculum . space(10) . $lnameCurriculum;
        } else {
            $nameCurriculum = $otherPrefixCurriculum . $fnameCurriculum . space(10) . $lnameCurriculum;
        }
    }
    echo '<div style="font-size: 14pt;padding-top: 0.5cm;width:100%;text-align: left;">
              
ระดับการศึกษา' . space(3) . '(' . space(2) . ')' . space(1) . ' ป.บัณฑิต' . space(14) . '(' . $master . ')  ป.โท' . space(17) . '(' . $doctor . ')  ป.เอก' . space(12) . '	           

แผน/แบบ ' . $plan . space(3) . 'ภาค ' . space(8) . '(' . $regular . ') ปกติ ' . space(4) . '     (' . $weekend . ') พิเศษ
  
</div>
<div style="font-size: 14pt;padding-top: -0.2cm;width:100%">
Level' . space(15) . 'Graduate Diploma' . space(5) . 'Master&#39;s degree' . space(6) . 'Doctoral Degree' . space(3) . 'Plan/Type' . space(11) . 'Program' . space(3) . 'Regular' . space(6) . 'Weekend           

    
</div>
';
    ?>


    <div style="font-size: 16pt; padding-top: 0.6cm;position: relative;">

        ชื่อ-นามสกุล (นาย/นาง/นางสาว/อื่น ๆ โปรดระบุ)
        <!-- <span style="position: absolute; top: -1cm; border-bottom: 1.5px dotted black;outline: 50px navy solid;outline-offset: -2px; ">
            dotted underline
        </span> -->
        <?php
        echo
        '
            <span style="text-decoration: underline;width: 100%;">' . space(3) . fill($name, 80) . space(2) .  '</span>
            ';
        ?>
        <!-- …………..……………….….………………………………….………………..…............................ -->
    </div>
    <div style="font-size: 16pt;padding-top: -0.2cm;">
        Name-Surname (Mr./Mrs./Miss/Other, please specify)
    </div>
    <?php echo '

    <div style="font-size: 16pt; padding-top: 0.6cm;">
        <table style="width: 80%; border-collapse: collapse; ">
            <tr>
                <td >
                <div style="font-size: 16pt;"text-align: left; >
                    รหัสประจำตัวนักศึกษา Student ID
                    </div>
                </td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[0] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[1] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[2] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[3] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[4] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[5] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[6] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[7] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[8] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[9] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[10] . '</td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[11] . '</td>
                <td style="width: 0.4cm;">
                    <hr style="width: 100%;height: 2px;background-color: darkslategrey;">
                </td>
                <td style="border: 1px solid black;width: 0.7cm; height: 0cm;text-align: center; ">' . $studentid[13] . '</td>
            </tr>
        </table>
    </div>
    ';
    ?>
    <?php echo
    '
    <table style="font-size: 16pt; padding-top: 0.5cm;">
    <tr>
        <td >
        คณะ <br>Faculty  </td>
        <td style="padding-left:-0.5cm;" >
         <u style="font-size: 14pt;">' . space(3) . $faculty . space(3) . '</u> <br>&nbsp; </td>
        <td >
        สาขาวิชา/วิชาเอก <br>Program/Major Subject  
        </td>
        <td style="padding-left:-1cm;" >
         <u style="font-size: 14pt;" >&nbsp;' . $major . '&nbsp;</u> <br>&nbsp;
        </td>
        <td >
        แขนงวิชา <br>Field of Study 
        </td>
        <td  style="padding-left:-0.9cm;">
         <u style="font-size: 14pt;">&nbsp;' . $field . '&nbsp; </u><br>&nbsp;
        </td>
        </tr>
    </table>
    ';
    ?>
    <!-- <div style="padding-left:-2cm;"></div> -->
    <?php
    echo '
    
    <table style="font-size: 16pt;padding-top: -0.2cm;">
    <tr>
    <td style="width:25%">
    ที่อยู่ปัจจุบัน <br>Current Address
    </td >
    <td style="vertical-align: top;padding-left:-0.5cm;font-size: 14pt;"><u>&nbsp;' . $address . '&nbsp;&nbsp;</u></td>
    </tr>
    </table>
    <div style="font-size: 16pt;padding-top: 0cm;">
    
    </div>
    
    <table style="font-size: 16pt;padding-top: -0.2cm;">
    <tr>
    <td>
    โทรศัพท์ <br>Telephone
    </td>
    <td style="vertical-align: top;">
    <u>' . space(10) . $telephone . space(20) . '</u>
    </td>
    <td>
    โทรศัพท์มือถือ <br>Mobile Phone
    </td>
    <td style="vertical-align: top;">
    <u>' . space(10) . $mobile . space(20) . '</u>
    </td>
    </tr>
    </table>
    <div style="font-size: 16pt;padding-top: -0.2cm;">
    
    </div>
    ';
    ?>
    <?php
    echo '
    <div style="font-size: 16pt; padding-top: 0.6cm;">
        ชื่อเรื่อง (ภาษาไทย) Title in Thai <u> &nbsp;' . $titleTH . '
        &nbsp;</u></div>
    <div style="font-size: 16pt; padding-top: 0cm;">
        ชื่อเรื่อง (ภาษาอังกฤษ) Title in English <u> &nbsp;' . $titleEN . '
        &nbsp;</u></div>
    ';
    ?>
    <div style="font-size: 16pt; padding-top: 0.5cm;">
        การเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;">
        Publication of Dissertation/Thesis/Independent Study
    </div>
    <?php
    echo '
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1cm;">
        (' . $private_radio . ')&nbsp;&nbsp;ใช้ทุนส่วนตัว&nbsp;&nbsp;รวมทั้งสิ้น <u> ' . space(5) . $private_total_th . space(5) . '</u> บาท
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1.7cm;">
        Using self-funded total <u> ' . space(5) . $private_total_en . space(5) . '</u> Baht
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1cm;">
        (' . $public_radio . ')&nbsp;&nbsp;ได้รับทุนจากหน่วยงาน <u> ' . fill($public_agency_th, 100) . '</u>
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1.7cm;">
        โดยได้รับงบประมาณในการเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ รวมทั้งสิ้น <u> &nbsp;&nbsp;' . space(5) . $public_total_th . space(5) . '</u> บาท
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1.7cm;">
        Received scholarship from (institute)<u> ' . fill($public_agency_en, 100) . '</u>
    </div>
    <div style="font-size: 16pt; padding-top: 0cm;padding-left: 1.7cm;">
        by receiving the budget for publication of the dissertation/thesis/independent study total <u> ' . space(5) . $public_total_en . space(5) . '</u> Baht
    </div>
    ';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(1)</div>

    <br><br>

    <!-- page 2 -->
    <div style="font-size: 14pt; padding-top: 1cm;"><b> <u> รายละเอียดการเผยแพร่ผลงาน</u></b></div>
    <div style="font-size: 14pt; padding-top: -0.1cm;"><b> <u> Publication details</u></b></div>

    <div style="font-size: 14pt;padding-left: 1cm;padding-top: 0cm;">ข้าพเจ้าขอรับรองว่าผลงานดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ ได้รับการตีพิมพ์ หรือได้รับการยอมรับให้ตีพิมพ์ในวารสาร หรือสิ่งพิมพ์ทาง </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;">วิชาการ หรือได้เสนอต่อที่ประชุมวิชาการที่มีรายงานการประชุม (Proceeding) ดังนี้</div>
    <div style="font-size: 14pt;padding-left: 1cm;padding-top: -0.05cm;">
        I certify that my dissertation/thesis/independent study was published or accepted in a journal or academic publication or
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;">presented at an academic conference that has proceedings as follows:</div>
    <?php
    echo
    '<div style="font-size: 13pt;padding-left: 1cm;padding-top: -0.05cm;">
    (' . $published_nation . ')' . space(2) . 'ตีพิมพ์ในวารสาร ระดับชาติ หรือสิ่งพิมพ์ทางวิชาการที่มีคณะกรรมการร่วมกลั่นกรอง (Peer review)' . space(2) . 'จำนวน <u> ' . space(5) . $total_published_nation_th . space(5) . '</u> เรื่อง             
    </div>
    <div style="font-size: 12pt;padding-left: 1.7cm;padding-top: -0.05cm;">
    Published in a national journal or academic publication that has a peer review committee' . space(7) . 'total <u> ' . space(5) . $total_published_nation_en . space(5) . '</u> paper(s)            
    </div>
    <div style="font-size: 13pt;padding-left: 1cm;padding-top: -0.05cm;">
    (' . $published_inter . ')' . space(2) . 'ตีพิมพ์ในวารสาร ระดับนานาชาติ' . space(82) . 'จำนวน <u> ' . space(5) . $total_published_inter_th . space(5) . '</u> เรื่อง             
    </div>
    <div style="font-size: 12pt;padding-left: 1.7cm;padding-top: -0.05cm;">
    Published in an international journal' . space(82) . 'total <u> ' . space(5) . $total_published_inter_en . space(5) . '</u> paper(s)          
    </div>
    <div style="font-size: 13pt;padding-left: 1cm;padding-top: -0.05cm;">
    (' . $present_nation . ')' . space(2) . 'นำเสนอต่อที่ประชุมวิชาการที่มีรายงานการประชุม (Proceeding) ระดับชาติ' . space(30) . 'จำนวน <u> ' . space(5) . $total_present_nation_th . space(5) . '</u> เรื่อง             
    </div>
    <div style="font-size: 12pt;padding-left: 1.7cm;padding-top: -0.05cm;">
    Presented at an academic conference that has proceedings of national level' . space(25) . 'total <u> ' . space(5) . $total_present_nation_en . space(5) . '</u> paper(s)          
    </div>
    <div style="font-size: 13pt;padding-left: 1cm;padding-top: -0.05cm;">
    (' . $present_inter . ')' . space(2) . 'นำเสนอต่อที่ประชุมวิชาการที่มีรายงานการประชุม (Proceeding) ระดับนานาชาติ' . space(23) . 'จำนวน <u> ' . space(5) . $total_present_inter_th . space(5) . '</u> เรื่อง             
    </div>
    <div style="font-size: 12pt;padding-left: 1.7cm;padding-top: -0.05cm;">
    Presented at an academic conference that has proceedings of international level' . space(19) . 'total <u> ' . space(5) . $total_present_inter_en . space(5) . '</u> paper(s)          
    </div>
    
    ';
    ?>
    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0.5cm;">1.&nbsp;&nbsp; ชื่อเรื่องที่ตีพิมพ์ <u>&nbsp;' . fill($pub_title1, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Published Title</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อวารสารทางวิชาการที่ตีพิมพ์ <u>&nbsp;' . fill($name_academic1, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">Name of the academic journal</div>
    <table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
    <tr>
    <td>ฉบับที่ <br>Issue number</td>
    <td style="vertical-align: top;padding-left:-1.1cm;font-size: 14pt;"> <u>&nbsp;' . fill($issue_num1, 5) . ' &nbsp;</u> </td>
    <td>ปีที่ <br>Volume</td>
    <td style="vertical-align: top;padding-left:-0.7cm;font-size: 14pt;"><u>&nbsp;' . fill($volume1, 5) . '&nbsp;</u></td>
    <td>เดือน <br>Month</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub1[5] . fill($month_year_pub1[6], 5) . '&nbsp;</u></td>
    <td style="vertical-align: top;font-size: 14pt;">พ.ศ./ค.ศ <br>B.E. / A.D.</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub1[0] . $month_year_pub1[1] . $month_year_pub1[2] . fill($month_year_pub1[3], 5) . '&nbsp;</u></td>
    <td>ประเทศ <br>Country</td>
    <td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($country_pub1, 20) . '&nbsp;</u></td>
    </tr>
    
    
    </table>
    

<table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
<tr>
<td>อยู่ในฐาน <br>Listed in the database name</td>
<td style="vertical-align: top;padding-left:-3cm;font-size: 14pt;"><u>&nbsp;' . fill($database_name1, 50) . ' &nbsp;</u></td>
<td>กลุ่ม <br>Tier</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($tier1, 50) . ' &nbsp;</u></td>
</tr>
</table>


';
    ?>
    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0cm;">2.&nbsp;&nbsp; ชื่อเรื่องที่ตีพิมพ์ <u> &nbsp; ' . fill($pub_title2, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Published Title</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อวารสารทางวิชาการที่ตีพิมพ์<u> &nbsp; ' . fill($name_academic2, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">Name of the academic journal</div>
    <table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
    <tr>
    <td>ฉบับที่ <br>Issue number</td>
    <td style="vertical-align: top;padding-left:-1.1cm;font-size: 14pt;"> <u>&nbsp;' . fill($issue_num2, 5) . ' &nbsp;</u> </td>
    <td>ปีที่ <br>Volume</td>
    <td style="vertical-align: top;padding-left:-0.7cm;font-size: 14pt;"><u>&nbsp;' . fill($volume2, 5) . '&nbsp;</u></td>
    <td>เดือน <br>Month</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub2[5] . fill($month_year_pub2[6], 5) . '&nbsp;</u></td>
    <td style="vertical-align: top;font-size: 14pt;">พ.ศ./ค.ศ <br>B.E. / A.D.</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub2[0] . $month_year_pub2[1] . $month_year_pub2[2] . fill($month_year_pub2[3], 5) . '&nbsp;</u></td>
    <td>ประเทศ <br>Country</td>
    <td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($country_pub2, 20) . '&nbsp;</u></td>
    </tr>
    
    
    </table>
    

<table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
<tr>
<td>อยู่ในฐาน <br>Listed in the database name</td>
<td style="vertical-align: top;padding-left:-3cm;font-size: 14pt;"><u>&nbsp;' . fill($database_name2, 50) . ' &nbsp;</u></td>
<td>กลุ่ม <br>Tier</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($tier2, 50) . ' &nbsp;</u></td>
</tr>
</table>
';
    ?>

    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0cm;">3.&nbsp;&nbsp; ชื่อเรื่องที่ตีพิมพ์ <u> &nbsp; ' . fill($pub_title3, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Published Title</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อวารสารทางวิชาการที่ตีพิมพ์<u> &nbsp; ' . fill($name_academic3, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">Name of the academic journal</div>
    <table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
    <tr>
    <td>ฉบับที่ <br>Issue number</td>
    <td style="vertical-align: top;padding-left:-1.1cm;font-size: 14pt;"> <u>&nbsp;' . fill($issue_num3, 5) . ' &nbsp;</u> </td>
    <td>ปีที่ <br>Volume</td>
    <td style="vertical-align: top;padding-left:-0.7cm;font-size: 14pt;"><u>&nbsp;' . fill($volume3, 5) . '&nbsp;</u></td>
    <td>เดือน <br>Month</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub3[5] . fill($month_year_pub3[6], 5) . '&nbsp;</u></td>
    <td style="vertical-align: top;font-size: 14pt;">พ.ศ./ค.ศ <br>B.E. / A.D.</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub3[0] . $month_year_pub3[1] . $month_year_pub3[2] . fill($month_year_pub3[3], 5) . '&nbsp;</u></td>
    <td>ประเทศ <br>Country</td>
    <td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($country_pub3, 20) . '&nbsp;</u></td>
    </tr>
    
    
    </table>
    

<table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
<tr>
<td>อยู่ในฐาน <br>Listed in the database name</td>
<td style="vertical-align: top;padding-left:-3cm;font-size: 14pt;"><u>&nbsp;' . fill($database_name3, 50) . ' &nbsp;</u></td>
<td>กลุ่ม <br>Tier</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($tier3, 50) . ' &nbsp;</u></td>
</tr>
</table>
';
    ?>
    <br><br><br>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(2)</div>
    <!-- page 3 -->
    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0cm;">4.&nbsp;&nbsp; ชื่อเรื่องที่ตีพิมพ์ <u> &nbsp; ' . fill($pub_title4, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Published Title</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อวารสารทางวิชาการที่ตีพิมพ์<u> &nbsp; ' . fill($name_academic4, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">Name of the academic journal</div>
    <table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
    <tr>
    <td>ฉบับที่ <br>Issue number</td>
    <td style="vertical-align: top;padding-left:-1.1cm;font-size: 14pt;"> <u>&nbsp;' . fill($issue_num4, 5) . ' &nbsp;</u> </td>
    <td>ปีที่ <br>Volume</td>
    <td style="vertical-align: top;padding-left:-0.7cm;font-size: 14pt;"><u>&nbsp;' . fill($volume4, 5) . '&nbsp;</u></td>
    <td>เดือน <br>Month</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub4[5] . fill($month_year_pub4[6], 5) . '&nbsp;</u></td>
    <td style="vertical-align: top;font-size: 14pt;">พ.ศ./ค.ศ <br>B.E. / A.D.</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub4[0] . $month_year_pub4[1] . $month_year_pub4[2] . fill($month_year_pub4[3], 5) . '&nbsp;</u></td>
    <td>ประเทศ <br>Country</td>
    <td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($country_pub4, 20) . '&nbsp;</u></td>
    </tr>
    
    
    </table>
    

<table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
<tr>
<td>อยู่ในฐาน <br>Listed in the database name</td>
<td style="vertical-align: top;padding-left:-3cm;font-size: 14pt;"><u>&nbsp;' . fill($database_name4, 50) . ' &nbsp;</u></td>
<td>กลุ่ม <br>Tier</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($tier4, 50) . ' &nbsp;</u></td>
</tr>
</table>

';
    ?>


    <?php

    echo '
    <div style="font-size: 14pt;padding-top: 0cm;">5.&nbsp;&nbsp; ชื่อเรื่องที่ตีพิมพ์ <u> &nbsp; ' . fill($pub_title5, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Published Title</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อวารสารทางวิชาการที่ตีพิมพ์<u> &nbsp; ' . fill($name_academic5, 100) . ' </u>
    </div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">Name of the academic journal</div>
    <table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
    <tr>
    <td>ฉบับที่ <br>Issue number</td>
    <td style="vertical-align: top;padding-left:-1.1cm;font-size: 14pt;"> <u>&nbsp;' . fill($issue_num5, 5) . ' &nbsp;</u> </td>
    <td>ปีที่ <br>Volume</td>
    <td style="vertical-align: top;padding-left:-0.7cm;font-size: 14pt;"><u>&nbsp;' . fill($volume5, 5) . '&nbsp;</u></td>
    <td>เดือน <br>Month</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub5[5] . fill($month_year_pub5[6], 5) . '&nbsp;</u></td>
    <td style="vertical-align: top;font-size: 14pt;">พ.ศ./ค.ศ <br>B.E. / A.D.</td>
    <td style="vertical-align: top;padding-left:-0.3cm;font-size: 14pt;"><u>&nbsp;' . $month_year_pub5[0] . $month_year_pub5[1] . $month_year_pub5[2] . fill($month_year_pub5[3], 5) . '&nbsp;</u></td>
    <td>ประเทศ <br>Country</td>
    <td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($country_pub5, 20) . '&nbsp;</u></td>
    </tr>
    
    
    </table>
    

<table style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">
<tr>
<td>อยู่ในฐาน <br>Listed in the database name</td>
<td style="vertical-align: top;padding-left:-3cm;font-size: 14pt;"><u>&nbsp;' . fill($database_name3, 50) . ' &nbsp;</u></td>
<td>กลุ่ม <br>Tier</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($tier3, 50) . ' &nbsp;</u></td>
</tr>
</table>

';
    ?>








    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0.35cm;">6.&nbsp;&nbsp; ชื่อเรื่องที่นำเสนอ <u>&nbsp; ' . fill($pre_title1, 100) . '&nbsp;</u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Title presented</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">Name of academic conference/exhibition/show</div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;line-height: 0.65cm;"><u>' . fill($name_academic_pre1, 300) . '</u>

    </div>
    
<div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">(' . $nation_pdf1 . ') ระดับชาติ' . space(9) . '(' . $inter_pdf1 . ') นานาชาติ' . space(11) . 'จัดขึ้นที่ประเทศ <u>&nbsp;' . fill($country_pre1, 80) . '</u>
</div>
<div style="font-size: 12pt;padding-top: -0.05cm;padding-left: 0.6cm;">' . space(4) . 'National level' . space(12) . 'International level' . space(3) . 'held in (country) 
</div>

<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">
<tr>
<td>นำเสนอผลงานวันที่ <br>Presented on date</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre1[8] . fill($date_pre1[9], 3) . '</u></td>
<td>เดือน <br>Month</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre1[5] . fill($date_pre1[6], 3) . '</u></td>
<td>พ.ศ./ค.ศ <br>B.E. /A.D.</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre1[0] . $date_pre1[1] . $date_pre1[2] . fill($date_pre1[3], 5) . '</u></td>
<td>สถานที่ <br>Place</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($place_pre1, 65) . '</u></td>

</tr>
</table>


<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือ
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
ผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ ร้อยละ <u>&nbsp;' . fill($percent1_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ จำนวน <u>&nbsp;' . fill($count_pre1_th, 3) . '&nbsp;</u> หน่วยงาน
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จำนวนบทความทั้งหมด <u>&nbsp;' . fill($total_paper_all1_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันเจ้าภาพ <u>&nbsp;' . fill($institution_host1_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันภายนอก <u>&nbsp;' . fill($institution_external1_th, 3) . '&nbsp;</u> บทความ รวมบทความที่มา
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จากสถาบันภายนอก คิดเป็นร้อยละ <u>&nbsp;' . fill($percent_all1_th, 3) . '&nbsp;</u>
</div>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'There is an editorial board for publishing the full paper in the proceedings or a conference organizing committee 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
consisting of a professor or an expert doctoral degree holder or an expert whose work is recognized in the field from external 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
host institution as a percentage of <u>&nbsp;' . fill($percent1_en, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Papers from external host institution with amount of <u>&nbsp;' . fill($count_pre1_en, 3) . '&nbsp;</u> institution(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper <u>&nbsp;' . fill($total_paper_all1_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from host institution <u>&nbsp;' . fill($institution_host1_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from external institution <u>&nbsp;' . fill($institution_external1_en, 3) . '&nbsp;</u> paper(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper from external institutions as a percentage of <u>&nbsp;' . fill($percent_all1_en, 3) . '&nbsp;</u>
</div>

';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(3)</div>
    <?php


    echo '
    <pagebreak/>
    <div style="font-size: 14pt;padding-top: 0.35cm;">7.&nbsp;&nbsp; ชื่อเรื่องที่นำเสนอ <u>&nbsp; ' . fill($pre_title2, 100) . '&nbsp;</u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Title presented</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">Name of academic conference/exhibition/show</div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;line-height: 0.65cm;"><u>' . fill($name_academic_pre2, 300) . '</u>

    </div>
    
<div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">(' . $nation_pdf2 . ') ระดับชาติ' . space(9) . '(' . $inter_pdf2 . ') นานาชาติ' . space(11) . 'จัดขึ้นที่ประเทศ <u>&nbsp;' . fill($country_pre2, 80) . '</u>
</div>
<div style="font-size: 12pt;padding-top: -0.05cm;padding-left: 0.6cm;">' . space(4) . 'National level' . space(12) . 'International level' . space(3) . 'held in (country) 
</div>

<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">
<tr>
<td>นำเสนอผลงานวันที่ <br>Presented on date</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre2[8] . fill($date_pre2[9], 3) . '</u></td>
<td>เดือน <br>Month</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre2[5] . fill($date_pre2[6], 3) . '</u></td>
<td>พ.ศ./ค.ศ <br>B.E. /A.D.</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre2[0] . $date_pre2[1] . $date_pre1[2] . fill($date_pre2[3], 5) . '</u></td>
<td>สถานที่ <br>Place</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($place_pre2, 65) . '</u></td>

</tr>
</table>


<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือ
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
ผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ ร้อยละ <u>&nbsp;' . fill($percent2_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ จำนวน <u>&nbsp;' . fill($count_pre2_th, 3) . '&nbsp;</u> หน่วยงาน
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จำนวนบทความทั้งหมด <u>&nbsp;' . fill($total_paper_all2_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันเจ้าภาพ <u>&nbsp;' . fill($institution_host2_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันภายนอก <u>&nbsp;' . fill($institution_external2_th, 3) . '&nbsp;</u> บทความ รวมบทความที่มา
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จากสถาบันภายนอก คิดเป็นร้อยละ <u>&nbsp;' . fill($percent_all2_th, 3) . '&nbsp;</u>
</div>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'There is an editorial board for publishing the full paper in the proceedings or a conference organizing committee 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
consisting of a professor or an expert doctoral degree holder or an expert whose work is recognized in the field from external 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
host institution as a percentage of <u>&nbsp;' . fill($percent2_en, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Papers from external host institution with amount of <u>&nbsp;' . fill($count_pre2_en, 3) . '&nbsp;</u> institution(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper <u>&nbsp;' . fill($total_paper_all2_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from host institution <u>&nbsp;' . fill($institution_host2_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from external institution <u>&nbsp;' . fill($institution_external2_en, 3) . '&nbsp;</u> paper(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper from external institutions as a percentage of <u>&nbsp;' . fill($percent_all2_en, 3) . '&nbsp;</u>
</div>

';


    ?>

    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0.35cm;">8.&nbsp;&nbsp; ชื่อเรื่องที่นำเสนอ <u>&nbsp; ' . fill($pre_title3, 100) . '&nbsp;</u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Title presented</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">Name of academic conference/exhibition/show</div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;line-height: 0.65cm;"><u>' . fill($name_academic_pre3, 300) . '</u>

    </div>
    
<div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">(' . $nation_pdf3 . ') ระดับชาติ' . space(9) . '(' . $inter_pdf3 . ') นานาชาติ' . space(11) . 'จัดขึ้นที่ประเทศ <u>&nbsp;' . fill($country_pre3, 80) . '</u>
</div>
<div style="font-size: 12pt;padding-top: -0.05cm;padding-left: 0.6cm;">' . space(4) . 'National level' . space(12) . 'International level' . space(3) . 'held in (country) 
</div>

<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">
<tr>
<td>นำเสนอผลงานวันที่ <br>Presented on date</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre3[8] . fill($date_pre3[9], 3) . '</u></td>
<td>เดือน <br>Month</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre3[5] . fill($date_pre3[6], 3) . '</u></td>
<td>พ.ศ./ค.ศ <br>B.E. /A.D.</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre3[0] . $date_pre3[1] . $date_pre3[2] . fill($date_pre3[3], 5) . '</u></td>
<td>สถานที่ <br>Place</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($place_pre3, 65) . '</u></td>

</tr>
</table>


<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือ
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
ผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ ร้อยละ <u>&nbsp;' . fill($percent3_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ จำนวน <u>&nbsp;' . fill($count_pre3_th, 3) . '&nbsp;</u> หน่วยงาน
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จำนวนบทความทั้งหมด <u>&nbsp;' . fill($total_paper_all3_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันเจ้าภาพ <u>&nbsp;' . fill($institution_host3_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันภายนอก <u>&nbsp;' . fill($institution_external3_th, 3) . '&nbsp;</u> บทความ รวมบทความที่มา
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จากสถาบันภายนอก คิดเป็นร้อยละ <u>&nbsp;' . fill($percent_all3_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(4)</div>

<pagebreak/>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'There is an editorial board for publishing the full paper in the proceedings or a conference organizing committee 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
consisting of a professor or an expert doctoral degree holder or an expert whose work is recognized in the field from external 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
host institution as a percentage of <u>&nbsp;' . fill($percent3_en, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Papers from external host institution with amount of <u>&nbsp;' . fill($count_pre3_en, 3) . '&nbsp;</u> institution(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper <u>&nbsp;' . fill($total_paper_all3_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from host institution <u>&nbsp;' . fill($institution_host3_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from external institution <u>&nbsp;' . fill($institution_external3_en, 3) . '&nbsp;</u> paper(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper from external institutions as a percentage of <u>&nbsp;' . fill($percent_all3_en, 3) . '&nbsp;</u>
</div>
';
    ?>

    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0.35cm;">9.&nbsp;&nbsp; ชื่อเรื่องที่นำเสนอ <u>&nbsp; ' . fill($pre_title4, 100) . '&nbsp;</u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Title presented</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">Name of academic conference/exhibition/show</div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;line-height: 0.65cm;"><u>' . fill($name_academic_pre4, 300) . '</u>

    </div>
    
<div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">(' . $nation_pdf4 . ') ระดับชาติ' . space(9) . '(' . $inter_pdf4 . ') นานาชาติ' . space(11) . 'จัดขึ้นที่ประเทศ <u>&nbsp;' . fill($country_pre4, 80) . '</u>
</div>
<div style="font-size: 12pt;padding-top: -0.05cm;padding-left: 0.6cm;">' . space(4) . 'National level' . space(12) . 'International level' . space(3) . 'held in (country) 
</div>

<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">
<tr>
<td>นำเสนอผลงานวันที่ <br>Presented on date</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre4[8] . fill($date_pre4[9], 3) . '</u></td>
<td>เดือน <br>Month</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre4[5] . fill($date_pre4[6], 3) . '</u></td>
<td>พ.ศ./ค.ศ <br>B.E. /A.D.</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre4[0] . $date_pre4[1] . $date_pre4[2] . fill($date_pre4[3], 5) . '</u></td>
<td>สถานที่ <br>Place</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($place_pre4, 65) . '</u></td>

</tr>
</table>


<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือ
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
ผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ ร้อยละ <u>&nbsp;' . fill($percent4_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ จำนวน <u>&nbsp;' . fill($count_pre4_th, 3) . '&nbsp;</u> หน่วยงาน
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จำนวนบทความทั้งหมด <u>&nbsp;' . fill($total_paper_all4_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันเจ้าภาพ <u>&nbsp;' . fill($institution_host4_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันภายนอก <u>&nbsp;' . fill($institution_external4_th, 3) . '&nbsp;</u> บทความ รวมบทความที่มา
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จากสถาบันภายนอก คิดเป็นร้อยละ <u>&nbsp;' . fill($percent_all4_th, 3) . '&nbsp;</u>
</div>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'There is an editorial board for publishing the full paper in the proceedings or a conference organizing committee 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
consisting of a professor or an expert doctoral degree holder or an expert whose work is recognized in the field from external 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
host institution as a percentage of <u>&nbsp;' . fill($percent4_en, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Papers from external host institution with amount of <u>&nbsp;' . fill($count_pre4_en, 3) . '&nbsp;</u> institution(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper <u>&nbsp;' . fill($total_paper_all4_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from host institution <u>&nbsp;' . fill($institution_host4_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from external institution <u>&nbsp;' . fill($institution_external4_en, 3) . '&nbsp;</u> paper(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper from external institutions as a percentage of <u>&nbsp;' . fill($percent_all4_en, 3) . '&nbsp;</u>
</div>

';
    ?>

    <?php
    echo '
    <div style="font-size: 14pt;padding-top: 0.35cm;">10.&nbsp;&nbsp; ชื่อเรื่องที่นำเสนอ <u>&nbsp; ' . fill($pre_title5, 100) . '&nbsp;</u>
    </div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">Title presented</div>
    <div style="font-size: 14pt;padding-top: -0.1cm;padding-left: 0.6cm;">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง
    </div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">Name of academic conference/exhibition/show</div>
    <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;line-height: 0.65cm;"><u>' . fill($name_academic_pre5, 300) . '</u>

    </div>
    
<div style="font-size: 14pt;padding-top: 0cm;padding-left: 0.6cm;">(' . $nation_pdf5 . ') ระดับชาติ' . space(9) . '(' . $inter_pdf5 . ') นานาชาติ' . space(11) . 'จัดขึ้นที่ประเทศ <u>&nbsp;' . fill($country_pre5, 80) . '</u>
</div>
<div style="font-size: 12pt;padding-top: -0.05cm;padding-left: 0.6cm;">' . space(4) . 'National level' . space(12) . 'International level' . space(3) . 'held in (country) 
</div>

<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0.6cm;">
<tr>
<td>นำเสนอผลงานวันที่ <br>Presented on date</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre5[8] . fill($date_pre5[9], 3) . '</u></td>
<td>เดือน <br>Month</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre5[5] . fill($date_pre5[6], 3) . '</u></td>
<td>พ.ศ./ค.ศ <br>B.E. /A.D.</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . $date_pre5[0] . $date_pre5[1] . $date_pre5[2] . fill($date_pre5[3], 5) . '</u></td>
<td>สถานที่ <br>Place</td>
<td style="vertical-align: top;padding-left:0cm;font-size: 14pt;"><u>&nbsp;' . fill($place_pre5, 65) . '</u></td>

</tr>
</table>
<div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(5)</div>

<pagebreak/>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือ
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
ผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ ร้อยละ <u>&nbsp;' . fill($percent5_th, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ จำนวน <u>&nbsp;' . fill($count_pre5_th, 3) . '&nbsp;</u> หน่วยงาน
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จำนวนบทความทั้งหมด <u>&nbsp;' . fill($total_paper_all5_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันเจ้าภาพ <u>&nbsp;' . fill($institution_host5_th, 3) . '&nbsp;</u> บทความ บทความจากสถาบันภายนอก <u>&nbsp;' . fill($institution_external5_th, 3) . '&nbsp;</u> บทความ รวมบทความที่มา
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
จากสถาบันภายนอก คิดเป็นร้อยละ <u>&nbsp;' . fill($percent_all5_th, 3) . '&nbsp;</u>
</div>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(11) . 'There is an editorial board for publishing the full paper in the proceedings or a conference organizing committee 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
consisting of a professor or an expert doctoral degree holder or an expert whose work is recognized in the field from external 
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
host institution as a percentage of <u>&nbsp;' . fill($percent5_en, 3) . '&nbsp;</u>
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Papers from external host institution with amount of <u>&nbsp;' . fill($count_pre5_en, 3) . '&nbsp;</u> institution(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper <u>&nbsp;' . fill($total_paper_all5_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from host institution <u>&nbsp;' . fill($institution_host5_en, 3) . '&nbsp;</u> paper(s)' . space(3) . 'Paper from external institution <u>&nbsp;' . fill($institution_external5_en, 3) . '&nbsp;</u> paper(s)
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
Total number of paper from external institutions as a percentage of <u>&nbsp;' . fill($percent_all5_en, 3) . '&nbsp;</u>
</div>

';
    ?>
    <?php
    echo '
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 2.6cm;">
ข้าพเจ้าได้แนบเอกสาร ตามข้อมูลข้างต้น เพื่อขอสำเร็จการศึกษาด้วยแล้ว
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 2.6cm;">
I have attached the document according to the above information to request for graduation
</div>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<table style="font-size: 14pt;padding-top: -0.05cm;padding-left: 6.5cm;">
<tr>
<td>ลงชื่อ Signature</td>
<td>…………………………………….…………………….</td>
</tr>
<tr>
<td>&nbsp;</td>
<td style="font-size: 14pt;text-align: center;">( ' . $name . '&nbsp;)</td>
</tr>
</table>

<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(19) . 'ลงชื่อ Signature …………………………………….…………………...' . space(5) . 'อาจารย์ที่ปรึกษาหลัก Major Advisor
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(40) . '(' . $nameAdvisor . ')' . space(5) . 'วันที่ Date ...........เดือน Month ......................พ.ศ.' . space(2) . 'Year.............
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(12) . 'ลงชื่อ Signature ……………………………….…………………...' . space(1) . 'ประธานกรรมการบริหารหลักสูตร Curriculum Executive Committee Chairman
</div>
<div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">
' . space(33) . '(' . $nameCurriculum . ')' . space(5) . 'วันที่ Date ...........เดือน Month ......................พ.ศ.' . space(2) . 'Year.............
</div>
';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(6)</div>
    <br><br><br><br><br>
    <!-- page 5 -->
    <!-- <div style="font-size: 14pt;padding-top: -0.05cm;padding-left: 0cm;">&nbsp;</div> -->
    <?php echo '<pagebreak/>';  ?>

    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.4cm;"><b> <u> หมายเหตุ</u></b></div>
    <div style="font-size: 14pt; padding-top: -0.11cm;"><b> <u> นักศึกษาที่เข้าศึกษาปีการศึกษา 2556-2558</u></b></div>
    <div style="font-size: 14pt; padding-top: -0.11cm;"><b> <u> Students starting the university in the academic year of 2013-2015</u></b></div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0cm;">&nbsp;</div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . '1.' . space(4) . 'นักศึกษาระดับปริญญาเอก ตีพิมพ์ในวารสารระดับนานาชาติ 1 บทความ หรือระดับชาติ 2 บทความ และนำเสนอที่ประชุมทางวิชาการ 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . 'Doctoral Degree Students: 1 publication in an international journal or 2 publications in an national journal and 1 publication ' . space(6) . 'in an academic conference.
</div>

<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0.58cm;">
2.' . space(4) . 'นักศึกษาระดับปริญญาโท ตีพิมพ์ในวารสารระดับนานาชาติหรือระดับชาติ 1 บทความ หรือนำเสนอที่ประชุมทางวิชาการ 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0.56cm;">
Master’s Degree Students:  1 publication in international journal or national journal or 1 publication in an academic conference.
</div>
';
    ?>
    <div style="font-size: 14pt;padding-top: 0.3cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.4cm;"><b> <u> นักศึกษาที่เข้าศึกษาปีการศึกษา 2559-2560 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.11cm;"><b> <u> Students starting the university in the academic year of 2016-2017</u></b></div>
    <div style="font-size: 14pt;padding-top: 0cm;padding-left: 0cm;">&nbsp;</div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . '1.' . space(4) . 'นักศึกษาระดับปริญญาเอก ตีพิมพ์ในวารสารระดับนานาชาติ หรือระดับชาติ 2 บทความ และนำเสนอที่ประชุมทางวิชาการ 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'Doctoral Degree Students: 2 publications in an international journal or 2 publications in an in and 1 publication in an 
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'academic conference.
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . '2.' . space(4) . 'นักศึกษาระดับปริญญาโท แผน ก แบบ ก1 ตีพิมพ์ในวารสาร 1 บทความ และนำเสนอที่ประชุมทางวิชาการ 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'Master’s Degree Students Plan A Type A1:  1 publication in journal and 1 publication in an academic conference.
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . '3.' . space(4) . 'นักศึกษาระดับปริญญาโท แผน ก แบบ ก2 และ แผน ข ตีพิมพ์ในวารสารระดับนานาชาติ หรือระดับชาติ 1 บทความ หรือนำเสนอที่ประชุมทางวิชาการ 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'Master’s Degree Students Plan A Type A2 and Plan B:  1 publication in an international journal or national journal or 1
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'publication in an academic conference.
</div>
';
    ?>
    <div style="font-size: 14pt; padding-top: 0.2cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: 0.2cm;padding-left: 0cm;">&nbsp;</div>

    <div style="font-size: 14pt; padding-top: -0.4cm;"><b> <u> นักศึกษาที่เข้าศึกษาปีการศึกษา 2561-2563 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.11cm;"><b> <u> Students starting the university in the academic year of 2018-2020 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">&nbsp;</div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(6) . '1.' . space(4) . 'นักศึกษาระดับปริญญาเอก แบบ 1 ต้องตีพิมพ์อย่างน้อย 3 บทความ อย่างใดอย่างหนึ่ง ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . 'Doctoral degree student Type 1: At least 3 publications, one of the following:
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . '1) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 3 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(15) . 'At least 3 publications in an international journal. 
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . '2) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 2 บทความ และตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ  
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an international journal and at least 1 publication in national journal.
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . '3) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 2 บทความ และนำเสนอในการประชุมวิชาการระดับนานาชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an international journal and at least 1 publication in an academic international conference.
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(13) . '4) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 2 บทความ และนำเสนอในการประชุมวิชาการระดับชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.11cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an international journal and at least 1 publication in an academic national conference.
</div>

';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(7)</div>
    <br><br><br><br><br><br><br>
    <!-- page 6 -->
    <?php
    echo '
<div style="font-size: 14pt; padding-top: 0.35cm;padding-left: 0cm;">
' . space(6) . '2.' . space(4) . 'นักศึกษาระดับปริญญาเอก แบบ 2 ต้องตีพิมพ์อย่างน้อย 2 บทความ อย่างใดอย่างหนึ่ง ดังต่อไปนี้ 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . 'Doctoral degree student Type 2: At least 2 publications, one of the following:
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '1) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 2 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an international journal.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '2) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความและตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ  
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in national journal.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '3) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความและนำเสนอในการประชุมวิชาการระดับนานาชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in an academic international conference.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '4) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความและนำเสนอในการประชุมวิชาการระดับชาติอย่างน้อย 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in an academic national conference.
</div>

';
    ?>


    <?php
    echo '
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(6) . '3.' . space(4) . 'นักศึกษาระดับปริญญาโท แผน ก แบบ ก1 ต้องตีพิมพ์อย่างน้อย 2 บทความ อย่างใดอย่างหนึ่ง ดังต่อไปนี้ 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . 'Master’s degree student Plan A Type A1: At least 2 publications, one of the following:
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '1) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 2 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an international journal.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '2) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความ และตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in national journal. 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '3) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความ และนำเสนอในการประชุมวิชาการระดับนานาชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in an academic international conference. 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '4) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อย 1 บทความ และนำเสนอในการประชุมวิชาการระดับชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal and at least 1 publication in an academic national conference. 
</div>
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '5) ตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 2 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 2 publications in an national journal 
</div>
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '6) ตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ และนำเสนอในการประชุมวิชาการระดับนานาชาติอย่างน้อย 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an national journal and at least 1 publication in an academic international conference. 
</div>
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '7) ตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ และนำเสนอในการประชุมวิชาการระดับชาติอย่างน้อย 1 บทความ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an national journal and at least 1 publication in an academic national conference. 
</div>


<div style="font-size: 14pt; padding-top: 0.35cm;padding-left: 0cm;">
' . space(6) . '4.' . space(4) . 'นักศึกษาระดับปริญญาโท แผน ก แบบ ก2 และ แผน ข ต้องตีพิมพ์อย่างน้อย 1 บทความ อย่างใดอย่างหนึ่ง ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . 'Master’s degree student Plan A Type A2 and Plan B: At least 1 publication, one of the following: 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '1) ตีพิมพ์ในวารสารวิชาการระดับนานาชาติอย่างน้อยจำนวน 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an international journal. 
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '2) ตีพิมพ์ในวารสารวิชาการระดับชาติอย่างน้อย 1 บทความ   
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an national journal.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '3) นำเสนอในการประชุมวิชาการระดับนานาชาติอย่างน้อย 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an academic international conference.
</div>
<div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">
' . space(13) . '4) นำเสนอในการประชุมวิชาการระดับชาติอย่างน้อย 1 บทความ 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(15) . 'At least 1 publication in an academic national conference.
</div>

';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(8)</div>
    <br><br><br><br><br><br>

    <!-- page 7 -->
    <div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: 0cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.4cm;padding-left: -0.1cm;text-align: center;"><b> <u> ฐานข้อมูลการตีพิมพ์วารสารตามประกาศของมหาวิทยาลัย </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: -0.1cm;text-align: center;"><b> <u> List of journal databases according to the announcement of the university </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.15cm;"><b> <u> สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2556-2558 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;"><b> <u> Students starting the university in the academic year of 2013-2015 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.05cm;padding-left: 2.5cm;">
วารสารที่มีชื่ออยู่ในฐานข้อมูลที่เป็นที่ยอมรับในระดับนานาชาติและระดับชาติ ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 2.5cm;">
The journals are listed in the databases in an international and national level as follows: 
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 2.5cm;">
1. ฐานข้อมูลระดับนานาชาติ  
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
' . space(4) . 'International Database Level
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Scopus 
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- ISI Web of Knowledge  
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Science Citation Index (SCI)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Social Science Citation Index (SSCI)
</div>

<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 2.5cm;">
2. ฐานข้อมูลระดับชาติ ได้แก่ ศูนย์ดัชนีการอ้างอิงวารสารไทย (Thai Journal Citation Index - TCI) เฉพาะวารสารที่มีชื่ออยู่ในกลุ่ม
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">
' . space(12) . 'ที่ 1 และกลุ่มที่ 2
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
' . space(4) . 'National Database Level, including Thai Journal Citation Index (TCI), only journals named in Tier 1 and Tier 2.
</div>
';
    ?>
    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.1cm;"><b> <u> สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2559-2560 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;"><b> <u> Students starting the university in the academic year 2016-2017 </u></b></div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
วารสารทางวิชาการที่เป็นไปตามหลักเกณฑ์ที่ ก.พ.อ. กำหนด ได้แก่ วารสารที่มีชื่ออยู่ในฐานข้อมูลที่เป็นที่ยอมรับในระดับนานาชาติ
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(12) . 'และระดับชาติ ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
Academic journals that meet the criteria by the Civil Service Commission in Higher Education Institutes as
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(12) . 'follows:
</div>

<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
1. ฐานข้อมูลระดับนานาชาติ
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . 'International Database Level
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Academic Search Premier (http://www.ebsco.com/home)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(6) . '(select ebscohost and then academic search premier)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Agricola (http://agricola.nal.usda.gov)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- BIOSIS (http://www.biosis.org)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- CINAHL (http://www.ebscohost.com/academic/cinahl-plus-with-full-text)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- EiCOMPENDEX (http://www.ei.org)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- ERIC (http://www.eric.ed.gov/)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- H.W.Wilson (http://www.ebscohost.com)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(6) . '(select ebscohost and then H.W.Wilson)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Infotrieve (http://www.infotrieve.com)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Ingenta Connect (http://www.ingentaconnect.com)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- INSPEC (http://www.theiet.org/publishing/inspec)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- MathSciNet (http://www.ams.org/mathscinet)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- MEDLINE/Pubmed (http://www.ncbi.nlm.nih.gov/pubmed/)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- PsycINFO (http://www.apa.org/pubs/databases/psycinfo/index.aspx)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Pubmed (http://www.ncbi.nlm.nih.gov/pubmed/)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- ScienceDirect (http://www.sciencedirect.com)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- SciFinder (https://scifinder.cas.org/)
</div>
<div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(9)</div>
<br>
<div style="font-size: 14pt; padding-top: -0.3cm;padding-left: 2.5cm;">
' . space(4) . '- Scopus (http://www.info.scopus.com)
</div>

<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Social Science Research Network
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(6) . '(http://papers.ssrn.com/sol3/DisplayAbstractSearch.cfm)
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Web of Knowledge (http://wokinfo.com)
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
2. ฐานข้อมูลระดับชาติ ได้แก่ ศูนย์ดัชนีการอ้างอิงวารสารไทย (Thai Journal Citation Index - TCI) เฉพาะวารสารที่มีชื่ออยู่ในกลุ่ม
</div>

<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 0cm;">
' . space(12) . 'ที่ 1 และกลุ่มที่ 2
</div>  
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
National Database Level, including Thai Journal Citation Index (TCI), only journals named in Tier 1 and Tier 2.
</div>
';
    ?>

    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.1cm;"><b> <u> สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2561-2563 </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;"><b> <u> Students starting the university in the academic year 2018-2020 </u></b></div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
วารสารที่มีชื่ออยู่ในฐานข้อมูลที่เป็นที่ยอมรับในระดับนานาชาติและระดับชาติ ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
The journals are listed in the databases in an international and national level as follows: 
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
1. ฐานข้อมูลระดับนานาชาติ 
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . 'International Database Level
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Scopus
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Web of science
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- SSRN, Eric
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- PsycINFO
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- JSTOR
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Project muse
</div>
<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 2.5cm;">
2. ฐานข้อมูลระดับชาติ ได้แก่ ศูนย์ดัชนีการอ้างอิงวารสารไทย (Thai Journal Citation Index - TCI) เฉพาะวารสารที่มีชื่ออยู่ในกลุ่ม
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">
' . space(12) . 'ที่ 1 และกลุ่มที่ 2
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
National Database Level, including Thai Journal Citation Index (TCI), only journals named in Tier 1 and Tier 2.
</div>
';
    ?>

    <div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">&nbsp;</div>
    <div style="font-size: 14pt; padding-top: -0.1cm;"><b> <u> สำหรับนักศึกษาที่เข้าศึกษา ปีการศึกษา 2564 เป็นต้นไป </u></b></div>
    <div style="font-size: 14pt; padding-top: -0.15cm;"><b> <u> For Students starting the university in the academic year of 2021 onwards </u></b></div>
    <?php
    echo '
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
วารสารที่มีชื่ออยู่ในฐานข้อมูลที่เป็นที่ยอมรับในระดับนานาชาติและระดับชาติ ดังต่อไปนี้
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
The journals are listed in the databases in an international and national level as follows: 
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
1. ฐานข้อมูลระดับนานาชาติ 
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . 'International Database Level
</div>
<div style="font-size: 14pt; padding-top: -0.125cm;padding-left: 2.5cm;">
' . space(4) . '- Scopus
</div>

<div style="font-size: 14pt; padding-top: -0.1cm;padding-left: 2.5cm;">
2. ฐานข้อมูลระดับชาติ ได้แก่ ศูนย์ดัชนีการอ้างอิงวารสารไทย (Thai Journal Citation Index - TCI) เฉพาะวารสารที่มีชื่ออยู่ในกลุ่ม
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 0cm;">
' . space(12) . 'ที่ 1 และกลุ่มที่ 2
</div>
<div style="font-size: 14pt; padding-top: -0.15cm;padding-left: 2.5cm;">
National Database Level, including Thai Journal Citation Index (TCI), only journals named in Tier 1 and Tier 2.
</div>
';
    ?>
    <div style="font-size: 16pt; position: absolute;bottom: 0.6cm;width: 90%;text-align: center;">(10)</div>














    <?php
    $html = ob_get_contents();
    ob_end_flush();
    $mpdf->WriteHTML($html);
    $mpdf->Output("form9.pdf");
    ?>


</body>

</html>