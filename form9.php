<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบรายงานการเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ เพื่อประกอบการสำเร็จการศึกษา</title>
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
                    <!-- <li onclick="toggleLanguage('france')"> <a href="#" class="dropdown-item">France</a></li> -->

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
        <form action="pdf9.php" method="post" class="needs-validation row g-3" target="_blank" id="myform1" novalidate>
            <input type="hidden" name="language" id="language">
            <h5 class="text-primary mt-5" id="personal">ข้อมูลส่วนตัว (Personal information)</h5>
            <div>
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
                    <div id="otherPrefix" style="display: none;" class="form-group mb-3 col-lg-6 starlabel">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="otherPrefix" class="form-control">
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row ">
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
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary " id="education">ข้อมูลการศึกษา (Education information)</h5>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="LevelsInput" id="level">ระดับการศึกษา (Level of education)</label>
                        <select name="LevelsInput" class="form-select" id="LevelsInput" onchange='CheckPlan(this.value);' required>
                            <option value="master" class="radio_l2">ปริญญาโท (Master's degree)</option>
                            <option value="doctor" class="radio_l3">ปริญญาเอก (Doctoral Degree)</option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 ">
                        <label for="plan" id="type">แผน (Plan) / แบบ (Type)</label>
                        <select name="plan" id="plan" class="form-select">
                            <option value="" id="choose">เลือกแผน (Plan) / แบบ (Type)</option>
                            <optgroup id="optionMaster" label="ป.โท" style="display: block;">
                                <option  class="a1">ก1</option>
                                <option  class="a2">ก2</option>
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
                    <div class="form-group col-lg-6 mb-3">
                        <label for="inputState" id="program">ภาค (Program type)</label>
                        <select name="inputState" id="program_radio" class="form-select" required>
                            <option value='normal' id="regular">ปกติ (Regular)</option>
                            <option value="special" id="weekend">พิเศษ (Weekend)</option>
                        </select>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="faculty" id="faculty">คณะ (Faculty)</label>
                        <!-- <select name="faculty" class="form-select">
                            <option value="วิศวกรรมศาสตร์" id="engineer" autofocus>วิศวกรรมศาสตร์ (Engineering)</option>
                        </select> -->
                        <input type="text" name="faculty" id="engineer" class="form-control"  required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="major" id="major">วิชาเอก (Major)</label>
                        <input type="text" name="major" class="form-control" maxlength="35" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3 starlabel">
                        <label for="field" id="subject">แขนงวิชา (Field of Study)</label>
                        <input type="text" name="field" id="field" class="form-control" maxlength="50" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary " id="cont">ข้อมูลติดต่อ (Contact information)</h5>
                <div class="">
                    <div class="row ">
                        <div class="form-group  mb-3 starlabel">
                            <label id="addr">ที่อยู่ปัจจุบัน (Current Address)</label>
                            <textarea class="form-control" name="address" id="address" cols="100%" rows="3" style="resize: none;" required></textarea>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>
                        <div class="form-group col-lg-6 mb-3">
                            <label for="telephone" id="phone">โทรศัพท์บ้าน (Telephone)</label>
                            <input type="text" name="telephone" id="telephone" class="form-control" oninput="restrictInput(event)">
                        </div>
                        <div class="form-group col-lg-6 mb-3 starlabel">
                            <label for="mobile" id="phone_mobile">โทรศัพท์มือถือ (Mobile Phone)</label>
                            <input type="text" name="mobile" id="mobile" class="form-control" oninput="restrictInput(event)" required>
                            <div class="invalid-feedback invalid">
                                กรุณากรอกข้อมูล
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="proposal">รายละเอียดการขอสอบเค้าโครงฯ</h5>
                <div class="form-group mb-3 starlabel">
                    <label for="titleTH" class="" id="titleTH">ชื่อเรื่องภาษาไทย (Title in Thai)</label>
                    <!-- <input type="text" name="titleTH" class="form-control"> -->
                    <textarea class="form-control" name="titleTH" id="titleTH" cols="100%" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 starlabel">
                    <label for="titleEN" class="" id="titleENG">ชื่อเรื่องภาษาอังกฤษ (Title in English)</label>
                    <!-- <input type="text" name="titleEN" class="form-control"> -->
                    <textarea class="form-control" name="titleEN" id="titleEN" cols="100%" rows="2" style="resize: none;" required></textarea>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>

                <div class="row starlabel">
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
                    <div class="form-group mb-3 col-lg-6 ">
                        <div id="otherPrefixAdvisor" style="display: none;">
                            <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixAdvisor" id="otherPrefixAdvisorsor" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="row starlabel">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="fnameAdvisor" class="name">ชื่อ</label>
                        <input type="text" name="fnameAdvisor" class="form-control" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="lnameAdvisor" class="surname">นามสกุล</label>
                        <input type="text" name="lnameAdvisor" id="" class="form-control" required>
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div>
                <div class=" row ">
                    <h6 style="font-weight: bold;" id="Curriculum">ประธานกรรมการบริหารหลักสูตร (Curriculum Executive Committee Chairman)</h6>
                    <div class="form-group mb-3 col-lg-6 ">
                        <label for="prefixCurriculum" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                        <select name="prefixCurriculum" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixCurriculum');" >
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
                    <div class="form-group mb-3 col-lg-6 ">
                        <div id="otherPrefixCurriculum" style="display: none;">
                            <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                            <input type="text" name="otherPrefixCurriculum" class="form-control">
                        </div>
                    </div>
                </div>
                <div class=" row ">
                    <div class="form-group col-lg-6 mb-3">
                        <label for="" class="name">ชื่อ</label>
                        <input type="text" name="fnameCurriculum" class="form-control" >
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                    <div class="form-group col-lg-6 mb-3">
                        <label for="" class="surname">นามสกุล</label>
                        <input type="text" name="lnameCurriculum" class="form-control" >
                        <div class="invalid-feedback invalid">
                            กรุณากรอกข้อมูล
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="detail"></h5>
            </div>
            <div class="row g-1">
                <div class="col-auto">
                    <input class="form-check-input" type="radio" id="private" value="private" name="total" onchange="CheckTotalRadio();">
                </div>
                <div class="col-auto">
                    <label class="form-check-label" for="private" id="label_private">ใช้ทุนส่วนตัว รวมทั้งสิ้น</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="total_private" class="form-control" id="total_private" style="text-align: center;" oninput="restrictInput(event)" disabled>
                </div>
                <div class="col-auto">
                    <label class="form-check-label" id="label_last_private" for="total_private">บาท</label>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-auto">
                    <input class="form-check-input" type="radio" id="public" value="public" name="total" onchange="CheckTotalRadio();">
                </div>
                <div class="col-auto">
                    <label class="form-check-label-sm" for="public" id="label_public">ได้รับทุนจากหน่วยงาน</label>
                </div>
                <div class="col-auto">
                    <input type="text" name="public_agency" class="form-control" id="public_agency" style="text-align: center;" disabled>
                </div>
            </div>
            <div class="row g-1">
                <div class="col-auto">
                    <label class="form-check-label-sm" for="total" id="label_total_public">โดยได้รับงบประมาณในการเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ รวมทั้งสิ้น</label>
                </div>
                <div class="col-auto">
                    <input type="" name="total_public" class="form-control" id="total_public" style="text-align: center; " oninput="restrictInput(event)" disabled>
                </div>
                <div class="col-auto">
                    <label class="form-check-label-sm" for="" id="label_last_public">บาท</label>
                </div>
            </div>
            <div class="mt-5">
                <h5 class="text-primary" id="Pub_detail"></h5>
            </div>
            <div class="row">
                <h6 style="font-weight: bold;" id="list_thesis"></h6>
                <div class="mb-1 row g-1 ">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" value="published_nation" id="published_nation" name="published_nation" onchange="CheckBoxHide('published_nation')">
                    </div>
                    <div class="col-auto">
                        <label class="form-check-label" for="published_nation" id="published_nation_label"></label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_published_nation" name="total_published_nation" style="text-align: center;" max="5" min="0" value="0" onchange="enforceMinMax(this,'total_published_nation')" onkeyup="enforceMinMax(this,'total_published_nation')" disabled>
                    </div>
                </div>
                <div class="mb-1 row g-1 ">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" value="published_inter" id="published_inter" name="published_inter" onchange="CheckBoxHide('published_inter')">
                    </div>
                    <div class="col-auto">
                        <label class="form-check-label" for="published_inter" id="published_inter_label"></label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_published_inter" name="total_published_inter" style="text-align: center;" max="5" min="0" value="0" onchange="enforceMinMax(this,'total_published_inter')" onkeyup="enforceMinMax(this,'total_published_inter')" disabled>
                    </div>
                </div>
                <div class="mb-1 row g-1">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" value="present_nation" id="present_nation" name="present_nation" onchange="CheckBoxHide('present_nation')">
                    </div>
                    <div class="col-auto">
                        <label class="form-check-label" for="present_nation" id="present_nation_label">Default checkbox</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_present_nation" name="total_present_nation" max="5" min="0" value="0" style="text-align: center;" onkeyup="enforceMinMax(this,'total_present_nation')" onchange="enforceMinMax(this,'total_present_nation')" disabled>
                    </div>
                </div>
                <div class="mb-1 row g-1">
                    <div class="col-auto">
                        <input class="form-check-input" type="checkbox" value="present_inter" id="present_inter" name="present_inter" onchange="CheckBoxHide('present_inter')">
                    </div>
                    <div class="col-auto">
                        <label class="form-check-label" for="present_inter" id="present_inter_label">Default checkbox</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_present_inter" name="total_present_inter" max="5" min="0" value="0" style="text-align: center;" onkeyup="enforceMinMax(this,'total_present_inter')" onchange="enforceMinMax(this,'total_present_inter')" disabled>
                    </div>
                </div>
            </div>
            <!-- ตีพิมพ์ -->
            <!-- ส่วน1 -->
            <div id="publish_1" hidden>
                <h6 style="font-weight: bold;" id="list_published"></h6>
                <h6 style="font-weight: bold;" class="list_1 mb-3">รายการที่ 1</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pub_title">ชื่อเรื่องที่ตีพิมพ์</label>
                    <input type="text" class="form-control" name="pub_title1" id="pub_title1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic">ชื่อวารสารทางวิชาการที่ตีพิมพ์</label>
                    <input type="text" class="form-control" id="name_academic1" name="name_academic1">
                </div>
                <div class="row">
                    <!-- <table>
                        <tr>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm issue_num">ฉบับที่</label>
                        <input type="number" class="form-control" id="issue_num1" name="issue_num1" style=" text-align: end;">
                    </div>
                    <!-- </td>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm volume">ปีที่</label>
                        <input type="text" class="form-control" name="volume1" id="volume1" style=" text-align: end;">
                    </div>
                    <!-- </td>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm month_year_pub">เดือน/ปี</label>
                        <input type="month" class="form-control" name="month_year_pub1" id="month_year_pub1">
                    </div>
                    <!-- </td>
                        </tr>
                    </table> -->
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pub">ประเทศ</label>
                    <input type="text" class="form-control" id="country_pub1" name="country_pub1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label database_name">อยู่ในฐาน</label>
                    <input type="text" class="form-control" id="database_name1" name="database_name1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label tier">กลุ่ม</label>
                    <input type="text" class="form-control" id="tier1" name="tier1">
                </div>
            </div>
            <!-- ส่วน2 -->
            <div id="publish_2" hidden>
                <!-- <h6 style="font-weight: bold;" id="list_published"></h6> -->
                <h6 style="font-weight: bold;" class="list_2 mb-3">รายการที่ 2</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pub_title">ชื่อเรื่องที่ตีพิมพ์</label>
                    <input type="text" class="form-control" name="pub_title2" id="pub_title2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic">ชื่อวารสารทางวิชาการที่ตีพิมพ์</label>
                    <input type="text" class="form-control" id="name_academic2" name="name_academic2">
                </div>
                <div class="row ">
                    <!-- <table>
                        <tr>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm issue_num">ฉบับที่</label>
                        <input type="number" class="form-control" id="issue_num2" name="issue_num2" style=" text-align: end;">
                    </div>
                    <!-- </td>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm volume">ปีที่</label>
                        <input type="text" class="form-control " name="volume2" id="volume2" style=" text-align: end;">
                    </div>
                    <!-- </td>
                            <td> -->
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm month_year_pub">เดือน/ปี</label>
                        <input type="month" class="form-control" name="month_year_pub2" id="month_year_pub2">
                    </div>
                    <!-- </td>
                        </tr>
                    </table> -->
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pub">ประเทศ</label>
                    <input type="text" class="form-control" id="country_pub2" name="country_pub2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label database_name">อยู่ในฐาน</label>
                    <input type="text" class="form-control" id="database_name2" name="database_name2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label tier">กลุ่ม</label>
                    <input type="text" class="form-control" id="tier1" name="tier2">
                </div>
            </div>
            <!-- ส่วน 3  -->
            <div id="publish_3" hidden>
                <h6 style="font-weight: bold;" class="list_3 mb-3">รายการที่ 3</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pub_title">ชื่อเรื่องที่ตีพิมพ์</label>
                    <input type="text" class="form-control" name="pub_title3" id="pub_title3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic">ชื่อวารสารทางวิชาการที่ตีพิมพ์</label>
                    <input type="text" class="form-control" id="name_academic3" name="name_academic3">
                </div>
                <div class="row ">
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm issue_num">ฉบับที่</label>
                        <input type="number" class="form-control" id="issue_num3" name="issue_num3" style=" text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm volume">ปีที่</label>
                        <input type="text" class="form-control" name="volume3" id="volume3" style="text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm month_year_pub">เดือน/ปี</label>
                        <input type="month" class="form-control" name="month_year_pub3" id="month_year_pub3">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pub">ประเทศ</label>
                    <input type="text" class="form-control" id="country_pub3" name="country_pub3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label database_name">อยู่ในฐาน</label>
                    <input type="text" class="form-control" id="database_name3" name="database_name3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label tier">กลุ่ม</label>
                    <input type="text" class="form-control" id="tier3" name="tier3">
                </div>
            </div>
            <!-- ส่วน4 -->
            <div id="publish_4" hidden>
                <h6 style="font-weight: bold;" class="list_4 mb-3">รายการที่ 4</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pub_title">ชื่อเรื่องที่ตีพิมพ์</label>
                    <input type="text" class="form-control" name="pub_title4" id="pub_title4">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic">ชื่อวารสารทางวิชาการที่ตีพิมพ์</label>
                    <input type="text" class="form-control" id="name_academic4" name="name_academic4">
                </div>
                <div class="row ">
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm issue_num">ฉบับที่</label>
                        <input type="number" class="form-control" id="issue_num4" name="issue_num4" style="text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm volume">ปีที่</label>
                        <input type="text" class="form-control" name="volume4" id="volume4" style="text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm month_year_pub">เดือน/ปี</label>
                        <input type="month" class="form-control" name="month_year_pub4" id="month_year_pub4">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pub">ประเทศ</label>
                    <input type="text" class="form-control" id="country_pub4" name="country_pub4">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label database_name">อยู่ในฐาน</label>
                    <input type="text" class="form-control" id="database_name4" name="database_name4">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label tier">กลุ่ม</label>
                    <input type="text" class="form-control" id="tier4" name="tier4">
                </div>
            </div>
            <!-- ส่วน5 -->
            <div id="publish_5" hidden>
                <h6 style="font-weight: bold;" class="list_5 mb-3">รายการที่ 5</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pub_title">ชื่อเรื่องที่ตีพิมพ์</label>
                    <input type="text" class="form-control" name="pub_title5" id="pub_title5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic">ชื่อวารสารทางวิชาการที่ตีพิมพ์</label>
                    <input type="text" class="form-control" id="name_academic5" name="name_academic5">
                </div>
                <div class="row ">
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm issue_num">ฉบับที่</label>
                        <input type="number" class="form-control" id="issue_num5" name="issue_num5" style=" text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm volume">ปีที่</label>
                        <input type="text" class="form-control" name="volume5" id="volume5" style="text-align: end;">
                    </div>
                    <div class="col-lg-4 mb-3">
                        <label class="form-control-label-sm month_year_pub">เดือน/ปี</label>
                        <input type="month" class="form-control" name="month_year_pub5" id="month_year_pub5">
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pub">ประเทศ</label>
                    <input type="text" class="form-control" id="country_pub5" name="country_pub5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label database_name">อยู่ในฐาน</label>
                    <input type="text" class="form-control" id="database_name5" name="database_name5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label tier">กลุ่ม</label>
                    <input type="text" class="form-control" id="tier5" name="tier5">
                </div>
            </div>
            <!-- นำเสนอ -->
            <!-- ส่วน1 -->
            <div id="present_1" hidden>
                <h6 style="font-weight: bold;" id="list_present"></h6>
                <h6 style="font-weight: bold;" class="list_1 mb-3">รายการที่ 1</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pre_title">ชื่อเรื่องที่นำเสนอ</label>
                    <input type="text" class="form-control" id="pre_title1" name="pre_title1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic_pre">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง</label>
                    <input type="text" class="form-control" id="name_academic_pre1" name="name_academic_pre1">
                </div>
                <div class="form-group-auto mb-3">
                    <label class="form-control-label level_pre">ระดับ </label>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level1" value="nation" class="form-check-input" id="radio_nation1" name="radio_nation1">
                        <label for="radio_nation1 " class="nation">ระดับชาติ</label>
                    </div>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level1" value="inter" id="radio_inter1" name="radio_inter1" class="form-check-input">
                        <label for="radio_inter" class="inter">ระดับนานาชาติ</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pre">จัดขึ้นที่ประเทศ</label>
                    <input type="text" class="form-control" id="country_pre1" name="country_pre1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label date_pre">นำเสนอผลงานวันที่</label>
                    <input type="date" class="form-control" id="date_pre1" name="date_pre1">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label place_pre">สถานที่</label>
                    <input type="text" class="form-control" id="place_pre1" name="place_pre1">
                </div>
                <div class="form-group row g-1 mb-3">
                    <div class="col-auto">
                        <label class="form-control-label-sm detail_pre">มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ </label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="percent">ร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent1" name="percent1" max="100" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
                <div class="form-group row mb-3 g-1">
                    <div class="col-auto">
                        <label class="institution">บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="count_pre">จำนวน</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="count_pre1" name="count_pre1" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="institution_last">หน่วยงาน</label>
                    </div>
                </div>
                <div class="row mb-3 g-1">
                    <div class="col-auto">
                        <label class="total_paper_all">จำนวนบทความทั้งหมด</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_paper_all1" name="total_paper_all1" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="form-group row mb-3 g-1">
                    <div class="col-auto">
                        <label class="institution_host">บทความจากสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_host1" name="institution_host1" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="form-group row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_external">บทความจากสถาบันภายนอก</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_external1" name="institution_external1" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="form-group row g-1 mb-3">
                    <div class="col-auto">
                        <label class="percent_all">รวมบทความที่มาจากสถาบันภายนอก คิดเป็นร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent_all1" name="percent_all1" min="0" max="100" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
            </div>
            <!-- ส่วน2 -->
            <div id="present_2" hidden>
                <h6 style="font-weight: bold;" class="list_2 mb-3">รายการที่ 2</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pre_title">ชื่อเรื่องที่นำเสนอ</label>
                    <input type="text" class="form-control" id="pre_title2" name="pre_title2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic_pre">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง</label>
                    <input type="text" class="form-control" id="name_academic_pre2" name="name_academic_pre2">
                </div>
                <div class="form-group-auto mb-3">
                    <label class="form-control-label level_pre">ระดับ </label>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level2" value="nation" class="form-check-input" id="radio_nation2" name="radio_nation2">
                        <label for="radio_nation1 " class="nation">ระดับชาติ</label>
                    </div>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level2" value="inter" id="radio_inter2" name="radio_inter2" class="form-check-input">
                        <label for="radio_inter" class="inter">ระดับนานาชาติ</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pre">จัดขึ้นที่ประเทศ</label>
                    <input type="text" class="form-control" id="country_pre2" name="country_pre2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label date_pre">นำเสนอผลงานวันที่</label>
                    <input type="date" class="form-control" id="date_pre2" name="date_pre2">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label place_pre">สถานที่</label>
                    <input type="text" class="form-control" id="place_pre2" name="place_pre2">
                </div>
                <div class=" row g-1 mb-3">
                    <div class="col-auto">
                        <label class="form-control-label-sm detail_pre">มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ </label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="percent">ร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent2" name="percent2" max="100" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
                <div class=" row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution">บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="count_pre">จำนวน</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="count_pre2" name="count_pre2" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="institution_last">หน่วยงาน</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="total_paper_all">จำนวนบทความทั้งหมด </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_paper_all2" name="total_paper_all2" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_host">บทความจากสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_host2" name="institution_host2" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class=" row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_external">บทความจากสถาบันภายนอก</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_external2" name="institution_external2" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                    <div class="col-auto">
                        <label class="percent_all">รวมบทความที่มาจากสถาบันภายนอก คิดเป็นร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent_all2" name="percent_all2" min="0" max="100" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
            </div>
            <!-- ส่วน3 -->
            <div id="present_3" hidden>
                <h6 style="font-weight: bold;" class="list_3 mb-3">รายการที่ 3</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pre_title">ชื่อเรื่องที่นำเสนอ</label>
                    <input type="text" class="form-control" id="pre_title3" name="pre_title3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic_pre">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง</label>
                    <input type="text" class="form-control" id="name_academic_pre3" name="name_academic_pre3">
                </div>
                <div class="form-group-auto mb-3">
                    <label class="form-control-label level_pre">ระดับ </label>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level3" value="nation" class="form-check-input" id="radio_nation3" name="radio_nation3">
                        <label for="radio_nation1 " class="nation">ระดับชาติ</label>
                    </div>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level3" value="inter" id="radio_inter3" name="radio_inter3" class="form-check-input">
                        <label for="radio_inter" class="inter">ระดับนานาชาติ</label>
                    </div>
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label country_pre">จัดขึ้นที่ประเทศ</label>
                    <input type="text" class="form-control" id="country_pre3" name="country_pre3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label date_pre">นำเสนอผลงานวันที่</label>
                    <input type="date" class="form-control" id="date_pre3" name="date_pre3">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label place_pre">สถานที่</label>
                    <input type="text" class="form-control" id="place_pre3" name="place_pre3">
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="form-control-label-sm detail_pre">มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ </label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="percent">ร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent3" name="percent3" max="100" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution">บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="count_pre">จำนวน</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="count_pre3" name="count_pre3" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="institution_last">หน่วยงาน</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="total_paper_all">จำนวนบทความทั้งหมด </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_paper_all3" name="total_paper_all3" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_host">บทความจากสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_host3" name="institution_host3" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_external">บทความจากสถาบันภายนอก</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_external3" name="institution_external3" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                    <div class="col-auto">
                        <label class="percent_all">รวมบทความที่มาจากสถาบันภายนอก คิดเป็นร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent_all3" name="percent_all3" min="0" max="100" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
            </div>
            <!-- ส่วน4 -->
            <div id="present_4" hidden>
                <h6 style="font-weight: bold;" class="list_4 mb-3">รายการที่ 4</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pre_title">ชื่อเรื่องที่นำเสนอ</label>
                    <input type="text" class="form-control" id="pre_title4" name="pre_title4">
                </div>

                <div class="form-group mb-3">
                    <label class="form-control-label name_academic_pre">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง</label>
                    <input type="text" class="form-control" id="name_academic_pre4" name="name_academic_pre4">
                </div>
                <div class="form-group-auto mb-3">
                    <label class="form-control-label level_pre">ระดับ </label>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level4" value="nation" class="form-check-input" id="radio_nation4" name="radio_nation4">
                        <label for="radio_nation1 " class="nation">ระดับชาติ</label>
                    </div>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level4" value="inter" id="radio_inter4" name="radio_inter4" class="form-check-input">
                        <label for="radio_inter" class="inter">ระดับนานาชาติ</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-control-label country_pre">จัดขึ้นที่ประเทศ</label>
                    <input type="text" class="form-control" id="country_pre4" name="country_pre4">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label date_pre">นำเสนอผลงานวันที่</label>
                    <input type="date" class="form-control" id="date_pre4" name="date_pre4">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label place_pre">สถานที่</label>
                    <input type="text" class="form-control" id="place_pre4" name="place_pre4">
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="form-control-label-sm detail_pre">มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ </label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="percent">ร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent4" name="percent4" max="100" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
                <div class="row g-1  mb-3">
                    <div class="col-auto">
                        <label class="institution">บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="count_pre">จำนวน</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="count_pre4" name="count_pre4" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="institution_last">หน่วยงาน</label>
                    </div>
                </div>
                <div class="row g-1  mb-3">
                    <div class="col-auto">
                        <label class="total_paper_all">จำนวนบทความทั้งหมด </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_paper_all4" name="total_paper_all4" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1  mb-3">
                    <div class="col-auto">
                        <label class="institution_host">บทความจากสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_host4" name="institution_host4" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1  mb-3">
                    <div class="col-auto">
                        <label class="institution_external">บทความจากสถาบันภายนอก</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_external4" name="institution_external4" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                    <div class="col-auto">
                        <label class="percent_all">รวมบทความที่มาจากสถาบันภายนอก คิดเป็นร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent_all4" name="percent_all4" min="0" max="100" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
            </div>
            <!-- ส่วน5 -->
            <div id="present_5" hidden>
                <h6 style="font-weight: bold;" class="list_5 mb-3">รายการที่ 5</h6>
                <div class="form-group mb-3">
                    <label class="form-control-label pre_title">ชื่อเรื่องที่นำเสนอ</label>
                    <input type="text" class="form-control" id="pre_title5" name="pre_title5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label name_academic_pre">ชื่อที่ประชุมทางวิชาการ/นิทรรศการ/งานแสดง</label>
                    <input type="text" class="form-control" id="name_academic_pre5" name="name_academic_pre5">
                </div>
                <div class="form-group-auto mb-3">
                    <label class="form-control-label level_pre">ระดับ </label>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level5" value="nation" class="form-check-input" id="radio_nation5" name="radio_nation5">
                        <label for="radio_nation1 " class="nation">ระดับชาติ</label>
                    </div>
                    <div>
                        &nbsp;&nbsp;
                        <input type="radio" name="radio_level5" value="inter" id="radio_inter5" name="radio_inter5" class="form-check-input">
                        <label for="radio_inter" class="inter">ระดับนานาชาติ</label>
                    </div>
                </div>

                <div class="form-group mb-3">
                    <label class="form-control-label country_pre">จัดขึ้นที่ประเทศ</label>
                    <input type="text" class="form-control" id="country_pre5" name="country_pre5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label date_pre">นำเสนอผลงานวันที่</label>
                    <input type="date" class="form-control" id="date_pre5" name="date_pre5">
                </div>
                <div class="form-group mb-3">
                    <label class="form-control-label place_pre">สถานที่</label>
                    <input type="text" class="form-control" id="place_pre5" name="place_pre5">
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="form-control-label-sm detail_pre">มีกองบรรณาธิการจัดทำรายงานการประชุม หรือคณะกรรมการจัดประชุมประกอบด้วย ศาสตราจารย์ หรือ ผู้ทรงคุณวุฒิระดับปริญญาเอก หรือผู้ทรงคุณวุฒิที่มีผลงานเป็นที่ยอมรับในสาขานั้น ๆ จากนอกสถาบันเจ้าภาพ </label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="percent">ร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent5" name="percent5" max="100" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution">บทความที่มาจากหน่วยงานภายนอกสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <label for="" class="count_pre">จำนวน</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="count_pre5" name="count_pre5" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="institution_last">หน่วยงาน</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="total_paper_all">จำนวนบทความทั้งหมด </label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="total_paper_all5" name="total_paper_all5" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label> <br>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_host">บทความจากสถาบันเจ้าภาพ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_host5" name="institution_host5" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                </div>
                <div class="row g-1 mb-3">
                    <div class="col-auto">
                        <label class="institution_external">บทความจากสถาบันภายนอก</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="institution_external5" name="institution_external5" min="0" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                    <div class="col-auto">
                        <label class="paper">บทความ</label>
                    </div>
                    <div class="col-auto">
                        <label class="percent_all">รวมบทความที่มาจากสถาบันภายนอก คิดเป็นร้อยละ</label>
                    </div>
                    <div class="col-auto">
                        <input type="number" class="form-control" id="percent_all5" name="percent_all5" min="0" max="100" style="text-align: end;" onkeyup="CheckKeyBoard(this)">
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-5">
                <input type="submit" id="btnSubmit" value="นำออกไฟล์เป็น pdf" class='btn btn-success'>
            </div>
        </form>
    </div>
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
    <!-- <script src="js/main.js"></script> -->
    <script src="js/input-mask.js"></script>
    <script src="js/changeLanguageForm9.js"></script>
</body>

</html>