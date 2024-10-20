<section class="stats">
  <div class="stats__container container">
    @hasfield('stats_title')
    <h2 class="stats__title title">@field('stats_title')</h2>
    @endfield

    @hasfield('stats_list')
    <ul class="stats__list">
      @fields('stats_list')
      <li class="stats__item">
        <div class="stats__item-title">@sub('stats_item_title')</div>
        <p class="stats__item-text">@sub('stats_item_text')</p>
      </li>
      @endfields
    </ul>
    @endfield

  </div>
</section>
