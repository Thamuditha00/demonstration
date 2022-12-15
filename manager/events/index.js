let popup = document.getElementById('popup');
let poptext = document.querySelectorAll('.popuptext');
let categoryIcon = document.getElementById('categoryIcon');

function setPopupText(data) {
    categoryIcon.src = `${data['categoryIcon']}`;
    poptext.forEach(function (poptext) {
        poptext.innerHTML = `<p>${data[poptext.getAttribute('id')]}</p>`;
    });
}

function displayPopup() {
    popup.style.display = 'block';
}

function closePopup() {
    popup.style.display = 'none';
}

let closebutton = document.getElementById('closebutton');

closebutton.addEventListener('click', closePopup);
// popup.addEventListener('click', closePopup);

let eventCards = document.querySelectorAll('.eventCard');


eventCards.forEach(function (eventCard) {
    eventCard.addEventListener('click', function () {
        let id = eventCard.getAttribute('id');

        fetch('popup.php', {
            method: 'POST',
            headers: {
                'Accept': 'application/json, text/plain, */*',
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: id })
        }).then(function (res) {
            fetch_status = res.status;
            return res.json();
        }).then(function (json) {
            if (fetch_status === 200) {
                setPopupText(json);
                displayPopup();
                console.log(json);
            }
        }).catch(function (err) {
            console.log(err);
        });


    });
});
