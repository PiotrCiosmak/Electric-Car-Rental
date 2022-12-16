const search = document.querySelector('input[placeholder="wyszukaj"]');
const carContainer = document.querySelector(".cars");

search.addEventListener("keyup", function (event) {
    if (event.key === "Enter") {
        event.preventDefault();

        const data = {search: this.value};

        fetch("/search", {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(data)
        }).then(function (response) {
            console.log(response)
            return response.json();
        }).then(function (cars) {
            carContainer.innerHTML = "";
            loadCars(cars)
        });
    }
});

function loadCars(cars) {
    cars.forEach(car => {
        console.log(car);
        createCar(car);
    })
}

function createCar(car) {
    const template = document.querySelector("#car-template");

    const clone = template.content.cloneNode(true);

    /*    const imgSource = clone.querySelector("img");
        imgSource.innerHTML = car.img_source;*/
    const imgSource = clone.querySelector("img");
    imgSource.innerHTML = car.name;
    const carName = clone.querySelector(".car-name");
    carName.innerHTML = car.name;
    const carPrice = clone.querySelector("p")
    carPrice.innerHTML = car.name;
    const timeTo100 = clone.querySelector(".car-time-to-100");
    timeTo100.innerHTML = car.name;
    /*const timeTo100 = clone.querySelector(".car-time-to-100");
    timeTo100.innerHTML = car.timeTo100;*/

    carContainer.appendChild(car);
}