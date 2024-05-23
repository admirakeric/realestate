$(document).ready(function (){
    $(".inner_inner_faq_wrapper__in").click(function (){
        /* Hide all of them */
        $(".inner_description_faq_wrapper").removeClass('visible');

        /* Remove all minus icons */
        $(".fa-minus").removeClass('fa-minus');

        $(this).find('.inner_description_faq_wrapper').addClass('visible');
        $(this).find('i').removeClass('.fa-chevron-down').addClass('fa-minus')
    });
});
