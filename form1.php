<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=on" />
    <title class='head'>Request Form for Dissertation/Thesis/Independent Study Title and Proposal Approval</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <!-- CSS -->
    <link rel="stylesheet" href="css/style.css?v=<?php echo time(); ?>">
    <!-- Boxicons CSS -->
    <link rel="stylesheet" href="css/boxicons.min.css">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/fonts.googleapis.com_css2_family=Sarabun&display=swap.css">
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery-3.2.1.min.js"></script>
</head>

<body>
    <form action="pdfForm1.php" method="post" target="_blank" id="myform1" novalidate>
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
            <div class="h"><br>
                <h3 class='head'>แบบเสนอหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h3>
            </div>
            <h5 class="text-primary mt-5" id="personal">ข้อมูลส่วนตัว</h5>
            <div class="row ">
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
            <div class="row">
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
            <div class=" form-group mb-3 starlabel">
                <label id="sid">รหัสประจำตัวนักศึกษา</label>
                <input class="form-control masked prefixed" type="text" data-pattern="************-*" name="studentid" placeholder="xxxxxxxxxxxx x" oninput="restrictInput(event)" required />
                <div class="invalid-feedback invalid">
                    กรุณากรอกข้อมูล
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group starlabel">
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
                            <input class="form-control masked prefixed" type="text" data-pattern="***-***-****" name="mobile_phone" oninput="restrictInput(event)" required />
                            <!-- <input type="text" id="typeText" class="form-control" name="mobile_phone" required /> -->
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
            </div><br>
            <div class="form-group">
                <h5 class="text-primary " id="education">ข้อมูลการศึกษา</h5>
                <div>
                    <div class="row ">
                        <div class="form-group mb-3 col-lg-6 starlabel">
                            <label for="" class="level">ระดับการศึกษา</label>
                            <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                                <option class="choosePrefix"></option>
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
                                <option class="choosePrefix" value="">เลือกแผน/แบบ</option>
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
                    <div class="form-group mb-3 col-lg-6 ">
                        <div class="starlabel">
                            <label id="program">ภาค</label>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" class="form-check-input" name="program" value="normal" required />
                            <label id='regular'>ปกติ</label>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;
                            <input type="radio" class="form-check-input" name="program" value="special" required />
                            <label id='weekend'>พิเศษ</label>
                        </div>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div>
                    <div class="mb-3 starlabel">
                        <label class="faculty">คณะ</label>
                        <input type="text" class="form-control" name="faculty" required />
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="mb-3 starlabel">
                        <label id="major">สาขาวิชา/วิชาเอก</label>
                        <input type="text" class="form-control" name="major" required />
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="mb-3 starlabel">
                        <label id="subject">แขนงวิชา</label>
                        <input type="text" class="form-control" name="subject" required />
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div>
                    <br>
                    <h5 class="text-primary " id="approval">ความประสงค์ขอเสนอชื่อเรื่อง</h5>
                    <div class="mb-3 starlabel">
                        <label class="titleTH">ชื่อเรื่อง(ภาษาไทย)</label>
                        <textarea class="form-control" name="titleTH" maxlength="200" row="2" style="resize: none;" required></textarea>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="mb-3 starlabel">
                        <label class="titleEN">ชื่อเรื่อง(ภาษาอังกฤษ)</label>
                        <textarea class="form-control" name="titleEN" maxlength="200" row="2" style="resize: none;" required></textarea>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="by">โดย</label>
                        <table>
                            <div class="mb-2">
                                <tr>
                                    <td><input type="checkbox" name="by" value="1" class="form-check-input"></td>
                                    <td id='by1' style="padding-left: 5px;"><label>ลงทะเบียนดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</label></td>
                                    <td class='quantity' style="width:6px;padding-left:20px"><label>จำนวน</label></td>
                                    <td><input type="text" name="credit" class="form-control" style="text-align: center; "></td>
                                    <td class='credit' style="width:6px"><label>หน่วยกิต</label></td>
                                </tr>
                            </div>
                            <div class="mb-2">
                                <tr>
                                    <td><input type="checkbox" name="by2" value="2" class="form-check-input"></td>
                                    <td id='by2' style="padding-left: 5px;"><label>ศึกษารายวิชาตามแผนการเรียน</label></td>
                                    <td class='quantity' style="width:6px;padding-left:20px"><label>จำนวน</label></td>
                                    <td><input type="text" name="credit2" class="form-control" style="text-align: center; "></td>
                                    <td class='credit' style="width:6px"><label>หน่วยกิต</label>
                                    </td>
                                </tr>
                            </div>
                        </table>
                        <table>
                            <tr>
                                <div class="mb-2">
                                    <td><input type="checkbox" name="by3" value="3" class="form-check-input"></td>
                                    <td id='by3' style="padding-left: 5px;"><label>ได้ระดับคะแนนเฉลี่ยสะสม</label></td>
                                    <td><input type="text" name="grade" class="form-control" style="text-align: center; "></td>
                                    <td></td>
                                </div>
                            </tr>
                        </table>
                        <table>
                            <tr>
                                <div class="mb-2">
                                    <td><input type="checkbox" name="by4" value="4" class="form-check-input"></td>
                                    <td id='by4' style="padding-left: 5px;"><label>ผ่านการสอบวัดคุณสมบัติ (สำหรับระดับปริญญาเอก และระดับปริญญาโท แผน ก1)</label></td>
                                </div>
                            </tr>
                            <tr>
                                <div class="mb-2">
                                    <td><input type="checkbox" name="by5" value="5" class="form-check-input"></td>
                                    <td id='by5' style="padding-left: 5px;"><label>ผ่านการสอบวัดมาตรฐานความรู้ภาษาอังกฤษ (สำหรับระดับปริญญาเอก)</label></td>
                                </div>
                            </tr>
                        </table>
                    </div>
                </div>
                <div>
                    <br>
                    <h5 class="text-primary " id="advisor">อาจารย์ที่ปรึกษา</h5>
                    <div class="mb-3">
                        <div>
                            &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="ad1" class="form-check-input">
                            <label id='dissertation'>ดุษฎีนิพนธ์</label>
                        </div>
                        <div>
                            &nbsp;&nbsp;&nbsp;
                            <input type="checkbox" name="ad2" class="form-check-input">
                            <label id='thesis'>วิทยานิพนธ์</label>
                        </div>

                    </div>
                </div>
                <div class="col">
                    <label id="advisor_s">อาจารย์ที่ปรึกษาหลัก</label>
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
                    <div class="mb-3 starlabel">
                        <label class="academic">วุฒิทางการศึกษา/สาขาวิชา</label>
                        <input type="text" class="form-control" name="qualification" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="mb-3 starlabel">
                        <label class="advisees">ภาระอาจารย์ที่ปรึกษาของนักศึกษาจำนวน(คน)</label>
                        <input type="text" class="form-control" name="burden" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="row">
                        <label id="Co_advisor">อาจารย์ที่ปรึกษาร่วม(ถ้ามี)</label>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="prefixInput" class="prefix">คำนำหน้าชื่อ</label>
                            <select name="prefixInput2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref2')">
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
                        </div>
                        <div id="otherPref2" class="form-group mb-3 col-lg-6" style="display: none;">
                            <label for="otherPref2" class="specify">อื่นๆ โปรดระบุ</label>
                            <input type="text" name="otherPref2" id="otherPrefix" class="form-control">
                        </div>
                    </div>
                    <div class="row ">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="fname" class="name">ชื่อ</label>
                            <input type="text" name="fname2" id="fname" class="form-control">
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="lname" class="laname">นามสกุล</label>
                            <input type="text" name="lname2" id="lname" class="form-control">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="academic">วุฒิทางการศึกษา/สาขาวิชา</label>
                        <input type="text" class="form-control" id="" name="qualification1" value="">
                    </div>
                    <div class="mb-3">
                        <label class="advisees">ภาระอาจารย์ที่ปรึกษาของนักศึกษาจำนวน(คน)</label>
                        <input type="text" class="form-control" id="" name="burden1" value="">
                    </div>
                </div>
            </div>
            <div>
                <br>
                <h5 class="text-primary " id="curriculum">ประธานกรรมการบริหารหลักสูตร</h5>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC0" class="prefix">คำนำหน้าชื่อ</label>
                    <select name="prefixC0" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixC0');">
                        <option class="choosePrefix" value="">เลือกคำนำหน้าชื่อ</option>
                        <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                        <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                        <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                        <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                        <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                        <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                        <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                        <option name='other' class="other" value="other">อื่นๆ</option>
                    </select>
                </div>
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC0" style="display: none;">
                    <label for="otherPrefixC0" class="specify">อื่นๆ โปรดระบุ</label>
                    <input type="text" name="otherPrefixC0" id="otherPrefix" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname" class="name">ชื่อ</label>
                    <input type="text" name="fname3" id="fname" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname" class="laname">นามสกุล</label>
                    <input type="text" name="lname3" id="lname" class="form-control">
                </div>
            </div><br>
            <div class="row">
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