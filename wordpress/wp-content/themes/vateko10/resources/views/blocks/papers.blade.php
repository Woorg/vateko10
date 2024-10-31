<div class="papers">
  <div class="papers__container container">
    @hasfield('papers_image')
    <div class="papers__image">
      @image('papers_image', 'full')
    </div>
    @endfield
    
    <div class="papers__entry">

      @hasfield('papers_title')
      <h2 class="papers__title title">@field('papers_title')</h2>
      @endfield

      @hasfield('papers_text')
      <div class="papers__text title title_sub">@field('papers_text')</div>
      @endfield

      @hasfield('list')
      <ul class="papers__list">

        @fields('list')

        @php
          $icon_id = get_sub_field('list_icon');
        @endphp

        <li class="papers__item">
          <div class="papers__icon">{!! wp_get_attachment_image($icon_id, 'full') !!}</div>
          <div class="papers__item-title title title_sub">@sub('list_title')</div>
        </li>
        @endfields

      </ul>
      @endfield

      @hasfield('papers_link')
      <a href="@field('papers_link')" class="papers__button button button_big">Узнать больше</a>
      @endfield

    </div>

  </div>
</div>
