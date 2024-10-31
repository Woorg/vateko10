import svg4everybody from 'svg4everybody';
import LazyLoad from 'vanilla-lazyload';
import Nav from '../../components/nav/nav';
// import JustValidate from 'just-validate';
// import { heroVideo } from '../../components/hero/hero';

import { certificatesSlider, certificatesGallery } from '../../components/certificates/certificates';

// import { map } from '../../components/contacts/contacts';
import { modal } from '../../components/modal/modal';
import { downloadPresentation, formValidate, customSelect } from '../../components/form/form';
import { calculator } from '../../components/calc/calc';

document.addEventListener('DOMContentLoaded', function (event) {

    svg4everybody();

    let styles = [
        'padding: 2px 9px',
        'background: #2948ff',
        'color: #fff',
        'line-height: 1.56',
        'font-size: 16px',
    ].join('');

    console.log('%c Developed by igor gorlov https://igorlov.ru', styles);

    /*
        Lazyload images
    */

    let lazyLoadInstance = new LazyLoad({
        elements_selector: '.lazy',
        threshold: 0,
        // load_delay: 300,
        use_native: true
    });

    if (lazyLoadInstance) {
        lazyLoadInstance.update();
    }

    /*
        Nav
    */

    let nav = new Nav();


    // Scroll into view

    document
        .querySelectorAll('a[href^="#"]')
        .forEach(trigger => {
            trigger.onclick = function (e) {
                e.preventDefault();
                let hash = this.getAttribute('href');
                if ( document.querySelector(hash) ) {
                    let target = document.querySelector(hash);
                    let headerOffset = -5;
                    let elementPosition = target.offsetTop;
                    let offsetPosition = elementPosition - headerOffset;

                    window.scrollTo({
                        top: offsetPosition,
                        behavior: "smooth"
                    });
                }
            };
        });


    // Hero video

    // Phone mask
    // inputMask();

    // Custom select

    customSelect();

    formValidate();

    // Download presentation

    // downloadPresentation();

    // Calculator

    calculator();

    // Certificates slider

    certificatesSlider();

    // Certificates gallery

    certificatesGallery();


    /*
        Modal
    */

    // let modalSelector = document.querySelector('.modal');

    // if (modalSelector) {
    //     modal();
    // }

    /*
        Phone mask
    */

    // Custom select

    customSelect();

});
