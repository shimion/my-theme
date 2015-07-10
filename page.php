<?php 
get_header(); 
global $post;
$sidebar =  ot_get_option('sidebar_select');
$sidebar_position =  get_post_meta($post->ID, 'sidebar', true);
$sidebar_position =  get_post_meta($post->ID, 'sidebar', true);
$Display_Custom_Background = get_post_meta($post->ID, 'Display_Custom_Background', true);
if(!empty($Display_Custom_Background) && $Display_Custom_Background=='off'){
	$row = 'row';
	}
if($sidebar_position=='no'){
	$column = 'col-sm-12';
	}else{
	$column = 'col-sm-9';
		}


?>
    <section class="main-content-section">
        <div class="container">
			<div id="content" class="clearfix <?php echo $row; ?>">
			
				
				<?php if($sidebar_position=="left") {get_sidebar($sidebar); } // sidebar 1 ?>
                
                <div id="main" class="col <?php echo $column; ?> clearfix" role="main">

				<?php get_template_part( 'section/content', 'content' ); ?>
			
				</div> <!-- end #main -->
    
				<?php if($sidebar_position=="right") {get_sidebar($sidebar); } // sidebar 1 ?>
    
			</div> <!-- end #content -->
        </div>  <!-- end container -->
    </section>    
<?php get_footer(); ?>