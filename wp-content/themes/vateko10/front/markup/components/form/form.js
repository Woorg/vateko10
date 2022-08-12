import Choises from "choices.js/public/assets/scripts/choices.min.js";
import Inputmask from "inputmask";

export function inputMask() {

    let telSelector = document.querySelector('.form__field_phone input');

    if (telSelector) {
        const inputMask = new Inputmask('+7 (999) 999-99-99');
        inputMask.mask(telSelector);
    }
}

export function customSelect() {
    let choices = new Choices('.form__select', {
        searchEnabled: false,
    });

}
