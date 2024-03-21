<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="progressReportFormTitle"></title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <script src="script.js"></script>
    <link rel="stylesheet" href="css/styles1.css">

    <script>
        function CheckPrefix_C(val, prefixid) {
            var element = document.getElementById(prefixid);
            if (val == 'other') {
                element.style.display = 'block';
            } else {
                element.style.display = 'none';
            }
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
            <h3 class="progressReportFormTitle">แบบรายงานความก้าวหน้าดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (Dissertation/Thesis/Independent Study Progress Report Form)</h4>
        </div>
        <form action="pdfProgressReport.php" method="post" class="needs-validation" target="_blank" novalidate>
            <div>
                <h5 class="text-primary mt-5" id="studentInformationTitle">ข้อมูลผู้ทำดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (Student's information)</h5>
                <div class="row">
                    <div class="form-group col-lg-3 mt-3 starlabel">
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

                <div class="row mt-3">
                    <div class="form-group col-md-5 starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-2 col-6">
                        <label for="" class="group">กลุ่ม (Group)</label>
                        <input type="text" name="group" id="" class="form-control">
                    </div>
                    <div class="form-group col-lg-5 col-6">
                        <label for="" class="curriculum">หลักสูตร (Curriculum)</label>
                        <input type="text" name="curriculum" id="" class="form-control">
                    </div>
                </div>

                <div class="row starlabel">
                    <div class="form-group mt-3 col-lg-4">
                        <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label for="major" id="majorLabel">วิชาเอก (Major)</label>
                        <input type="text" name="major" id="major" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="form-group row mt-3 g-2 align-items-center starlabel">
                    <div class="col-lg-auto col-auto">
                        <label for="" id="startSemesterOf" class="align-middle">เข้าศึกษาภาคเรียนที่</label>
                    </div>
                    <div class="col-lg-1 col-2">
                        <input type="text" name="startSemesterOf์Term" id="" class="form-control text-center" maxlength="1" oninput="restrictInput(event) " required>
                    </div>
                    <div class="col-1 text-center col-lg-auto">/</div>
                    <div class="col-lg-2 col-4">
                        <input type="text" name="startSemesterOfYears" id="" class="form-control text-center" maxlength="4" oninput="restrictInput(event)" required>
                    </div>
                </div>

                <div class="form-group mt-3 col-lg-3 starlabel">
                    <label for="" id="gradePointLabel">ผลการศึกษา (เกรดเฉลี่ยสะสม)</label>
                    <input type="number" name="gpx" id="" class="form-control" step=".01" min="0" max="4" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <div class="mt-4">
                <h5 class="text-primary" id="currentAddress">ที่อยู่ระหว่างทำดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h5>
                <div class="row">
                    <div class="form-group col-4">
                        <label for="houseNo" class="houseNo">บ้านเลขที่</label>
                        <input type="text" name="houseNo" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label for="villageNo" class="villageNo">หมู่ที่</label>
                        <input type="text" name="villageNo" class="form-control">
                    </div>
                    <div class="form-group col-4">
                        <label for="" class="village">หมู่บ้าน</label>
                        <input type="text" name="village" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-6">
                        <label for="alleyLane" class="alleyLane">ตรอก/ซอย</label>
                        <input type="text" name="alleyLane" class="form-control">
                    </div>
                    <div class="form-group col-6">
                        <label for="road" class="road">ถนน</label>
                        <input type="text" name="road" class="form-control">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-3">
                        <label for="subDistrictSubArea" class="subDistrictSubArea">ตำบล/แขวง</label>
                        <input type="text" name="subDistrictSubArea" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="district" class="district">อำเภอ/เขต</label>
                        <input type="text" name="district" class="form-control">
                    </div>
                    <div class="form-group col-3">
                        <label for="province" class="province">จังหวัด</label>
                        <input type="text" name="province" class="form-control">
                    </div>

                    <div class="form-group col-3">
                        <label for="postalCode" class="postalCode">รหัสไปรษณีย์</label>
                        <input type="text" name="postalCode" class="form-control" maxlength="5" oninput="restrictInput(event)">
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-4">
                        <label for="telHome" class="telHome">โทรศัพท์ (บ้าน)</label>
                        <input type="text" name="telHome" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                    <div class="form-group col-4">
                        <label for="telWorkplace" class="telWorkplace">โทรศัพท์ (ที่ทำงาน)</label>
                        <input type="text" name="telWorkplace" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                    <div class="form-group starlabel col-4">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ</label>
                        <input type="text" name="mobile" class="form-control" maxlength="10" oninput="restrictInput(event)" required>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="form-group col-4">
                        <label for="fax" class="fax">โทรสาร</label>
                        <input type="text" name="fax" class="form-control" maxlength="10">
                    </div>
                    <div class="form-group col-6">
                        <label for="email">E-mail</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="stdNotYet">สำหรับนักศึกษาที่ยังไม่สอบหัวข้อและเค้าโครงฯ (ถ้ามี)</h5>

                <div class="form-group mt-3">
                    <label for="" class="form-label thesisNameTh">ชื่อดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (ภาษาไทย) (ถ้ามี)</label>
                    <input type="text" name="thesisNameTh1" id="" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label thesisNameEn">ชื่อดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (ภาษาอังกฤษ) (ถ้ามี)</label>
                    <input type="text" name="thesisNameEn1" id="" class="form-control">
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="adGroupLabel" style="font-weight: bold;">อาจารย์ที่ปรึกษาประจำกลุ่ม</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixAdGroup1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixAdGroup1');">
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
                        <div class="form-group col-lg-6" id="otherPrefixAdGroup1" style="display:none;">
                            <label for="otherPrefixAdGroup1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixAdGroup1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameAdGroup1" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameAdGroup1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="mobileAdGroup1" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileAdGroup1" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-6">
                            <label for="emailAdGroup1">E-mail</label>
                            <input type="text" name="emailAdGroup1" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="adLabel1" style="font-weight: bold;">อาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระหลัก (ถ้ามี)</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixAd1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixAd1');">
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
                        <div class="form-group col-lg-6" id="otherPrefixAd1" style="display:none;">
                            <label for="otherPrefixAd1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixAd1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameAd1" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameAd1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="mobileAd1" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileAd1" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-6">
                            <label for="">E-mail</label>
                            <input type="text" name="emailAd1" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="coAdLabel" style="font-weight: bold;">อาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระร่วม (ถ้ามี)</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixCoAd1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixCoAd1');">
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
                        <div class="form-group col-lg-6" id="otherPrefixCoAd1" style="display:none;">
                            <label for="otherPrefixCoAd1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixCoAd1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameCoAd1" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameCoAd1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="mobileCoAd1" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileCoAd1" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-6">
                            <label for="">E-mail</label>
                            <input type="text" name="emailCoAd1" id="" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="stdPassed">สำหรับนักศึกษาที่สอบหัวข้อและเค้าโครงฯแล้ว</h5>

                <div class="form-group mt-3">
                    <label for="" class="form-label thesisNameTh">ชื่อดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (ภาษาไทย) (ถ้ามี)</label>
                    <input type="text" name="thesisNameTh2" id="" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="" class="form-label thesisNameEn">ชื่อดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ (ภาษาอังกฤษ) (ถ้ามี)</label>
                    <input type="text" name="thesisNameEn2" id="" class="form-control">
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="adGroupLabel" style="font-weight: bold;">อาจารย์ที่ปรึกษาประจำกลุ่ม</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixAdGroup2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixAdGroup2');">
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
                        <div class="form-group col-lg-6" id="otherPrefixAdGroup2" style="display:none;">
                            <label for="otherPrefixAdGroup" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixAdGroup2" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameAdGroup2" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameAdGroup2" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileAdGroup2" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-6">
                            <label for="">E-mail</label>
                            <input type="text" name="emailAdGroup2" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="adLabel1" style="font-weight: bold;">อาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระหลัก (ถ้ามี)</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixAd2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixAd2');">
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
                        <div class="form-group col-lg-6" id="otherPrefixAd2" style="display:none;">
                            <label for="otherPrefixAd2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixAd2" id="otherPrefixAd2" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameAd2" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameAd2" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-6">
                            <label for="mobileAd2" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileAd2" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-6">
                            <label for="">E-mail</label>
                            <input type="text" name="emailAd2" id="" class="form-control">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <div class="row">
                        <label class="coAdLabel" style="font-weight: bold;">อาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระร่วม (ถ้ามี)</label>
                        <div class="form-group col-lg-3">
                            <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="" name="prefixCoAd2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixCoAd2');">
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
                        <div class="form-group col-lg-6" id="otherPrefixCoAd2" style="display:none;">
                            <label for="otherPrefixCoAd2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixCoAd2" id="otherPrefixCoAd2" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameCoAd2" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameCoAd2" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label for="" class="mobile">โทรศัพท์</label>
                            <input type="text" name="mobileCoAd2" id="" class="form-control" maxlength="10">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="">E-mail</label>
                            <input type="text" name="emailCoAd2" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="mt-3">
                    <h6 style="font-weight: bold;" id="examInfoTitle">ข้อมูลการสอบหัวข้อ (Title Examination Information)</h6>

                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="" class="semesterExamLabel">ภาคการศึกษาที่สอบ (The Semester of Examination)</label>
                            <input type="text" name="semesterExam" id="" class="form-control">
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="" id="" class="dateExamLabel">วัน/เดือน/ปี ที่สอบ (Examination Date)</label>
                            <input type="date" class="form-control" id="" name="dateExam">
                        </div>
                    </div>
                </div>

                <div class="mt-3">
                    <h6 style="font-weight: bold;" class="examComTitle">คณะกรรมการสอบ (Examination Committee)</h6>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="no1">คนที่ 1</h6>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefixExamCom1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamCom1');">
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
                            <div class="form-group col-lg-6" id="otherPrefixExamCom1" style="display: none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamCom1" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamCom1" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamCom1" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="no2">คนที่ 2</h6>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefixExamCom2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamCom2');">
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
                            <div class="form-group col-lg-6" id="otherPrefixExamCom2" style="display: none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamCom2" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamCom2" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamCom2" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="no3">คนที่ 3</h6>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefixExamCom3" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamCom3');">
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
                            <div class="form-group col-lg-6" id="otherPrefixExamCom3" style="display: none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamCom3" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamCom3" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamCom3" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="no4">คนที่ 4</h6>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefixExamCom4" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamCom4');">
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
                            <div class="form-group col-lg-6" id="otherPrefixExamCom4" style="display: none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamCom4" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamCom4" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamCom4" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="mt-3">
                        <h6 style="font-weight: bold;" class="no5">คนที่ 5</h6>
                        <div class="row">
                            <div class="form-group col-lg-4">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefixExamCom5" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixExamCom5');">
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
                            <div class="form-group col-lg-6" id="otherPrefixExamCom5" style="display: none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefixExamCom5" id="" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fnameExamCom5" id="" class="form-control">
                            </div>
                            <div class="form-group mt-3 col-md-6">
                                <label for="" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lnameExamCom5" id="" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="listOfResearchTitle">ประวัติการนำเสนอ/ตีพิมพ์เผยแพร่ผลงาน</h5>
                <div class="mt-3">
                    <h6 style="font-weight:bold;" class="time1">ครั้งที่ 1</h6>
                    <div class="form-group">
                        <label for="" class="nameConference">ชื่องานประชุมหรือวารสาร</label>
                        <input type="text" name="nameConference1" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="titleConference">ชื่อเรื่องที่นำเสนอ</label>
                        <input type="text" name="titleConference1" id="" class="form-control">
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label class="dateConference">วัน/เดือน/ปี ที่นำเสนอ/ตีพิมพ์</label>
                            <input type="date" class="form-control" name="dateConference1">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="placeConference">สถานที่ (ประเทศ)</label>
                            <input type="text" name="placeConference1" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                        <div class="col-auto"><label class="numLabel">จำนวนสมาชิกเจ้าของผลงาน</label></div>
                        <div class="col-auto">
                            <select id="numTransfer" name="numTransfer1" class="form-select" onchange="CheckList(this.value)" required">
                                <option name="1" value="1" selected>1</option>
                                <option name="2" value="2">2</option>
                                <option name="3" value="3">3</option>
                                <option name="4" value="4">4</option>
                                <option name="5" value="5">5</option>
                                <option name="6" value="6">6</option>
                                <option name="7" value="7">7</option>
                                <option name="8" value="8">8</option>
                            </select>
                        </div>
                        <div class="col-auto persons">คน</div>
                    </div>

                    <div class="mt-3" id="publish_1">
                        <h6 style="font-weight: bold;" class="no1">คนที่ 1</h6>
                        <div class="row">
                            <div class="form-group col-lg-3 ">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix1');">
                                    <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                                    <option class="prefixOpMr" name='mr'>นาย (Mr.)</option>
                                    <option class="prefixOpMs" name='miss'>นางสาว (Ms.)</option>
                                    <option class="prefixOpMrs" name='ms'>นาง (Mrs.)</option>
                                    <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                                </select>
                            </div>

                            <div class="form-group col-lg-6" id="otherPrefix1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3 ">
                                <label for="fname1" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname1" id="fname1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3 ">
                                <label for="lname1" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname1" id="lname1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_2" hidden>
                        <h6 style="font-weight: bold;" class="no2">คนที่ 2</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix2');">
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

                            <div class="form-group col-lg-6" id="otherPrefix2" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix2" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname2" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname2" id="fname2" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname2" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname2" id="lname2" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_3" hidden>
                        <h6 style="font-weight: bold;" class="no3">คนที่ 3</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix3" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix3');">
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

                            <div class="form-group col-lg-6" id="otherPrefix3" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix3" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname3" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname3" id="fname3" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname3" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname3" id="lname3" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_4" hidden>
                        <h6 style="font-weight: bold;" class="no4">คนที่ 4</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix4" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix4');">
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

                            <div class="form-group col-lg-6" id="otherPrefix4" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix4" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname4" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname4" id="fname4" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname4" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname4" id="lname4" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_5" hidden>
                        <h6 style="font-weight: bold;" class="no5">คนที่ 5</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix5" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix5');">
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

                            <div class="form-group col-lg-6" id="otherPrefix5" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix5" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname5" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname5" id="fname5" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname5" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname5" id="lname5" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_6" hidden>
                        <h6 style="font-weight: bold;" class="no6">คนที่ 6</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix6" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix6');">
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

                            <div class="form-group col-lg-6" id="otherPrefix6" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix6" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname6" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname6" id="fname6" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname6" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname6" id="lname6" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_7" hidden>
                        <h6 style="font-weight: bold;" class="no7">คนที่ 7</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix7" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix7');">
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

                            <div class="form-group col-lg-6" id="otherPrefix7" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix7" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname7" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname7" id="fname7" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname7" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname7" id="lname7" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_8" hidden>
                        <h6 style="font-weight: bold;" class="no8">คนที่ 8</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix8" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix8');">
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

                            <div class="form-group col-lg-6" id="otherPrefix8" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix8" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname8" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname8" id="fname8" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname8" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname8" id="lname8" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-5">
                    <h6 style="font-weight:bold;" class="time2">ครั้งที่ 2</h6>
                    <div class="form-group">
                        <label for="" class="nameConference">ชื่องานประชุมหรือวารสาร</label>
                        <input type="text" name="nameConference2" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="titleConference">ชื่อเรื่องที่นำเสนอ</label>
                        <input type="text" name="titleConference2" id="" class="form-control">
                    </div>

                    <div class="row mt-3">
                        <div class="form-group col-lg-6">
                            <label class="dateConference">วัน/เดือน/ปี ที่นำเสนอ/ตีพิมพ์</label>
                            <input type="date" class="form-control" name="dateConference2">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="" class="placeConference">สถานที่ (ประเทศ)</label>
                            <input type="text" name="placeConference2" id="" class="form-control">
                        </div>
                    </div>

                    <div class="row mt-3 align-items-center">
                        <div class="col-auto"><label class="numLabel">จำนวนสมาชิกเจ้าของผลงาน</label></div>
                        <div class="col-auto">
                            <select id="numTransfer" name="numTransfer2" class="form-select" onchange="CheckList8_1(this.value)" required">
                                <option name="1" value="1" selected>1</option>
                                <option name="2" value="2">2</option>
                                <option name="3" value="3">3</option>
                                <option name="4" value="4">4</option>
                                <option name="5" value="5">5</option>
                                <option name="6" value="6">6</option>
                                <option name="7" value="7">7</option>
                                <option name="8" value="8">8</option>
                            </select>
                        </div>
                        <div class="col-auto persons">คน</div>
                    </div>

                    <div class="mt-3" id="publish_1_1">
                        <h6 style="font-weight: bold;" class="no1">คนที่ 1</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix1_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix1_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix1_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix1_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname1" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname1_1" id="fname1_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname1" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname1_1" id="lname1_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_2_1" hidden>
                        <h6 style="font-weight: bold;" class="no2">คนที่ 2</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix2_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix2_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix2_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix2_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname2" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname2_1" id="fname2_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname2" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname2_1" id="lname2_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_3_1" hidden>
                        <h6 style="font-weight: bold;" class="no3">คนที่ 3</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix3_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix3_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix3_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix3_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname3" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname3_1" id="fname3_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname3" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname3_1" id="lname3_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_4_1" hidden>
                        <h6 style="font-weight: bold;" class="no4">คนที่ 4</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix4_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix4_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix4_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix4_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname4" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname4_1" id="fname4_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname4" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname4_1" id="lname4_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_5_1" hidden>
                        <h6 style="font-weight: bold;" class="no5">คนที่ 5</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix5_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix5_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix5_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix5_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname5" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname5_1" id="fname5_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname5" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname5_1" id="lname5_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_6_1" hidden>
                        <h6 style="font-weight: bold;" class="no6">คนที่ 6</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix6_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix6_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix6_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix6_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname6" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname6_1" id="fname6_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname6" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname6_1" id="lname6_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_7_1" hidden>
                        <h6 style="font-weight: bold;" class="no7">คนที่ 7</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix7_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix7_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix7_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix7_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname7" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname7_1" id="fname7_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname7" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname7_1" id="lname7_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-3" id="publish_8_1" hidden>
                        <h6 style="font-weight: bold;" class="no8">คนที่ 8</h6>
                        <div class="row">
                            <div class="form-group col-lg-3">
                                <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                                <select id="" name="prefix8_1" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefix8_1');">
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

                            <div class="form-group col-lg-6" id="otherPrefix8_1" style="display:none;">
                                <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                                <input type="text" name="otherPrefix8_1" id="" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-lg-6 mt-3">
                                <label for="fname8" class="fname">ชื่อ (Name)</label>
                                <input type="text" name="fname8_1" id="fname8_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                            <div class="form-group col-lg-6 mt-3">
                                <label for="lname8" class="lname">นามสกุล (Surname)</label>
                                <input type="text" name="lname8_1" id="lname8_1" class="form-control">
                                <div class="invalid-feedback">
                                    กรุณากรอกข้อมูล
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary studyProgressReport">รายงานความก้าวหน้าดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h5>

                <div class="row mt-3 align-items-center g-2">
                    <div class="col-auto"><label id="numReportLabel">จำนวนครั้งที่รายงาน</label></div>
                    <div class="col-auto">
                        <select id="" name="numReport" class="form-select" onchange="CheckList15(this.value);" required">
                            <option name="1" value="1" selected>1</option>
                            <option name="2" value="2">2</option>
                            <option name="3" value="3">3</option>
                            <option name="4" value="4">4</option>
                            <option name="5" value="5">5</option>
                            <option name="6" value="6">6</option>
                            <option name="7" value="7">7</option>
                            <option name="8" value="8">8</option>
                            <option name="9" value="9">9</option>
                            <option name="10" value="10">10</option>
                            <option name="11" value="11">11</option>
                            <option name="12" value="12">12</option>
                            <option name="13" value="13">13</option>
                            <option name="14" value="14">14</option>
                            <option name="15" value="15">15</option>
                        </select>
                    </div>
                    <div class="col-auto numReports">ครั้ง</div>
                </div>

                <div class="mt-2" id="pub1">
                    <h6 style="font-weight: bold;" class="time1">ครั้งที่ 1</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี</label>
                        <input type="date" name="dateReport1" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport1" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub2" hidden>
                    <h6 style="font-weight: bold;" class="time2">ครั้งที่ 2</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport2" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport2" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub3" hidden>
                    <h6 style="font-weight: bold;" class="time3">ครั้งที่ 3</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport3" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport3" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub4" hidden>
                    <h6 style="font-weight: bold;" class="time4">ครั้งที่ 4</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport4" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport4" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub5" hidden>
                    <h6 style="font-weight: bold;" class="time5">ครั้งที่ 5</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport5" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport5" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub6" hidden>
                    <h6 style="font-weight: bold;" class="time6">ครั้งที่ 6</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport6" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport6" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub7" hidden>
                    <h6 style="font-weight: bold;" class="time7">ครั้งที่ 7</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport7" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport7" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub8" hidden>
                    <h6 style="font-weight: bold;" class="time8">ครั้งที่ 8</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport8" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport8" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub9" hidden>
                    <h6 style="font-weight: bold;" class="time9">ครั้งที่ 9</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport9" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport9" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub10" hidden>
                    <h6 style="font-weight: bold;" class="time10">ครั้งที่ 10</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport10" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport10" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub11" hidden>
                    <h6 style="font-weight: bold;" class="time11">ครั้งที่ 11</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport11" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport11" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub12" hidden>
                    <h6 style="font-weight: bold;" class="time12">ครั้งที่ 12</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport12" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport12" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub13" hidden>
                    <h6 style="font-weight: bold;" class="time13">ครั้งที่ 13</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport13" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport13" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub14" hidden>
                    <h6 style="font-weight: bold;" class="time14">ครั้งที่ 14</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport14" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport14" rows="2" maxlength="120"></textarea>
                    </div>
                </div>

                <div class="mt-2" id="pub15" hidden>
                    <h6 style="font-weight: bold;" class="time15">ครั้งที่ 15</h6>
                    <div class="form-group col-lg-4">
                        <label for="" class="dateLabel">วัน/เดือน/ปี </label>
                        <input type="date" name="dateReport15" id="" class="form-control">
                    </div>
                    <div class="form-group mt-3">
                        <label for="" class="form-label progressReport" id="">ความก้าวหน้าของงาน</label>
                        <textarea class="form-control" id="" name="progressReport15" rows="2" maxlength="120"></textarea>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end mt-5">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
            </div>
    </div>
    </div>
    </form>
    </div>
    <script src="js/script.js"></script>
    <script src="js/input-mask.js"></script>
    <script src="js/changeLeng.js"></script>
</body>

</html>