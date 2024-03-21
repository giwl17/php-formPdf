<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class='reForm7'>Request for Graduation Form</title>
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
    <form form action="pdfReForm7.php" method="post" target="_blank" id="myform1" novalidate>
        <div class="st">
            <div class="h"><br>
                <h3 class='reForm7'>แบบขอสำเร็จการศึกษา</h3>
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
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="prefixInput" class='nameEN'>ชื่อ-นามสกุลภาษาอังกฤษ</label>
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
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label id="identification">รหัสบัตรประจำตัวประชาชน</label>
                    <!-- <input type="text" class="form-control" name="studentid" placeholder="11xxxxxxxxxx-x" required /> -->
                    <input class="form-control masked prefixed" type="text" data-pattern="*-****-*****-**-*" name="identification" placeholder="x xxxx xxxxx xx x" oninput="restrictInput(event)" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label id="sid">รหัสประจำตัวนักศึกษา</label>
                    <!-- <input type="text" class="form-control" name="studentid" placeholder="11xxxxxxxxxx-x" required /> -->
                    <input class="form-control masked prefixed" type="text" data-pattern="************-*" name="studentid" placeholder="xxxxxxxxxxxx x" oninput="restrictInput(event)" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="form-group col-lg-6 mb-3 starlabel">
                <label class="date">วันและเวลาที่ขอสอบ</label>
                <input type="date" name="dateBook" class="form-control" placeholder="" min="1990-01-01" max="2100-12-31" required>
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
                        <!-- <input class="form-control masked prefixed" type="text" data-pattern="***-***-****" name="telephone" placeholder="xxx-xxx-xxxx" /> -->
                        <input type="text" id="typeText" class="form-control" name="telephone" oninput="restrictInput(event)" />
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <div class="starlabel">
                            <label for="typeText" id="phone_mobile">โทรศัพท์มือถือ</label>
                            <!-- <input type="text" id="typeText" class="form-control" name="mobile_phone" required /> -->
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
                <div class="form-group col-lg-6 mb-3">
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
                <div class="form-group col-lg-6 mb-3">
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
                <div class="form-group col-lg-6 mb-3">
                    <div class="starlabel">
                        <label class="gpa">เกรดเฉลี่ยสะสม</label>
                    </div>
                    <input type="text" class="form-control" name="gpa" required />
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
                <h5 class="text-primary mt-5" id="requirements">เงื่อนไขการยื่นขอสำเร็จการศึกษา</h5>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="" class="level">ระดับการศึกษา</label>
                        <select name="LevelsInput1" class="form-select" id="LevelsInput" onchange='CheckPlanRequirements(this.value);' required>
                            <option></option>
                            <option value="Master" class="radio_l2">ปริญญาโท</option>
                            <option value="Doctoral" class="radio_l3">ปริญญาเอก</option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="plan" class="type">แผน/แบบ</label>
                        <select name="plan1" id="plan" class="form-select">
                            <option class="choose" value="">เลือกแผน/แบบ</option>
                            <optgroup id="optionMaster1" label="ป.โท" style="display: block;">
                                <option value="1" class="a1">ก1</option>
                                <option value="2" class="a2">ก2</option>
                            </optgroup>
                            <optgroup id="optionDoctor1" label="ป.เอก" style="display: none;">
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
                <div>
                    <div class="row ">
                        <label class="graduation">สำเร็จการศึกษา</label>
                        <div class="form-group mb-3 col-lg-6 ">
                            <div class="starlabel">
                                <label class="semester">ภาคการศึกษาที่</label>
                            </div>
                            <!-- <input type="text" class="form-control" name="semester" required /> -->
                            <select name="semester" class="form-select" required>
                                <option></option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="summer" class="summer">ฤดูร้อน</option>
                            </select>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mb-3 col-lg-6 ">
                            <div class="starlabel">
                                <label class="academicYear">ปีการศึกษา</label>
                            </div>
                            <input type="number" class="form-control" name="academicYear" oninput="restrictInput(event)" required />
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-3">
                        <input type="checkbox" name="evidence1" value="1" class="form-check-input">
                        <span class="evidence1">
                            ส่งรูปเล่มดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ ฉบับสมบูรณ์ จำนวน 5 เล่ม
                            พร้อมแผ่นบันทึกข้อมูล (File.pdf) จำนวน 5 แผ่น (ส่งสำนักบัณฑิตศึกษา จำนวน 1 เล่ม พร้อมซีดี 1 แผ่น)
                        </span>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="evidence2" value="2" class="form-check-input">
                        <span class="evidence2">สอบผ่านเกณฑ์มาตรฐานความรู้ภาษาอังกฤษตามประกาศของมหาวิทยาลัยฯ
                            (แนบหลักฐานกรณีไม่ได้ลงทะเบียนเรียน)</span>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="evidence3" value="3" class="form-check-input">
                        <span class="evidence3">แบบรายงานการเผยแพร่พร้อมหลักฐานการเผยแพร่ผลงานวิจัยตามประกาศของมหาวิทยาลัยฯ จำนวน 1 ชุด</span>
                    </div>
                    <div class="mb-3">
                        <input type="checkbox" name="evidence4" value="4" class="form-check-input">
                        <span class="evidence4">หลักฐานผลการตรวจสอบผลการคัดลอกผลงานทางวิชาการ จำนวน 1 ชุด</span>
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