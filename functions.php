<?php
/*
Author: Shimion
URL: htp://simthemes.com/

*/

// Get Bones Core Up & Running!


define('ST_themes',__dir__.'/');
define('ST_template_img',get_template_directory_uri().'/images/');
define('ST_Asset',ST_themes.'/assets/');
include_once(ST_Asset.'ST_core.php');
include_once(ST_Asset.'ST_sidebar_register.php');
include_once(ST_Asset.'ST_script.php');
include_once(ST_Asset.'ST_Walkermenu.php');
include_once(ST_Asset.'ST_Comments.php');
//include_once(ST_Asset.'ST_Slider.php');
include_once(ST_Asset.'ST_Testimonials.php');
include_once(ST_Asset.'ST_Team.php');
//include_once(ST_Asset.'ST_Service.php');
include_once(ST_Asset.'ST_Portfolio.php');
include_once(ST_Asset.'ST_aq_resizer.php');
include_once(ST_Asset.'ST_Azax.php');
include_once(ST_Asset.'ST_Breadcrumb.php');
include_once(ST_Asset.'ST_Style.php');
include_once(ST_Asset.'option/theme-option.php');
include_once(ST_Asset.'slider-exporter-importer.php');
require_once( ST_Asset.'plugins/ST-plugins.php' );
require_once( ST_Asset.'ST_Woo.php' );
require_once( ST_Asset.'ST_Page_Builder_Function.php' );
