$(document).ready(function (){
    /**
     *  Schedule a tour; Append active class
     */

    $(".inside-swiper").click(function (){
        $('.inside-swiper').not(this).each(function(){
            $(this).removeClass('active');
        });

        $(this).toggleClass('active');
    })
});
