<?php

namespace Agrilife;

/**
 * Add assets
 * @package Agrilife.org
 * @since 0.1.0
 */
class RequiredDOM {

  public function __construct() {

  	add_filter( 'af4_before_nav', array( $this, 'add_search_toggle' ) );

  }

  public function add_search_toggle( $content ){

		$content = '<div class="title-bar title-bar-search" data-responsive-toggle="header-search" data-hide-for="medium"><button class="menu-icon" type="button" data-toggle="header-search"></button><div class="title-bar-title">Search</div></div>' . $content;

		return $content;

  }
}
