<div id="contacts" class="question">
  <div class="question__container container">
    <div class="question__entry">

      @hasfield('question_title')
      <h2 class="question__title title">{{ $question_title }}</h2>
      @endfield

      @hasfield('list')
      <ul class="question__contacts">
        @foreach ($list as $item)

          @php
            $icon_id = $item['list_icon'];
            $list_title = $item['list_title'];
            $list_text = $item['list_text'];
          @endphp

          {{-- @dump($icon_id) --}}

          @if ($loop->iteration == 1)

          <li class="question__contact">
            <div class="question__icon">
              {!! wp_get_attachment_image($icon_id, 'full') !!}
            </div>
            <div class="question__contact-title">{{ $list_title }}</div>
            <a href="{{'tel:' . str_replace( [
                ")",
                "(",
                " ",
                "-",
                "/",
              ], "", $list_text )}}" class="question__contact-link">{{ $list_text }}</a>
          </li>

          @endif

          @if ($loop->iteration == 2)

          <li class="question__contact">
            <div class="question__icon">
              {!! wp_get_attachment_image($icon_id, 'full') !!}
            </div>
            <div class="question__contact-title">{{ $list_title }}</div>
            <a href="mailto:{{ $list_text }}" class="question__contact-link">{{ $list_text }}</a>
          </li>

          @endif

          @if ($loop->iteration == 3)

          <li class="question__contact">
            <div class="question__icon">
              {!! wp_get_attachment_image($icon_id, 'full') !!}
            </div>
            <div class="question__contact-title">{{ $list_title }}</div>
            <div class="question__contact-link">{{ $list_text }}</div>
          </li>

          @endif

        @endforeach
      </ul>
      @endfield

    </div>

    @hasfield('question_shortcode')
    <div class="question__form">
      @field('question_shortcode')

      {{-- <form action="" class="form form_vertical">
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

        <label class="form__label">
          <span class="form__label-text">Комментарий к заявке</span>
          <div class="form__field form__field_message">
            <textarea class="form__message"></textarea>
          </div>
        </label>

        <div class="form__submit-w">
          <input type="submit" class="form__submit button" value="Отправить">
          <div class="form__privacy">Нажимая на кнопку, Вы даете <a class="form__privacy-link" href="">согласие на обработку персональных данных</a></div>
        </div>

      </form> --}}

    </div>
    @endfield

  </div>
</div>
