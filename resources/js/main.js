AOS.init();
import * as bootstrap from 'bootstrap';
const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
// mostra password
const checkbox = document.querySelector('#checkbox1');
const password = document.querySelector('#password1');
const checkbox2 = document.querySelector('#checkbox2');
const password2 = document.querySelector('#password2');
const checkbox3 = document.querySelector('#checkbox3');
const password3 = document.querySelector('#password3');

// scoll mini nav
let miniNavbar = document.querySelector('#mini-nav');

// scorllmini nav
let scroll = window.pageYOffset
window.onscroll = function () {
    let currentScroll = window.pageYOffset;
    if (scroll > currentScroll) {
        miniNavbar.style.top = '0';
    } else {
        miniNavbar.style.top = '-100px';
    }
    scroll = currentScroll;
};

// funzione mostra password
function showPassword(box, input) {
    if (box) {
        box.addEventListener('click', () => {
            if (input.type === 'password') {
                input.type = 'text';
            } else {
                input.type = 'password'
            }
        })
    }
}

showPassword(checkbox, password);
showPassword(checkbox2, password2);
showPassword(checkbox3, password3);
