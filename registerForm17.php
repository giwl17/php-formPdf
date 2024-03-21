<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="reForm17">Request Form for Postponing the Payments of Educational Maintenance, Registration Fee and Tuition Fee</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/fonts.googleapis.com_css2_family=Sarabun&display=swap.css">
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
    <!-- <header onabort="toggleLanguage('th')"></header> -->
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
                <button class="btn btn-default dropdown-toggle" type="button" value="toggleLanguage('th')" data-bs-toggle="dropdown">Language
                    <span class="caret"></span></button>
                <input type="hidden" name="language" id="language">
                <ul class="dropdown-menu">
                    <li onclick="toggleLanguage('en')"><a href="#" class="dropdown-item">English</a></li>
                    <li onclick="toggleLanguage('th')"><a href="#" class="dropdown-item">Thai</a></li>
                </ul>
            </div>
        </div>
    </nav>
    <form action="pdfReForm17.php" method="post" target="_blank" id="myform1" novalidate>
        <div class="st">
            <div class="h"><br>
                <h3 class='reForm17'>แบบคำร้องขอผ่อนผันการชำระค่ำบำรุงการศึกษา ค่ำลงทะเบียน และค่ำธรรมเนียมการศึกษา</h3>
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
                        <div class="form-group mb-3 col-lg-6 starlabel">
                            <label for="fname" class="name">ชื่อ</label>
                            <input type="text" name="fname" id="fname" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mb-3 col-lg-6 starlabel">
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
                <div class="form-group mb-3 starlabel">
                    <label id="sid">รหัสประจำตัวนักศึกษา</label>
                    <input class="form-control masked prefixed" type="text" data-pattern="************-*" name="studentid" placeholder="xxxxxxxxxxxx x" oninput="restrictInput(event)" required />
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
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
                <div class="mb-3 col-lg-6">
                    <div class="form-outline">
                        <label for="typeText" id="phone">โทรศัพท์</label>
                        <input type="text" id="typeText" class="form-control" name="telephone" />
                    </div>
                </div>
                <div class="mb-3 col-lg-6">
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
                <div class="form-group mb-3 col-lg-6 starlabel">
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
             <h5 class="text-primary mt-5" id="advisor">อาจารย์ที่ปรึกษา</h5>
             <div class="row">
                 <div class="form-group mb-3 col-lg-6">
                     <div class="starlabel">
                         <label for="prefixInput" class="prefix">คำนำหน้าชื่อ</label>
                     </div>
                     <select name="prefixInput1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref1')" required>
                         <option class="choosePrefix" value=""></option>
                         <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                         <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                         <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                         <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                         <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                         <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                         <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                         <option name='other' value="other" class="other">อื่นๆ</option>
                     </select>
                     <div class="invalid-feedback invalid">
                         กรุณากรอกข้อมูล
                     </div>
                 </div>
                 <div id="otherPref1" class="form-group mb-3 col-lg-6" style="display: none;">
                     <label for="otherPref1" class="specify">อื่นๆ โปรดระบุ</label>
                     <input type="text" name="otherPref1" id="otherPrefix" class="form-control">
                 </div>
             </div>
             <div class="row">
                 <div class="form-group mb-3 col-lg-6 starlabel">
                     <label for="fname" class="name">ชื่อ</label>
                     <input type="text" name="fname1" id="fname" class="form-control" required>
                     <div class="invalid-feedback invalid">
                         กรุณากรอกข้อมูล
                     </div>
                 </div>
                 <div class="form-group mb-3 col-lg-6 starlabel">
                     <label for="lname" class="laname">นามสกุล</label>
                     <input type="text" name="lname1" id="lname" class="form-control" required>
                     <div class="invalid-feedback invalid">
                         กรุณากรอกข้อมูล
                     </div>
                 </div>
             </div>
           </div>
            <div class="row g-1 mt-5">
                <div class="col-auto">
                    <label class="enrolled">ลงทะเบียนประจำภาคการศึกษาที่</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="enrolled" class="form-control" style="text-align: center; width:124px;">
                </div>
                <div class="col-auto">
                    <label class="academicYear">ปีการศึกษา</label>
                </div>
                <div class="col-auto">
                    <input type="number" name="academicYear" class="form-control" style="text-align: center; width:124px;">
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <label class="payment">จำนวนเงินที่ต้องชำระ</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="payment" class="form-control" style="text-align: center; width:124px;">
                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div>
                <label class="following mb-1">โปรดเลือกหนึ่งในตัวเลือกต่อไปนี้</label>
                <div>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="options" value="1" class="form-check-input">
                    <label class="institutional">กรณีทุนกำรศึกษาของหน่วยงาน</label>
                    <div id="publish_1" hidden>
                        <div class="mb-1">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="scholarship" value="1" class="form-check-input">
                            <label class="granted">ได้รับทุนเรียบร้อยแล้ว</label>
                            <div class="row col-lg-6 mb-3" id="scholarshipGranted" style="display: none; padding-left:50px;">
                                <div>
                                    <label class="nameScholarship">ชื่อทุน</label>
                                    <input type="text" name="nameScholarship_1" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-1">
                            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                            <input type="radio" name="scholarship" value="2" class="form-check-input">
                            <label class="applied">อยู่ระหว่างเสนอขอรับทุน</label>
                            <div class="row col-lg-6 mb-3" id="scholarshipBeing" style="display: none; padding-left:50px;">
                                <div>
                                    <label class="nameScholarship">ชื่อทุน</label>
                                    <input type="text" name="nameScholarship_2" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    &nbsp;&nbsp;&nbsp;
                    <input type="radio" name="options" value="2" class="form-check-input">
                    <label class="otherCases">กรณีอื่นๆ</label>
                    <div id="publish_2" style="padding-left:50px;" hidden>
                        <div class="row col-lg-6 mb-3">
                            <div>
                                <label class="specifyDate">ชำระภายในไม่เกินวันที่</label>
                                <input type="date" class="form-control" name="dateBook" min="1990-01-01" max="2100-12-31">
                            </div>
                        </div>
                        <div class="mb-1">
                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                            <input type="radio" name="pay" value="1" class="form-check-input">
                            <label class="ra1">ให้มหาวิทยาลัยจัดส่งใบแจ้งยอดชำระเงินทาง E-mail หลังจากได้รับการแจ้งจากมหาวิทยาลัย</label>
                            <div class="row col-lg-6 mb-3" id="mail" style="display: none; ">
                                <div>
                                    <label>Email</label>
                                    <input type="email" name="email" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="mb-3">
                            <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                            <input type="radio" name="pay" value="2" class="form-check-input">
                            <label class="ra2">นักศึกษาพิมพ์จากระบบงานทะเบียนนักศึกษาเอง หลังจากได้รับการแจ้งจากมหาวิทยาลัย</label>

                        </div>
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