function CheckPrefix(val, prefixid) {
    var element = document.getElementById(prefixid);
    // var el = document.getElementById('labeOtherPrefix');
    // element.style.visibility = 'hidden';
    if (val == 'other') {
        element.style.display = 'block';
    } else {
        element.style.display = 'none';
    }
}

function CheckPlan(val) {
    var master = document.getElementById('optionMaster');
    var doctor = document.getElementById('optionDoctor');
    var plan = document.getElementById('plan');
    // var el = document.getElementById('labeOtherPrefix');
    // element.style.visibility = 'hidden';
    if (val == 'master') {
        doctor.style.display = 'none';
        master.style.display = 'block';
        plan.value = "";
    } else if (val == 'doctor') {
        // el.style.display = 'hidden';
        master.style.display = 'none';
        doctor.style.display = 'block';
        plan.value = "";

    }
}

function CheckPrefix_C(val, prefixid) {
    var element = document.getElementById(prefixid);

    // var el = document.getElementById('labeOtherPrefix');

    // element.style.visibility = 'hidden';

    if (val == 'other') {
        element.style.visibility = 'visible';


    } else {
        // el.style.display = 'hidden';
        element.style.visibility = 'hidden';

    }
}

function CheckTotalRadio() {
    var pri = document.getElementById('total_private');
    var pub_a = document.getElementById('public_agency');
    var pub = document.getElementById('total_public');
    var radio_pri = document.getElementById('private');
    var radio_pub = document.getElementById('public');

    if (radio_pri.checked == true) {
        pub.disabled = true;
        pub_a.disabled = true;
        pri.disabled = false;
        pub.value = '';
        pub_a.value = '';
    } else if (radio_pub.checked == true) {
        pub.disabled = false;
        pub_a.disabled = false;
        pri.disabled = true;
        pri.value = '';
    } else {
        pub.disabled = true;
        pub_a.disabled = true;
        pri.disabled = true;
    }
}

function CheckBoxHide(id) {
    var checkbox = [
        document.getElementById('published_nation'),
        document.getElementById('published_inter'),
        document.getElementById('present_nation'),
        document.getElementById('present_inter')
    ];
    var num = [
        document.getElementById('total_published_nation'),
        document.getElementById('total_published_inter'),
        document.getElementById('total_present_nation'),
        document.getElementById('total_present_inter')
    ];
    for (var x = 0; x < 4; x++) {
        if (checkbox[x].checked == true) {
            num[x].disabled = false;
        } else {
            num[x].value = 0;
            num[x].disabled = true;

            if (checkbox[2].checked == false) {
                checkbox[3].disabled = false;
                num[3].setAttribute("max", 5);
                CheckListPre(parseFloat(num[3].value));

            }
            if (checkbox[3].checked == false) {
                num[2].setAttribute("max", 5);
                checkbox[2].disabled = false;
                CheckListPre(parseFloat(num[2].value));
            }
            if (checkbox[0].checked == false) {
                num[1].setAttribute("max", 5);
                checkbox[1].disabled = false;
                CheckListPub(parseFloat(num[1].value));
            }
            if (checkbox[1].checked == false) {
                num[0].setAttribute("max", 5);
                checkbox[0].disabled = false;
                CheckListPub(parseFloat(num[0].value));
            }
        }

    }


}

