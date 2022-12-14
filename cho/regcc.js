let form = document.getElementById("registerCC");
let areas = [];

function getData() {

    fetch("getDataCC.php", {
        method: "GET",
        headers: {
            "Return-Type": "application/json, text/plain, */*",
            "Content-Type": "application/json",
        },
    })
        .then(response => response.json())
        .then(data => {
            areas = tolowercase(data['areas']);
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
    let contact = form["contactNumber"].value;
    let contactError = document.getElementById("contactError");
    if (contact == "" || contact[0] != '0' || contact.length != 10 || isNaN(contact)) {
        contactError.innerHTML = "Please enter a valid contact number";
        return false;
    }
    contactError.innerHTML = "";
    return true;
}

function validateFax() {
    let fax = form["fax"].value;
    let faxError = document.getElementById("faxError");
    if (fax == "" || fax[0] != '0' || fax.length != 10 || isNaN(fax)) {
        faxError.innerHTML = "Please enter a valid fax number";
        return false;
    }
    faxError.innerHTML = "";
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

function validateAreas() {
    let area = form["area"].value;
    let areaError = document.getElementById("areaError");
    if (areas.includes(area.toLowerCase())) {
        areaError.innerHTML = "There is a CC in this area already";
        return false;
    }
    areaError.innerHTML = "";
    return true;
}

function isValidated() {
    return validateContact() && validateEmail() && validateAreas();
}