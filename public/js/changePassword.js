const oldPasswordInput = document.getElementById("input-change-password-old-password");
const newPasswordInput = document.getElementById("input-change-password-new-password-1");
const confirmedPasswordInput = document.getElementById("input-change-password-new-password-2");

function isPassword(password) {
    return /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.* )(?=.*[^a-zA-Z0-9]).{8,16}$/.test(password);
}

function arePasswordsSame(password, confirmedPassword) {
    return password === confirmedPassword;
}

function markValidation(element, condition) {
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid");
}

function validateOldPassword() {
    setTimeout(function () {
            const condition = isPassword(
                oldPasswordInput.value
            );
            markValidation(oldPasswordInput, condition)
        }
        , 1000
    );
}

function validateNewPassword() {
    setTimeout(function () {
            const condition = isPassword(
                newPasswordInput.value
            );
            markValidation(newPasswordInput, condition)
        }
        , 1000
    );
}


function validateConfirmedPassword() {
    setTimeout(function () {
            const condition = isPassword(
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition)
        }
        , 1000
    );
}

function validatePassword() {
    setTimeout(function () {
            const condition = arePasswordsSame(
                newPasswordInput.value,
                confirmedPasswordInput.value
            );
            markValidation(confirmedPasswordInput, condition);
        },
        1000
    );
}

console.log(oldPasswordInput)
oldPasswordInput.addEventListener('keyup', validateOldPassword);
newPasswordInput.addEventListener('keyup', validateNewPassword);
confirmedPasswordInput.addEventListener('keyup', validateConfirmedPassword);
confirmedPasswordInput.addEventListener('keyup', validatePassword);