var th = {
    topic: "แบบเสนอหัวข้อและเค้าโครงดุษฎีนิพนธ์/วิทยานิพนธ์/การค้นคว้าอิสระ",
    btn_language: "ภาษา : ไทย",
    personal: "ข้อมูลส่วนตัว",
    prefix: "คำนำหน้าชื่อ",
    label_prefix: "เลือกคำนำหน้าชื่อ",
    name: "ชื่อ",
    surname: "นามสกุล",
    prefix_mr: "นาย",
    prefix_mrs: "นาง",
    prefix_ms: "นางสาว",
    other: "อื่นๆ",
    specify: "อื่น ๆ โปรดระบุ",
    titleTH: "ชื่อเรื่องภาษาไทย",
    titleENG: "ชื่อเรื่องภาษาอังกฤษ",
    level: "ระดับการศึกษา",
    // radio_l1: "ป.บัณฑิต",
    radio_l2: "ป.โท",
    radio_l3: "ป.เอก",
    type: "แผน/แบบ",
    choose: "เลือกแผน  / แบบ",
    program: "ภาค",
    regular: "ปกติ",
    weekend: "พิเศษ",
    sid: "รหัสประจำตัวนักศึกษา",
    cont: "ข้อมูลติดต่อ",
    addr: "ที่อยู่ปัจจุบัน",
    phone: "โทรศัพท์",
    phone_mobile: "โทรศัพท์มือถือ",
    faculty: "คณะ",
    engineer: "วิศวกรรมศาสตร์",
    major: "วิชาเอก",
    subject: "แขนงวิชา",
    detail: "รายละเอียดการขอสอบเค้าโครงฯ",
    proposal: "ประเภทเค้าโครงฯ",
    Date: "ขอสอบในวันที่",
    Time: "เวลา",
    Room: "สถานที่ / ห้อง",
    Building: "อาคาร",
    Faculty_Place: "คณะ",
    committee_examination: "เสนอรายชื่อคณะกรรมการสอบ",
    committee_chairman: "ประธานกรรมการสอบ",
    Committee: "กรรมการ",
    Secretary: "กรรมการและเลขานุการ",
    Prof: "ศ.ดร.",
    Assoc: "รศ.ดร.",
    Asst: "ผศ.ดร.",
    quantity: "จำนวน",
    copy: "ฉบับ",
    dissertation: "ดุษฎีนิพนธ์",
    thesis: "วิทยานิพนธ์",
    // is: "การค้นคว้าอิสระ",
    advisor_s: "อาจารย์ที่ปรึกษาหลัก",
    chairman_fac: "ประธานกรรมการบริหารบัณฑิตศึกษาระดับคณะ",
    Co_advisor: "อาจารย์ที่ปรึกษาร่วม(ถ้ามี)",
    Curriculum: "ประธานกรรมการบริหารหลักสูตร",
    education: "ข้อมูลการศึกษา",
    prefixOpDr: "ดร.",
    prefixOpProf: "ศ.",
    prefixOpProfDr: "ศ.ดร.",
    prefixOpAssocProf: "รศ.",
    prefixOpAssocProfDr: "รศ.ดร.",
    prefixOpAsstProf: "ผศ.",
    prefixOpAsstProfDr: "ผศ.ดร.",
    a1: "ก1",
    a2: "ก2",
    invalid: "กรุณากรอกข้อมูล",
    btnSubmit:"นำออกเป็นไฟล์ PDF",

};
var en = {
    topic: "Request Form for Dissertation/Thesis/Independent Study Title and Proposal Examination",
    btn_language: "Language : EN",
    personal: "Personal information",
    prefix: "Prefix",
    name: "Name",
    surname: "Surname",
    prefix_mr: "Mr.",
    prefix_mrs: "Mrs.",
    prefix_ms: "Miss",
    other: "Other",
    specify: "Other, please specify",
    titleTH: "Title in Thai",
    titleENG: "Title in English",
    level: "Level",
    radio_l2: "Master's degree",
    radio_l3: "Doctoral Degree",
    type: "Plan/Type",
    choose: "Plan / Type",
    program: "Program",
    regular: "Regular",
    weekend: "Weekend",
    sid: "Student ID",
    cont: "Contact information",
    addr: "Current Address",
    phone: "Phone",
    phone_mobile: "Mobile Phone",
    faculty: "Faculty",
    engineer: "Engineering",
    major: "Major",
    subject: "Field of Study",
    detail: "Request examination detail",
    proposal: "Proposal type",
    Date: "Date of request for examination",
    Time: "Time",
    Room: "Place / Room",
    Building: "Building",
    Faculty_Place: "Faculty",
    committee_examination: "Proposing the proposal examination committee",
    committee_chairman: "Examination Committee Chairman",
    Committee: "Committee",
    Secretary: "Committee and Secretary",
    Prof: "Prof.Dr.",
    Assoc: "Assoc.Prof.Dr.",
    Asst: "Asst.Prof.Dr.",
    quantity: "Submitting proposal",
    copy: "copy(ies)",
    dissertation: "Dissertation",
    thesis: "Thesis",
    advisor_s: "Advisor",
    Co_advisor: "Co-advisor (if any)",
    Curriculum: "Curriculum Executive Committee Chairman",
    chairman_fac: "Graduate Studies Executive Committee Chairman of the Faculty",
    education: "Education information",
    prefixOpDr: "Dr.",
    prefixOpProf: "Prof.",
    prefixOpProfDr: "Prof.Dr.",
    prefixOpAssocProf: "Assoc.Prof.",
    prefixOpAssocProfDr: "Assoc.Prof.Dr.",
    prefixOpAsstProf: "Asst.Prof.",
    prefixOpAsstProfDr: "Asst.Prof.Dr..",
    a1: "A1",
    a2: "A2",
    invalid: "Please fill out",
    btnSubmit:"Import to PDF",
};

