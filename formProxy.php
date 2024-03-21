<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="titleProxy">Form</title>
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
            <h4 class="titleProxy">ใบมอบฉันทะ (Proxy Form)</h4>
        </div>
        <form action="pdfProxy.php" method="post" class="needs-validation" target="_blank" novalidate>

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

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="telephone" class="telephone">โทรศัพท์บ้าน (ธelephone)</label>
                        <input type="text" name="telephone" id="telephone" class="form-control" oninput="restrictInput(event)">
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" oninput="restrictInput(event)" required>
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

                <div class="row">
                    <div class="form-group mt-3 col-lg-6 starlabel">
                        <label class="idNumLabel">เลขบัตรประจำตัวประชาชน (Identification Number)</label>
                        <input type="text" name="idenNumber" class="form-control" maxlength="13" oninput="restrictInput(event)" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mt-3 col-lg-6 starlabel">
                        <label class="issuedByLabel">ออกบัตรโดย (Issued by)</label>
                        <input type="text" name="issuedBy" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-3 col-lg-6 starlabel">
                        <label class="dateIssueLabel">วันที่ออกบัตร (Date of Issue)</label>
                        <input type="date" class="form-control" name="dateIssue" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mt-3 col-lg-6 starlabel">
                        <label class="dateExpriryLabel">วันหมดอายุ (Date of Expiry)</label>
                        <input type="date" class="form-control" name="dateExpriry" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary mb-3" id="titleEduInfo">ข้อมูลการศึกษา (Education information)</h5>


                <div class="form-group mb-3 col-lg-8">
                    <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                    <input type="text" name="faculty" id="faculty" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-8 mb-3 starlabel">
                    <label for="major" id="majorLabel">วิชาเอก (Major)</label>
                    <input type="text" name="major" id="major" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-8 mb-3 starlabel">
                    <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                    <input type="text" name="field" id="field" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class="text-primary" id="titleProxyDetail">รายละเอียดการมอบฉันทะ (Proxy Detail)</h5>
                <div>
                    <h6 class="mt-3" style="font-weight: 600;" id="herebyAppoint">ขอมอบฉันทะให้</h6>
                    <div class="row">
                        <div class="form-group col-lg-3 starlabel">
                            <label for="prefixInputProxy" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                            <select id="prefixInputProxy" name="prefixInputProxy" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixProxy');">
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

                        <div class="form-group col-lg-6" id="otherPrefixProxy" style="display:none;">
                            <label for="otherPrefixProxy" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixProxy" id="otherPrefixProxy" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 mt-3 starlabel">
                            <label for="fnameProxy" class="fname">ชื่อ (Name)</label>
                            <input type="text" name="fnameProxy" id="fnameProxy" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mt-3 starlabel">
                            <label for="lnameProxy" class="lname">นามสกุล (Surname)</label>
                            <input type="text" name="lnameProxy" id="lnameProxy" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mt-2 col-lg-6 starlabel">
                            <label class="idNumLabel">บัตรประจำตัวประชาชน (Identification Number)</label>
                            <input type="text" name="idenNumberProxy" class="form-control" maxlength="13" oninput="restrictInput(event)" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mt-2 col-lg-6 starlabel">
                            <label class="issuedByLabel">ออกบัตรโดย (Issued by)</label>
                            <input type="text" name="issuedByProxy" class="form-control" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group mt-3 col-lg-6 starlabel">
                            <label class="dateIssueLabel">วันที่ออกบัตร (Date of Issue)</label>
                            <input type="date" class="form-control" name="dateIssueProxy" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mt-3 col-lg-6 starlabel">
                            <label class="dateExpriryLabel">วันหมดอายุ (Date of Expiry)</label>
                            <input type="date" class="form-control" name="dateExpriryProxy" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                </div>
                <h6 class="mt-3" style="font-weight: 600;" id="recipient">เป็นผู้รับเอกสารสำคัญทางการศึกษา ได้แก่</h6>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="docStuCert" value="checked">
                    <label class="form-check-label" for="docStuCert" id="docStuCertLabel"></label>
                        หนังสือรับรองการเป็นนักศึกษา
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="docDegree" value="checked">
                    <label class="form-check-label" for="docDegree" id="docDegreeLabel">
                        ใบปริญญาบัตรหรือใบประกาศนียบัตร
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="docTranscript" value="checked">
                    <label class="form-check-label" for="docTranscript" id="docTranscriptLabel">
                        ใบแสดงผลการศึกษา
                    </label>
                </div>
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" name="docGraduation" value="checked">
                    <label class="form-check-label" for="docGraduation" id="docGraduationLabel">
                        เอกสารสำเร็จการศึกษา
                    </label>
                </div>

                <div class="row g-2 align-items-center">
                    <div class="col-auto">
                        <input type="checkbox" class="form-check-input" name="docOther" id="checkBoxPhoxyOther" value="checked" onchange="CheckBoxHideOther()">
                    </div>
                    <div class="col-auto">
                        <label class="form-check-label prefixOpOther" for="docOther">
                            อื่น ๆ
                        </label>
                    </div>
                    <div class="col-auto w-50">
                        <input type="text" name="docOtherInput" class="form-control" id="inputTextPhoxyOther" disabled required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="form-group starlabel mt-3">
                    <label for="reasons" class="form-label reasonsLabel">เนื่องจาก (by the following reasons)</label>
                    <textarea class="form-control" id="textarea1" name="reasons" rows="3" maxlength="274" required></textarea>
                    <div id="the-count1">
                        <span id="current1">0</span>
                        <span id="maximum1">/ 274</span> 
                    </div>
                </div>  

                <div class="d-flex justify-content-end mt-5">
                    <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
                </div>
        </form>
    </div>
    <script src="js/script.js"></script>
    <script src="js/input-mask.js"></script>
    <script src="js/changeLeng.js"></script>
</body>

</html>