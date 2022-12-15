let form = document.getElementById("createForm");

function validateContact() {
    let eventContact = form["eventContact"].value;
    let contactError = document.getElementById("contactError");
    if (eventContact == "" || eventContact[0] != '0' || eventContact.length != 10 || isNaN(eventContact)) {
        contactError.innerHTML = "Please enter a valid contact number";
        return false;
    }
    contactError.innerHTML = "";
    return true;
}

function validateDate() {
    let eventDate = form["eventDate"].value;
    let dateError = document.getElementById("dateError");

    let today = new Date();
    let eventday = new Date(eventDate);

    if (eventday < today) {
        dateError.innerHTML = "Please enter a valid date";
        return false;
    }

    dateError.innerHTML = "";
    return true;
}

function isValidated() {
    return validateContact() && validateDate();
}