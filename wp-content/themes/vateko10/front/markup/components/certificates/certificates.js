
import Swiper, { Navigation } from 'swiper';
import GLightbox from 'glightbox';

export function certificatesSlider() {
    let mySwiper = new Swiper('.certificates__slider .swiper', {
        modules: [Navigation],
        a11y: true,
        keyboardControl: true,
        grabCursor: true,
        preloadImages: true,
        lazy: true,
        autoHeight: false,
        // slideToClickedSlide: true,
        observer: true,
        observeSlideChildren: true,
        observeParents: true,
        resizeObserver: true,
        waitForTransition: true,
        speed: 600,
        // centerInsufficientSlides: true,
        // centeredSlides: true,
        // centeredSlidesBounds: true,
        // freeMode: {
        //     enabled: true,
        //     sticky: true,
        // },
        // pagination: {
        //     el: '.certificates__slider .swiper-pagination',
        //     type: 'bullets',
        //     clickable: true,
        // },
        navigation: {
            nextEl: '.certificates__buttons .swiper-button-next',
            prevEl: '.certificates__buttons .swiper-button-prev',
        },
        breakpoints: {
            0: {
                slidesPerView: '1',
                // spaceBetween: 10,
                loop: false,
            },
            768: {
                loop: true,
                slidesPerView: 'auto',
                centeredSlides: true,
                centeredSlidesBounds: true,
                centerInsufficientSlides: true,

                // spaceBetween: 60,
            }
        }
    });
}


export function certificatesGallery() {
    let $examplesGallerySelector = document.querySelector('.certificates__slider');

    const gallery = GLightbox({
        selector: '.certificates__item',
    });

}
