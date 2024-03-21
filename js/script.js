function CheckPlan(val) {
    var master = document.getElementById('optionMaster');
    var doctor = document.getElementById('optionDoctor');

    if (val == 'master') {
        doctor.style.display = 'none';
        master.style.display = 'block';

    } else if (val == 'doctor') {
        master.style.display = 'none';
        doctor.style.display = 'block';

    }
}

function CheckPrefix_C(val, prefixid) {
    var element = document.getElementById(prefixid);
    if (val == 'other') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

function restrictInput(event) {
    var input = event.target;
    var value = input.value;
    input.value = value.replace(/\D/g, '');
}

function CheckBoxHide() {
    var checkbox = [
        document.getElementById('copyAbstarctCheck'),
        document.getElementById('hardCopyCheck'),
    ];
    var num = [
        document.getElementById('copyAbstarct'),
        document.getElementById('hardCopy'),
    ];
    for (var x = 0; x < 2; x++) {
        if (checkbox[x].checked == true) {
            num[x].disabled = false;
        } else {
            num[x].disabled = true;
            num[x].value = null;
        }
    }
}

function CheckBoxHideOther() {
    var checkbox = [
        document.getElementById('checkBoxPhoxyOther'),
    ];
    var num = [
        document.getElementById('inputTextPhoxyOther'),
    ];
    for (var x = 0; x < 2; x++) {
        if (checkbox[x].checked == true) {
            num[x].disabled = false;
        } else {
            num[x].disabled = true;
            num[x].value = null;
        }
    }
}

function CheckListPub(x) {
    x = parseFloat(x);
    var list_pub = [
        document.getElementById('publish_1'),
        document.getElementById('publish_2'),
        document.getElementById('publish_3'),
        document.getElementById('publish_4'),
    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;

    }
    else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;

    }
    else if (x == 2) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;

    }
    else if (x == 3) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = true;

    }
    else if (x == 4) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;

    }
}

function CheckList(x) {
    x = parseFloat(x);
    var list_pub = [
        document.getElementById('publish_1'),
        document.getElementById('publish_2'),
        document.getElementById('publish_3'),
        document.getElementById('publish_4'),
        document.getElementById('publish_5'),
        document.getElementById('publish_6'),
        document.getElementById('publish_7'),
        document.getElementById('publish_8'),
    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 2) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 3) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 4) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 5) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 6) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 7) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = true;
    } else if (x == 8) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
    }
}

function CheckList8_1(x) {
    x = parseFloat(x);
    var list_pub = [
        document.getElementById('publish_1_1'),
        document.getElementById('publish_2_1'),
        document.getElementById('publish_3_1'),
        document.getElementById('publish_4_1'),
        document.getElementById('publish_5_1'),
        document.getElementById('publish_6_1'),
        document.getElementById('publish_7_1'),
        document.getElementById('publish_8_1'),
    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 2) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 3) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;

    } else if (x == 4) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 5) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 6) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
    } else if (x == 7) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = true;
    } else if (x == 8) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
    }
}

function CheckList15(x) {
    x = parseFloat(x);
    var list_pub = [
        document.getElementById('pub1'),
        document.getElementById('pub2'),
        document.getElementById('pub3'),
        document.getElementById('pub4'),
        document.getElementById('pub5'),
        document.getElementById('pub6'),
        document.getElementById('pub7'),
        document.getElementById('pub8'),
        document.getElementById('pub9'),
        document.getElementById('pub10'),
        document.getElementById('pub11'),
        document.getElementById('pub12'),
        document.getElementById('pub13'),
        document.getElementById('pub14'),
        document.getElementById('pub15'),
    ]
    if (x == 0) {
        list_pub[0].hidden = true;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 1) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = true;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;

    } else if (x == 2) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = true;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;

    } else if (x == 3) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = true;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;

    } else if (x == 4) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = true;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 5) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = true;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 6) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = true;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 7) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = true;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 8) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = true;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 9) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = true;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 10) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = true;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 11) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = false;
        list_pub[11].hidden = true;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 12) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = false;
        list_pub[11].hidden = false;
        list_pub[12].hidden = true;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 13) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = false;
        list_pub[11].hidden = false;
        list_pub[12].hidden = false;
        list_pub[13].hidden = true;
        list_pub[14].hidden = true;
    } else if (x == 14) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = false;
        list_pub[11].hidden = false;
        list_pub[12].hidden = false;
        list_pub[13].hidden = false;
        list_pub[14].hidden = true;
    } else if (x == 15) {
        list_pub[0].hidden = false;
        list_pub[1].hidden = false;
        list_pub[2].hidden = false;
        list_pub[3].hidden = false;
        list_pub[4].hidden = false;
        list_pub[5].hidden = false;
        list_pub[6].hidden = false;
        list_pub[7].hidden = false;
        list_pub[8].hidden = false;
        list_pub[9].hidden = false;
        list_pub[10].hidden = false;
        list_pub[11].hidden = false;
        list_pub[12].hidden = false;
        list_pub[13].hidden = false;
        list_pub[14].hidden = false;
    } 
}

$('#textarea1').keyup(function () {
    var characterCount = $(this).val().length,
        current = $('#current1'),
        maximum = $('#maximum1'),
        theCount = $('#the-count1');

    current.text(characterCount);
});

$('#textarea2').keyup(function () {
    var characterCount = $(this).val().length,
        current = $('#current2'),
        maximum = $('#maximum2'),
        theCount = $('#the-count2');

    current.text(characterCount);
});

(() => {
    'use strict'

    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    const forms = document.querySelectorAll('.needs-validation')

    // Loop over them and prevent submission
    Array.from(forms).forEach(form => {
        form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
        }, false)
    })
})()