function renderlang() {
    if (!localStorage.lang) {
        localStorage.setItem("lang", "en");

    } else {
        $(".topic").text(settext("topic"));
        $("#btn_language").text(settext("btn_language"));
        $("#personal").text(settext("personal"));
        $(".prefix").text(settext("prefix"));
        $(".name").text(settext("name"));
        $(".surname").text(settext("surname"));
        $("#prefix_mr").text(settext("prefix_mr"));
        $("#prefix_mrs").text(settext("prefix_mrs"));
        $("#prefix_ms").text(settext("prefix_ms"));
        $(".other").text(settext("other"));
        $(".specify").text(settext("specify"));
        $("#sid").text(settext("sid"));
        $("#education").text(settext("education"));
        $("#level").text(settext("level"));
        $("#choose").text(settext("choose"));
        $("#type").text(settext("type"));
        $(".radio_l2").text(settext("radio_l2"));
        $(".radio_l3").text(settext("radio_l3"));
        $("#optionMaster").attr('label', settext("radio_l2"));
        $("#optionDoctor").attr('label', settext("radio_l3"));
        $("#program").text(settext("program"));
        $("#regular").text(settext("regular"));
        $("#weekend").text(settext("weekend"));
        $("#cont").text(settext("cont"));
        $("#addr").text(settext("addr"));
        $("#phone").text(settext("phone"));
        $("#phone_mobile").text(settext("phone_mobile"));
        $("#titleTH").text(settext("titleTH"));
        $("#titleENG").text(settext("titleENG"));
        $("#faculty").text(settext("faculty"));
        $("#engineer").text(settext("engineer"));
        $("#major").text(settext("major"));
        $("#subject").text(settext("subject"));
        $("#detail").text(settext("detail"));
        $(".Assoc").text(settext("Assoc"));
        $(".Asst").text(settext("Asst"));
        $(".Prof").text(settext("Prof"));
        $("#proposal").text(settext("proposal"));
        $(".quantity").text(settext("quantity"));
        $(".copy").text(settext("copy"));
        $("#Date").text(settext("Date"));
        $("#Time").text(settext("Time"));
        $("#Room").text(settext("Room"));
        $("#Building").text(settext("Building"));
        $("#Faculty_Place").text(settext("Faculty_Place"));
        $("#committee_examination").text(settext("committee_examination"));
        $("#committee_chairman").text(settext("committee_chairman"));
        $(".Committee").text(settext("Committee"));
        $("#Secretary").text(settext("Secretary"));
        $("#dissertation").text(settext("dissertation"));
        $("#thesis").text(settext("thesis"));
        // $("#is").text(settext("is"));
        $("#advisor_s").text(settext("advisor_s"));
        $("#Co_advisor").text(settext("Co_advisor"));
        $("#Curriculum").text(settext("Curriculum"));
        $("#chairman_fac").text(settext("chairman_fac"));
        $(".prefixOpDr").text(settext("prefixOpDr"));
        $(".prefixOpProf").text(settext("prefixOpProf"));
        $(".prefixOpProfDr").text(settext("prefixOpProfDr"));
        $(".prefixOpAssocProf").text(settext("prefixOpAssocProf"));
        $(".prefixOpAssocProfDr").text(settext("prefixOpAssocProfDr"));
        $(".prefixOpAsstProf").text(settext("prefixOpAsstProf"));
        $(".prefixOpAsstProfDr").text(settext("prefixOpAsstProfDr"));
        $(".a1").text(settext("a1"));
        $(".a2").text(settext("a2"));
        $(".invalid").text(settext("invalid"));
        $("#btnSubmit").val(settext("btnSubmit"));

        
    }
}

