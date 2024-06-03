import {Notify} from "../admin/layout/notify.ts";

$(document).ready(function (){

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    let sendAnEmail = function (name, phone, email, message, checkbox, reason = null){
        if(name.val() === ''){
            Notify.Me(["Molimo da unesete Vaše ime", "warn"]);
            return;
        }
        if(phone.val() === ''){
            Notify.Me(["Molimo da unesete Vaše broj telefona", "warn"]);
            return;
        }
        if(email.val() === ''){
            Notify.Me(["Molimo da unesete Vašu email adresu", "warn"]);
            return;
        }
        if(message.val() === ''){
            Notify.Me(["Molimo da unesete željenu poruku", "warn"]);
            return;
        }
        if(!checkbox.is(":checked")){
            Notify.Me(["Molimo da se složite sa uslovima korištenja", "warn"]);
            return;
        }

        $(".loading").removeClass('d-none');

        $.ajax({
            url: '/contact-us/send-us-message',
            method: 'POST',
            dataType: "json",
            data: {
                name: name.val(),
                phone: phone.val(),
                email: email.val(),
                message: message.val(),
                reason : (reason) ? reason.val() : null
            },
            success: function success(response) {
                let code = response['code'];

                $(".loading").addClass('d-none');

                if(code === '0000'){
                    Notify.Me([response['message'], "success"]);

                    name.val("");
                    phone.val("+387 ");
                    email.val("");
                    message.val("");
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    }

    /* Contact US form */
    $(".send_us_message").click(function (){
        let name    = $("#cf_name");
        let phone   = $("#cf_phone");
        let email   = $("#cf_email");
        let message = $("#cf_message");
        let checkbox = $("#cf_agree");

        /* Send an email */
        sendAnEmail(name, phone, email, message, checkbox);
    });

    /* Contact form from Estate preview */
    $(".estate-contact-us-btn").click(function (){
        let name    = $("#cf_name");
        let phone   = $("#cf_phone");
        let email   = $("#cf_email");
        let message = $("#cf_message");
        let reason  = $("#cf_what");
        let checkbox = $("#cf_agree");

        sendAnEmail(name, phone, email, message, checkbox, reason);
    });
});
