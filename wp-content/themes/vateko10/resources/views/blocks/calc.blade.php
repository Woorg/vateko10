<section id="calc" class="calc">
  <div class="calc__container container">
    @hasfield('calc_title')
    <h2 class="calc__title title">@field('calc_title')</h2>
    @endfield

    <div class="calc__form">
      <div class="calc__form-title title title_sub">Укажите необходимые параметры</div>

      <div class="calc__form-calc">

        @php
          $form_shortcode = get_field('calc_shortcode');
        @endphp

        {!! $form_shortcode !!}

      </div>

    </div>

  </div>
</section>
