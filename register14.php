<!DOCTYPE html>
<html lang="en" class="notranslate" translate="no">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบคำร้องขอแก้ค่าระดับคะแนนไม่สมบูรณ์ (I) สำหรับนักศึกษา</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.2.1.min.js"></script>
    <!-- <script src="https://www.google.com/recaptcha/api.js"></script> -->
    <!-- <script src="https://www.google.com/recaptcha/enterprise.js" async defer></script> -->
    <!-- <script>
function onClick(e) {
  e.preventDefault();
  grecaptcha.enterprise.ready(async () => {
    const token = await grecaptcha.enterprise.execute('6Le2TIAmAAAAACEfGslQKo9IaJiSVZe-XOUerD3M', {action: 'submit'});

  });
}
function onSubmit(token) {
     document.getElementById("demo-form").submit();
   }
</script> -->
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


            <!-- <div id="btn_language" onclick="togglelang() " class="btn btn-primary"> -->
            <!-- <input type="submit" value="t"onclick="chechT(this.value)">Language : EN</input> -->
            <!-- Language : EN -->
            <!-- </div> -->
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" id="btn_language">Language Option
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
        <div class="h mt-5">
            <!-- <h4 class="text-center">แบบขอสอบดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</h4> -->
            <h4 class="topic">แบบคำร้องขอแก้ค่าระดับคะแนนไม่สมบูรณ์ (I) สำหรับนักศึกษา</h4>
            <!-- <label id="how">Request Form for Dissertation/Thesis/Independent Study Title and Proposal Approval</label> -->
        </div>
        <form action="pdfRegister14.php" method="post" class="needs-validation row g-3" id="myform1" target="_blank" novalidate>

            <h5 class="text-primary mt-5" id="personal">ข้อมูลส่วนตัว (Personal information)</h5>
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

            <div class="row mb-3 starlabel">

                <div class="form-group col-lg-6">
                    <label for="inputState" id="program">ภาค (Program type)</label>
                    <select name="inputState" class="form-select">
                        <option value='normal' id="regular">ปกติ (Regular)</option>
                        <option value="special" id="weekend">พิเศษ (Weekend)</option>
                    </select>
                </div>

                <div class="form-group col-lg-6">
                    <label for="faculty" id="faculty">คณะ (Faculty)</label>
                    <!-- <select name="faculty" class="form-select">
                        <option value="วิศวกรรมศาสตร์" id="engineer" autofocus>วิศวกรรมศาสตร์ (Engineering)</option>
                    </select> -->
                    <input type="text" name="faculty" id="faculty" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row mb-3">
                <div class="form-group col-lg-6 starlabel">
                    <label for="major" id="major">วิชาเอก (Major)</label>
                    <input type="text" name="major" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-6 starlabel">
                    <label for="field" id="subject">แขนงวิชา (Field of Study)</label>
                    <input type="text" name="field" id="field" class="form-control" required>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <div class=" row starlabel">
                <h6 style="font-weight: bold;" id="advisor_s">อาจารย์ที่ปรึกษา (Advisor)</h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixAdvisor" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="prefixAdvisor" class="form-select" onchange="CheckPrefix(this.value,'otherPrefixAdvisor');" required>
                        <option value="" class="prefix"></option>
                        <option name='Prof' class="Prof">ศ.</option>
                        <option name='Assoc' class="Assoc">รศ.</option>
                        <option name='Asst' class="Asst">ผศ.</option>
                        <option name='Prof_Dr' class="Prof_Dr">ศ.ดร.</option>
                        <option name='Assoc_Dr' class="Assoc_Dr">รศ.ดร.</option>
                        <option name='Asst_Dr' class="Asst_Dr">ผศ.ดร.</option>
                        <option name='other' class="other" value="other">อื่น ๆ (Other)</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group mb-3 col-lg-6 " id="otherPrefixAdvisor" style="display: none;">
                    <label for="otherPrefixAdvisor" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="otherPrefixAdvisor" id="otherPrefixAdvisor" class="form-control">

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

            <!-- ข้อมูลแก้ระดับคะแนน -->
            <div class="mt-5">
                <h5 class="text-primary mb-3" id="incomplete_topic">ข้อมูลการแก้ระดับคะแนนไม่สมบูรณ์</h5>
            </div>
            <div class="row mb-3">
                <div class="form-group col-lg-6 ">
                    <label for="semeter" id="semeter_label">ประจำภาคการศึกษาที่</label>
                    <input type="number" class="form-control" name="semeter" id="semeter" min="1" max="6" style="width: 100%; align-items: flex-start;" onkeyup="CheckKeyBoard(this)" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-6 ">
                    <label for="academic_year" id="academic_year_label">ปีการศึกษา</label>
                    <input type="text" class="form-control" name="academic_year" id="academic_year" min="0" style="width: 100%; " oninput="restrictInput(event)" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>

            <!-- ลำดับ 1 -->
            <div class="row mt-3 ">
                <h6 id="list">มีรายการดังนี้</h6>
                <h6 id="first">ลำดับที่ 1</h6>
            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-4 ">
                    <label for="course_id1" class="course_id_label">รหัสวิชา</label>
                    <input type="text" class="form-control" name="course_id1" id="course_id1" min="0" style="width: 100%; align-items: flex-start;" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="course_title1" class="course_title_label">ชื่อวิชา</label>
                    <input type="text" class="form-control" name="course_title1" id="course_title1" min="0" style="width: 100%; " >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="section1" class="section_label">กลุ่ม</label>
                    <input type="text" class="form-control" name="section1" id="section1" min="0" style="width: 100%; " oninput="restrictInput(event)" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>
            <div class="row ">
                <h6 class="lecturer_label">ชื่ออาจารย์ผู้สอน</h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="lecturer_prefix1" class="form-select" id="lecturer_prefix1" onchange="CheckPrefix(this.value,'lecturer_otherPrefix1');" >
                        <option value="" class="prefix"></option>
                        <option name='Prof' class="Prof">ศ.</option>
                        <option name='Assoc' class="Assoc">รศ.</option>
                        <option name='Asst' class="Asst">ผศ.</option>
                        <option name='Prof_Dr' class="Prof_Dr">ศ.ดร.</option>
                        <option name='Assoc_Dr' class="Assoc_Dr">รศ.ดร.</option>
                        <option name='Asst_Dr' class="Asst_Dr">ผศ.ดร.</option>
                        <option name='other' class="other" value="other">อื่น ๆ (Other)</option>
                    </select>
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>

                <div class="form-group mb-3 col-lg-6 ">
                    <div id="lecturer_otherPrefix1" style="display: none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="lecturer_otherPrefix1" class="form-control">

                    </div>
                </div>

            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-6 ">
                    <label for="fname" class="name">ชื่อ (Name)</label>
                    <input type="text" name="lecturer_fname1" id="lecturer_fname1" class="form-control" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
                <div class="form-group col-lg-6 ">
                    <label for="lname" class="surname">นามสกุล (Surname)</label>
                    <input type="text" name="lecturer_lname1" id="lecturer_lname1" class="form-control" >
                    <div class="invalid-feedback invalid">
                        กรุณากรอกข้อมูล
                    </div>
                </div>
            </div>


            <!-- ลำดับ 2 -->
            <div class="row mt-3 ">
                <h6 id="second">ลำดับที่ 2</h6>
            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-4 ">
                    <label for="course_id2" class="course_id_label">รหัสวิชา</label>
                    <input type="text" class="form-control" name="course_id2" id="course_id2" min="0" style="width: 100%; align-items: flex-start;">
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="course_title2" class="course_title_label">ชื่อวิชา</label>
                    <input type="text" class="form-control" name="course_title2" id="course_title2" min="0" style="width: 100%; ">
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="section2" class="section_label">กลุ่ม</label>
                    <input type="text" class="form-control" name="section2" id="section2" min="0" style="width: 100%; " oninput="restrictInput(event)">
                </div>
            </div>
            <div class="row ">
                <h6 class="lecturer_label">ชื่ออาจารย์ผู้สอน</h6>
                <div class="form-group mb-3 col-lg-6 ">
                    <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="lecturer_prefix2" class="form-select" id="lecturer_prefix2" onchange="CheckPrefix(this.value,'lecturer_otherPrefix2');">
                        <option value="" class="prefix"></option>
                        <option name='Prof' class="Prof">ศ.</option>
                        <option name='Assoc' class="Assoc">รศ.</option>
                        <option name='Asst' class="Asst">ผศ.</option>
                        <option name='Prof_Dr' class="Prof_Dr">ศ.ดร.</option>
                        <option name='Assoc_Dr' class="Assoc_Dr">รศ.ดร.</option>
                        <option name='Asst_Dr' class="Asst_Dr">ผศ.ดร.</option>
                        <option name='other' class="other" value="other">อื่น ๆ (Other)</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-lg-6 ">
                    <div id="lecturer_otherPrefix2" style="display: none;">
                        <label for="otherPrefix" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                        <input type="text" name="lecturer_otherPrefix2" class="form-control">
                    </div>
                </div>

            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-6 ">
                    <label for="fname" class="name">ชื่อ (Name)</label>
                    <input type="text" name="lecturer_fname2" id="lecturer_fname2" class="form-control">
                </div>
                <div class="form-group col-lg-6 ">
                    <label for="lname" class="surname">นามสกุล (Surname)</label>
                    <input type="text" name="lecturer_lname2" id="lecturer_lname2" class="form-control">
                </div>
            </div>




            <!-- ลำดับ 3 -->
            <div class="row mt-3 ">
                <h6 id="third">ลำดับที่ 3</h6>
            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-4 ">
                    <label for="course_id3" class="course_id_label">รหัสวิชา</label>
                    <input type="text" class="form-control" name="course_id3" id="course_id3" min="0" style="width: 100%; align-items: flex-start;">
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="course_title3" class="course_title_label">ชื่อวิชา</label>
                    <input type="text" class="form-control" name="course_title3" id="course_title3" min="0" style="width: 100%; ">
                </div>
                <div class="form-group col-lg-4 ">
                    <label for="section3" class="section_label">กลุ่ม</label>
                    <input type="text" class="form-control" name="section3" id="section3" min="0" style="width: 100%; " oninput="restrictInput(event)">
                </div>
            </div>
            <div class="row ">
                <h6 class="lecturer_label">ชื่ออาจารย์ผู้สอน</h6>
                <div class="form-group mb-3 col-lg-6 ">

                    <label for="prefixInput" class="prefix">คำนำหน้าชื่อ (Prefix)</label>
                    <select name="lecturer_prefix3" class="form-select" id="lecturer_prefix3" onchange="CheckPrefix(this.value,'lecturer_otherPrefix3');">
                        <option value="" class="prefix"></option>
                        <option name='Prof' class="Prof">ศ.</option>
                        <option name='Assoc' class="Assoc">รศ.</option>
                        <option name='Asst' class="Asst">ผศ.</option>
                        <option name='Prof_Dr' class="Prof_Dr">ศ.ดร.</option>
                        <option name='Assoc_Dr' class="Assoc_Dr">รศ.ดร.</option>
                        <option name='Asst_Dr' class="Asst_Dr">ผศ.ดร.</option>
                        <option name='other' class="other" value="other">อื่น ๆ (Other)</option>
                    </select>
                </div>

                <div class="form-group mb-3 col-lg-6 " id="lecturer_otherPrefix3" style="display: none;">
                    <label for="lecturer_otherPrefix3" class="specify">อื่น ๆ โปรดระบุ (Other, please specify)</label>
                    <input type="text" name="lecturer_otherPrefix3" class="form-control">
                </div>

            </div>

            <div class="row mb-3">
                <div class="form-group col-lg-6 ">
                    <label for="fname" class="name">ชื่อ (Name)</label>
                    <input type="text" name="lecturer_fname3" id="lecturer_fname3" class="form-control">
                </div>
                <div class="form-group col-lg-6 ">
                    <label for="lname" class="surname">นามสกุล (Surname)</label>
                    <input type="text" name="lecturer_lname3" id="lecturer_lname3" class="form-control">
                </div>

            </div>

            <br>

            <div class="row mb-3">
                <div class="d-flex justify-content-end ">
                    <!-- <div class="g-recaptcha" data-sitekey="6Le2TIAmAAAAACEfGslQKo9IaJiSVZe-XOUerD3M" data-action="submit"></div>
        <button class="g-recaptcha btn btn-success btn-lg" id="btnSubmit" 
        data-sitekey="6Le2TIAmAAAAACEfGslQKo9IaJiSVZe-XOUerD3M" 
        data-callback='onSubmit' 
        data-action='submit'>Submit</button> -->
                    <input type="submit" id="btnSubmit" value="" class='btn btn-success '>
                </div>
            </div>
        </form>
    </div>


    <!-- <script src="js/main.js"></script> -->
    <script src="js/changeLanguageRegis14.js"></script>
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