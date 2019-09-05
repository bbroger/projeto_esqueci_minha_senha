$(document).ready(function () {

    let formLogin = $('#form-login');
    let formEsqueciSenha = $('#forgot-password');
    let btnEsqueciSenha = $('#form-login a');
    let btnFormLogin = $('#forgot-password a');

    btnEsqueciSenha.on('click', function (e) {
        e.preventDefault();

        formEsqueciSenha.addClass('active');
        formLogin.addClass('active');
    })

    btnFormLogin.on('click', function (e) {
        e.preventDefault();

        formEsqueciSenha.removeClass('active');
        formLogin.removeClass('active');
    })

})