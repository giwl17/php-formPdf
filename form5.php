<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบขอสอบดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/styles1.css">
    <script src="js/script.js"></script>

    <script>
        function restrictInput(event) {
            var input = event.target;
            var value = input.value;
            input.value = value.replace(/\D/g, '');
        }
    </script>
</head>

<body>
    <nav id='navbar' class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <!-- <i class="bx bx-menu menu-icon"></i> -->
                <a href="/graden">
                    <img src="img/RMUTTLOGO.png" alt="RMUTT LOGO" width="45px" height="75px" class="bx bx-menu " />
                </a>
                <span class="logo-nam hidden-mobile" style="font-size: small; padding-left:20px;">
                    คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี <br>
                    Faculty of Engineering Rajamangala University of Technology Thanyaburi
                </span>
            </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle " type="button" data-bs-toggle="dropdown">
                    Language
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                    <li onclick="toggleLanguage('en')"><a class="dropdown-item" href="#">English</a></li>
                    <li onclick="toggleLanguage('th')"><a class="dropdown-item" href="#">Thai</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <script>
        var prevScrollpos = window.pageYOffset;
        window.onscroll = function() {
            var currentScrollPos = window.pageYOffset;
            if (prevScrollpos > currentScrollPos) {
                document.getElementById("navbar").style.top = "0";
            } else {
                document.getElementById("navbar").style.top = "-80px";
            }
            prevScrollpos = currentScrollPos;
        }
    </script>
    <div class="st">
        <div class="h">
            <h4 id="titleForm">แบบเสนอหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h4>
        </div>
        <form action="pdf5" method="post" class="needs-validation" target="_blank" novalidate>
            <div>
                <h5 class="text-primary mt-5" id="titleInfo">ข้อมูลส่วนตัว (Personal information)</h5>
                <div class="row">
                    <div class="form-group mb-3 starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInput" name="prefixInput" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefix');">
                            <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                            <option class="prefixOpMr" name='mr'>นาย (Mr.)</option>
                            <option class="prefixOpMs" name='miss'>นางสาว (Ms.)</option>
                            <option class="prefixOpMrs" name='ms'>นาง (Mrs.)</option>
                            <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>

                    <div class="form-group mb-3 col-lg-6" id="otherPrefix" style="display: none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefix" id="otherPrefix" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="fname" class="fname ">ชื่อ (Name)</label>
                        <input type="text" name="fname" id="fname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="lname" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lname" id="lname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="telephone" class="telephone">โทรศัพท์บ้าน (Telephone)</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" oninput="restrictInput(event)" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 starlabel">
                        <label for="address">ที่อยู่ปัจจุบัน (Current address)</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary mb-3" id="titleEduInfo">ข้อมูลการศึกษา (Education information)</h5>
                <div class="row">
                    <div class="form-group col-lg-4 mb-3 starlabel">
                        <label for="LevelsInput" id="levelEdu">ระดับการศึกษา (Level of education)</label>
                        <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                            <option value="master" id="master">ปริญญาโท (Master's degree)</option>
                            <option value="doctor" id="doctoral">ปริญญาเอก (Doctoral Degree)</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-4 mb-3">
                        <label for="plan" id="planTypeLabel">แผน (Plan) / แบบ (Type)</label>
                        <select name="plan" id="plan" class="form-select">
                            <option value="" id="planTypeOp">เลือกแผน (Plan) / แบบ (Type)</option>
                            <optgroup id="optionMaster" label="ป.โท" style="display: block;">
                                <option value="ก1">ก1</option>
                                <option value="ก2">ก2</option>
                            </optgroup>
                            <optgroup id="optionDoctor" label="ป.เอก" style="display: none;">
                                <option value="1.1">1.1</option>
                                <option value="1.2">1.2</option>
                                <option value="2.1">2.1</option>
                                <option value="2.2">2.2</option>
                            </optgroup>
                        </select>
                    </div>

                    <div class="form-group col-lg-4 mb-3 starlabel">
                        <label for="inputState" id="programTypeLabel">ภาค (Program type)</label>
                        <select name="inputState" class="form-select">
                            <option value='normal' id="programTypeOpRegular">ปกติ (Regular)</option>
                            <option value="special" id="programTypeOpSpecial">พิเศษ (Weekend)</option>
                        </select>
                    </div>
                </div>
                <div class="row starlabel">
                    <div class="form-group mb-3">
                        <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" value="วิศวกรรมศาสตร์" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 starlabel">
                        <label for="major" id="majorLabel">วิชาเอก (Major)</label>
                        <input type="text" name="major" id="major" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3">
                        <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="thesisDetail">รายละเอียดเค้าโครงฯ</h5>
                <div class="form-group mb-3 starlabel">
                    <label for="titleTH" id="titleThLabel">ชื่อเรื่องภาษาไทย (Title in Thai)</label>
                    <textarea class="form-control" id="titleTH" name="titleTH" rows="2" maxlength="147" required></textarea>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 starlabel">
                    <label for="titleEN" id="titleEnLabel">ชื่อเรื่องภาษาอังกฤษ (Title in English)</label>
                    <textarea class="form-control" id="titleEN" name="titleEN" rows="2" maxlength="147" required></textarea>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="col-lg-6 mb-3">
                    <label id="thesisTypeLabel" class="star">ประเภคเค้าโครงฯ</label>
                    <div class="col-lg-6 ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1" value="Dissertation" required>
                        <label class="form-check-label" for="flexRadioDefault1" id="thesisTypeDis">
                            ดุษฎีนิพนธ์ (Dissertation)
                        </label>
                    </div>
                    <div class="col-lg-6 ">
                        <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" value="Thesis">
                        <label class="form-check-label" for="flexRadioDefault2" id="thesisTypeThesis">
                            วิทยานิพนธ์ (Thesis)
                        </label>
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="datepicker" id="dateAppLabel" class="star">วันที่ได้รับอนุมัติผลการสอบเค้าโครงฯ</label>
                    <input type="date" class="form-control" id="datepicker" name="datepicker" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="exalgetail">รายละเอียดการขอสอบ</h5>
                <div class="mb-3">
                    <h6 id="examLabel">เอกสารที่ส่งประกรอบพิจารณา</h6>
                    <div class="form-check">
                        <table>
                            <tr>
                                <td> <input class="form-check-input" type="checkbox" value="1" name="check1" id="copyAbstarctCheck" onchange="CheckBoxHide()"></td>
                                <td id="examAb" style="padding-right: 15px;">สำเนาบทคัดย่อ Copy of abstract จำนวน &nbsp;</td>
                                <td><input type="number" name="copyAbstarct" id="copyAbstarct" class="form-control" min="0" style="width: 100px; text-align: center;" disabled required></td>
                                <td class="examValue" style="padding-left: 15px;">&nbsp; ชุด</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-check">
                        <table>
                            <tr>
                                <td> <input class="form-check-input" type="checkbox" value="2" name="check2" id="hardCopyCheck" onchange="CheckBoxHide()"></td>
                                <td id="examHard" style="padding-right: 15px;">ดุษฎีนิพนธ์/วิทยานิพนธ์ Hard Copy of Dissertation/Thesis จำนวน &nbsp;</td>
                                <td><input type="number" name="hardCopy" id="hardCopy" class="form-control" min="0" style="width: 100px; text-align: center;" disabled required></td>
                                <td class="examValue" style="padding-left: 15px;">&nbsp; ชุด</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" name="check3">
                        <label class="form-check-label" for="flexCheckChecked" id="examCurrent">
                            ใบแสดงผลการศึกษาฉบับปัจจุบัน Current Transcript
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="4" name="check4">
                        <label class="form-check-label" for="flexCheckChecked" id="examReceipt">
                            ใบเสร็จรับเงินค่าลงทะเบียนดุษฎีนิพนธ์/วิทยานิพนธ์ หรือค่ารักษาสภาพการเป็นนักศึกษา <br>
                            Receipt of the Dissertation/Thesis or student status maintenance fee
                        </label>
                    </div>
                </div>
                <div>
                    <h6 class="mb-2" id="placeExamTitle">สถานที่ขอสอบ</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6 starlabel">
                            <label for="place" id="placeExamRoom">สถานที่ (Place)/ห้อง (Room)</label>
                            <input type="text" name="place" id="place" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mb-3 col-lg-6 starlabel">
                            <label id="exalgate">วันและเวลาที่ขอสอบ</label>
                            <input type="datetime-local" class="form-control" id="dateBook" name="dateBook" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="building" id="placeExamBuild">อาคาร (Building)</label>
                            <input type="text" name="building" id="building" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="facultyPlace" id="placeExamFaculty">คณะ (Faculty)</label>
                            <input type="text" name="facultyPlace" id="facultyPlace" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="listTitle">รายชื่อคณะกรรมการสอบ (List of examination committees and those involved)</h5>
                <h6 class="fw-bold d-inline">1.</h6>
                <h6 style="font-weight: bold;" id="listComChairman" class="d-inline">ประธานกรรมการสอบ (Examination Committee Chairman)</h6>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="prefixInput1" class="prefix"> class="prefix"</label>
                        <select name="prefixInput1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix1');">
                            <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                            <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                            <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                            <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                            <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                            <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                            <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                            <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                            <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                        </select>
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <div id="otherPrefix1" style="display: none;">
                            <label for="otherPrefix1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefix1" id="otherPrefix1" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="fname1" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fname1" id="fname1" class="form-control">
                    </div>

                    <div class="form-group mb-3 col-lg-6">
                        <label for="lname1" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lname1" id="lname1" class="form-control">
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold d-inline">2.</h6>
                    <h6 class="fw-bold listCommittee d-inline">กรรมการ (Committee)</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="prefixInput2" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="prefixInput2" name="prefixInput2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix2');">
                                <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                            </select>
                        </div>
                        <div class="form-group mb-3 col-lg-6" id="otherPrefix2" style="display: none;">
                            <label for="otherPrefix2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" id="otherPrefix2" name="otherPrefix2" id="otherPrefix2" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="fname2" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fname2" id="fname2" class="form-control">
                        </div>

                        <div class="form-group mb-3 col-lg-6">
                            <label for="lname2" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lname2" id="lname2" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mb-3">
                    <h6 class="fw-bold d-inline">3.</h6>
                    <h6 class="fw-bold listCommittee d-inline">กรรมการ (Committee)</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="prefixInput3" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="prefixInput3" name="prefixInput3" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix3');">
                                <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-lg-6" id="otherPrefix3" style="display: none;">
                            <label for="otherPrefix3" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" id="otherPrefix3" name="otherPrefix3" id="otherPrefix3" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="fname3" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fname3" id="fname3" class="form-control">
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="lname3" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lname3" id="lname3" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold d-inline">4.</h6>
                    <h6 class="fw-bold listCommittee d-inline">กรรมการ (Committee)</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="prefixInput4" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="prefixInput4" name="prefixInput4" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix4');">
                                <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-lg-6" id="otherPrefix4" style="display: none;">
                            <label for="otherPrefix4" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" id="otherPrefix4" name="otherPrefix4" id="otherPrefix4" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="fname4" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fname4" id="fname4" class="form-control">
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="lname4" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lname4" id="lname4" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold d-inline">5.</h6>
                    <h6 class="fw-bold listCommittee d-inline">กรรมการ (Committee)</h6>
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3">
                            <label for="prefixInput5" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="prefixInput5" name="prefixInput5" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix5');">
                                <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                            </select>
                        </div>

                        <div class="form-group mb-3 col-lg-6" id="otherPrefix5" style="display: none;">
                            <label for="otherPrefix5" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" id="otherPrefix5" name="otherPrefix5" id="otherPrefix5" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
                            <label for="fname5" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fname5" id="fname5" class="form-control">
                        </div>
                        <div class="form-group mb-3 col-lg-6">
                            <label for="lname5" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lname5" id="lname5" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <h6 class="fw-bold d-inline">6.</h6>
                    <h6 style="font-weight: bold;" class="listMajorAd d-inline">อาจารย์ที่ปรึกษาหลัก (Major Advisor)</h6>
                        <div class="row">
                            <div class="form-group col-lg-6 mb-3 starlabel">
                                <label for="prefixMajor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixMajor" name="prefixMajor" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixMajor');">
                                    <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                    <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                    <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                    <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                    <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                    <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                    <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                    <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                    <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                                </select>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixMajor" style="display:none;">
                                <label for="otherPrefixMajor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" id="otherPrefixMajor" name="otherPrefixMajor" id="otherPrefixMajor" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label for="fnameMajor" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameMajor" id="fnameMajor" class="form-control" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mb-3 col-lg-6 starlabel">
                                <label for="lnameMajor" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameMajor" id="lnameMajor" class="form-control" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                </div>

                <div class="mt-5">
                    <h5 class="text-primary" id="listInvolved">รายชื่อผู้ที่เกี่ยวข้อง (List of people involved)</h5>

                    <div class="mb-3">
                        <h6 style="font-weight: bold;" class="listCoAd">อาจารย์ที่ปรึกษาร่วม (Co-Advisor)</h6>
                        <div class="row">
                            <div class="form-group col-lg-6 mb-3">
                                <label for="prefixCoAdvisor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixCoAdvisor" name="prefixCoAdvisor" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixCoAdvisor');">
                                    <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                    <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                    <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                    <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                    <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                    <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                    <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                    <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                    <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixCoAdvisor" style="display: none;">
                                <label for="otherPrefixCoAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixCoAdvisor" id="otherPrefixCoAdvisor" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameCoAdvisor" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameCoAdvisor" id="fnameCoAdvisor" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameCoAdvisor" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameCoAdvisor" id="lnameCoAdvisor" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 style="font-weight: bold;" class="listCur">ประธานกรรมการบริหารหลักสูตร (Curriculum Executive Committee Chairman)</h6>
                        <div class="row">
                            <div class="form-group col-lg-6 mb-3">
                                <label for="prefixCurriculum" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixCurriculum" name="prefixCurriculum" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixCurriculum');">
                                    <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                    <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                    <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                    <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                    <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                    <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                    <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                    <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                    <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-6 mb-3" id="otherPrefixCurriculum" style="display: none;">
                                <label for="otherPrefixCurriculum" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixCurriculum" id="otherPrefixCurriculum" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameCurriculum" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameCurriculum" id="fnameCurriculum" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameCurriculum" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameCurriculum" id="lnameCurriculum" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3">
                        <h6 style="font-weight: bold;" class="listGraduate">ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ</h6>
                        <div class="row">
                            <div class="form-group col-lg-6 mb-3">
                                <label for="prefixGraduate" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixGraduate" name="prefixGraduate" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixGraduate');">
                                    <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                    <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                                    <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                                    <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                                    <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                                    <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                                    <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                                    <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                                    <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                                </select>
                            </div>
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixGraduate" style="display: none;">
                                <label for="otherPrefixGraduate" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" id="otherPrefixGraduate" name="otherPrefixGraduate" id="otherPrefixGraduate" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameGraduate" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameGraduate" id="fnameGraduate" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameGraduate" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameGraduate" id="lnameGraduate" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="d-flex justify-content-end mt-5">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
            </div>
        </form>
    </div>

    <script src="js/input-mask.js"></script>
    <script src="js/script.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/changeLeng.js"></script>

</body>

</html>