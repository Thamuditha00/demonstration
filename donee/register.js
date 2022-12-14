let form = document.getElementById("registerDonee");
let usernames = [];
let NICs = [];

function getData() {

    fetch("getRegisterData.php", {
        method: "GET",
        headers: {
            "Return-Type": "application/json, text/plain, */*",
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            usernames = tolowercase(data['usernames']);
            NICs = data['NICs'];
        })
        .catch(error => console.log(error));
}

function tolowercase(arr) {
    for (let i = 0; i < arr.length; i++) {
        arr[i] = arr[i].toLowerCase();
    }
    return arr;
}

getData();

function validateUsername() {
    let username = form["username"].value;
    let usernameError = document.getElementById("usernameError");
    if (usernames.includes(username)) {
        usernameError.innerHTML = "Username already exists";
        return false;
    }
    usernameError.innerHTML = "";
    return true;
}

function validatePassword() {
    let password = form["password"].value;
    let passwordError = document.getElementById("passwordError");
    if (password.length < 8) {
        passwordError.innerHTML = "Password length should be greater than 8";
        return false;
    }
    if (password.length > 15) {
        passwordError.innerHTML = "Password length should be less than 15";
        return false;
    }
    if (!password.match(/[a-z]/g)) {
        passwordError.innerHTML = "There should be atleast one lowercase letter";
        return false;
    }
    if (!password.match(/[A-Z]/g)) {
        passwordError.innerHTML = "There should be atleast one uppercase letter";
        return false;
    }
    if (!password.match(/[0-9]/g)) {
        passwordError.innerHTML = "There should be atleast one number";
        return false;
    }
    if (!password.match(/[^a-zA-Z\d]/g)) {
        passwordError.innerHTML = "There should be atleast one special character";
        return false;
    }
    passwordError.innerHTML = "";
    return true;
}

function validateNIC() {
    let NIC = form["NIC"].value;
    let NICError = document.getElementById("NICError");
    if (NIC.length != 12 || !NIC.match(/^[0-9]+$/)) {
        NICError.innerHTML = "Please enter a valid NIC";
        return false;
    }
    if (NICs.includes(NIC)) {
        NICError.innerHTML = "NIC already exists";
        return false;
    }
    NICError.innerHTML = "";
    return true;
}

function validateEmail() {
    let email = form["email"].value;
    let emailError = document.getElementById("emailError");
    if (!email.match(
        /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
    )) {
        emailError.innerHTML = "Please enter a valid email";
        return false;
    }
    emailError.innerHTML = "";
    return true;
}

function validateContact() {
    let contact = form["contactno"].value;
    let contactError = document.getElementById("contactError");
    if (contact == "" || contact[0] != '0' || contact.length != 10 || isNaN(contact)) {
        contactError.innerHTML = "Please enter a valid contact number";
        return false;
    }
    contactError.innerHTML = "";
    return true;
}

function isValidated() {
    return validateUsername() && validatePassword() && validateNIC() && validateEmail() && validateContact();
}