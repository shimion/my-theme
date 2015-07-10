<?php $footer_bottom = ot_get_option('footer_widget_disable'); if($footer_bottom=='on'): ?>
<footer role="contentinfo">

		<div class="container scrollimation fade-up">

				<div class="row">
			
				<div id="inner-footer" class="clearfix">
		          <div id="widget-footer" class="clearfix row">
		            <?php 
					$footer_widget_column = ot_get_option('footer_widget_column');
					if($footer_widget_column == "Four"){
						echo '<div class="col-sm-3 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) :  endif;  
						echo '</div>';
						echo '<div class="col-sm-3 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) :  endif; 
						echo '</div>';
						echo '<div class="col-sm-3 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) :  endif;
						echo '</div>';
						echo '<div class="col-sm-3 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer4') ) : endif; 
						echo '</div>';
					}elseif($footer_widget_column == "Three"){
						echo '<div class="col-sm-4 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) :  endif;  
						echo '</div>';
						echo '<div class="col-sm-4 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) :  endif; 
						echo '</div>';
						echo '<div class="col-sm-4 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer3') ) :  endif;
						echo '</div>';

					}elseif($footer_widget_column == "Two"){
						echo '<div class="col-sm-6 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) :  endif;  
						echo '</div>';
						echo '<div class="col-sm-6 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) :  endif; 
						echo '</div>';
						
					}elseif($footer_widget_column == "One"){
						echo '<div class="col-sm-12 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer1') ) :  endif;  
						echo '</div>';
						echo '<div class="col-sm-12 col-sm-6">';
						if ( !function_exists('dynamic_sidebar') || !dynamic_sidebar('footer2') ) :  endif; 
						echo '</div>';
						
						}
					?>
		          </div>
					
					
				
				</div> <!-- end #inner-footer -->

            </div> <!--end row -->
		
		</div> <!-- end #container -->
</footer> <!-- end footer -->
<?php endif; ?>


<section class="footer-bottom">
    <div class="container">
         
    	<div class="row">
            <div class="row">
                  <div class="col-sm-6"><p><?php _e( ST_core::option_condition(ot_get_option('copy_right'), '© 2014 SimThemes.  All rights reserved.'), 'SimThemes'); ?></p></div>
                  <div class="col-sm-6">
                  <?php
                                   
					if(ot_get_option('footer_menu_or_social_icon')=='menu'){			   
					wp_nav_menu( 
                                       array( 
                                            'menu' => 'footer_links', /* menu name */
                                           'menu_class' => 'nav footer',
                                           'theme_location' => 'footer_links', /* where in the theme it's assigned */
                                            'container' => 'false', /* container class */
                                            //'fallback_cb' => 'wp_bootstrap_main_nav_fallback', /* menu fallback */
                                            // 'depth' => '2',  suppress lower levels for now 
                                            //'walker' => new ST_menu_walker()
                                       )
                                   );


					}elseif(ot_get_option('footer_menu_or_social_icon')=='social'){
                   _e( ST_core::social_bookmarking(array('size'=>ot_get_option('icon_size'))), 'SimThemes'); 
					}else{
                   _e( 'You can edit this section via Theme option >> Footer setting >> Footer Menu or Social Buttons', 'SimThemes'); 
					}
				   ?>
                </div>
            </div>
    	</div>
    </div>

</section>

				
		<!--[if lt IE 7 ]>
  			<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.3/CFInstall.min.js"></script>
  			<script>window.attachEvent('onload',function(){CFInstall.check({mode:'overlay'})})</script>
		<![endif]-->
	<?php do_action('start_body'); ?>			
		<?php wp_footer(); // js scripts areserted using this function ?>
	</body>

</html>