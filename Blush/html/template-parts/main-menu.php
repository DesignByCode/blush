<nav id="main-menu" class="nav nav--shadow">
  <div class="nav__wrapper">
    <div class="nav__brand">
      <a href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <?php bloginfo('name'); ?>
      </a>
    </div>
    <div class="nav__navicon"></div>
    <div class="nav__links__wrapper nav__links--right ">
      <ul class="nav__links hide md-show">

        <li class="nav__links__item"><a href="#" title="cart"><i class="lunacon lunacon-basket-solid"></i></a></li>
        <li class="nav__links__item"><a href="#"><i class="lunacon lunacon-cart-solid"></i></a></li>
        <li class="nav__links__item"><a href="#"><i class="lunacon lunacon-user-solid"></i></a></li>
      </ul>
    </div>
    <div class="nav__links__wrapper nav__links--right">
      <?php $walker = new LunaWalkerMenu; ?>
      <?php wp_nav_menu( array(
        'theme_location' => 'menu-1',
        'menu_id' => 'primary-menu',
        'container' => '',
        'menu_class' => 'nav__links',
        'walker' => $walker
      ) ); ?>
    </div>
  </div>
</nav>
