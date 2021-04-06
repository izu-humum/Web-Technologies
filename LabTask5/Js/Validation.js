function validateForm() {
    var fname = document.getElementById("firstname").value;
    var email = document.getElementById("email").value;
    var uname = document.getElementById("username").value;
    var pass = document.getElementById("password").value;
    var cpass = document.getElementById("cpassword").value;
    var regvalid = document.getElementById("regvalid");
    var birthday = document.getElementById("birthday");
    var mailformat = /^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

    if (fname == "" || uname == "" || pass == "" || cpass == "" || email == "" || birthday == "") {
        regvalid.innerHTML = "ALL fields required.";
        return false;
    }
    else if (email.match(mailformat) == false) {
        regvalid.innerHTML = "email must contain @";
        return false;
    }
    else if (uname.length < 5) {
        regvalid.innerHTML = "User Name must be 5 characters long";
        return false;
    }
    else if (pass.length < 8) {
        regvalid.innerHTML = "Password must be 8 characters long";
        return false;
    }
    else if (pass.value != cpass.value) {
        regvalid.innerHTML = "Password must be same";
        return false;
    }
    else if (document.getElementById("male").checked == false && document.getElementById("female").checked == false && document.getElementById("other").checked == false) {
        regvalid.innerHTML = "Please select a radio button";
        return false;
    }
}