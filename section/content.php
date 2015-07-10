<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
					
					<article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?> role="article" itemscope itemtype="http://schema.org/BlogPosting">
						
						<!--<header>
							
							<div class="page-header"><h1 class="page-title" itemprop="headline"><?php the_title(); ?></h1></div>
						
						</header>--> <!-- end article header -->
					
						<section class="post_content clearfix" itemprop="articleBody">
							<?php the_content(); ?>
							<?php //echo $ST_Contact->build_form(); ?>
                            <?php //echo $ST_Contact->form_submit(); ?>
						</section> <!-- end article section -->
						
						<?php if(is_single()): ?>
                        <footer>
			
							<?php the_tags('<p class="tags"><span class="tags-title">' . __("Tags","SimThemes") . ':</span> ', ', ', '</p>'); ?>
							
						</footer> <!-- end article footer -->
						<?php endif; ?>
					</article> <!-- end article -->
					
            <?php  if(ot_get_option( 'enable_page_comments' )=='on'){ comments_template( '', true ); }  ?>
					
					<?php endwhile; ?>		
					
					<?php else : ?>
					
					<article id="post-not-found">
					    <header>
					    	<h1><?php _e("Not Found", "SimThemes"); ?></h1>
					    </header>
					    <section class="post_content">
					    	<p><?php _e("Sorry, but the requested resource was not found on this site.", "SimThemes"); ?></p>
					    </section>
					    
					</article>
					
					<?php endif; ?>