@php
  $title         = get_field('hero_title');
  $image_id      = get_field('hero_image');
  $image_url     = wp_get_attachment_image_url($image_id, 'full');
  $hero_video_id = wp_get_attachment_url( get_field('hero_video') );
  $text          = get_field('hero_text');
  $url           = get_field('hero_url');
@endphp

<section class="hero">
  <div class="hero__container container" >
    <div  class="hero__video">
      <video class="hero__video-object lazy"playsinline autoplay loop muted preload poster="{{ $image_url }}">
        <source src="{{ $hero_video_id }}" type="video/mp4">
      </video>
    </div>
    <div class="hero__entry">
      <h1 class="hero__title title">
        {!! $hero_title !!}
      </h1>
      <div class="hero__text">{!! $hero_text !!}</div>

      <a href="#about" class="hero__button button">Узнать больше</a>

    </div>

  </div>

</section>
{{-- end hero --}}

