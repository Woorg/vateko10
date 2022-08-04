@php
  $title = get_field('hero_title');
  $image_id = get_field('hero_image');
  $image_url = wp_get_attachment_image_url($image_id, 'full');
  $video = get_field('hero_file');
  $text = get_field('hero_text');
  $url = get_field('hero_url');
@endphp

<section class="hero">
  <div class="hero__container container" >
    <button class="hero__video-button">
      <svg class="hero__video-icon" width="378" height="378" viewBox="0 0 378 378" fill="transparent" xmlns="http://www.w3.org/2000/svg"><circle cx="189" cy="189" r="187" stroke="currentColor" stroke-width="4"/><path d="M141.474 114.735L270.105 189L141.474 263.265L141.474 114.735Z" fill="currentColor" stroke="currentColor"/></svg>
    </button>
    <video class="hero__video lazy" width="1680" height="816" preload="auto" loop="loop" muted="muted" playsinline="playsinline" poster="{{ $image_url }}" data-poster="{{ $image_url }}">
      <source src="{{ $video['url'] }}" data-src="{{ $video['url'] }}" type="video/mp4"/>
    </video>
    <div class="hero__entry">
      <h1 class="hero__title title">
        {!! $hero_title !!}
      </h1>
      <div class="hero__text">{!! $hero_text !!}</div>

      <a href="{{ $hero_url }}" class="hero__button button">Подробнее</a>

    </div>

  </div>
</section>
{{-- end hero --}}
