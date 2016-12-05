<?php

/* Initializes Footer Menu */

function register_my_menu() {
  register_nav_menu( 'FooterMenu', __( 'Footer Menu', 'understrap' ) );
}
add_action( 'init', 'register_my_menu' );

?>