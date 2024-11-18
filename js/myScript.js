//This function will be executed once the user clicks on the menu icon
function showSidebar(){
    //Displays the menu items
    const sideBar = document.querySelector(".menu-list");
    sideBar.style.display = "flex";

    //Displays the "X" at the top to hidde the navigation
    const exit = document.querySelector(".bx-x");
    exit.style.display = "flex";
}

//This function will be executed once the user clicks on the "X"
function hideSidebar(){
    //Hiddes the menu items
    const noSideBar = document.querySelector(".menu-list");
    noSideBar.style.display = "none";
}

//Displays the correct image for the first benefit and hides the other images
function benefit1(){
    const addImage = document.querySelector("#benefit-image-1");
    addImage.style.display = "flex";

    const removeImage2 = document.querySelector("#benefit-image-2");
    removeImage2.style.display = "none";

    const removeImage3 = document.querySelector("#benefit-image-3");
    removeImage3.style.display = "none";

    const removeImage4 = document.querySelector("#benefit-image-4");
    removeImage4.style.display = "none";
}

//Displays the correct image for the second benefit and hides other images
function benefit2(){
    const removeImage1 = document.querySelector("#benefit-image-1");
    removeImage1.style.display = "none";

    const removeImage3 = document.querySelector("#benefit-image-3");
    removeImage3.style.display = "none";

    const addImage = document.querySelector("#benefit-image-2");
    addImage.style.display = "flex";

    const removeImage4 = document.querySelector("#benefit-image-4");
    removeImage4.style.display = "none";
}

//Displays the correct image for the third benefit and hides other images
function benefit3(){
    const addImage = document.querySelector("#benefit-image-3");
    addImage.style.display = "flex";

    const removeImage1 = document.querySelector("#benefit-image-1");
    removeImage1.style.display = "none";

    const removeImage2 = document.querySelector("#benefit-image-2");
    removeImage2.style.display = "none";

    const removeImage4 = document.querySelector("#benefit-image-4");
    removeImage4.style.display = "none";
}

//Displays the correct image for the fourth benefit and hides other images
function benefit4(){
    const addImage = document.querySelector("#benefit-image-4");
    addImage.style.display = "flex";

    const removeImage1 = document.querySelector("#benefit-image-1");
    removeImage1.style.display = "none";

    const removeImage2 = document.querySelector("#benefit-image-2");
    removeImage2.style.display = "none";

    const removeImage3 = document.querySelector("#benefit-image-3");
    removeImage3.style.display = "none";
}