<section class="advantages">
  <div class="advantages__container container">
    @hasfield('advantages_title')
    <h2 class="advantages__title title">@field('advantages_title')</h2>
    @endfield
    <div class="advantages__row">

      @hasfield('list')
      <ul class="advantages__list">

        @fields('list')

        @php
            $icon_id = get_sub_field('list_icon');
        @endphp

        <li class="advantages__item">
          <div class="advantages__icon">{!! wp_get_attachment_image($icon_id, 'full') !!}</div>
          <div class="advantages__item-entry">
            <div class="advantages__item-title title title_sub">@sub('list_title')</div>
            <div class="advantages__item-text">@sub('list_text')</div>
          </div>
        </li>
        @endfields

      </ul>
      @endfield

      @hasfield('advantages_icon')

      <div class="advantages__image">
        @image('advantages_icon', 'full')
      </div>
      @endfield

    </div>
  </div>
</section>



{{-- <div class="{{ $block->classes }}">
  @if ($items)
    <ul>
      @foreach ($items as $item)
        <li>{{ $item['item'] }}</li>
      @endforeach
    </ul>
  @else
    <p>{{ $block->preview ? 'Add an item...' : 'No items found!' }}</p>
  @endif

  <div>
    <InnerBlocks />
  </div>
</div> --}}
