let form = document.getElementById("reqForm");
let subcategoryLabel = document.getElementById("subcategory");
let subcategorydryfood = document.getElementById("subcategorydryfood");
let subcategoryclothes = document.getElementById("subcategoryclothes");
let subcategorystationary = document.getElementById("subcategorystationary");

let category = document.getElementById("category");

function showElement(element) {
    element.style.display = "block";
}

function hideElement(element) {
    element.style.display = "none";
}

function showSubcategoryLabel() {
    showElement(subcategoryLabel);
}

function hideSubcategoryLabel() {
    hideElement(subcategoryLabel);
}

function showSubcategory() {

    if (category.value == "1") {
        showSubcategoryLabel();
        showElement(subcategorydryfood);
        hideElement(subcategoryclothes);
        hideElement(subcategorystationary);
    } else if (category.value == "2") {
        showSubcategoryLabel();
        showElement(subcategoryclothes);
        hideElement(subcategorydryfood);
        hideElement(subcategorystationary);
    } else if (category.value == "3") {
        showSubcategoryLabel();
        showElement(subcategorystationary);
        hideElement(subcategorydryfood);
        hideElement(subcategoryclothes);
    } else {
        hideSubcategoryLabel();
        hideElement(subcategorydryfood);
        hideElement(subcategoryclothes);
        hideElement(subcategorystationary);
    }

}

function checkNull(element) {
    if (element.value == "") {
        return true;
    }
    return false;
}

function isValidated() {
    return !checkNull(subcategorydryfood) || !checkNull(subcategoryclothes) || !checkNull(subcategorystationary);
}
