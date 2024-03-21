<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="titleCoursesTransfer">Form</title>
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
                <a href="/thesisForm">
                    <img src="img/RMUTTLOGO.png" alt="RMUTT LOGO" width="45px" height="75px" class="bx bx-menu " />
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
    <section class="overlay"></section>
    <script>
        const navBar = document.querySelector("nav"),
            menuBtns = document.querySelectorAll(".menu-icon"),
            overlay = document.querySelector(".overlay");

        menuBtns.forEach((menuBtn) => {
            menuBtn.addEventListener("click", () => {
                navBar.classList.toggle("open");
            });
        });

        overlay.addEventListener("click", () => {
            navBar.classList.remove("open");
        });
    </script>
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
            <h4 class="titleCoursesTransfer">แบบขอเทียบโอนผลการเรียน (Courses Transfer Request Form)</h4>
        </div>
        <form action="pdfCoursesTransfer.php" method="post" class="needs-validation" target="_blank" novalidate>
            <div>
                <h5 class="text-primary mt-5" id="titleInfo">ข้อมูลส่วนตัว (Personal information)</h5>
                <div class="row">
                    <div class="form-group col-md-6 starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
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

                    <div class="form-group mt-3 col-lg-6" id="otherPrefix" style="display:none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefix" id="otherPrefix" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fname" id="fname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lname" id="lname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="telephone" class="telephone">โทรศัพท์บ้าน (ธelephone)</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" maxlength="10" oninput="restrictInput(event)">
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" maxlength="10" oninput="restrictInput(event)" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-3 starlabel">
                        <label for="address" class="form-label address">ที่อยู่ปัจจุบัน (Current address)</label>
                        <textarea class="form-control" id="address" name="address" rows="3" required></textarea>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h5 class="text-primary mb-3" id="titleEduInfo">ข้อมูลการศึกษา (Education information)</h5>
                    <div class="row">
                        <div class="form-group col-lg-4 starlabel">
                            <label for="LevelsInput" id="levelEdu">ระดับการศึกษา (Level of education)</label>
                            <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                                <option value="master" id="master">ปริญญาโท (Master's degree)</option>
                                <option value="doctor" id="doctoral">ปริญญาเอก (Doctoral Degree)</option>
                            </select>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-4">
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

                        <div class="form-group col-lg-4 starlabel">
                            <label for="inputState" id="programTypeLabel">ภาค (Program type)</label>
                            <select name="inputState" class="form-select">
                                <option value='normal' id="programTypeOpRegular">ปกติ (Regular)</option>
                                <option value="special" id="programTypeOpSpecial">พิเศษ (Weekend)</option>
                            </select>
                        </div>
                    </div>

                    <div class="row starlabel">
                        <div class="form-group mt-3 col-lg-6">
                            <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                            <input type="text" name="faculty" id="faculty" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mt-3 col-lg-6 starlabel">
                            <label for="major" id="majorLabel">วิชาเอก (Major)</label>
                            <input type="text" name="major" id="major" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6 mt-3">
                            <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                            <input type="text" name="field" id="field" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="form-group row g-2">
                        <div class="col-auto">
                            <lable class="align-middle" id="courseTrasferNum">มีความประสงค์จะขอเทียบโอนผลการเรียน</lable>
                        </div>
                        <div class="col-auto">
                            <select id="numTransfer" name="numTransfer" class="form-select" onchange="CheckListPub(this.value)" required">
                                <option name="1" value="1">1</option>
                                <option name="2" value="2">2</option>
                                <option name="3" value="3">3</option>
                                <option name="4" value="4">4</option>
                            </select>
                        </div>
                        <div class="col"><span class="align-middle" id="course">วิชา</span></div>
                    </div>

                    <div id="publish_1">
                        <h6 style="font-weight: bold;" id="list1">วิชาที่ 1</h6>
                        <div>
                            <h6 class="transferPrevious">รายวิชาที่ขอเทียบจากสถาบันเดิม</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="courseId1" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="courseTitle1" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="creditT1" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="creditP1" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="grade">เกรด</label>
                                    <input type="text" name="grade1" class="form-control" style="text-align:center;" step="0.01" max="4" min="0s">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6 class="transferTo">รายวิชาที่ต้องการเทียบในหลักสูตร</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="toCourseId1" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="toCourseTitle1" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="toCreditT1" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="toCreditP1" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                            </div>
                        </div>
                    </div>


                    <div id="publish_2" class="mt-4" hidden>
                        <h6 style="font-weight: bold;" id="list2">วิชาที่ 2</h6>
                        <div>
                            <h6 class="transferPrevious">รายวิชาที่ขอเทียบจากสถาบันเดิม</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="courseId2" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="courseTitle2" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="creditT2" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="creditP2" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="grade">เกรด</label>
                                    <input type="number" name="grade2" id="" class="form-control" style="text-align:center;" step="0.01" max="4" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6 class="transferTo">รายวิชาที่ต้องการเทียบในหลักสูตร</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="toCourseId2" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="toCourseTitle2" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="toCreditT2" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="toCreditP2" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="publish_3" class="mt-4" hidden>
                        <h6 style="font-weight: bold;" id="list3">วิชาที่ 3</h6>
                        <div>
                            <h6 class="transferPrevious">รายวิชาที่ขอเทียบจากสถาบันเดิม</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="courseId3" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="courseTitle3" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="creditT3" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="creditP3" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="grade">เกรด</label>
                                    <input type="number" name="grade3" id="" class="form-control" style="text-align:center;" step="0.01" max="4" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6 class="transferTo">รายวิชาที่ต้องการเทียบในหลักสูตร</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="toCourseId3" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="toCourseTitle3" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="toCreditT3" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="toCreditP3" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div id="publish_4" class="mt-4" hidden>
                        <h6 style="font-weight: bold;" id="list4">วิชาที่ 4</h6>
                        <div>
                            <h6 class="transferPrevious">รายวิชาที่ขอเทียบจากสถาบันเดิม</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="courseId4" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="courseTitle4" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="creditT4" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="creditP4" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="grade">เกรด</label>
                                    <input type="number" name="grade4" id="" class="form-control" style="text-align:center;" step="0.01" max="4" min="0">
                                </div>
                            </div>
                        </div>
                        <div class="mt-4">
                            <h6 class="transferTo">รายวิชาที่ต้องการเทียบในหลักสูตร</h6>
                            <div class="row">
                                <div class="form-group mt-2 col-lg-3">
                                    <label class="courseId">รหัสวิชา</label>
                                    <input type="text" name="toCourseId4" id="" class="form-control">
                                </div>
                                <div class="form-group col-lg-9 mt-2">
                                    <label class="courseTitle">ชื่อวิชา</label>
                                    <input type="text" name="toCourseTitle4" id="" class="form-control">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditT">หน่วยกิตภาคทฤษฎี</label>
                                    <input type="number" name="toCreditT4" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                                <div class="form-group col-lg-4 mt-3">
                                    <label class="creditP">หน่วยกิตภาคปฏิบัติ</label>
                                    <input type="number" name="toCreditP4" id="" class="form-control" style="text-align:center;" max="9" min="0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    <h5 class="text-primary" id="listInvolved">รายชื่อผู้ที่เกี่ยวข้อง (List of people involved)</h5>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="listMajorAd">อาจารย์ที่ปรึกษาหลัก (Major Advisor)</h6>
                        <div class="row">
                            <div class="form-group col-lg-6 starlabel">
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
                            <div class="form-group col-lg-6" id="otherPrefixMajor" style="display:none;">
                                <label for="otherPrefixMajor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" id="otherPrefixMajor" name="otherPrefixMajor" id="otherPrefixMajor" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6 starlabel">
                                <label for="fnameMajor" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameMajor" id="fnameMajor" class="form-control" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group mt-3 col-md-6 starlabel">
                                <label for="lnameMajor" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameMajor" id="lnameMajor" class="form-control" required>
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
            </div>
    </div>
    </form>
    </div>
    <script src="js/script.js"></script>
    <script src="js/input-mask.js"></script>
    <script src="js/changeLeng.js"></script>
</body>

</html>