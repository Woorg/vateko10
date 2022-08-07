<section class="certificates">
  <div class="certificates__container container">
    @hasfield('certificates_title')
    <h2 class="certificates__title title">@field('certificates_title')</h2>
    @endfield

    <div class="certificates__buttons">
      <button class="certificates__button swiper-button-prev">
        <svg class="certificates__button-arrow" width="165" height="165" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#a)"><circle cx="82.5" cy="67.5" r="52.5" fill="#fff"/><circle cx="82.5" cy="67.5" r="50.5" stroke="#44B273" stroke-width="4"/></g><path d="M60.94 66.94a1.5 1.5 0 0 0 0 2.12l9.545 9.547a1.5 1.5 0 1 0 2.122-2.122L64.12 68l8.486-8.485a1.5 1.5 0 1 0-2.122-2.122L60.94 66.94ZM103 66.5H62v3h41v-3Z" fill="#000"/><defs><filter id="a" x="0" y="0" width="165" height="165" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feOffset dy="15"/><feGaussianBlur stdDeviation="15"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_152_1035"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_152_1035" result="shape"/></filter></defs></svg>
      </button>
      <button class="certificates__button swiper-button-next">
        <svg class="certificates__button-arrow" width="165" height="165" fill="none" xmlns="http://www.w3.org/2000/svg"><g filter="url(#a)"><circle r="52.5" transform="matrix(-1 0 0 1 82.5 67.5)" fill="#fff"/><circle r="50.5" transform="matrix(-1 0 0 1 82.5 67.5)" stroke="#44B273" stroke-width="4"/></g><path d="M104.061 66.94a1.502 1.502 0 0 1 0 2.12l-9.546 9.547a1.5 1.5 0 1 1-2.122-2.122L100.88 68l-8.486-8.485a1.5 1.5 0 1 1 2.122-2.122l9.546 9.546ZM62 66.5h41v3H62v-3Z" fill="#000"/><defs><filter id="a" x="0" y="0" width="165" height="165" filterUnits="userSpaceOnUse" color-interpolation-filters="sRGB"><feFlood flood-opacity="0" result="BackgroundImageFix"/><feColorMatrix in="SourceAlpha" values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 127 0" result="hardAlpha"/><feOffset dy="15"/><feGaussianBlur stdDeviation="15"/><feComposite in2="hardAlpha" operator="out"/><feColorMatrix values="0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0 0.15 0"/><feBlend in2="BackgroundImageFix" result="effect1_dropShadow_152_1036"/><feBlend in="SourceGraphic" in2="effect1_dropShadow_152_1036" result="shape"/></filter></defs></svg>
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
