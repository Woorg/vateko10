@php
  $title         = get_field('hero_title');
  $image_id      = get_field('hero_image');
  $image_url     = wp_get_attachment_image($image_id, 'full');
  $hero_video_id = get_field('hero_video_id');
  $text          = get_field('hero_text');
  $url           = get_field('hero_url');
@endphp

<section class="hero">
  <div class="hero__container container" >
    <div  class="hero__video">
      {{-- <div id="overlay" class="hero__video-preview" title="play">{!! $image_url !!}</div> --}}
      <div id="player" class="hero__video-object lazy"></div>
    </div>
    <div class="hero__entry">
      <h1 class="hero__title title">
        {!! $hero_title !!}
      </h1>
      <div class="hero__text">{!! $hero_text !!}</div>

      <a href="/#about" class="hero__button button">Узнать больше</a>

    </div>

  </div>
  <script defer>
    function onYouTubeIframeAPIReady() {
      var player = new YT.Player('player', {
          // height: '816',
          playerVars: { 'autoplay': 1, 'controls': 0, 'showinfo': 0, 'mute': 1, 'rel': 0 },
          // width: '1680',
          videoId: '{{ $hero_video_id }}',
          // quality: 'hd720',
          events: {
              'onReady': onPlayerReady
          }
      });
    }

    // Обработчик готовность
    function onPlayerReady(event) {
      let player = event.target;
      iframe = document.getElementById('player');
      setupListener();
    }

    function setupListener() {
      document.getElementById('full').addEventListener('click', playFullscreen);
    }

  </script>
</section>
{{-- end hero --}}

