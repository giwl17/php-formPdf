function CheckPrefix_C(val, prefixid) {
    var element = document.getElementById(prefixid);
    if (val == 'other') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

const navBar = document.querySelector("nav"),
    menuBtns = document.querySelectorAll(".menu-icon"),
    overlay = document.querySelector(".overlay");

menuBtns.forEach((menuBtn) => {
    menuBtn.addEventListener("click", () => {
        navBar.classList.toggle("open");
    });
});

function CheckPlan(val) {
    var master = document.getElementById('optionMaster');
    var doctor = document.getElementById('optionDoctor');

    if (val == 'Master') {
        doctor.style.display = 'none';
        master.style.display = 'block';

    } else if (val == 'Doctoral') {
        master.style.display = 'none';
        doctor.style.display = 'block';
    }
}

function CheckPlanRequirements(val) {
    var master = document.getElementById('optionMaster1');
    var doctor = document.getElementById('optionDoctor1');

    if (val == 'Master') {
        doctor.style.display = 'none';
        master.style.display = 'block';

    } else if (val == 'Doctoral') {
        master.style.display = 'none';
        doctor.style.display = 'block';
    }
}

$(function() {
    var element = document.getElementById('mail');
    $('input:radio[name="pay"]').change(function() {
        if ($(this).val() == '1') {
            element.style.display = 'block';
        } else {
            element.style.display = 'none';
        }
    });
});

$(function() {
    var publish_1 = document.getElementById('publish_1');
    var publish_2 = document.getElementById('publish_2');
    $('input:radio[name="options"]').change(function() {
        if ($(this).val() == '1') {
            publish_1.hidden = false;
            publish_2.hidden = true;
        } else {
            publish_1.hidden = true;
            publish_2.hidden = false;
        }
    });
});

$(function() {
    var scholarshipGranted = document.getElementById('scholarshipGranted');
    var scholarshipBeing = document.getElementById('scholarshipBeing');
    $('input:radio[name="scholarship"]').change(function() {
        if ($(this).val() == '1') {
            scholarshipGranted.style.display = 'block';
            scholarshipBeing.style.display = 'none';
        } else {
            scholarshipGranted.style.display = 'none';
            scholarshipBeing.style.display = 'block';
        }
    });
});


$('textarea').keyup(function() {

    var characterCount = $(this).val().length,
        current = $('#current'),
        maximum = $('#maximum'),
        theCount = $('#the-count');

    current.text(characterCount);


    /*This isn't entirely necessary, just playin around*/
    if (characterCount < 70) {
        current.css('color', '#666');
    }
    if (characterCount > 70 && characterCount < 90) {
        current.css('color', '#6d5555');
    }
    if (characterCount > 90 && characterCount < 100) {
        current.css('color', '#793535');
    }
    if (characterCount > 100 && characterCount < 120) {
        current.css('color', '#841c1c');
    }
    if (characterCount > 120 && characterCount < 139) {
        current.css('color', '#8f0001');
    }

    if (characterCount >= 140) {
        maximum.css('color', '#8f0001');
        current.css('color', '#8f0001');
        theCount.css('font-weight', 'bold');
    } else {
        maximum.css('color', '#666');
        theCount.css('font-weight', 'normal');
    }


});

function restrictInput(event) {
    var input = event.target;
    var value = input.value;
    input.value = value.replace(/\D/g, '');
}

function CheckWithDrawn(x) {
    var x = parseFloat(x);
    var list_pub = [
        document.getElementById('publish_1'),
        document.getElementById('publish_2'),
        document.getElementById('publish_3'),
        document.getElementById('publish_4'),
        document.getElementById('publish_5')
    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;

    } else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;

    } else if (x == 2) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;

    } else if (x == 3) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;

    } else if (x == 4) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = true;

    } else if (x == 5) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;

    }
}

function educationalStatus(x) {
    var x = parseFloat(x);
    var list_pub = [
        document.getElementById('publish_1'),
        document.getElementById('publish_2'),

    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;


    } else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;


    } else if (x == 2) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = false;
    }
}

var student = document.getElementById('student');
var element_1 = document.getElementById('hidden_1');
var transcript_1 = document.getElementById('transcript_1');
var element_2 = document.getElementById('hidden_2');
var currentOther = document.getElementById('currentOther');
var currentOther_1 = document.getElementById('currentOther_1');

student.addEventListener('change', () => {
    if (student.checked) {
        element_1.hidden = false;
    } else {
        element_1.hidden = true;
    }
});

transcript_1.addEventListener('change', () => {
    if (transcript_1.checked) {
        element_2.hidden = false;
    } else {
        element_2.hidden = true;
    }
});

currentOther.addEventListener('change', () => {
    if (currentOther.checked) {
        currentOther_1.hidden = false;
    } else {
        currentOther_1.hidden = true;
    }
});

var graduation = document.getElementById('graduation');
var hiddenG_1 = document.getElementById('hiddenG_1');
var transcript_2 = document.getElementById('transcript_2');
var hiddenG_2 = document.getElementById('hiddenG_2');
var graduationOther = document.getElementById('graduationOther');
var graduationOther_1 = document.getElementById('graduationOther_1');

graduation.addEventListener('change', () => {
    if (graduation.checked) {
        hiddenG_1.hidden = false;
    } else {
        hiddenG_1.hidden = true;
    }
});

transcript_2.addEventListener('change', () => {
    if (transcript_2.checked) {
        hiddenG_2.hidden = false;
    } else {
        hiddenG_2.hidden = true;
    }
});

graduationOther.addEventListener('change', () => {
    if (graduationOther.checked) {
        graduationOther_1.hidden = false;
    } else {
        graduationOther_1.hidden = true;
    }
});