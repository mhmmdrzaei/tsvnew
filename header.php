<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
  <!-- stylesheets should be enqueued in functions.php -->
  <script id="mcjs">!function(c,h,i,m,p){m=c.createElement(h),p=c.getElementsByTagName(h)[0],m.async=1,m.src=i,p.parentNode.insertBefore(m,p)}(document,"script","https://chimpstatic.com/mcjs-connected/js/users/6aa6475d61f473ec259544c43/81d4b1b8468899d286fdb6930.js");</script>
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header >
  <main class="headerMain">
    <section class="headerInner">
      <a  class="logoLink"href="<?php echo home_url( '/' ); ?>" title="<?php bloginfo( 'name', 'display' ); ?>" rel="home">
      <?php require 'template-parts/logo.php'; ?>
    </a>
    <section class="inspire">
      <h1> A SPACE<br>TO RE-IMAGINE<br>MEDIA ARTS</h1>
    </section>
    <button class="access">Accessibility</button>
    <section class="accessMenu"></section>
    </section>
    <?php wp_nav_menu( array(
        'container' => false,
        'theme_location' => 'primary'
      )); ?>


  </main>
</header><!--/.header-->

