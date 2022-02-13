/* Permet de switch les deux conteneur : Login et register */
function intervertir() {
    var container = document.querySelector(".container");
    container.classList.toggle('active');
}

/******* Gestion de controle du formulaire **********/
$(function () {
     /* S-Desactiver le bouton envoyer au debut*/
    let submit_btn = $('#submit_login');
    submit_btn.attr('disabled', 'disabled');

    let submit_btn2 = $('#submit_register');
    submit_btn2.attr('disabled', 'disabled');

    /* Controle de saisie email */
    $('.error_message').hide();
    $("input[type='email']").on("change",function () {
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        
        /* Resister */
        if (!(testEmail.test($("#email_2").val()))){
            $('#error_msg').show();
            $("#email_2").attr('style','border: 1px solid red');
        }
        else{
            $('#error_msg').hide();
            $("#email_2").removeAttr('style');
        }

        /* Login */
        if (!(testEmail.test($("#email").val()))){
            $('#error_msg_login').show();
            $("#email").attr('style','border: 1px solid red');
        }
        else{
            $('#error_msg_login').hide();
            $("#email").removeAttr('style');
        }
    });

    /* Tant que y'a un input vide, desactiver le bouton envoyer du LOGIN */
    $(".not_empty").on("change", function(){
        /* Bouton envoyer */
        var emailLogin = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        let input_vide = 1;
        let email_OK = 0;
        $('.not_empty').each(function() {
            //alert($(this).attr('name'));
            input_vide *= $(this).val().length;
        });
        
        if ((emailLogin.test($("#email").val()))){
            email_OK = 1;
        }
        
        //alert(input_vide);
        if (input_vide == 0 || email_OK == 0)
            submit_btn.attr('disabled', 'disabled');
        else
            submit_btn.attr('disabled', false);

    });

    /* Tant que y'a un input vide, desactiver le bouton envoyer du REGISTER */
    $(".notEmpty").on("change", function(){
        let pswdOK = 0;
        let emailOK = 0;
        let input_vide2 = 1;
        $("#fullname").val($("#firstname").val()+ " " + $("#lastname").val())  ;

        $('.notEmpty').each(function() {
            //alert($(this).attr('name'));
            input_vide2 *= $(this).val().length;
        });
        
        var conf_password = $('#password_confirmation');
        var psw_val = $("#password2").val();
        if (conf_password.val() == psw_val) {
            pswdOK = 1;
        }
        
        var testEmail = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
        if ((testEmail.test($("#email_2").val()))){
            emailOK = 1;
        }
        console.log(psw_val + " " + input_vide2 +" "+ emailOK);
        
        //alert(input_vide2);
        if (input_vide2 == 0 || pswdOK == 0 || emailOK == 0)
            submit_btn2.attr('disabled', 'disabled');
        else{
            //if (input_vide2 != 0 && psswdrOK != 0 && emailOK != 0) {
                submit_btn2.attr('disabled', false);
            //}
        }
        
    });

    /* Gestion de mot de conformite des mots de passe */
    $('#password_confirmation').on("blur",function () {
        var conf_pssword = $('#password_confirmation');
        var pssword = $('#password2');
        //alert(pssword.val() + " " + conf_pssword.val());
        if (pssword.val() != conf_pssword.val()) {
            conf_pssword.attr('style','border: 1px solid red');
            $('#error_conf_password').show();
        }else{
            conf_pssword.removeAttr('style');
            $('#error_conf_password').hide();
        }
    })
    
})