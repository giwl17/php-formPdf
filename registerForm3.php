<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class='reForm3'>Adding/ Withdrawing Course Request Form</title>
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
    <form action="pdfReForm3.php" method="post" target="_blank" id="myform1" novalidate>
        <div class="st">
            <div class="h "><br>
                <h3 class='reForm3'>แบบเพิ่ม ถอนวิชาเรียน</h3>
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
            <div class="row ">
                <div class="col-lg-6 mb-3">
                    <div class="form-outline">
                        <label  for="typeText" id="phone">โทรศัพท์</label>
                        <input type="text" id="typeText" class="form-control" name="telephone" oninput="restrictInput(event)" />
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <div class="starlabel">
                        <label  for="typeText" id="phone_mobile">โทรศัพท์มือถือ</label>
                        <input class="form-control masked prefixed" type="text" data-pattern="***-***-****" name="mobile_phone"  oninput="restrictInput(event)" required />
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <h5 class="text-primary " id="education">ข้อมูลการศึกษา</h5>
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
            </div>
            <h5 class="text-primary " id="WithDraw">เพิ่ม ถอนวิชาเรียน</h5>
            <div class="starlabel">
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="semester">ภาคการศึกษาที่</label>
                        <input type="number" name="semester" class="form-control" style="text-align: center;" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="academicYear">ปีการศึกษา</label>
                        <input type="number" name="academicYear" class="form-control" style="text-align: center;" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 ">
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
                <div style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>1</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class="item">รายการ</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item" value="Add" />
                        <label class='add'>เพิ่ม</label><br>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item" value="WithDraw" />
                        <label class='withDraw'>ถอน</label>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="theory">จำนวนหน่วยกิตทฤษฎี</label>
                                <input type="number" name="theory" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="practice">จำนวนหน่วยกิตปฏิบัติ</label>
                                <input type="number" name="practice" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="SEC">กลุ่มเรียน</label>
                        <input type="text" name="SEC" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="times">เวลาเรียน</label>
                        <input type="text" name="times" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_2" hidden>
                <div style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>2</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class="item">รายการ</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item1" value="Add" />
                        <label class='add'>เพิ่ม</label><br>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item1" value="WithDraw" />
                        <label class='withDraw'>ถอน</label>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode1" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle1" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="theory">จำนวนหน่วยกิตทฤษฎี</label>
                                <input type="number" name="theory1" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="practice">จำนวนหน่วยกิตปฏิบัติ</label>
                                <input type="number" name="practice1" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="SEC">กลุ่มเรียน</label>
                        <input type="text" name="SEC1" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="times">เวลาเรียน</label>
                        <input type="text" name="times1" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_3" hidden>
                <div style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>3</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class="item">รายการ</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item2" value="Add" />
                        <label class='add'>เพิ่ม</label><br>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item2" value="WithDraw" />
                        <label class='withDraw'>ถอน</label>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode2" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle2" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="theory">จำนวนหน่วยกิตทฤษฎี</label>
                                <input type="text" name="theory2" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label class="practice">จำนวนหน่วยกิตปฏิบัติ</label>
                                <input type="text" name="practice2" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="SEC">กลุ่มเรียน</label>
                        <input type="text" name="SEC2" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="times">เวลาเรียน</label>
                        <input type="text" name="times2" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_4" hidden>
                <div style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>4</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class="item">รายการ</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item3" value="Add" />
                        <label class='add'>เพิ่ม</label><br>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item3" value="WithDraw" />
                        <label class='withDraw'>ถอน</label>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode3" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle3" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label class="theory">จำนวนหน่วยกิตทฤษฎี</label>
                                <input type="number" name="theory3" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label class="practice">จำนวนหน่วยกิตปฏิบัติ</label>
                                <input type="number" name="practice3" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="SEC">กลุ่มเรียน</label>
                        <input type="text" name="SEC3" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="times">เวลาเรียน</label>
                        <input type="text" name="times3" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div id="publish_5" hidden>
                <div style="font-weight: bold;">
                    <label class="list">รายวิชาที่</label>
                    <span>5</span>
                </div>
                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <div class="starlabel">
                            <label class="item">รายการ</label>
                        </div>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item4" value="Add" />
                        <label class='add'>เพิ่ม</label><br>
                        &nbsp;&nbsp;&nbsp;
                        <input type="radio" class="form-check-input" name="item4" value="WithDraw" />
                        <label class='withDraw'>ถอน</label>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="courseCode">รหัสวิชา</label>
                        <input type="text" name="courseCode4" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="courseTitle">ชื่อวิชา</label>
                        <input type="text" name="courseTitle4" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 starlabel">
                        <div class="row ">
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label class="theory">จำนวนหน่วยกิตทฤษฎี</label>
                                <input type="number" name="theory4" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label class="practice">จำนวนหน่วยกิตปฏิบัติ</label>
                                <input type="number" name="practice4" class="form-control" style="text-align: center;">
                                <div class="invalid-feedback invalid">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="SEC">กลุ่มเรียน</label>
                        <input type="text" name="SEC4" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label class="times">เวลาเรียน</label>
                        <input type="text" name="times4" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
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