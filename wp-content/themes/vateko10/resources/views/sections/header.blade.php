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
        <svg class="nav__close-icon" width="20px" height="20px">
          <use xlink:href="{{ svg_path() }}/svg-symbols.svg#close-icon"></use>
        </svg>

        <svg class="nav__menu-icon" width="25px" height="18px">
          <use xlink:href="{{ svg_path() }}/svg-symbols.svg#menu-icon"></use>
        </svg>
      </button>

      {!! wp_nav_menu([
        'theme_location' => 'primary_navigation',
        'menu_class' => 'nav__list',
        'container' => false,
        'echo' => false
        ]) !!}
      {{-- <ul class="nav__list">
        <li class="nav__item">
          <a href="" class="nav__link"></a>
        </li>
      </ul> --}}
    </nav>
    @endif

    <a class="header__button button" data-modal="modal-callback">Оставить заявку</a>

  </div>
</header>
