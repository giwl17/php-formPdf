<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thesis Progress Examination Permission Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <script src="js/script.js"></script>
    <link rel="stylesheet" href="css/styles1.css">
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
                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown">
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
            <h4 id="titleProgress">แบบขอสอบความก้าวหน้าวิทยานิพนธ์ (Thesis Progress Examination Permission Form)</h4>
        </div>
        <form action="pdfProgress.php" method="post" class="needs-validation" target="_blank" novalidate>
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
                    <div class="form-group col-lg-6 mb-3 starlabel">
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

                    <div class="form-group mb-3 col-lg-6" id="otherPrefix" style="display:none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefix" id="otherPrefix" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="fname" class="fname">ชื่อ (Name)</label>
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
                    <div class="form-group mb-3 starlabel">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" oninput="restrictInput(event)" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary " id="titleEduInfo">ข้อมูลการศึกษา (Education information)</h5>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="LevelsInput" id="levelEdu">ระดับการศึกษา (Level of education)</label>
                        <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                            <option value="master" id="master">ปริญญาโท (Master's degree)</option>
                            <option value="doctor" id="doctoral">ปริญญาเอก (Doctoral Degree)</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="plan" id="planTypeLabel">แผน (Plan) / แบบ (Type)</label>
                        <select name="plan" id="plan" class="form-select">
                            <option id="planTypeOp" name="plantype">เลือกแผน (Plan) / แบบ (Type)</option>
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
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label class="programLabel">ภาค</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="programType" id="fulltime" value="fulltime" checked>
                            <label class="form-check-label fulltime" for="fulltime">
                                ภาคปกติ
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="programType" id="parttime" value="parttime">
                            <label class="form-check-label parttime" for="parttime">
                                ภาคพิเศษ
                            </label>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="course" class="courseLabel">หลักสูตร (Course)</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="course" id="thai" value="thai" checked>
                            <label class="form-check-label thaiCourse" for="thai">
                                หลักสูตรภาษาไทย (Thai program)
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="course" id="en" value="en">
                            <label class="form-check-label enCourse" for="en">
                                หลักสูตรนานาชาติ (International program)</label>
                        </div>
                    </div>
                </div>
                <div class="row starlabel">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="field" class="field">สาขาวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="thesisDetail">รายละเอียดเค้าโครงฯ</h5>
                <div class="form-group mb-3 starlabel">
                    <label for="titleTH" class="" id="titleThLabel">ชื่อเรื่องภาษาไทย (Title in Thai)</label>
                    <!-- <input type="text" name="titleTH" id="titleTH" class="form-control" required> -->
                    <textarea class="form-control" name="titleTH" id="titleTH" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 starlabel">
                    <label for="titleEN" id="titleEnLabel">ชื่อเรื่องภาษาอังกฤษ (Title in English)</label>
                    <!-- <input type="text" name="titleEN" id="titleEN" class="form-control" required> -->
                    <textarea class="form-control" name="titleEN" id="titleEN" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="exalgetail">รายละเอียดการขอสอบ</h5>
                <table>
                    <tr>
                        <td id="enclosed" style="padding-right: 15px;">จำนวนที่ยื่นแบบรายงานความก้าวหน้านิพนธ์</td>
                        <td><input type="number" name="numberForm" id="" class="form-control" min='0' style="text-align: center; width:100px" required></td>
                        <td class="examValue1" style="padding-left: 15px;">ชุด</td>
                    </tr>
                </table>
                <h6 class="mb-3" id="placeExamTitle">สถานที่ขอสอบ</h6>
                <div class="row">
                    <div class="form-group col-lg-6 starlabel">
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

            <div class="mt-5">
                <h5 class="text-primary" id="qualifyingHead">คณะกรรมการสอบวัดคุณสมบัติ (Qualifying Examination Committee)</h5>
                <div class="">
                    <div class="">
                        <h6 style="font-weight: bold;" class="listExamChairman">ประธานกรรมการ (Chairman)</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="prefixExamChairman" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixExamChairman" name="prefixExamChairman" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamChairman');">
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
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixExamChairman" style="display: none;">
                                <label for="otherPrefixExamChairman" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamChairman" id="otherPrefixExamChairman" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameExamChairman" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamChairman" id="fnameExamChairman" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameExamChairman" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamChairman" id="lnameExamChairman" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listCommittee">กรรมการ (Committee)</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="prefixInput1" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixInput1" name="prefixInput1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix1');">
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

                            <div class="form-group mb-3 col-lg-6" id="otherPrefix1" style="display: none;">
                                <label for="otherPrefix1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" id="otherPrefix1" name="otherPrefix1" id="otherPrefix1" class="form-control">
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
                    </div>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listCommittee">กรรมการ (Committee)</h6>
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
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listCommittee">กรรมการ (Committee)</h6>
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
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listCommittee">กรรมการ (Committee)</h6>
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

                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listMajorAd">อาจารย์ที่ปรึกษาหลัก (Major Advisor)</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6 starlabel">
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
                        <div class="row">
                            <div class="form-group mb-3 starlabel">
                                <label for="department" class="department">หน่วยงาน (Department)</label>
                                <input type="text" name="department" class="form-control" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="mt-5">
                    <h5 class="text-primary" id="listInvolved">รายชื่อผู้ที่เกี่ยวข้อง (List of people involved)</h5>

                    <div class="">
                        <h6 style="font-weight: bold;" class="listCoAd">อาจารย์ที่ปรึกษาร่วม (Co-Advisor)</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
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


                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listChairman">ประธานกรรมการบริหารหลักสูตร (Chairman of the Program Commitee)</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="prefixChairman" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixChairman" name="prefixChairman" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixChairman');">
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
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixChairman" style="display: none;">
                                <label for="otherPrefixChairman" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixChairman" id="otherPrefixChairman" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameChairman" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameChairman" id="fnameChairman" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameChairman" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameChairman" id="lnameChairman" class="form-control">
                            </div>
                        </div>
                    </div>

                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="dean">คณบดีคณะวิศวกรรมศาสตร์</h6>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="prefixDean" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="prefixDean" name="prefixDean" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixDean');">
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
                            <div class="form-group mb-3 col-lg-6" id="otherPrefixDean" style="display: none;">
                                <label for="otherPrefixDean" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixDean" id="otherPrefixDean" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mb-3 col-lg-6">
                                <label for="fnameDean" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameDean" id="fnameDean" class="form-control">
                            </div>
                            <div class="form-group mb-3 col-lg-6">
                                <label for="lnameDean" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameDean" id="lnameDean" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end mt-5">
                    <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success '>
                </div>
        </form>
    </div>
    <script src="js/script.js"></script>
    <script src="js/input-mask.js"></script>
    <script src="js/changeLeng.js"></script>
</body>

</html>