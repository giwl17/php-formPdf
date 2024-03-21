<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>แบบฟอร์มวิทยานิพนธ์ และฟอร์มลงทะเบียน</title>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://fonts.googleapis.com/css2?family=Sarabun&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="icon" type="image/x-icon" href="img/logo.jpg">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="css/styles1.css">
    <script src="่js/script.js"></script>
</head>

<body onload="toggleLanguage('th')">
    <nav id='navbar' class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <div class="logo">
                <!-- <i class="bx bx-menu menu-icon"></i> -->
                <a href="/gragden">
                    <img src="img/RMUTTLOGO.png" alt="Flowers in Chania" width="45px" height="75px" class="bx bx-menu " />
                </a>
                <span class="logo-nam hidden-mobile" style="font-size: small; padding-left:20px;">
                    คณะวิศวกรรมศาสตร์ มหาวิทยาลัยเทคโนโลยีราชมงคลธัญบุรี <br>
                    Faculty of Engineering Rajamangala University of Technology Thanyaburi
                </span>
            </div>
            <div class="dropdown">
                <button class="btn btn-default dropdown-toggle" type="button" data-bs-toggle="dropdown" id="btn_language">Language
                    <span class="caret"></span></button>
                <input type="hidden" name="language" id="language" value="<?php $leng; ?>">
                <ul class="dropdown-menu">
                    <li onclick="toggleLanguage('en')"> <a href="#" class="dropdown-item">English</a></li>
                    <li onclick="toggleLanguage('th')"> <a href="#" class="dropdown-item">Thai</a></li>
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
            <h4 id="formTitle">แบบฟอร์ม</h4>
        </div>
        <div class="mb-5">
            <h5 class="mb-3" id="thesisFormTitle">ฟอร์มวิทยานิพนธ์</h5>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="form1" target="_blank" id="form1">แบบเสนอหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" form3" target="_blank" id="form3">แบบขอสอบหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" form5" target="_blank" id="form5">แบบขอสอบดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" form7" target="_blank" id="form7">แบบคำร้องขอเปลี่ยนแปลงอาจารย์ที่ปรึกษาดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" form9" target="_blank" id="form9">แบบรายงานการเผยแพร่ดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ เพื่อประกอบการสำเร็จการศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" form10" target="_blank" id="form10">แบบรับรองผลการตรวจสอบการคัดลอกผลงานทางวิชาการจากระบบฐานข้อมูล Turnitin</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" formProgress" target="_blank" id="formProgress">แบบขอสอบความก้าวหน้าวิทยานิพนธ์</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href=" ExaminationForm" target="_blank" id="formExamination">แบบขอสอบวัดคุณสมบัติ</a></div>
        </div>
        <div class=" mb-5">
            <h5 class="mb-3" id="">ฟอร์มลงทะเบียน</h5>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formRegistrationConfirmation" target="_blank" class="register1">ใบรายงานตัวเพื่อขึ้นทะเบียนเป็นนักศึกษาระดับบัณฑิตศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm2" target="_blank" class="register2">ใบลงทะเบียนเรียน</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm3" target="_blank" class="register3">แบบเพิ่ม ถอนวิชาเรียน</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formCoursesTransfer" target="_blank" class="register5">แบบขอเทียบโอนผลการเรียน</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm6" target="_blank" class="register6">แบบลาพักการศึกษา/ขอคืนสภาพการเป็นนักศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm7" target="_blank" class="register7">แบบขอสำเร็จการศึกษา</a></a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm8" target="_blank" class="register8">แบบขอขึ้นทะเบียนบัณฑิต</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm9" target="_blank" class="register9">แบบขอเอกสารการศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formGeneralRequest" target="_blank" class="register10">แบบคำร้องทั่วไป</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formProgressReport" target="_blank" class="register13">แบบรายงานความก้าวหน้าดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="register14" target="_blank" class="register14">แบบคำร้องขอแก้ค่าระดับคะแนนไม่สมบูรณ์ (I) สำหรับนักศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm17" target="_blank" class="register17">แบบคำร้องขอผ่อนผันการชำระค่าบำรุงการศึกษา ค่าลงทะเบียน และค่าธรรมเนียมการศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formProxy" target="_blank" class="register18">ใบมอบฉันทะ</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="registerForm20" target="_blank" class="register20">แบบคำร้องขอรักษาสภาพการเป็นนักศึกษา</a></div>
            <div class="bg-light p-3 border-bottom mb-2"><a onclick="toggleLanguage('<?php echo $leng; ?>')" href="formStudentResignation" target="_blank" class="register21">แบบขอลาออกจากการเป็นนักศึกษา</a></div>
        </div>
    </div>
    </div>

    <script src="js/jquery.min.js"></script>
    <script src="js/changeLeng.js"></script>
</body>

</html>