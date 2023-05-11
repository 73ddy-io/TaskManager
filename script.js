let profileDropdownList = document.querySelector(".profile-dropdown-list");
let profileDropdownBtn = document.querySelector(".profile-dropdown-btn");
let profileAngle = document.getElementById("angle");
let taskOptionsBtn = document.querySelector(".ellipsis");
let taskOptions = document.getElementById("subOptions");

let buttons = document.querySelectorAll(".border-menu-sections-item-link");

buttons.forEach(button =>{
    button.addEventListener('click', () => {
        buttons.forEach(b => b.classList.remove('change-color'));
        button.classList.add('change-color');
        window.getComputedStyle(button, ':after').style.width = 100;
    });
});

// buttons.forEach(button =>{
//     button.addEventListener('click', () => {
//         buttons.forEach(b => b.classList.remove('add-underline'));
//         button.classList.add('add-underline');
//     });
// });

//this function display or hide profile dropdown list
const toggleMenu = () => {
    profileDropdownList.classList.toggle("open-menu");
    profileAngle.classList.toggle("rotate");
}

window.addEventListener('click', function(e){
    if(!profileDropdownBtn.contains(e.target)) {
        profileDropdownList.classList.remove("open-menu");
        profileAngle.classList.remove("rotate");
    }
});

const toggleTaskOptions = () => {
    taskOptions.classList.toggle("open-options");
}

window.addEventListener('click', function(e){
    if(!taskOptionsBtn.contains(e.target)) {
        taskOptions.classList.remove("open-options");
    }
});

// let Scrollbar = window.Scrollbar;

// Scrollbar.init(document.querySelector('#scroll-bar'));

