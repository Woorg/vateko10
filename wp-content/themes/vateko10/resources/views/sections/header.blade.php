@php
  $logo     = get_field('logo_image', 'option');
  $address  = get_field('address', 'option');
  $phone    = get_field('phone', 'option');
@endphp

<header class="page__header header">
  <div class="header__container container">

    <a href="{{ home_url('/') }}" class="header__logo logo">
      {!! wp_get_attachment_image($logo, 'full', null, '')!!}
    </a>

    @if (has_nav_menu('primary_navigation'))
    <nav class="header__nav nav nav_primary" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">

      <button class="nav__trigger">
        <span class="nav__trigger-text">Меню</span>
      </button>
      {!! wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'menu_class' => 'nav__list',
        'container' => false,
        'echo' => false
        ]) !!}
      <a href="#contacts" class="nav__button button">Оставить заявку</a>
    </nav>
    @endif

    <a href="#contacts" class="header__button button">Оставить заявку</a>
  </div>
</header>
