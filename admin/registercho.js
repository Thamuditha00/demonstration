let form = document.getElementById("registerCHO");
let chos = [];
let usernames = [];

function getData() {

    fetch("getData.php", {
        method: "GET",
        headers: {
            "Return-Type": "application/json, text/plain, */*",
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            chos = tolowercase(data['CHO']);
            usernames = data['usernames'];
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


function validateContact() {
    let contact = form["ContactNo"].value;
    let contactError = document.getElementById("contactError");
    if (contact == "" || contact[0] != '0' || contact.length != 10 || isNaN(contact)) {
        contactError.innerHTML = "Please enter a valid contact number";
        return false;
    }
    contactError.innerHTML = "";
    return true;
}

function validateEmail() {
    let email = form["Email"].value;
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

function validateDistrict() {
    let district = form["District"].value;
    let districtError = document.getElementById("districtError");
    if (chos.includes(district.toLowerCase())) {
        districtError.innerHTML = "CHO exists for this district";
        return false;
    }
    districtError.innerHTML = "";
    return true;
}

function isValidated() {
    return validateContact() && validateEmail() && validatePassword();
}