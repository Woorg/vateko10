@php
  $logo      = get_field('logo_image', 'option');
  $email     = get_field('email', 'option');
  $phone     = get_field('phone', 'option');
  $copyright = get_field('copyright', 'option');
@endphp

<footer class="page__footer footer">
  <div class="footer__container container">
    <div class="footer__col">
      <a href="{{ home_url('/') }}" class="footer__logo">
        {!! wp_get_attachment_image($logo, 'full', null, '')!!}
      </a>

      <div class="footer__copyright">
        {!! $copyright !!}
      </div>

    </div>
    <div class="footer__col">
      <nav class="footer__nav nav nav_secondary">
        @if (has_nav_menu('primary_navigation'))
          {!! wp_nav_menu([
            'theme_location' => 'primary_navigation',
            'menu_class' => 'nav__list',
            'container' => null,

          ]) !!}
        @endif
      </nav>

      <div class="footer__contacts">
        <a class="footer__phone" href="{{'tel:' . str_replace( [
              ")",
              "(",
              " ",
              "-",
            ], "", $phone )}}" >
          {{ $phone }}
        </a>
        <a class="footer__email" href="mailto:{{ $email }}" >{{ $email }}</a>
      </div>
      
      <a class="footer__top" href=#top>
        <svg width="52" height="52" fill="none" xmlns="http://www.w3.org/2000/svg"><circle cx="26" cy="26" r="25" stroke="#121212" stroke-width="2"/><path d="M26.707 18.293a1 1 0 0 0-1.414 0l-6.364 6.364a1 1 0 0 0 1.414 1.414L26 20.414l5.657 5.657a1 1 0 0 0 1.414-1.414l-6.364-6.364ZM27 38V19h-2v19h2Z" fill="#121212"/></svg>
      </a>
    </div>
  </div>
</footer>
