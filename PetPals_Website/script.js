
function setImages(images) {
    const imgElements = document.getElementsByClassName("img-1");
    for (let i = 0; i < imgElements.length; i++) {
        imgElements[i].setAttribute("src", images[i]);
    }
}


function setHeaders(headers) {
    const headerElements = document.getElementsByClassName("p-header");
    for (let i = 0; i < headerElements.length; i++) {
        headerElements[i].innerHTML = headers[i];
    }
}


function filterFood() {
    const images = [
        "images/food2.png", "images/food1.png", "images/food3.png", "images/food4.png",
        "images/food3.png", "images/food4.png", "images/food1.png", "images/food2.png",
        "images/food2.png", "images/food3.png"
    ];
    setImages(images);
    foodHeader();
}

function filterAll() {
    const images = [
        "images/food2.png", "images/food3.png", "images/food1.png", "images/food4.png",
        "images/food5.png", "images/food6.png", "images/food7.png", "images/food8.png",
        "images/food9.png", "images/food10.png"
    ];
    setImages(images);
    allHeader();
}

function filterToys() {
    const images = [
        "images/food2.png", "images/food3.png", "images/food1.png", "images/food4.png",
        "images/food5.png", "images/food6.png", "images/food7.png", "images/food8.png",
        "images/food9.png", "images/food10.png"
    ];
    setImages(images);
    toysHeader();
}

function filterAccessories() {
    const images = [
        "images/food10.png", "images/food9.png", "images/food8.png", "images/food7.png",
        "images/food5.png", "images/food6.png", "images/food7.png", "images/food8.png",
        "images/food9.png", "images/food10.png"
    ];
    setImages(images);
    accessoriesHeader();
}


function accessoriesHeader() {
    const headers = [
        "pet's collar", "pet's collar", "pet's collar", "pet's collar", "cat sofa",
        "pet's collar", "pet's collar", "pet's collar", "pet's collar", "pet's collar"
    ];
    setHeaders(headers);
}

function foodHeader() {
    const headers = [
        "cat dry food", "cat dry food", "cat dry food", "Dog food", "cat dry food",
        "Dog food", "cat dry food", "cat dry food", "cat dry food", "cat dry food"
    ];
    setHeaders(headers);
}

function allHeader() {
    const headers = [
        "cat dry food", "cat dry food", "cat dry food", "dog food", "cat sofa",
        "pet's collar", "pet's collar", "pet's collar", "pet's collar", "pet's collar"
    ];
    setHeaders(headers);
}

function toysHeader() {
    const headers = [
        "toy bone", "toy mouse", "toy ball", "toy frisbee", "toy rope",
        "toy plush", "toy ring", "toy squeaky", "toy chew", "toy puzzle"
    ];
    setHeaders(headers);
}


document.getElementsByClassName("button-food")[0].addEventListener("click", filterFood);
document.getElementsByClassName("button-all")[0].addEventListener("click", filterAll);
document.getElementsByClassName("button-toys")[0].addEventListener("click", filterToys);
document.getElementsByClassName("button-accessory")[0].addEventListener("click", filterAccessories);
