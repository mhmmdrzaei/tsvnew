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
    <section class="headerDetails">
      <section class="inspire">
        <?php $cars = get_field( 'rotating_page_tag','options' );  ?>
        <?php if( is_array( $cars ) ) { ?>
          <?php $car = array_rand( $cars ); ?>
         <h1><?php echo $cars[$car]['tag_line'];?></h1> 
        <?php } ?>
        
      </section>
      <button class="menuButtonMobile">Menu</button>
          <section class="accessMenuCover">
                <button class="access">Accessibility</button>
                <section class="accessMenu">
                  <section class="fontSizeIncrease">
      <!--               <section class="fontSizeRange">
                    <p class="smallA">- A</p>
                    <p class="largA">A +</p>
                    </section>
                    <input id="fontSizeRange" type="range" min="15" max="25" value=""> -->
                    <button class="decreaseFont" value="decrease"> — </button>
                    <button class="increaseFont" value="increase"> + </button>
                    
                  </section>
                  <section class="desaturateMenu">
                    <button class="desaturate">Desaturate Page</button>
                  </section>
            <!--       <section class="darkMode">
                    <button class="darkModeButton">Dark Mode</button>
                  </section> -->
                  <section class="clearselections">
                    <button class="clearInputs">Clear Inputs</button>
                  </section>
                </section>
          </section>

    </section>
    </section>
    <nav class="menuItems">
      <section class="menuheadings">
        <section class="siteTitle">
          <section class="trinityMenu">Trinity</section>
          <section class="squareMenu">Square</section>
          <section class="videoMenu">Video</section>
        </section>
        <button class="close">Close</button>
      </section>
      <?php wp_nav_menu( array(
          'container' => false,
          'theme_location' => 'primary'
        )); ?>
    </nav>



  </main>
</header><!--/.header-->

