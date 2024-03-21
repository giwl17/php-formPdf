<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class='reForm2'>Registration Form</title>
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
                <a href="#">
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
    <form action="pdfReForm2.php" method="post" target="_blank" id="myform1" novalidate>
        <div class="st">
            <div class="h">
                <br>
                <h3 class='reForm2'>ใบลงทะเบียนเรียน</h3>
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
            <div class="form-group mb-3 starlabel">
                <label for="textarea_address" id="addr">ที่อยู่ปัจจุบัน</label>
                <div class="col">
                    <textarea class="form-control" name="textarea_address" id="textarea_address" rows="4" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row ">
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <label class="form-label" for="typeText" id="phone">โทรศัพท์</label>
                        <input type="text" id="typeText" class="form-control" name="telephone" oninput="restrictInput(event)" />
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <div class="starlabel">
                            <label class="form-label" for="typeText" id="phone_mobile">โทรศัพท์มือถือ</label>
                            <input class="form-control masked prefixed" type="text" data-pattern="***-***-****" name="mobile_phone" oninput="restrictInput(event)" required />
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
                        <option class="choosePrefix" value=""></option>
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
                        <option class="choosePrefix" value="">เลือกแผน/แบบ</option>
                        <optgroup id="optionMaster" label="ป.โท" style="display: block;">
                            <option value="ก1" class="a1">ก1</option>
                            <option value="ก2" class="a2">ก2</option>
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
            </div><br>
            <h5 class="text-primary " id="item">รายการ</h5>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <span>1.</span>
                    <label class="IDcard">ค่าบัตรประจำตัวนักศึกษา (แรกเข้า)</label>
                </div>
                <div class="col-auto">
                    <label class="Amount">จำนวนเงิน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="cardID" class="form-control" style="text-align: center; width:124px;" oninput="restrictInput(event)">

                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <span>2.</span>
                    <label class="support">ค่าสนับสนุนการจัดการศึกษา (ภาคพิเศษ)</label>
                </div>
                <div class="col-auto">
                    <label class="Amount">จำนวนเงิน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="support" class="form-control" style="text-align: center; width:124px;" oninput="restrictInput(event)">
                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <span>3.</span>
                    <label class="service">ค่าบำรุงการศึกษา</label>
                </div>
                <div class="col-auto">
                    <label class="Amount">จำนวนเงิน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="service" class="form-control" style="text-align: center; width:124px;" oninput="restrictInput(event)">
                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <span>4.</span>
                    <label class="library">ค่าบำรุงห้องสมุดและบริการอินเตอร์เน็ต</label>
                </div>
                <div class="col-auto">
                    <label class="Amount">จำนวนเงิน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="library" class="form-control" style="text-align: center; width:124px;" oninput="restrictInput(event)">
                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div class="row g-1 mb-3">
                <div class="col-auto">
                    <span>5.</span>
                    <label class="registration">ค่าลงทะเบียนเรียน</label>
                </div>
                <div class="col-auto">
                    <label class="Amount">จำนวนเงิน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="registration" class="form-control" style="text-align: center; width:124px;" oninput="restrictInput(event)">
                </div>
                <div class="col-auto">
                    <label class="baht">บาท</label>
                </div>
            </div>
            <div>
                <div class="row mb-3">
                    <div class="form-group col-lg-6 ">
                        <label class="addWithDraw">เพิ่ม</label>
                        <select name="addWithDraw" class="form-select" id="withDrawInput" onchange='CheckWithDrawn(this.value);' required>
                            <option class="choosePrefix" value="0">เลือกแผน/แบบ</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            </optgroup>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_1" hidden>
                <div class="mb-3" style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>1</span>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode_1" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mb-3starlabel">
                        <div class="row">
                            <div class="form-group col-lg-6 starlabel">
                                <label class="credit">หน่วยกิต</label>
                                <input type="number" name="credit_1" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <span class="Amount">จำนวนเงิน</span>
                                <label>(<span class="baht">บาท</span>)</label>
                                <input type="text" name="money_1" class="form-control" style="text-align: center;" oninput="restrictInput(event)">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle_1" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label class='lecturer'>อาจารย์ผู้สอน</label>
                    <div class="form-group  mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref_1');">
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
                    <div id='otherPref_1' class="form-group mb-3 col-lg-6 starlabel" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref_1" id="otherPrefix" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fname" class="name">ชื่อ</label>
                        <input type="text" name="fname_1" id="fname" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lname" class="laname">นามสกุล</label>
                        <input type="text" name="lname_1" id="lname" class="form-control">
                    </div>
                </div>
            </div>
            <div id="publish_2" hidden>
                <div class="mb-3" style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>2</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode_2" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="credit">หน่วยกิต</label>
                                <input type="number" name="credit_2" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <span class="Amount">จำนวนเงิน</span>
                                <label>(<span class="baht">บาท</span>)</label>
                                <input type="text" name="money_2" class="form-control" style="text-align: center;" oninput="restrictInput(event)">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle_2" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <label class='lecturer'>อาจารย์ผู้สอน</label>
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput_2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref_2');">
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
                    <div id='otherPref_2' class="form-group mb-3 col-lg-6 starlabel" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref_2" id="otherPrefix" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="fname" class="name">ชื่อ</label>
                        <input type="text" name="fname_2" id="fname" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="lname" class="laname">นามสกุล</label>
                        <input type="text" name="lname_2" id="lname" class="form-control">
                    </div>
                </div>
            </div>
            <div id="publish_3" hidden>
                <div class="mb-3" style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>3</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode_3" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="credit">หน่วยกิต</label>
                                <input type="number" name="credit_3" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <span class="Amount">จำนวนเงิน</span>
                                <label>(<span class="baht">บาท</span>)</label>
                                <input type="text" name="money_3" class="form-control" style="text-align: center;" oninput="restrictInput(event)">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle_3" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <label class='lecturer'>อาจารย์ผู้สอน</label>
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput_3" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref_3');">
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
                    <div id='otherPref_3' class="form-group mb-3 col-lg-6 starlabel" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref_3" id="otherPrefix" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fname" class="name">ชื่อ</label>
                        <input type="text" name="fname_3" id="fname" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lname" class="laname">นามสกุล</label>
                        <input type="text" name="lname_3" id="lname" class="form-control">
                    </div>
                </div>
            </div>
            <div id="publish_4" hidden>
                <div class="mb-3" style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>4</span>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode_4" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="credit">หน่วยกิต</label>
                                <input type="number" name="credit_4" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <span class="Amount">จำนวนเงิน</span>
                                <label>(<span class="baht">บาท</span>)</label>
                                <input type="text" name="money_4" class="form-control" style="text-align: center;" oninput="restrictInput(event)">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle_4" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <label class='lecturer'>อาจารย์ผู้สอน</label>
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput_4" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref_4');">
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
                    <div id='otherPref_4' class="form-group mb-3 col-lg-6 starlabel" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref_4" id="otherPrefix" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fname" class="name">ชื่อ</label>
                        <input type="text" name="fname_4" id="fname" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lname" class="laname">นามสกุล</label>
                        <input type="text" name="lname_4" id="lname" class="form-control">
                    </div>
                </div>
            </div>
            <div id="publish_5" hidden>
                <div class="mb-3" style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>5</span>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode_5" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row">
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label class="credit">หน่วยกิต</label>
                                <input type="number" name="credit_5" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <span class="Amount">จำนวนเงิน</span>
                                <label>(<span class="baht">บาท</span>)</label>
                                <input type="text" name="money_5" class="form-control" style="text-align: center;" oninput="restrictInput(event)">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle_5" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <label class='lecturer'>อาจารย์ผู้สอน</label>
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class='prefix'>คำนำหน้าชื่อ</label>
                        </div>
                        <select name="prefixInput_5" class="form-select" onchange="CheckPrefix_C(this.value,'otherPref_5');">
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
                    <div id='otherPref_5' class="form-group mb-3 col-lg-6 starlabel" style="display: none;">
                        <label for="otherPref" class="specify">อื่น ๆ โปรดระบุ</label>
                        <input type="text" name="otherPref_5" id="otherPrefix" class="form-control">
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="fname" class="name">ชื่อ</label>
                        <input type="text" name="fname_5" id="fname" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="lname" class="laname">นามสกุล</label>
                        <input type="text" name="lname_5" id="lname" class="form-control">
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