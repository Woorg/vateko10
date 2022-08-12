<section id="partners" class="partners">
  <div class="partners__container container">
    @hasfield('partners_title')
    <h2 class="partners__title title">@field('partners_title')</h2>
    @endfield

    @hasfield('partners_subtitle')
    <div class="partners__text title title_sub">@field('partners_subtitle')</div>
    @endfield

    @hasfield('partners_list')
    <ul class="partners__list">
      @php
        $i = 0
      @endphp

      @fields('partners_list')
        @php
          $i++;
          $image_id = get_sub_field('partners_image');
        @endphp
      <li class="partners__item">
        <div class="partners__image">{!! wp_get_attachment_image($image_id, 'full') !!}</div>
        <div class="partners__entry">
          <div class="partners__item-num title title_sub">0{{ $i	}}</div>
          <div class="partners__item-title">@sub('partners_item_title')</div>
        </div>
      </li>
      @endfields

    </ul>
    @endfield

    <a class="partners__button button button_big" href="@field('partners_link')">Стать партнером</a>

  </div>
</section>
