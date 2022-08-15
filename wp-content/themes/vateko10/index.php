<!doctype html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- fonts -->
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-Inter-Regular.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-Inter-SemiBold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-Inter-ExtraBold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-Inter-Medium.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-Inter-Bold.woff2" as="font" type="font/woff2" crossorigin>
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/fonts/hinted-subset-MontserratThin-Regular.woff2" as="font" type="font/woff2" crossorigin>

  <!-- styles -->
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/css/separate-css/glightbox.min.css" as="style">
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/css/separate-css/swiper-bundle.min.css" as="style">
  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/css/main.min.css" as="style">

  <!-- scripts -->

  <link rel="preload" href="<?php echo get_template_directory_uri(); ?>/front/prod/static/js/main.min.js" as="script">

  <?php wp_head(); ?>
</head>

<body <?php body_class('page'); ?>>
  <?php wp_body_open(); ?>
  <?php do_action('get_header'); ?>

  <div id="top" class="page__wrapper">

    <?php echo view(app('sage.view'), app('sage.data'))->render(); ?>


    <?php do_action('get_footer'); ?>
    <?php wp_footer(); ?>
    <!-- end page footer -->
  </div>
  <!-- end page wrapper -->

</body>

</html>