function enforceMinMax(el, id) {

    var input1 = document.getElementById('total_present_nation');
    var input2 = document.getElementById('total_present_inter');
    var input3 = document.getElementById('total_published_nation');
    var input4 = document.getElementById('total_published_inter');
    var checkbox_3 = document.getElementById('published_nation');
    var checkbox_4 = document.getElementById('published_inter');
    var checkbox_1 = document.getElementById('present_nation');
    var checkbox_2 = document.getElementById('present_inter');

    var list_pub = [
        document.getElementById('publish_1'),
        document.getElementById('publish_2'),
        document.getElementById('publish_3'),
        document.getElementById('publish_4'),
        document.getElementById('publish_5')
    ]
    var list_pre = [
        document.getElementById('present_1'),
        document.getElementById('present_2'),
        document.getElementById('present_3'),
        document.getElementById('present_4'),
        document.getElementById('present_5')
    ]

    var present = false;
    var published = false;




    if (parseFloat(input1.value) + parseFloat(input2.value) <= 5) {
        if (id == 'total_present_nation') {
            present = true;
            var maxInput1 = 5 - parseFloat(input1.value);
            document.getElementById("total_present_inter").setAttribute("max", maxInput1.toString());

            if (parseFloat(input1.value) == 5) {
                checkbox_2.disabled = true;
                checkbox_2.checked = false;
                input2.value = 0;
                input2.disabled = true;
            } else {
                checkbox_2.disabled = false;
            }
        } else if (id == 'total_present_inter') {
            present = true;
            var maxInput2 = 5 - parseFloat(input2.value);
            document.getElementById("total_present_nation").setAttribute("max", maxInput2.toString());
            if (parseFloat(input2.value) == 5) {
                checkbox_1.disabled = true;
                checkbox_1.checked = false;
                input1.value = 0;
                input1.disabled = true;
            } else {
                checkbox_1.disabled = false;
            }
        }

    }
    if (parseFloat(input3.value) + parseFloat(input4.value) <= 5) {
        if (id == 'total_published_nation') {
            published = true;
            var maxInput3 = 5 - parseFloat(input3.value);
            document.getElementById("total_published_inter").setAttribute("max", maxInput3.toString());
            if (parseFloat(input3.value) == 5) {
                checkbox_4.disabled = true;
                checkbox_4.checked = false;
                input4.value = 0;
                input4.disabled = true;
            } else {
                checkbox_4.disabled = false;
            }
        } else if (id == 'total_published_inter') {
            published = true;
            var maxInput4 = 5 - parseFloat(input4.value);
            document.getElementById("total_published_nation").setAttribute("max", maxInput4.toString());
            if (parseFloat(input4.value) == 5) {
                checkbox_3.disabled = true;
                checkbox_3.checked = false;
                input3.value = 0;
                input3.disabled = true;
            } else {
                checkbox_3.disabled = false;
            }
        }

    }
    if (published) {
        var x = parseFloat(input3.value) + parseFloat(input4.value);
        CheckListPub(x);
    }


    if (present) {
        var y = parseFloat(input1.value) + parseFloat(input2.value);
        CheckListPre(y);
    }

    if (el.value != "") {
        if (parseInt(el.value) < parseInt(el.min)) {
            el.value = el.min;
        }
        if (parseInt(el.value) > parseInt(el.max)) {
            el.value = el.max;
        }
    }



}
// function updateMaxValues() {
//     var input1 = parseFloat(document.getElementById("input1").value);
//     var maxInput2 = 5 - input1;

//     document.getElementById("input2").setAttribute("max", maxInput2.toString());
//     document.getElementById("input1").setAttribute("max", maxInput2.toString());
//   }
function CheckListPub(x) {
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


function CheckListPre(x) {
    var list_pre = [
        document.getElementById('present_1'),
        document.getElementById('present_2'),
        document.getElementById('present_3'),
        document.getElementById('present_4'),
        document.getElementById('present_5')
    ]
    if (x == 0) {
        list_pre[0].hidden = true;
        list_pre[1].hidden = true;
        list_pre[2].hidden = true;
        list_pre[3].hidden = true;
        list_pre[4].hidden = true;

    } else if (x == 1) {
        list_pre[0].hidden = false;
        list_pre[1].hidden = true;
        list_pre[2].hidden = true;
        list_pre[3].hidden = true;
        list_pre[4].hidden = true;

    } else if (x == 2) {
        list_pre[0].hidden = false;
        list_pre[1].hidden = false;
        list_pre[2].hidden = true;
        list_pre[3].hidden = true;
        list_pre[4].hidden = true;

    } else if (x == 3) {
        list_pre[0].hidden = false;
        list_pre[1].hidden = false;
        list_pre[2].hidden = false;
        list_pre[3].hidden = true;
        list_pre[4].hidden = true;

    } else if (x == 4) {
        list_pre[0].hidden = false;
        list_pre[1].hidden = false;
        list_pre[2].hidden = false;
        list_pre[3].hidden = false;
        list_pre[4].hidden = true;

    } else if (x == 5) {
        list_pre[0].hidden = false;
        list_pre[1].hidden = false;
        list_pre[2].hidden = false;
        list_pre[3].hidden = false;
        list_pre[4].hidden = false;

    }
}

function CheckKeyBoard(el) {
    if (el.value != "") {
        if (parseInt(el.value) < parseInt(el.min)) {
            el.value = el.min;
        }
        if (parseInt(el.value) > parseInt(el.max)) {
            el.value = el.max;
        }
    }
}

function restrictInput(event) {
    var input = event.target;
    var value = input.value;
    input.value = value.replace(/\D/g, '');
}