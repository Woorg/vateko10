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
        {{-- <svg class="nav__close-icon" width="46" height="46" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="m1 1 17.5 17.5m0-17.5L1 18.5" stroke="#000" stroke-width="2"/></svg> --}}
        {{-- <svg class="nav__menu-icon" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M38.43 21.083H7.57a1.82 1.82 0 0 0-1.82 1.82v.193a1.82 1.82 0 0 0 1.82 1.82h30.86a1.82 1.82 0 0 0 1.82-1.82v-.192a1.82 1.82 0 0 0-1.82-1.821ZM38.43 30.667H7.57a1.82 1.82 0 0 0-1.82 1.82v.192A1.82 1.82 0 0 0 7.57 34.5h30.86a1.82 1.82 0 0 0 1.82-1.82v-.192a1.82 1.82 0 0 0-1.82-1.821ZM38.43 11.5H7.57a1.82 1.82 0 0 0-1.82 1.82v.192a1.82 1.82 0 0 0 1.82 1.821h30.86a1.82 1.82 0 0 0 1.82-1.82v-.192a1.82 1.82 0 0 0-1.82-1.821Z" fill="#44B273"/></svg> --}}
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
