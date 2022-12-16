const form = document.querySelector("form");
const newPriceInput = form.querySelector('input[name="car-price"]');

function isGreaterThenZero(price) {
    return price > 0;
}

function markValidation(element, condition) {
    !condition ? element.classList.add("no-valid") : element.classList.remove("no-valid");
}

function valdatePrice() {
    setTimeout(function () {
            const condition = isGreaterThenZero(
                newPriceInput.value
            );
            markValidation(newPriceInput, condition)
        }
        , 1000
    );
}

newPriceInput.addEventListener('keyup', valdatePrice);