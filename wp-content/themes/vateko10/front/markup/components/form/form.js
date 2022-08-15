import Choises from "choices.js/public/assets/scripts/choices.min.js";
import Inputmask from "inputmask";
import JustValidate from 'just-validate';

// export function phoneMask() {
//     let telSelector = document.querySelectorAll('.form__field_phone input');
//     let inputMask = new Inputmask('+7 (999) 999-99-99');
//     inputMask.mask(telSelector);
// }

export function customSelect() {
    let choices = new Choices('.form__select', {
        searchEnabled: false,
        itemSelectText: 'Нажмите для выбора',
    });
}

export function formValidate() {
    const forms = document.querySelectorAll('.form');

    forms.forEach( (form) => {
        const telSelector = form.querySelector('.form__input_phone');
        const numSelectors = form.querySelectorAll('.form__number');
        const formElements = form.querySelectorAll('.wpcf7-form-control');

        form.removeAttribute('novalidate');

        formElements.forEach( (element) => {
            element.setAttribute('required', 'required');
        });

        function setInputFilter(textbox, inputFilter) {
            ["input", "keydown", "keyup", "mousedown", "mouseup", "select", "contextmenu", "drop"].forEach( function (event) {
                textbox.addEventListener(event, function () {
                    if (inputFilter(this.value)) {
                        this.oldValue = this.value;
                        this.oldSelectionStart = this.selectionStart;
                        this.oldSelectionEnd = this.selectionEnd;
                    } else if (this.hasOwnProperty("oldValue")) {
                        this.value = this.oldValue;
                        this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                    } else {
                        this.value = "";
                    }
                });
            });
        }

        if (numSelectors) {
            numSelectors.forEach( (element) => {
                // element.setAttribute('inputmode', 'numeric');

                setInputFilter(element, function (value) {
                    return /^\d*\.?\d*$/.test(value);
                });

                // element.addEventListener("input", (event) => {
                //     if (element.validity.typeMismatch) {
                //         element.setCustomValidity("I am expecting an e-mail address!");
                //         element.reportValidity();
                //     } else {
                //         element.setCustomValidity("");
                //     }
                // });

            });
        }

        if (telSelector) {
            const inputMask = new Inputmask('+7 (999) 999-99-99');
            inputMask.mask(telSelector);
        }
    });
}

export function downloadPresentation() {

    console.log( download_presentation.siteUrl + download_presentation.file );

    document.addEventListener( 'wpcf7mailsent', function ( event ) {

        if ( event.detail.contactFormId === 169 ) {
            window.open( download_presentation.siteUrl + download_presentation.file, 'Download' );
        }
    }, false );
}
