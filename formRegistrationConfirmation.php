<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="registrationConfirmationTitle"></title>
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <script src="js/script.js"></script>
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
            <h3 class="registrationConfirmationTitle">ใบรายงานตัวเพื่อขึ้นทะเบียนเป็นนักศึกษาระดับบัณฑิตศึกษา<br>(Registration Confirmation Form for Graduate Students)</h4>
        </div>
        <form action="pdfRegistrationConfirmation.php" method="post" class="needs-validation" target="_blank" novalidate>
            <div class="mt-5">
                <div class="row">
                    <div class="form-group col-lg-3 starlabel">
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

                    <div class="form-group col-lg-6" id="otherPrefix" style="display:none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefix" id="otherPrefix" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fnameTh">ชื่อภาษาไทย</label>
                        <input type="text" name="fnameTh" id="fname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lnameTh">นามสกุลภาษาไทย</label>
                        <input type="text" name="lnameTh" id="lname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="" class="fnameEnUpper">ชื่อภาษาอังกฤษตัวพิมพ์ใหญ่</label>
                        <input type="text" name="fnameEn" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="" class="lnameEnUpper">นามสกุลภาษาอังกฤษตัวพิมพ์ใหญ่</label>
                        <input type="text" name="lnameEn" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label for="" id="facultyLabel">คณะ</label>
                        <input type="text" name="faculty" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label for="" id="majorLabel">สาขาวิชา/วิชาเอก</label>
                        <input type="text" name="major" class="form-control" required>
                    </div>
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label for="" id="fieldLabel">แขนงวิชา</label>
                        <input type="text" name="field" class="form-control" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="" class="idNumLabel">เลขที่บัตรประจำตัวประชาชน(Identification No.)</label>
                        <input type="text" name="idNum" id="idNum" class="form-control" maxlength="13" oninput="restrictInput(event)" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label for="" class="birthDay">วันเกิด</label>
                        <input type="date" name="birthDay" class="form-control" required>
                    </div>
                    <div class="form-group col-lg-3 mt-3 starlabel">
                        <label for="" class="age">อายุ</label>
                        <input type="number" name="age" class="form-control" min="0" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-4 mt-3 starlabel">
                        <label for="" class="ethnicity">เชื้อชาติ</label>
                        <input type="text" name="ethnicity" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-4 mt-3 starlabel">
                        <label for="" class="nationality">สัญชาติ</label>
                        <input type="text" name="nationality" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label for="" class="religion">ศาสนา</label>
                        <input type="text" name="religion" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mt-3 col-lg-3 starlabel">
                        <label for="" class="bloodType">กลุ่มเลือด (Blood Type)</label>
                        <select name="bloodType" class="form-select" required>
                            <option value=''></option>
                            <option name='bloodGroupA' value="A">A</option>
                            <option name='bloodGroupB' value="B">B</option>
                            <option name='bloodGroupAB' value="AB">AB</option>
                            <option name='bloodGroupO' value="O">O</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-3 mt-3 starlabel">
                        <label for="" class="heightCm">ส่วนสูง (เซนติเมตร)</label>
                        <input type="number" name="heightCm" class="form-control" min="0" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-3 mt-3 starlabel">
                        <label for="" class="weightKg">น้ำหนัก (กิโลกรัม)</label>
                        <input type="number" name="weightKg" class="form-control" min="0" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3">
                    <label for="" class="disability">ความพิการ</label>
                    <input type="text" name="disability" class="form-control">
                </div>

                <div class="form-group mt-3">
                    <label for="" class="specialSkill">ความถนัด / ความสามารถพิเศษ</label>
                    <input type="text" name="specialSkill" class="form-control">
                </div>
            </div>

            <div class="">
                <div class="row">
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label class="degreeApplied">ระดับการศึกษาที่ใช้สมัคร</label>
                        <input type="text" name="degreeApplied" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label class="faculty">คณะ</label>
                        <input type="text" name="facultyApplied" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mt-3 col-lg-4 starlabel">
                        <label class="gpa">เกรดเฉลี่ย</label>
                        <input type="text" name="gpa" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="form-group mt-3 starlabel">
                    <label class="qualificationApplied">ชื่อคุณวุฒิที่ใช้สมัครเรียน (โปรดระบุชื่อภาษาไทยและภาษาอังกฤษ)</label>
                    <input type="text" name="qualificationApplied" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>

                <div class="form-group mt-3 starlabel">
                    <label class="majorThEn">สาขาวิชา/วิชาเอก (โปรดระบุชื่อภาษาไทยและภาษาอังกฤษ)</label>
                    <input type="text" name="majorApplied" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>

                <div class="form-group mt-3 starlabel">
                    <label class="university">สถานศึกษา</label>
                    <input type="text" name="university" class="form-control" required>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <div class="">
                <h6 class="mt-4 permanentAddress">ที่อยู่ตามทะเบียนบ้าน</h6>
                <div class="row">
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

                    <div class="row ">
                        <div class="form-group mt-3 col-lg-4">
                            <label for="telHome" class="telHome">โทรศัพท์ (บ้าน)</label>
                            <input type="text" name="telHome" class="form-control" maxlength="10" oninput="restrictInput(event)">
                        </div>
                        <div class="form-group mt-3 starlabel col-lg-4">
                            <label for="mobile" class="mobile">โทรศัพท์มือถือ</label>
                            <input type="text" name="mobile" class="form-control" maxlength="10" oninput="restrictInput(event)" required>
                            <div class="invalid-feedback">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group mt-3 col-lg-4">
                            <label for="" class="">E-mail</label>
                            <input type="text" name="email" class="form-control">
                        </div>
                    </div>
                </div>
            </div>

            <div class="form-group mt-4 starlabel">
                <label for="" class="form-labe4 currentAddress1">ที่อยู่ที่สามารถติดต่อได้</label>
                <textarea class="form-control" name="currentAddress" rows="3" maxlength="" required></textarea>
                <div class="invalid-feedback">
                    กรุณากรอกข้อมูล
                </div>
            </div>

            <div class="form-group mt-4">
                <label for="" class="form-labe4 workAddress">สถานที่ทำงาน/ที่อยู่</label>
                <textarea class="form-control" name="workAddress" rows="3" maxlength=""></textarea>
            </div>
            <div class="form-group mt-3">
                <label class="telWorkplace">โทรศัพท์ที่ทำงาน</label>
                <input type="text" name="telWorkplace" class="form-control" maxlength="10" oninput="restrictInput(event)">
            </div>

            <div class="mt-4">
                <h6 class="fatherInfoTitle">ข้อมูลของบิดา</h6>
                <div class="row">
                    <div class="form-group col-lg-3 starlabel">
                        <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select name="prefixFather" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixFather');">
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

                    <div class="form-group col-lg-6" id="otherPrefixFather" style="display:none;">
                        <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixFather" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fname">ชื่อ</label>
                        <input type="text" name="fnameFather" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lname">นามสกุล</label>
                        <input type="text" name="lnameFather" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="occupation">อาชีพ</label>
                        <input type="text" name="occupationFather" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="mobile">โทรศัพท์</label>
                        <input type="text" name="mobileFather" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                </div>

                <h6 class="mt-3 motherInfoTitle">ข้อมูลของมารดา</h6>
                <div class="row">
                    <div class="form-group col-lg-3 starlabel">
                        <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select name="prefixMother" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixMother');">
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

                    <div class="form-group col-lg-6" id="otherPrefixMother" style="display:none;">
                        <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixMother" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fname">ชื่อ</label>
                        <input type="text" name="fnameMother" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lname">นามสกุล</label>
                        <input type="text" name="lnameMother" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="occupationMother">อาชีพ</label>
                        <input type="text" name="occupationMother" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="mobileMother">โทรศัพท์</label>
                        <input type="text" name="mobileMother" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                </div>
            </div>

            <div>
                <h6 class="mt-3 parentStatusTitle">สถานภาพบิดา-มารดา</h6>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parentStatus" value="married" required>
                    <label class="form-check-label married" for="">
                        อยู่ด้วยกัน
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parentStatus" value="separated">
                    <label class="form-check-label separated" for="">
                        แยกกันอยู่
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parentStatus" value="divorced">
                    <label class="form-check-label divorced" for="">
                        หย่าร้าง
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="parentStatus" value="other">
                    <label class="form-check-label prefixOpOther" for="">
                        อื่น ๆ 
                    </label>
                </div>

                <div class="row">
                    <div class="form-group col-lg-4 mt-3">
                        <label for="" class="fatherIncome">รายได้บิดาต่อปี</label>
                        <input type="number" name="fatherIncome" class="form-control" min="0">
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label for="" class="motherIncome">รายได้มารดาต่อปี</label>
                        <input type="number" name="motherIncome" class="form-control" min="0">
                    </div>
                    <div class="form-group col-lg-4 mt-3">
                        <label for="" class="guardianIncome">รายได้ผู้ปกครองต่อปี</label>
                        <input type="number" name="guardianIncome" class="form-control" min="0">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="numberOfBroSis">จำนวนพี่น้องทั้งหมด</label>
                        <input type="number" name="numberOfBroSis" class="form-control" min="0">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="numberOfBroSisSchool">จำนวนพี่น้องที่กำลังศึกษา</label>
                        <input type="number" name="numberOfBroSisSchool" class="form-control" min="0">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="numberOfBroSisWork">จำนวนพี่น้องที่ทำงานแล้ว</label>
                        <input type="number" name="numberOfBroSisWork" class="form-control" min="0">
                    </div>
                </div>

                <h6 class="mt-3 spouseTitle">ภรรยา/สามี (ถ้ามี)</h6>
                <div class="row">
                    <div class="form-group col-lg-3 starlabel">
                        <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select name="prefixSpouse" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixSpouse');">
                            <option class="prefixOp" value="">เลือกคำนำหน้าชื่อ</option>
                            <option class="prefixOpMr" name='mr'>นาย (Mr.)</option>
                            <option class="prefixOpMs" name='miss'>นางสาว (Ms.)</option>
                            <option class="prefixOpMrs" name='ms'>นาง (Mrs.)</option>
                            <option class="prefixOpOther" name='other' value="other">อื่น ๆ (Other)</option>
                        </select>
                    </div>

                    <div class="form-group col-lg-6" id="otherPrefixSpouse" style="display:none;">
                        <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixSpouse" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fname">ชื่อ</label>
                        <input type="text" name="fnameSpouse" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lname">นามสกุล</label>
                        <input type="text" name="lnameSpouse" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="occupation">อาชีพ</label>
                        <input type="text" name="occupationSpouse" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="mobile">โทรศัพท์</label>
                        <input type="text" name="mobileSpouse" class="form-control" maxlength="10" oninput="restrictInput(event)">
                    </div>
                </div>

                <h6 class="mt-3 personEmergency">ผู้ที่สามารถติดต่อได้ในกรณีฉุกเฉิน</h6>
                <div class="row">
                    <div class="form-group col-lg-3 starlabel">
                        <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select name="prefixPersonEmergency" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixPersonEmergency');">
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

                    <div class="form-group col-lg-6" id="otherPrefixPersonEmergency" style="display:none;">
                        <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixPersonEmergency" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="fname" class="fname">ชื่อ</label>
                        <input type="text" name="fnamePersonEmergency" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mt-3 starlabel">
                        <label for="lname" class="lname">นามสกุล</label>
                        <input type="text" name="lnamePersonEmergency" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mt-3">
                        <label for="" class="relationship">ความสัมพันธ์</label>
                        <input type="text" name="relationshipPersonEmergency" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="form-group mt-4">
                    <label for="" class="form-labe4 addressLabel">ที่อยู่</label>
                    <textarea class="form-control" name="addressPersonEmergency" rows="3" maxlength="" required></textarea>
                    <div class="invalid-feedback">
                        กรุณากรอกข้อมูล
                    </div>
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