<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบคำร้องขอเปลี่ยนแปลงอาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</title>
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
            <h4 id="titleChangeAd">แบบคำร้องขอเปลี่ยนแปลงอาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h4>
        </div>
        <form action="pdf7.php" method="post" class="needs-validation" target="_blank" novalidate>
            <div>
                <h5 class="text-primary mt-5" id="titleInfo">ข้อมูลส่วนตัว (Personal information)</h5>
                <div class="row">
                    <div class="form-group mb-3  starlabel">
                        <label for="studentid" class="studentid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                        <input type="text" name="studentid" id="studentid" class="form-control masked" placeholder="xxxxxxxxxxxx x" data-pattern="************-*" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
                    <div class="form-group col-lg-6  mb-3 starlabel">
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
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fname" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fname" id="fname" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
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
                        <input type="text" name="telephone" id="telephone" class="form-control" oninput="restrictInput(event)">
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="mobile" class="mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                        <input type="text" name="mobile" id="mobile" class="form-control" oninput="restrictInput(event)" required>
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

                    <div class="form-group col-lg-4 mb-3 starlabel">
                        <label for="inputState" id="programTypeLabel">ภาค (Program type)</label>
                        <select name="inputState" class="form-select">
                            <option value='normal' id="programTypeOpRegular">ปกติ (Regular)</option>
                            <option value="special" id="programTypeOpSpecial">พิเศษ (Weekend)</option>
                        </select>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row starlabel">
                    <div class="form-group mb-3">
                        <label for="faculty" id="facultyLabel">คณะ (Faculty)</label>
                        <input type="text" name="faculty" id="faculty" class="form-control" required>
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
                    <div class="form-group mb-3 starlabel">
                        <label for="field" id="fieldLabel">แขนงวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class=" text-primary" id="titleCurAd">รายชื่ออาจารย์ที่ปรึกษาเดิม (Current Advisor Name)</h5>
                <div class="row ">
                    <label class="labelAd1" style="font-weight: bold;">คนที่ 1</label>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="prefixInputCurAd1" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInputCurAd1" name="prefixInputCurAd1" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixCurAd1');">
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
                    <div class="form-group mb-3 col-lg-6" id="otherPrefixCurAd1" style="display:none;">
                        <label for="otherPrefixCurAd1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixCurAd1" id="otherPrefixCurAd1" class="form-control">

                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fnameCurAd1" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fnameCurAd1" id="fnameCurAd1" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lnameCurAd1" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lnameCurAd1" id="lnameCurAd1" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="degree">คุณวุฒิ</label>
                        <input type="text" name="curAd1Degree" id="curAd1Degree" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="program">สาขาวิชา</label>
                        <input type="text" name="curAd1Program" id="curAd1Program" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group  mb-3 col-lg-6 starlabel">
                        <label class="faculty">คณะ</label>
                        <input type="text" name="curAd1Faculty" id="curAd1Faculty" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="department">หน่วยงาน</label>
                        <input type="text" name="curAd1Department" id="curAd1Department" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row ">
                    <label class="labelAd2" style="font-weight: bold;">คนที่ 2</label>
                    <div class="form-group mb-3 col-lg-6">
                        <label for="prefixInputCurAd2" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInputCurAd2" name="prefixInputCurAd2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixCurAd2');">
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
                    <div class="form-group mb-3 col-lg-6" id="otherPrefixCurAd2" style="display:none;">
                        <label for="otherPrefixCurAd2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixCurAd2" id="otherPrefixCurAd2" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="fnameCurAd2" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fnameCurAd2" id="fnameCurAd2" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <label for="lnameCurAd2" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lnameCurAd2" id="lnameCurAd2" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label class="degree">คุณวุฒิ</label>
                        <input type="text" name="curAd2Degree" id="curAd2Degree" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <label class="program">สาขาวิชา</label>
                        <input type="text" name="curAd2Program" id="curAd2Program" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <label class="faculty">คณะ</label>
                        <input type="text" name="curAd2Faculty" id="curAd2Faculty" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <label class="department">หน่วยงาน</label>
                        <input type="text" name="curAd2Department" id="curAd2Department" class="form-control">
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <h5 class=" text-primary" id="titleNewAd">รายชื่ออาจารย์ที่ปรึกษาใหม่ (New Advisor Name)</h5>
                <div class="row">
                    <label class="labelAd1" style="font-weight: bold;">คนที่ 1</label>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="prefixInputNewAd1" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInputNewAd1" name="prefixInputNewAd1" class="form-select" required onchange="CheckPrefix_C(this.value,'otherPrefixNewAd1');">
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
                    <div class="form-group mb-3 col-lg-6" id="otherPrefixNewAd1" style="display:none;">
                        <label for="otherPrefixNewAd1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixNewAd1" id="otherPrefixNewAd1" class="form-control">
                    </div>
                </div>

                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="fnameNewAd1" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fnameNewAd1" id="fnameNewAd1" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label for="lnameNewAd1" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lnameNewAd1" id="lnameNewAd1" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="degree">คุณวุฒิ</label>
                        <input type="text" name="newAd1Degree" id="newAd1Degree" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="program">สาขาวิชา</label>
                        <input type="text" name="newAd1Program" id="newAd1Program" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="faculty">คณะ</label>
                        <input type="text" name="newAd1Faculty" id="newAd1Faculty" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6 starlabel">
                        <label class="department">หน่วยงาน</label>
                        <input type="text" name="newAd1Department" id="newAd1Department" class="form-control" required>
                        <div class="invalid-feedback">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>

                <div class="row">
                    <label class="labelAd2" style="font-weight: bold;">คนที่ 2</label>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="prefixInputNewAd2" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select id="prefixInputNewAd2" name="prefixInputNewAd2" class="form-select" onchange="CheckPrefix_C(this.value,'otherPrefixNewAd2');">
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
                    <div class="form-group mb-3 col-lg-6" id="otherPrefixNewAd2" style="display:none;">
                        <label for="otherPrefixNewAd2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixNewAd2" id="otherPrefixNewAd2" class="form-control">
                    </div>
                </div>

                <div class="row ">
                    <div class="form-group mb-3 col-lg-6">
                        <label for="fnameNewAd2" class="fname">ชื่อ (Name)</label>
                        <input type="text" name="fnameNewAd2" id="fnameNewAd2" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <label for="lnameNewAd2" class="lname">นามสกุล (Surname)</label>
                        <input type="text" name="lnameNewAd2" id="lnameNewAd2" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label class="degree">คุณวุฒิ</label>
                        <input type="text" name="newAd2Degree" id="newAd2Degree" class="form-control">
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label class="program">สาขาวิชา</label>
                        <input type="text" name="newAd2Program" id="newAd2Program" class="form-control">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3">
                        <label class="faculty">คณะ</label>
                        <input type="text" name="newAd2Faculty" id="newAd2Faculty" class="form-control">
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <label class="department">หน่วยงาน</label>
                        <input type="text" name="newAd2Department" id="newAd2Department" class="form-control">
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="listInvolved">รายชื่อผู้ที่เกี่ยวข้อง (List of people involved)</h5>

                <div class="mt-3">
                    <h6 style="font-weight: bold;" class="listCur">ประธานกรรมการบริหารหลักสูตร (Curriculum Executive Committee Chairman)</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
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
                        <div class="form-group mb-3 col-lg-6" id="otherPrefixCurriculum" style="display: none;">
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

                <div class="mt-3">
                    <h6 style="font-weight: bold;" class="listGraduate">ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ</h6>
                    <div class="row">
                        <div class="form-group mb-3 col-lg-6">
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
                            <label for="lnameGraduate" class="lname">>นามสกุล (Surname)</label>
                            <input type="text" name="lnameGraduate" id="lnameGraduate" class="form-control">
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