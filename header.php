<?php $ST_core = new ST_core(); global $post;  ?>
<!doctype html>  

<!--[if IEMobile 7 ]> <html <?php language_attributes(); ?>class="no-js iem7"> <![endif]-->
<!--[if lt IE 7 ]> <html <?php language_attributes(); ?> class="no-js ie6"> <![endif]-->
<!--[if IE 7 ]>    <html <?php language_attributes(); ?> class="no-js ie7"> <![endif]-->
<!--[if IE 8 ]>    <html <?php language_attributes(); ?> class="no-js ie8"> <![endif]-->
<!--[if (gte IE 9)|(gt IEMobile 7)|!(IEMobile)|!(IE)]><!--><html <?php language_attributes(); ?> class="no-js"><!--<![endif]-->
	
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<title><?php wp_title( '|', true, 'right' ); ?></title>	
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
				
		<!-- media-queries.js (fallback) -->
		<!--[if lt IE 9]>
			<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>			
		<![endif]-->

		<!-- html5.js -->
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		
  		<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
		<!-- wordpress head functions -->
		<?php wp_head(); ?>
		<!-- end of wordpress head -->
				
	</head>
	
	<body <?php body_class(); ?>>
	<?php 
	do_action('start_body'); 
	global $post, $wp_query;
	$Transparent_Header = get_post_meta(get_the_ID(), 'Transparent_Header', true);
	if($Transparent_Header=='on'){
		$fixed = 'navbar-fixed-top';
		echo "<script>
				jQuery(document).ready(function($){
			$('.way_point_detector').waypoint(function(){
				$('.very_top_bar').toggleClass('hide');
			});
			});

		</script>";
	}else{
		$Transparent_Header = ot_get_option('Transparent_Header');
		if($Transparent_Header=='on'){
		$fixed = 'navbar-fixed-top';
		
		echo "<script>
				jQuery(document).ready(function($){
	$('.way_point_detector').waypoint(function(){
		$('.very_top_bar').toggleClass('hide');
	});
	});

		</script>";
		
		}else{
			
		echo "<script>
				jQuery(document).ready(function($){
			$('.way_point_detector').waypoint(function(){
		$('.main-header').toggleClass('navbar-fixed-top sticky_header  scrollimation in');
	});


	$('.way_point_detector').waypoint(function(){
		$('.very_top_bar').toggleClass('hide');
	});
	});

		</script>";
			
			}
	}
		$Display_Header = get_post_meta(get_the_ID(), 'Display_Header', true);

	if($Display_Header=='on' || empty($Display_Header)){
	?>			
		<header role="banner" class="main-header <?php echo $fixed; ?>">
        	<?php 
			if(get_post_meta(get_the_ID(), 'show_header_top', true)=='on'){
				get_template_part( 'section/content', 'header-top' );    
			}elseif(get_post_meta($post->ID, 'show_header_top', true)=='off'){ 
			
			}elseif(ot_get_option('header_top')=='show'){ 
				get_template_part( 'section/content', 'header-top' );    
			}
			?>
            
			<div class="navbar navbar-default ">
				<div class="container">
          
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>

						<?php get_template_part( 'section/content', 'logo' ); ?>
					</div>

					<div class="collapse navbar-collapse navbar-responsive-collapse">
						<?php // wp_bootstrap_main_nav(); // Adjust using Menus in Wordpress Admin ?>
                        
                        <?php
							if (is_category()|| is_tag()|| is_author()) {
								$id = NULL;
							}else{
								$id = get_the_ID();
							}	
							$ST_core->ST_menu(array('id' =>$id));
						?>

						<?php
						$Display_Header_Right =  ot_get_option('Display_Header_Right');
						$header_right =  ot_get_option('header_right');
						$header_custom_text_right =  ot_get_option('header_custom_text_right');
						if($Display_Header_Right){
							echo '<div class="header_right">';
								echo '<div class="header_right_inner">';
								if($header_right=='search'){
								 get_template_part( 'section/content', 'search' ); 
								}elseif($header_right=='social'){
								 _e( ST_core::social_bookmarking(array('size'=>ot_get_option('icon_size'))), 'SimThemes'); 
								}elseif($header_right=='custom_text'){
								 _e( '<p>' .$header_custom_text_right. '</p>', 'SimThemes'); 
								}elseif($header_right=='widget_header_right'){
									 if ( is_active_sidebar( 'header_right' ) ) : 
				
										 dynamic_sidebar( 'header_right' ); 
				
									 endif; 
								}
								echo '</div>';
							echo '</div>';
						}
						 ?>
					</div>

				</div> <!-- end .container -->
			</div> <!-- end .navbar -->
			<div class="way_point_detector"></div>		
		</header> <!-- end header -->
        
	<?php } ?>


		<?php
		if(is_page())
		get_template_part( 'section/content', 'title-section' );
		elseif(is_singular('portfolio') || is_tax('categories-portfolio') || is_post_type_archive('portfolio'))
		get_template_part( 'section/portfolio/content', 'title-section-portfolio' );
		else
		get_template_part( 'section/content', 'title-section-blog-archive' );

		
		
		$show_or_hide_slider_featured = get_post_meta($post->ID, 'show_or_hide_slider_featured', true);
		$select_featured_section_or_slider = get_post_meta($post->ID, 'select_featured_section_or_slider', true);

		if(!empty($show_or_hide_slider_featured)){
		if($show_or_hide_slider_featured='on'){
				if($select_featured_section_or_slider=='slider'){
				get_template_part( 'section/content', 'slider' );
				}elseif($select_featured_section_or_slider=='featured'){
				get_template_part( 'section/content', 'featured' );
				}
			}
		}
		
		 
		 ?>
