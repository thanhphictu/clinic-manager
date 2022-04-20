const eyePass = document.querySelector('.see-pass-icon');
const inputPass = document.querySelector('.input-user-password');
const inputEmail = document.querySelector('.input-user-email');
const inputPassword = document.querySelector('.input-user-password');
const btnSubmit = document.querySelector('.submit-login');

const BASE_URL = 'http://localhost:8080/baocaoCNweb/';

const msg_login = document.querySelector('.msg-login');

eyePass.onclick = (e) => {
    var icon = e.target.closest('div');
    icon.classList.toggle("active");
    if (document.querySelector('.see-pass-icon')) {
        inputPass.setAttribute('type', 'password')
    }
    if (document.querySelector('.see-pass-icon.active')) {
        inputPass.setAttribute('type', 'text')
    }

}
