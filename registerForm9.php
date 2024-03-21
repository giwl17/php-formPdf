<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class='reForm9'>Request for Academic Documents Form</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/fonts.googleapis.com_css2_family=Sarabun&display=swap.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <form form action="pdfReForm9.php" method="post" target="_blank" id="myform1" novalidate>
        <nav id='navbar' class="navbar navbar-expand-lg navbar-light bg-light">
            <div class="container-fluid">
                <div class="logo">
                    <!-- <i class="bx bx-menu menu-icon"></i> -->
                    <a href="/graden">
                        <img src="img/RMUTTLOGO.png" alt="Flowers in Chania" width="45px" height="75px" class="bx bx-menu " />
                    </a>
                    <span class="logo-nam hidden-mobile" style="font-size: small; padding-left:20px;">
                        คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี <br>
                        Faculty of Engineering Rajamangala University of Technology Thanyaburi
                    </span>
                </div>
                <div class="dropdown">
                    <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown">Language
                        <span class="caret"></span></button>
                    <input type="hidden" name="language" id="language">
                    <ul class="dropdown-menu">
                        <li onclick="toggleLanguage('en')"><a href="#" class="dropdown-item">English</a></li>
                        <li onclick="toggleLanguage('th')"><a href="#" class="dropdown-item">Thai</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="st">
            <div class="h">
                <br>
                <h3 class='reForm9'>แบบขอเอกสารการศึกษา</h3>
            </div>
            <h5 class="text-primary mt-5" id="personal">ข้อมูลส่วนตัว</h5>
            <div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label for="prefixInput" class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref');" required>
                            <option class="choosePrefix" value=""></option>
                            <option class='prefix_1' id='prefix_1' name='mr'>นาย</option>
                            <option class='prefix_2' id='prefix_2' name='miss'>นางสาว</option>
                            <option class='prefix_3' id='prefix_3' name='ms'>นาง</option>
                            <option class='other' name='other' value="other">อื่นๆ </option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div id='otherPref' class="form-group mb-3 col-lg-6" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref" id="otherPrefix" class="form-control">
                    </div>
                </div>
            </div>
            <div>
                <div class="starlabel">
                    <div class="row ">
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="fname" class="name">ชื่อ</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="lname" class="laname">นามสกุล</label>
                            <input type="text" name="lname" id="lname" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div>
                    <label for="prefixInput" class='nameEN'>ชื่อ-นามสกุลภาษาอังกฤษ</label>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label for="prefixInput" class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref1');" required>
                            <option class="choosePrefix" value=""></option>
                            <option id='prefix_1' name='mr' value="Mr.">Mr.</option>
                            <option id='prefix_2' name='miss' value="Miss">Miss</option>
                            <option id='prefix_3' name='ms' value="Mrs.">Mrs.</option>
                            <option name='other' value="other">Other </option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div id='otherPref1' class="form-group mb-3 col-lg-6" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref1" id="otherPrefix1" class="form-control">
                    </div>
                </div>
            </div>
            <div>
                <div class="starlabel">
                    <div class="row ">
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="fname" class="name">ชื่อ</label>
                            <input type="text" name="fname1" id="fname" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="lname" class="laname">นามสกุล</label>
                            <input type="text" name="lname1" id="lname" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group col-lg-6 mb-3 starlabel">
                    <label id="identification">รหัสบัตรประจำตัวประชาชน</label>
                    <input class="form-control masked prefixed" type="text" data-pattern="*-****-*****-**-*" name="identification" placeholder="x xxxx xxxxx xx x" oninput="restrictInput(event)" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-6 mb-3 starlabel">
                    <label id="sid">รหัสประจำตัวนักศึกษา</label>
                    <input class="form-control masked prefixed" type="text" data-pattern="************-*" name="studentid" placeholder="xxxxxxxxxxxx x" oninput="restrictInput(event)" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-6 mb-3 starlabel">
                <label class="date">วันและเวลาที่ขอสอบ</label>
                <input type="date" name="dateBook" class="form-control" min="1990-01-01" max="2100-12-31" placeholder="" required>
                <div class="invalid-feedback invalid">
                    กรุณากรอกข้อมูล
                </div>
            </div>
            <div>
                <div class="form-group mb-3 starlabel">
                    <label for="textarea_address" id="addr">ที่อยู่ปัจจุบัน</label>
                    <div class="col">
                        <textarea class="form-control" name="textarea_address" id="textarea_address" rows="4" style="resize: none;" required></textarea>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <label for="typeText" id="phone">โทรศัพท์</label>
                        <input type="text" id="typeText" class="form-control" name="telephone" oninput="restrictInput(event)" />
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <div class="starlabel">
                            <label for="typeText" id="phone_mobile">โทรศัพท์มือถือ</label>
                            <input class="form-control masked prefixed" type="text" data-pattern="***-***-****" name="mobile_phone"  oninput="restrictInput(event)" required />
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-primary mt-5" id="education">ข้อมูลการศึกษา</h5>
            <div class="row">
                <div class="form-group col-lg-6 mb-3 starlabel">
                    <label for="" class="level">ระดับการศึกษา</label>
                    <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                        <option></option>
                        <option value="Master" class="radio_l2">ปริญญาโท</option>
                        <option value="Doctoral" class="radio_l3">ปริญญาเอก</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="plan" class="type">แผน/แบบ</label>
                    <select name="plan" id="plan" class="form-select">
                        <option class="choose" value="">เลือกแผน/แบบ</option>
                        <optgroup id="optionMaster" label="ป.โท" style="display: block;">
                            <option class="a1">ก1</option>
                            <option class="a2">ก2</option>
                        </optgroup>
                        <optgroup id="optionDoctor" label="ป.เอก" style="display: none;">
                            <option value="1.1">1.1</option>
                            <option value="1.2">1.2</option>
                            <option value="2.1">2.1</option>
                            <option value="2.2">2.2</option>
                        </optgroup>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="form-group mb-3 col-lg-6 ">
                    <div class="starlabel">
                        <label id="program">ภาค</label>
                    </div>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" class="form-check-input" name="program" value="normal" required />
                    <label id='regular'>ปกติ</label><br>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" class="form-check-input" name="program" value="special" required />
                    <label id='weekend'>พิเศษ</label>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div>
                <div class="starlabel mb-3">
                    <label class="faculty">คณะ</label>
                    <input type="text" class="form-control" name="faculty" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="starlabel mb-3">
                    <label id="major">สาขาวิชา/วิชาเอก</label>
                    <input type="text" class="form-control" name="major" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="starlabel mb-3">
                    <label id="subject">แขนงวิชา</label>
                    <input type="text" class="form-control" name="subject" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div>
                <h5 class="text-primary mt-5 request">ความประสงค์</h5>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="educationalStatus">สถานภาพการศึกษา</label>
                        <select name="StudentsInput" class="form-select" id="StudentsInput" onchange='educationalStatus(this.value);' required>
                            <option value="0"></option>
                            <option value="1" class="currentStudents">กำลังศึกษา</option>
                            <option value="2" class="graduatedStudent">สำเร็จการศึกษา</option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_1" hidden>
                <div style="font-weight: bold;">
                    <label class="currentStudents">สำหรับนักศึกษาที่กำลังศึกษา</label>
                </div>
                <div class="row g-1 mb-2">
                    <div class="col-auto">
                        <input type="checkbox" name="in1" value="1" class="form-check-input">
                    </div>
                    <div class="col-auto">
                        <label class="certificate">ใบรับรองเรียนครบตามหลักสูตร</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" name="spa" style="text-align: center; width:124px;">
                    </div>
                    <div class="col-auto">
                        <label class="copy">ฉบับ </label>
                        <label class="case">(กรณีเกรดออกครบทุกภาคการศึกษา)</label>
                        <label class="photoStudent">(ใช้รูปถ่ายนักศึกษา)</label>
                    </div>
                </div>
                <div class="mb-2">
                    <input type="checkbox" id="student" name="student" class="form-check-input">
                    <label class="CertificateofStudent">ใบรับรองการเป็นนักศึกษา </label>
                    <label class="photoStudent">(ใช้รูปถ่ายนักศึกษา)</label>
                </div>
                <div id="hidden_1" hidden>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="in2" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="TH">ไทย</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="numTH" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="in3" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="EN">อังกฤษ</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="numEN" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <input type="checkbox" id="transcript_1" name="transcript_1" value="1" class="form-check-input">
                    <label class="transcriptStudent">ใบแสดงผลการศึกษา </label>
                    <label class="noPhoto">(ไม่ติดรูปถ่าย)</label>
                </div>
                <div id="hidden_2" hidden>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="inX1" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="TH">ไทย</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="numTH_1" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="inX2" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="EN">อังกฤษ</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="numEN_1" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                </div>
                <div class="row g-1 mb-2">
                    <div class="col-auto">
                        <input type="checkbox" id="currentOther" name="currentOther" value="1" class="form-check-input">
                    </div>
                    <div class="col-auto">
                        <label class="other">อื่นๆ ระบุ</label>
                    </div>
                    <div class="col-auto col-lg-9" id="currentOther_1" hidden>
                        <input type="text" class="form-control" name="currentOther_1" />
                    </div>
                </div>
            </div>
            <div id="publish_2" hidden>
                <div style="font-weight: bold;">
                    <label class="graduatedStudent">สำหรับนักศึกษาที่สำเร็จการศึกษาแล้ว</label>
                </div>
                <div class="mb-2">
                    <input type="checkbox" id="graduation" name="graduation" value="1" class="form-check-input">
                    <label class="graduation">ใบรับรองสำเร็จการศึกษา </label>
                    <label class="gownPhoto">(ใช้รูปถ่ายสวมครุยปริญญา)</label>
                </div>
                <div id="hiddenG_1" hidden>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="ch1" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="TH">ไทย</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="THnum" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="ch2" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="EN">อังกฤษ</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="ENnum" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                </div>
                <div class="mb-2">
                    <input type="checkbox" id="transcript_2" name="transcript_2" class="form-check-input">
                    <label class="transcriptStudent">ใบแสดงผลการศึกษา</label>
                    <label class="gownPhoto">(ใช้รูปถ่ายสวมครุยปริญญา)</label>
                </div>
                <div id="hiddenG_2" hidden>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="ch_1" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="TH">ไทย</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="THnum1" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                    <div class="row g-1 mb-2">
                        &nbsp;&nbsp;&nbsp;
                        <div class="col-auto">
                            <input type="checkbox" name="ch_2" value="1" class="form-check-input">
                        </div>
                        <div class="col-auto">
                            <label class="EN">อังกฤษ</label>
                        </div>
                        <div class="col-auto">
                            <input type="number" class="form-control" name="ENnum1" style="text-align: center; width:124px;">
                        </div>
                        <div class="col-auto">
                            <label class="copy">ฉบับ</label>
                        </div>
                    </div>
                </div>
                <div class="row g-1 mb-2">
                    <div class="col-auto">
                        <input type="checkbox" id="graduationOther" name="graduationOther" value="1" class="form-check-input">
                    </div>
                    <div class="col-auto">
                        <label class="other">อื่นๆ ระบุ</label>
                    </div>
                    <div class="col-auto col-lg-9" id="graduationOther_1" hidden>
                        <input type="text" class="form-control" name="graduationOther_1" />
                    </div>
                </div>
            </div>
            <div class="row mt-5">
                <div class="bt-btn">
                    <input type="submit" value="นำออกเป็นไฟล์ PDF" id="btnSubmit" class="btn btn-success" placeholder="นำออกเป็นไฟล์ PDF">
                </div>
            </div>
        </div>
    </form>
    <script src="js/changLanguaeForm.js"></script>
    <script src="js/function.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/input-mask.js"></script>
    <section class="overlay"></section>
    <script type="text/javascript">
        $(function() {
            $("#myform1").on("submit", function() {
                var form = $(this)[0];
                if (form.checkValidity() === false) {
                    event.preventDefault();
                    event.stopPropagation();
                }
                // alert.window("Hello, world!");
                form.classList.add('was-validated');
            });
        });
    </script>
    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-90px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
</body>

</html>