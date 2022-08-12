<section class="certificates">
  <div class="certificates__container container">
    @hasfield('certificates_title')
    <h2 class="certificates__title title">@field('certificates_title')</h2>
    @endfield

    <div class="certificates__buttons">
      <button class="certificates__button swiper-button-prev">
        <span class="certificates__button-text">Назад</span>
      </button>
      <button class="certificates__button swiper-button-next">
        <span class="certificates__button-text">Вперед</span>
      </button>
    </div>
  </div>

  @hasfield('certificates_slider')
    <div class="certificates__slider">
      <div class="swiper">
        <div class="swiper-wrapper">
          @fields('certificates_slider')
          <div class="certificates__slide swiper-slide">
            @php
              $image_id = get_sub_field('certificates_image');
            @endphp

            {{-- style="background-image: url({{ wp_get_attachment_image_url($image_id, 'full') }}) --}}

            <a class="certificates__item" href="{{ wp_get_attachment_image_url($image_id, 'full') }}">
              <div class="certificates__certificate">{!! wp_get_attachment_image($image_id, 'full') !!}</div>
              <div class="certificates__certificate-entry">
                <div class="certificates__certificate-title title title_sub">@sub('certificates_item_title')</div>
                <div class="certificates__certificate-text">@sub('certificates_text')</div>
              </div>
            </a>

          </div>
          @endfields

        </div>

      </div>
    </div>
    @endfield


</section>
