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
});
