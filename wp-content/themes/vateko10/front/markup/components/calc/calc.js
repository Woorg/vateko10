// толщина слоя в мм х площадь поверхности в метрах квадратных) х расход в зависимости от типа поверхности) / 13 = количество упаковок Количество упаковок х 825 = стоимость заказа

export const calculator = () => {
    const $surface = document.querySelector('#surface');
    const $layer = document.querySelector('#layer');
    const $square = document.querySelector('#square');
    const $packages = document.querySelector('.calc__total-quant span');
    const $totalPrice = document.querySelector('.calc__total-price span');
    const $packagesHidden = document.querySelector('.calc__quant-hidden');
    const $priceHidden = document.querySelector('.calc__price-hidden');

    const elements = [$surface, $layer, $square];

    $layer.value = '';
    $square.value = '';

    function numberWithSpaces(x) {
        return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, " ");
    }

    function calculate() {

        // console.log( parseInt($layer.value) );
        // console.log( parseInt($surface.value) );
        // console.log( parseInt($square.value) );

        let totalPackages = Math.round( ( ( parseInt($layer.value) * parseInt($surface.value) * parseInt($square.value) ) / 13) / 1000 );
        let totalPrice = Math.round( totalPackages * 825 );

        if (!Number.isNaN(totalPrice)) {

            $packagesHidden.value = totalPackages;
            $priceHidden.value = numberWithSpaces( totalPrice );

            $packages.innerHTML = totalPackages;
            $totalPrice.innerHTML = numberWithSpaces( totalPrice );

        } else {

            $packages.innerHTML = 0;
            $totalPrice.innerHTML = 0;

        }
    }

    calculate();

    elements.forEach( (element) => {
        element.addEventListener( 'change', function () {
            calculate();
        });
        element.addEventListener( 'input', function () {
            calculate();
        });
    });

    // $totalPrice.text( $totalPackages * 825 );
};

