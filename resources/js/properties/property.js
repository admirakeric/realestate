import {Notify} from "../admin/layout/notify.ts";

$(document).ready(function (){
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });


    /**
     *  Schedule a tour; Append active class
     */

    $(".inside-swiper").click(function (){
        $('.inside-swiper').not(this).each(function(){
            $(this).removeClass('active');
        });

        $(this).toggleClass('active');
    })


    /**
     *  Show a map
     */
    $(".slider__switch_map").click(function (){
        $(".map__wrapper").addClass('active');
        $(".slider__switch_gallery").removeClass('active');
        $(this).addClass('active');
    })
    $(".slider__switch_gallery").click(function (){
        $(".map__wrapper").removeClass('active');
        $(".slider__switch_map").removeClass('active');
        $(this).addClass('active');
    });

    /**
     *  Clickable wrapper
     */
    $(".link_element").click(function (){
        window.location = $(this).attr('uri');
    });

    /**
     *  Schedule visits
     */

    $(".schedule-visit").click(function (){
        let name    = $("#s_name");
        let phone   = $("#s_phone");
        let email   = $("#s_email");
        let message = $("#s_message");
        let time    = $("#s_time");

        let date    = '';
        $(".visit-date").each(function (){
            if($(this).hasClass('active')) date = $(this).attr('date');
        });

        console.log(date);

        if(name.val() === ''){ Notify.Me(["Molimo da unesete Vaše ime", "warn"]); return; }
        if(phone.val() === ''){ Notify.Me(["Molimo da unesete Vaše broj telefona", "warn"]); return; }
        if(email.val() === ''){ Notify.Me(["Molimo da unesete Vašu email adresu", "warn"]); return; }
        if(message.val() === ''){ Notify.Me(["Molimo da unesete željenu poruku", "warn"]); return; }

        $.ajax({
            url: '/properties/schedule-visit',
            method: 'POST',
            dataType: "json",
            data: {
                name: name.val(),
                phone: phone.val(),
                email: email.val(),
                message: message.val(),
                date : date,
                time : time.val()
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
                    time.val("08:00");
                }else{
                    Notify.Me([response['message'], "warn"]);
                }
            }
        });
    });
});
