<section  class="calc">
  <div class="calc__container container">
    @hasfield('calc_title')
    <h2 class="calc__title title">@field('calc_title')</h2>
    @endfield

    <div class="calc__form">
      <div class="calc__form-title title title_sub">Укажите необходимые параметры</div>

      <div class="calc__form-calc form form_vertical">

        <label class="form__label">
          <span class="form__label-text">Заполняемая поверхность</span>
          <div class="form__field form__field_select">
            <select name="" class="form__select">
              {{-- <option selected>Выбрать</option> --}}
              <option value="65">Стены (расход 65 кг/м3)</option>
              <option value="50">Крыша остроконечная (расход 50 кг/м3)</option>
              <option value="45">Крыша пологая (расход 45 кг/м3)</option>
              <option value="38">Пол или потолок слой до 200 мм (расход 38 кг/м3)</option>
              <option value="40">Пол или потолок слой до 300 мм (расход 40 кг/м3)</option>
              <option value="42">Пол или потолок слой до 400 мм (расход 42 кг/м3)</option>

            </select>
          </div>
        </label>

        <label class="form__label">
          <span class="form__label-text">Толщина слоя</span>
          <div class="form__field">
            <input type="text" class="form__input" value=""  placeholder="Толщина слоя (мм)">
          </div>
        </label>

        <label class="form__label">
          <span class="form__label-text">Площадь поверхности</span>
          <div class="form__field">
            <input type="text" class="form__input" value="" placeholder="Заполняемая площадь (м2)">
          </div>
        </label>

      </div>

      <div class="calc__form-total">
        <div class="calc__total-quant">Количество упаковок: 150 уп.</div>
        <div class="calc__total-price">Итого: 22 500 ₽</div>
        
      </div>

      @hasfield('calc_shortcode')
        @field('calc_shortcode')
      @endfield('calc_shortcode')

      {{-- <form action="" class="calc__form-reguest form form_vertical">
        <label class="form__label">
          <span class="form__label-text">Ваше имя</span>
          <div class="form__field">
            <input type="text" class="form__input" value=""  placeholder="Как Вас зовут?">
          </div>
        </label>

        <label class="form__label">
          <span class="form__label-text">Ваш номер для связи</span>
          <div class="form__field form__field_phone">
            <input type="text" class="form__input" value="" placeholder="+7 (999) 999-99-99">
          </div>
        </label>

        <div class="form__submit-w">
          <input type="submit" class="form__submit button" value="Заказать">
          <div class="form__privacy">Нажимая на кнопку, Вы даете <a class="form__privacy-link" href="">согласие на обработку персональных данных</a></div>
        </div>

      </form> --}}

    </div>


  </div>
</section>
