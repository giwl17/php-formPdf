<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="titleStudentResignation">Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link rel="stylesheet" href="css/styles1.css">
    <script src="js/script.js"></script>
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
            <h4 class="titleStudentResignation">แบบขอลาออกจากการเป็นนักศึกษา (Request form for Student Resignation)</h4>
        </div>
        <form action="pdfStudentResignation.php" method="post" class="needs-validation" target="_blank" novalidate>
            <div>
                <h5 class="text-primary mt-5 mb-3" id="titleInfo">ข้อมูลส่วนตัว (Personal information)</h5>
                <div class="row">
                    <div class="form-group col-md-6 mt-2 starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-3 mt-3 starlabel">
                        <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInput" name="prefixInput" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix');" required>
                            <option class="prefixOp">เลือกคำนำหน้าชื่อ</option>
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
                        <label for="telephone" class="telephone">โทรศัพท์บ้าน (Telephone)</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" maxlength="10" oninput="restrictInput(event)">
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
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="titleEduInfo">ข้อมูลการศึกษา (Education information)</h5>
                <div class="row">
                    <div class="form-group col-lg-4 mt-3 starlabel">
                        <label for="LevelsInput" id="levelEdu">ระดับการศึกษา (Level of education)</label>
                        <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                            <option value="master" id="master">ปริญญาโท (Master's degree)</option>
                            <option value="doctor" id="doctoral">ปริญญาเอก (Doctoral Degree)</option>
                        </select>
                    </div>
                    <div class="form-group mt-3 col-lg-4">
                        <label for="plan" id="planTypeLabel">แผน (Plan) / แบบ (Type)</label>
                        <select name="plan" id="plan" class="form-select">
                            <option id="planTypeOp" name="plantype" value="">เลือกแผน (Plan) / แบบ (Type)</option>
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

                    <div class="form-group col-lg-4 mt-3 starlabel">
                        <label for="inputState" id="programTypeLabel">ภาค (Program type)</label>
                        <select name="inputState" class="form-select">
                            <option value='normal' id="programTypeOpRegular">ปกติ (Regular)</option>
                            <option value="special" id="programTypeOpSpecial">พิเศษ (Weekend)</option>
                        </select>
                    </div>
                </div>

                <div class="row mb-3 starlabel">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="major" id="majorLabel">วิชาเอก (Major)</label>
                        <input type="text" name="major" id="major" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 starlabel">
                        <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary mb-3" id="resignationDetails">รายละเอียดขอลาออกจากการเป็นนักศึกษา</h5>
                <div class="row align-items-center">
                    <div class="col-auto">
                        <label id="resignTerm" class="star">มีความประสงค์จะขอลาออกจากการเป็นนักศึกษา ในภาคการศึกษาที่</label>
                    </div>
                    <div class="form-group col-auto" style="width:100px;">
                        <input type="text" name="resignTerm" class="form-control text-center" maxlength="1" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="col-auto">
                        <label id="resignYear" class="star">ปีการศึกษา</label>
                    </div>
                    <div class="form-group col-auto" style="width:150px;">
                        <input type="text" name="resignYear" class="form-control text-center" maxlength="4" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="form-group starlabel mt-3">
                    <label for="reasons" class="form-label" id="resignReasons">เนื่องจาก (by the following reasons)</label>
                    <textarea class="form-control" id="textarea1" name="reasons" rows="3" maxlength="218" required></textarea>
                    <div id="the-count1">
                        <span id="current1">0</span>
                        <span id="maximum1">/ 218</span>
                    </div>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>


                <div class="mt-3 w-100">
                    <label id="attachment">เอกสารแนบ</label>
                    <div class="form-group row align-items-center mt-2 col-form-label">
                        <div class="col-1">
                            <label for="">1. </label>
                        </div>
                        <div class="col-11">
                            <input type="text" name="attachment1" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-2 col-form-label">
                        <div class="col-1">
                            <label for="">2. </label>
                        </div>
                        <div class="col-11">
                            <input type="text" name="attachment2" class="form-control">
                        </div>
                    </div>
                    <div class="form-group row align-items-center mt-2 col-form-label">
                        <div class="col-1">
                            <label for="">3. </label>
                        </div>
                        <div class="col-11">
                            <input type="text" name="attachment3" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h6 style="font-weight: bold;" class="listAdvisor">อาจารย์ที่ปรึกษา</h6>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="prefixAdvisor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixAdvisor" name="prefixAdvisor" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixAdvisor');">
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
                    <div class="form-group mb-3 col-lg-6" id="otherPrefixAdvisor" style="display:none;">
                        <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" id="otherPrefixAdvisor" name="otherPrefixAdvisor" id="otherPrefixAdvisor" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fnameAdvisor" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fnameAdvisor" id="fnameAdvisor" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lnameAdvisor" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lnameAdvisor" id="lnameAdvisor" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
            </div>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/script.js"></script>
    <script src="js/changeLeng.js"></script>
    <script src="js/input-mask.js"></script>
</body>

</html>