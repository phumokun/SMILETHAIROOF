
var password = document.getElementById("password");
var con_password = document.getElementById("con_password");

function validatePassword(){

    if(password.value != con_password.value) {
        con_password.setCustomValidity("รหัสผ่านไม่ตรงกัน");
    } else {
        con_password.setCustomValidity('');
    }
}
password.onchange = validatePassword;
con_password.onkeyup = validatePassword;


$('#password').keyup(function() {
    var password = $('#password').val();
    if (checkStrength(password) == false) {
    }
});

function checkStrength(password) {
    var strength = 0;


    //If password contains both lower and uppercase characters, increase strength value.
    if (password.match(/([a-z].*[A-Z])|([A-Z].*[a-z])/)) {
        strength += 1;
    }

    //If it has numbers and characters, increase strength value.
    if (password.match(/([a-zA-Z])/) && password.match(/([0-9])/)) {
        strength += 1;
    }

    //If it has one special character, increase strength value.
    if (password.match(/([!,%,&,@,#,$,^,*,?,_,~])/)) {
        strength += 1;
    }

    if (password.length > 7) {
        strength += 1;
    }


    // If value is less than 2

    if (strength < 2) {
        $('#result').addClass('text-danger').text('ต่ำ');
    } else if (strength == 2) {
        $('#result').addClass('text-warning').text('ปานกลาง');
        return 'ปานกลาง'
    } else if (strength == 4) {
        $('#result').addClass('text-success').text('สูง');
        return 'สูง'
    }

}


