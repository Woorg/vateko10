<section id="products" class="products">
  <div class="products__container container">
    <h2 class="products__title title">Наша продукция</h2>

    <div class="products__list">

      @query([
        'post_type' => 'product',
        'posts_per_page' => -1,
        'order' => 'ASC',
        'orderby' => 'ID',
      ])

      @posts
      <article class="products__product">
        <div class="products__product-entry">
          <div class="products__product-title title title_sub">@title</div>
          <div class="products__text text">
            @content
          </div>

          @php
            $price       = get_field('product_price', get_the_ID());
            $button_text = get_field('product_button_text', get_the_ID());
            $button_url = get_field('product_button_url', get_the_ID());
          @endphp

          @if($price)
          <div class="products__price">{{ $price }}</div>
          @endif

          @hasfields( 'features', get_the_ID() )
          <ul class="products__features">

            @fields( 'features', get_the_ID() )

            @php
              $image_id = get_sub_field('features_icon');
            @endphp

            <li class="products__features-item">
              <div class="products__features-icon">{!! wp_get_attachment_image($image_id, 'full') !!}</div>
              <div class="products__features-entry">
                <div class="products__features-title">@sub('features_title')</div>
                <div class="products__features-desc">@sub('features_value')</div>
              </div>
            </li>
            @endfields

          </ul>
          @endhasfields

          <a href="{{ $button_url }}" class="products__button">{!! $button_text !!}
            <svg width="27" height="24" viewBox="0 0 27 24" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M26.0607 13.0607C26.6464 12.4749 26.6464 11.5251 26.0607 10.9393L16.5147 1.3934C15.9289 0.807613 14.9792 0.807613 14.3934 1.3934C13.8076 1.97919 13.8076 2.92893 14.3934 3.51472L22.8787 12L14.3934 20.4853C13.8076 21.0711 13.8076 22.0208 14.3934 22.6066C14.9792 23.1924 15.9289 23.1924 16.5147 22.6066L26.0607 13.0607ZM-1.31134e-07 13.5L25 13.5L25 10.5L1.31134e-07 10.5L-1.31134e-07 13.5Z" fill="currentColor"/></svg>
          </a>
        </div>

      </article>
      @endposts

    </div>

  </div>
</section>
