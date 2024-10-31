@php
  $title = get_field('about_title');
  $subtitle = get_field('about_subtitle');
  $text = get_field('about_text');
  $image_id = get_field('about_image');
@endphp

<section id="about" class="about">
  <div class="about__container container">
    <div class="about__entry">
      <h2 class="about__title title">
        {!! $title !!}
      </h2>
      <h3 class="about__subtitle title title_sub">{!! $subtitle !!}</h3>
      <div class="about__text text">
        {!! $text !!}
      </div>
    </div>

    <div class="about__image">
      {!! wp_get_attachment_image( $image_id , 'full' ) !!}
    </div>

  </div>
</section>