function settext(key) {
    if (localStorage.lang == "en") {
        return en[key];
    } else if (localStorage.lang == "th") {
        return th[key];
    }
}

function toggleLanguage(language) {
    // let description = document.getElementById("description");
    if (language == 'th') {
        localStorage.setItem("lang", "th");
        document.getElementById("prefix_mr").value = "นาย";
        document.getElementById("prefix_ms").value = "นางสาว";
        document.getElementById("prefix_mrs").value = "นาง";

        document.getElementsByClassName("prefixOpDr").value = "ดร.";
        document.getElementsByClassName("prefixOpProf").value = "ศ.";
        document.getElementsByClassName("prefixOpProfDr").value = "ศ.ดร.";
        document.getElementsByClassName("prefixOpAssocProf").value = "รศ.";
        document.getElementsByClassName("prefixOpAssocProfDr").value = "รศ.ดร.";
        document.getElementsByClassName("prefixOpAsstProf").value = "ผศ.";
        document.getElementsByClassName("prefixOpAsstProfDr").value = "ผศ.ดร.";
        document.getElementsByClassName("a1").value = "ก1";
        document.getElementsByClassName("a2").value = "ก2";
    } else if (language == 'en') {
        localStorage.setItem("lang", "en");
        document.getElementById("prefix_mr").value = "Mr.";
        document.getElementById("prefix_ms").value = "Miss";
        document.getElementById("prefix_mrs").value = "Mrs.";
        document.getElementsByClassName("prefixOpDr").value = "Dr.";
        document.getElementsByClassName("prefixOpProf").value = "Prof.";
        document.getElementsByClassName("prefixOpProfDr").value = "Prof.Dr.";
        document.getElementsByClassName("prefixOpAssocProf").value = "Assoc. Prof.";
        document.getElementsByClassName("prefixOpAssocProfDr").value = "Assoc.Prof.Dr.";
        document.getElementsByClassName("prefixOpAsstProf").value = "Asst.Prof.";
        document.getElementsByClassName("prefixOpAsstProfDr").value = "Asst.Prof.Dr.";
        document.getElementsByClassName("a1").value = "A1";
        document.getElementsByClassName("a2").value = "A2";
    }

    renderlang();
    return "now language: " + localStorage.lang;
}
renderlang()