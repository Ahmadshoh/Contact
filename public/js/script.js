let phoneButton = document.getElementById('addPhoneButton');
let phoneBlock = document.getElementById('phoneBlock');

let emailButton = document.getElementById('addEmailButton');
let emailBlock = document.getElementById('emailBlock');


phoneButton.onclick = function () {
    let phoneInput = document.createElement("input");
    phoneInput.name = "phone[]";
    phoneInput.type = "tel";
    phoneInput.id = "phone";
    phoneInput.value = "";
    phoneInput.className = "form-control mt-2";
    phoneInput.placeholder = "Телефон"
    phoneInput.maxLength = 13;
    phoneBlock.appendChild(phoneInput);
}


emailButton.onclick = function () {
    let emailInput = document.createElement("input");
    emailInput.name = "email[]";
    emailInput.type = "email";
    emailInput.id = "email";
    emailInput.value = "";
    emailInput.className = "form-control mt-2";
    emailInput.placeholder = "Email"
    emailBlock.appendChild(emailInput);
}
