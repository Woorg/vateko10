<div class="learnmore">
  <div class="learnmore__container container">
    <div class="learnmore__w">
      <div class="learnmore__entry">

        @hasfield('learnmore_title')
        <h2 class="learnmore__title title">@field('learnmore_title')</h2>
        @endfield

        @hasfield('learnmore_text')
        <div class="learnmore__text">@field('learnmore_text')
        </div>
        @endfield
      </div>

      @hasfield('learnmore_shortcode')
      <div class="learnmore__form">
        @field('learnmore_shortcode')
        {{-- <form action="" class="form">
          <div class="form__row">
            <div class="form__fields-group">
              <div class="form__field">
                <input type="text" class="form__input" value=""  placeholder="Как Вас зовут?">
              </div>

              <div class="form__field form__field_phone">
                <input type="text" class="form__input" value="" placeholder="+7 (999) 999-99-99">
              </div>
            </div>
            <div class="form__submit-w">
              <input type="submit" class="form__submit button" value="Получить презентацию">
              <div class="form__privacy">Нажимая на кнопку, Я даю <a class="form__privacy-link" href="">согласие на обработку персональных данных</a></div>
            </div>
          </div>
        </form> --}}
      </div>
      @endfield
    </div>
  </div>
</div>


