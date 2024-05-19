import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


import jQuery from 'jquery';
window.$ = jQuery;

/**
 *  Swiper -
 */

import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';
// import Swiper and modules styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';


Swiper.use([Navigation, Pagination]);

// init Swiper:
const swiper = new Swiper('.gallery__swiper', {
    pagination: {
        el: ".swiper-pagination",
        // dynamicBullets: true,
        type: "progressbar",
    },
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    on: {
        init: function() {
            checkArrow();
        },
        resize: function () {
            checkArrow();
        }
    }
});

function checkArrow() {
    let swiperPrev = document.querySelector('.swiper-button-prev');
    let swiperNext = document.querySelector('.swiper-button-next');
    if ( window.innerWidth < 800  ) {
        swiperPrev.style.display = 'none';
        swiperNext.style.display = 'none';
    } else {
        swiperPrev.style.display = 'block';
        swiperNext.style.display = 'block';
    }
}

/**
 *  Slider with multiple items
 */

const multiSwiper = new Swiper('.multi-swiper', {
    slidesPerView: 10,
    spaceBetween: 16,
    autoplay: {
        delay: 2500,
        disableOnInteraction: false
    },
    // navigation: {
    //     nextEl: ".swiper-button-next",
    //     prevEl: ".swiper-button-prev",
    // }
});
