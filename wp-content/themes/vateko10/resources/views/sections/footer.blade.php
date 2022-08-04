@php
  $logo      = get_field('logo_image', 'option');
  $address   = get_field('address', 'option');
  $email     = get_field('email', 'option');
  $phone     = get_field('phone', 'option');
  $copyright = get_field('copyright', 'option');
@endphp

<footer class="page__footer footer">
  <div class="footer__container container">
    <div class="footer__col footer__col_first">
      <a href="{{ home_url('/') }}" class="footer__logo">
        {!! wp_get_attachment_image($logo, 'full', null, '')!!}
      </a>
      <a href="{{'tel:' . str_replace( [
            ")",
            "(",
            " ",
            "-",
          ], "", $phone )}}" class="footer__phone phone">
        <svg class="phone__icon" width="31px" height="31px">
          <use xlink:href="{{ svg_path() }}/svg-symbols.svg#contact-1-icon"></use>
        </svg>
        {{ $phone }}
      </a>
    </div>

    {{-- <div class="footer__col footer__col_nav">
      <nav class="footer__nav nav nav_secondary">
        {!! wp_nav_menu([
          'theme_location' => 'secondary_navigation',
          'menu_class' => 'nav__list',
          'container' => false,
          ]) !!}
      </nav>
    </div> --}}

    <div class="footer__copyright">
      <div class="footer__copyright-first">
        {{ $copyright }}
      </div>
    </div>

  </div>
</footer>
