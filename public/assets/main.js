// sidebar admin
let listLiSideBar = document.querySelectorAll(".navigation-sidebar .item-sidebar");
function activeSidebar(itemActive) {
    listLiSideBar.forEach((item) => {
        item.classList.remove("hovered");
        itemActive.classList.add("hovered");
    })
}
const BASE_URL = "http://localhost:8080/baocaoCNweb/";
const queryString = window.location.href;

listLiSideBar.forEach((item) => {
    let aTag = item.firstElementChild;
    let href = aTag.href;
    if (href === queryString) {
        activeSidebar(item);
    }
})




// end sidebar

// header admin
let navigationSidebar = document.querySelector('.navigation-sidebar');
let mainContainer = document.querySelector('.main');
let iconToggle = document.querySelector('.toggle-header div');

iconToggle.onclick = function () {
    navigationSidebar.classList.toggle("active");
    mainContainer.classList.toggle("active");
}
// end header


// container admin

//end container

// date picker

$('.dateselect').datepicker({
    format: 'dd/mm/yyyy',
    startDate: '+1d',
    todayHighlidht: true,
    autoclose: true,
    locale: 'vi',
    language: 'vi',
});



// end date picker

// footer admin

// end footer