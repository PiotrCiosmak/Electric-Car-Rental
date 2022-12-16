const form = document.querySelector("form");
const emailInput = form.querySelector('input[name="email"]');
const confirmedPasswordInput = form.querySelector('input[name="password"]');


function isEmail(email) {
    return /^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/.test(email);
}

function isPassword(password) {
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/.test(password);
}

function markValidation(element, condition) {
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid");
}

function validateEmail() {
    setTimeout(function () {
            markValidation(emailInput, isEmail(emailInput.value))
        }
        , 1000
    );
}

emailInput.addEventListener('keyup', validateEmail);

function validatePassword() {
    setTimeout(function () {
            const condition = isPassword(
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition)
        }
        , 1000
    );
}

confirmedPasswordInput.addEventListener('keyup', validatePassword);