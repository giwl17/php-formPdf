<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบเสนอหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="css/form3.css">
    <!-- <script src="https://kit.fontawesome.com/yourcode.js" crossorigin="anonymous"></script> -->
    <script src="js/thesis.js"></script>
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
                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" id="">Language
                    <span class="caret"></span></button>
                <ul class="dropdown-menu">
                    <li onclick="toggleLanguage('en')"> <a href="#" class="dropdown-item">English</a></li>
                    <li onclick="toggleLanguage('th')"> <a href="#" class="dropdown-item">Thai</a></li>
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
        <div class="h"><br>
            <!-- <h4 class="text-center">แบบขอสอบดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h4> -->
            <h4 class="topic">test</h4>
            <!-- <label id="how">Request Form for Dissertation/Thesis/Independent Study Title and Proposal Approval</label> -->
        </div>
        <form action="tranfer.php" method="post" id="myform1" class="needs-validation row g-3" target="_blank" novalidate>
            <h5 class="text-primary " id="personal">ข้อมูลส่วนตัว (Personal information)</h5>

            <div class="row">
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixInput" class="form-select" id="prefix" onchange="CheckPrefix(this.value,'otherPrefix');" required>
                        <option value="" class="prefix"></option>
                        <option class='prefix_1' id='prefix_mr' name='mr'>นาย (Mr.)</option>
                        <option name='miss' id="prefix_ms">นางสาว (Ms.)</option>
                        <option name='ms' id="prefix_mrs">นาง (Mrs.)</option>
                        <option name='other' class="other" value="other">อื่น ๆ (Other)</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 starlabel" id="otherPrefix" style="display: none;">
                    <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefix" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="fname" class="name">ชื่อ (Name)</label>
                    <input type="text" name="fname" id="fname" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="lname" class="surname">นามสกุล (Surname)</label>
                    <input type="text" name="lname" id="lname" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 starlabel">
                    <label for="studentid" id="sid">รหัสประจำตัวนักศึกษา (Student ID)</label>
                    <input class="form-control masked prefixed" type="text" data-pattern="************-*" name="studentid" placeholder="xxxxxxxxxxxx x" required />

                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <!-- <div class="form-group col-lg-6 ">
                         <label for="" class="">สัญชาติ (Region)</label>
                         <div class="row">
                     <div class="form-group col-lg-10 ">
                         <input type="radio" name="region" id="thai" value="th" class="form-check-input">
                         <label for="">Thai</label>
                     </div>
                     <div class="form-group col-lg-10 ">
                         <input type="radio" name="region" id="english" value="eng" class="form-check-input">
                         <label for="">English</label>
                     </div>
                 </div>
                     </div> -->
            </div>
            <h5 class="text-primary " id="education">ข้อมูลการศึกษา (Education information)</h5>
            <div class="row">
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="LevelsInput" id="level">ระดับการศึกษา (Level of education)</label>
                    <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                        <option value="master" class="radio_l2">ปริญญาโท (Master's degree)</option>
                        <option value="doctor" class="radio_l3">ปริญญาเอก (Doctoral Degree)</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="plan" id="type">แผน (Plan) / แบบ (Type)</label>
                    <select name="plan" id="plan" class="form-select">
                        <option value="" id="choose">เลือกแผน (Plan) / แบบ (Type)</option>
                        <optgroup id="optionMaster" label="ป.โท" style="display: block;">
                            <option class="a1">ก1</option>
                            <option class="a2">ก2</option>
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
            <div class="row starlabel">
                <div class="form-group mb-3 col-lg-6">
                    <label for="inputState" id="program">ภาค (Program type)</label>
                    <select name="inputState" class="form-select" required>
                        <option value='normal' id="regular">ปกติ (Regular)</option>
                        <option value="special" id="weekend">พิเศษ (Weekend)</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="faculty" id="faculty">คณะ (Faculty)</label>
                    <input type="text" name="faculty" class="form-control" required>
                    <!-- <select name="faculty" class="form-select" required>
                        <option value="วิศวกรรมศาสตร์" id="engineer" autofocus>วิศวกรรมศาสตร์ (Engineering)</option>
                    </select> -->
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="major" id="major">วิชาเอก (Major)</label>
                    <input type="text" name="major" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="field" id="subject">แขนงวิชา (Field of Study)</label>
                    <input type="text" name="field" id="field" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <h5 class="text-primary " id="cont">ข้อมูลติดต่อ (Contact information)</h5>
            <div class="row ">
                <div class="form-group mb-3 starlabel">
                    <div class="starlabel ">
                        <label id="addr">ที่อยู่ปัจจุบัน (Current Address)</label>
                    </div>
                    <!-- <textarea name="address" id="address" cols="50%" rows="5%"></textarea> -->
                    <textarea class="form-control" name="address" id="textarea_address" rows="4" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="telephone" id="phone">โทรศัพท์บ้าน (Telephone)</label>
                    <input type="text" name="telephone" id="telephone" class="form-control" oninput="restrictInput(event)">
                </div>
                <div class="form-group mb-3 col-lg-6 starlabel">
                    <label for="mobile" id="phone_mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                    <input type="text" name="mobile" id="mobile" class="form-control" oninput="restrictInput(event)" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <h5 class="text-primary" id="detail">รายละเอียดการขอสอบเค้าโครงฯ</h5>
            <div class=" row starlabel">
                <h6 style="font-weight: bold;" id="advisor_s">อาจารย์ที่ปรึกษาหลัก (Advisor)</h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixAdvisor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixAdvisor" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixAdvisor');" required>
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
                        <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                        <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                        <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                        <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                        <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                        <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                        <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                        <option name='other' value="other" class="other">อื่นๆ</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 " id="otherPrefixAdvisor" style="display: none;">
                    <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixAdvisor" id="otherPrefixAdvisorsor" class="form-control">
                </div>
            </div>
            <div class=" row starlabel">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fnameAdvisor" class="name">ชื่อ</label>
                    <input type="text" name="fnameAdvisor" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lnameAdvisor" class="surname">นามสกุล</label>
                    <input type="text" name="lnameAdvisor" id="" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class=" row ">
                <h6 style="font-weight: bold;" id="Co_advisor">อาจารย์ที่ปรึกษาร่วม (ถ้ามี) Co-Advisor (If any) </h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixCoAdvisor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixCoAdvisor" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixCoAdvisor');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6 ">
                    <div id="otherPrefixCoAdvisor" style="display: none;">
                        <label for="" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefixCoAdvisor" id="otherPrefixCoAdvisor" class="form-control">
                    </div>
                </div>
            </div>
            <div class=" row ">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fnameCoAdvisor" class="name">ชื่อ</label>
                    <input type="text" name="fnameCoAdvisor" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lnameCoAdvisor" class="surname">นามสกุล</label>
                    <input type="text" name="lnameCoAdvisor" id="" class="form-control">
                </div>
            </div>
            <div class=" row ">
                <h6 style="font-weight: bold;" id="Curriculum">ประธานกรรมการบริหารหลักสูตร (Curriculum Executive Committee Chairman)</h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixCurriculum" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixCurriculum" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixCurriculum');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
                        <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                        <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                        <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                        <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                        <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                        <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                        <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                        <option name='other' value="other" class="other">อื่นๆ</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 " id="otherPrefixCurriculum" style="display: none;">
                    <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixCurriculum" class="form-control">
                </div>
            </div>
            <div class=" row ">
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="name">ชื่อ</label>
                    <input type="text" name="fnameCurriculum" class="form-control">
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="surname">นามสกุล</label>
                    <input type="text" name="lnameCurriculum" class="form-control">
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class=" row ">
                <h6 style="font-weight: bold;" id="chairman_fac">ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ (Graduate Studies Executive Committee Chairman of the Faculty)</h6>
                <div class="form-group  mb-3 col-lg-6 ">
                    <label for="" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="chairman_fac" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixchairman_fac');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
                        <option class="prefixOpDr" name='dr'>ดร. (Dr.) </option>
                        <option class="prefixOpProf" name='prof'>ศ. (Prof.) </option>
                        <option class="prefixOpProfDr" name='profDr'>ศ.ดร. (Prof.Dr.) </option>
                        <option class="prefixOpAssocProf" name='assocProf'>รศ. (Assoc. Prof.) </option>
                        <option class="prefixOpAssocProfDr" name='assocProfDr'>รศ.ดร. (Assoc.Prof.Dr.) </option>
                        <option class="prefixOpAsstProf" name='asstProf'>ผศ. (Asst.Prof.)</option>
                        <option class="prefixOpAsstProfDr" name='asstProfDr'>ผศ.ดร. (Asst.Prof.Dr.)</option>
                        <option name='other' value="other" class="other">อื่นๆ</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 " id="otherPrefixchairman_fac" style="display: none;">
                    <label for="otherPrefixchairman_fac" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixchairman_fac" id="otherPrefixchairman_fac" class="form-control">
                </div>
            </div>
            <div class=" row ">
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="name">ชื่อ</label>
                    <input type="text" name="fnamechairman_fac" class="form-control">
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="surname">นามสกุล</label>
                    <input type="text" name="lnamechairman_fac" class="form-control">
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class=" row ">
                <div class="form-group mb-3 starlabel">
                    <label for="titleTH" class="" id="titleTH">ชื่อเรื่องภาษาไทย (Title in Thai)</label>
                    <!-- <input type="text" name="titleTH" class="form-control"> -->
                    <textarea class="form-control" name="titleTH" id="textarea_address" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 starlabel">
                    <label for="titleEN" class="" id="titleENG">ชื่อเรื่องภาษาอังกฤษ (Title in English)</label>
                    <!-- <input type="text" name="titleEN" class="form-control"> -->
                    <textarea class="form-control" name="titleEN" id="textarea_address" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group starlabel">
                    <label id="proposal">ประเภทเค้าโครงฯ</label>
                </div>
                <div class="row">
                    <div class="form-group mb-3 col-lg-6">
                        <select name="chooseThesis" class="form-select" required>
                            <option name='dissertation' id="dissertation" value="dissertation">ดุษฎีนิพนธ์ (Dissertation)</option>
                            <option name='thesis' id="thesis" value="thesis">วิทยานิพนธ์ (Thesis)</option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group mb-3 col-lg-6">
                        <!-- <table>
                            <tr>
                                <td><label for="copy" id="quantity">จำนวน</label></td>
                                <td><input type="number" name="copy" min="0" class="form-control" style="text-align: end;" required></td>
                                <td><label for="copy" id="copy">ฉบับ</label></td>
                            </tr>
                        </table> -->
                        <!-- </div> -->
                        <div class="row g-1">
                            <div class="col-auto">
                                <label class="quantity">จำนวน</label>
                            </div>
                            <div class="col-auto">
                                <input type="number" name="copy" class="form-control" style="text-align: center;">
                            </div>
                            <div class="col-auto">
                                <label class="copy">ฉบับ</label>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <div class="row">
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="" id="Date">ขอสอบในวันที่ (Date of request for examination)</label>
                            <input type="date" class="form-control" id="datepicker" name="datepicker" data-date-format="DD MMMM YYYY" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3 starlabel ">
                            <label for="" id="Time">เวลา (Time)</label>
                            <input type="time" name="time" class="form-control" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                    </div>
                    <div class="form-group  mb-3 starlabel">
                        <label for="" id="Room">สถานที่ (Place)/ ห้อง (Room) </label>
                        <input type="text" name="room" id="" class="form-control" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group  mb-3 starlabel">
                        <label for="" id="Building">อาคาร (Building) </label>
                        <input type="text" name="building" id="" class="form-control" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group  mb-3 starlabel">
                        <label for="" id="Faculty_Place">คณะ (Faculty) </label>
                        <input type="text" name="kana" id="" class="form-control" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>

            <!-- <div class="">
                    <h5 class="text-primary">รายละเอียดการขอสอบ</h5>
                    <h6>เอกสารที่ส่งประกรอบพิจารณา</h6>
                    <div class="form-check">
                        <table>
                            <tr>
                                <td> <input class="form-check-input" type="checkbox" value="1" name="check1"></td>
                                <td>สำเนาบทคัดย่อ Copy of abstract จำนวน</td>
                                <td><input type="text" name="copyAbstarct" id="copyAbstarct" class="form-control" style="width: 100px;"></td>
                                <td>ชุด</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-check">
                        <table>
                            <tr>
                                <td> <input class="form-check-input" type="checkbox" value="2" name="check2"></td>
                                <td>ดุษฎีนิพนธ์/วิทยานิพนธ์ Hard Copy of Dissertation/Thesis จำนวน</td>
                                <td><input type="text" name="hardCopy" id="hardCopy" class="form-control" style="width: 100px;"></td>
                                <td>ชุด</td>
                            </tr>
                        </table>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="3" name="check3">
                        <label class="form-check-label" for="flexCheckChecked">
                            ใบแสดงผลการศึกษาฉบับปัจจุบัน Current Transcript
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="4" name="check4">
                        <label class="form-check-label" for="flexCheckChecked">
                            ใบเสร็จรับเงินค่าลงทะเบียนดุษฎีนิพนธ์/วิทยานิพนธ์ หรือค่ารักษาสภาพการเป็นนักศึกษา <br>
                            Receipt of the Dissertation/Thesis or student status maintenance fee
                        </label>
                    </div>

                    <div class="form-group ">
                        <h5>วันที่ขอสอบ</h5>
                        <input type="datetime-local" class="form-control" id="dateBook" name="dateBook">
                    </div>
                    <h5 class="">สถานที่ขอสอบ</h5>
                    <div class="row">
                        <div class="form-group col-lg-8 starlabel">
                            <label for="place">สถานที่ (Place)/ห้อง (Room)</label>
                            <input type="text" name="place" id="place" class="form-control">
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-6 starlabel">
                            <label for="building">อาคาร (Building)</label>
                            <input type="text" name="building" id="building" class="form-control">
                        </div>

                        <div class="form-group col-lg-6 starlabel">
                            <label for="facultyPlace">คณะ</label>
                            <input type="text" name="facultyPlace" id="facultyPlace" class="form-control">
                        </div>
                    </div>
                </div> -->
            <div class="">
                <h5 class="text-primary" id="committee_examination">เสนอรายชื่อคณะกรรมการสอบ</h5>
            </div>
            <div class=" row">
                <div class="mb-1">
                    <h6 class="d-inline" style="font-weight: bold;">1.</h6>
                    <h6 style="font-weight: bold;" id="committee_chairman" class="d-inline">ประธานกรรมการสอบ Examination Committee Chairman</h6>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixcommittee_chairman" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC0" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC0');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC0" style="display: none;">
                    <label for="otherPrefixcommittee_chairman" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC0" id="otherPrefix" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="name">ชื่อ</label>
                    <input type="text" name="fname0" id="fname0" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="" class="surname">นามสกุล</label>
                    <input type="text" name="lname0" id="lname0" class="form-control">
                </div>
            </div>

            <div class=" row">
                <div class="mb-1">
                    <h6 class="d-inline" style="font-weight: bold;">2.</h6>
                    <h6 style="font-weight: bold;" class="Committee d-inline">กรรมการ Committee</h6>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC1" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC1" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC1');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC1" style="display: none;">
                    <label for="otherPrefixC1" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC1" id="otherPrefixC1" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname1" class="name">ชื่อ</label>
                    <input type="text" name="fname1" id="fname1" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname1" class="surname">นามสกุล</label>
                    <input type="text" name="lname1" id="lname1" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="mb-1">
                    <h6 class="d-inline" style="font-weight: bold;">3.</h6>
                    <h6 style="font-weight: bold;" class="Committee d-inline">กรรมการ Committee</h6>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC2" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC2" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC2');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC2" style="display: none;">
                    <label for="otherPrefixC2" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC2" id="otherPrefixC2" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname2" class="name">ชื่อ</label>
                    <input type="text" name="fname2" id="fname2" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname2" class="surname">นามสกุล</label>
                    <input type="text" name="lname2" id="lname2" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="mb-1">
                    <h6 class="d-inline" style="font-weight: bold;">4.</h6>
                    <h6 style="font-weight: bold;" class="Committee d-inline">กรรมการ Committee</h6>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC3" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC3" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC3');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC3" style="display: none;">
                    <label for="otherPrefixC3" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC3" id="otherPrefixC3" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname3" class="name">ชื่อ</label>
                    <input type="text" name="fname3" id="fname3" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname3" class="surname">นามสกุล</label>
                    <input type="text" name="lname3" id="lname3" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="mb-1">
                    <h6 class="d-inline" style="font-weight: bold;">5.</h6>
                    <h6 style="font-weight: bold;" class="Committee d-inline">กรรมการ Committee</h6>
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC4" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC4" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC4');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC4" style="display: none;">
                    <label for="otherPrefixC4" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC4" id="otherPrefixC4" class="form-control">
                </div>
            </div>
            <div class=" row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname4" class="name">ชื่อ</label>
                    <input type="text" name="fname4" id="fname4" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname4" class="surname">นามสกุล</label>
                    <input type="text" name="lname4" id="lname4" class="form-control">
                </div>
            </div>
            <!-- <div class=" row">
                <h6 style="font-weight: bold;" id="Secretary">กรรมการและเลขานุการ Committee and Secretary</h6>
                <div class="form-group mb-3 col-lg-6">
                    <label for="prefixC5" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixC5" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixC5');">
                        <option value="" class="prefix">เลือกคำนำหน้าชื่อ</option>
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
                <div class="form-group mb-3 col-lg-6" id="otherPrefixC5" style="display: none;">
                    <label for="otherPrefixC5" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixC5" id="otherPrefixC5" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="form-group mb-3 col-lg-6">
                    <label for="fname5" class="name">ชื่อ</label>
                    <input type="text" name="fname5" id="fname5" class="form-control">
                </div>
                <div class="form-group mb-3 col-lg-6">
                    <label for="lname5" class="surname">นามสกุล</label>
                    <input type="text" name="lname5" id="lname5" class="form-control">
                </div>
            </div> -->
            <br>
            <!-- <div class="d-flex justify-content-end ">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success '>
            </div> -->
            <div class="row">
                <div class="d-flex justify-content-end ">
                    <input type="submit" value="นำออกเป็นไฟล์ PDF" id="btnSubmit" class="btn btn-success" placeholder="นำออกเป็นไฟล์ PDF">
                </div>
            </div>
        </form>
    </div>
    <script src="js/main.js"></script>
    <script src="js/changeLanguageForm3.js"></script>
    <script src="js/input-mask.js"></script>
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
</body>

</html>