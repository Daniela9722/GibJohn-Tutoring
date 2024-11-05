//This function will be executed once the user clicks on the menu icon
function showSidebar(){
    //Displays the menu items
    const sideBar = document.querySelector(".menu-list")
    sideBar.style.display = "flex"

    //Displays the "X" at the top to hidde the navigation
    const exit = document.querySelector(".bx-x")
    exit.style.display = "flex"
}

//This function will be executed once the user clicks on the "X"
function hideSidebar(){
    //Hiddes the menu items
    const noSideBar = document.querySelector(".menu-list")
    noSideBar.style.display = "none"
}