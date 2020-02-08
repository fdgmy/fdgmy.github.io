   <?php if ( mokore_option('head_notice') != '0'){ 
   		$text = mokore_option('notice_title');
   	?>
	<div class="notice">
	   <i class="iconfont">&#xe66b;</i>
	  <?php if(strlen($text) > 142 && !wp_is_mobile()){ ?> 
	  	<marquee align="middle" behavior="scroll" loop="-1" scrollamount="6" style="margin: 0 8px 0 20px; display: block;" onMouseOut="this.start()" onMouseOver="this.stop()">
			<div class="notice-content"><?php echo $text; ?></div>
		</marquee>
		<?php }else{ ?>
			<div class="notice-content"><?php echo $text; ?></div>
		<?php } ?>
	</div>
	<?php } ?>
	
	<?php 
		if(mokore_option('top_feature')=='1'){
			get_template_part('layouts/feature');
		}
	?>
	
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">	
		<h1 class="main-title">Posts</h1>
		<?php
		if ( have_posts() ) :

			if ( is_home() && ! is_front_page() ) : ?>
			<header>
				<h1 class="page-title screen-reader-text"><?php single_post_title(); ?></h1>
			</header>

			<?php
			endif;
			/* Start the Loop */
			if(mokore_option('post_list_style') == 'standard'){
				while ( have_posts() ) : the_post();
				get_template_part( 'tpl/content', get_post_format() );
				endwhile; 
			}else{
				get_template_part( 'tpl/content', 'thumb' );
			}
		?>
		<?php else : get_template_part( 'tpl/content', 'none' ); endif; ?>
		</main><!-- #main -->
		<?php if ( mokore_option('pagenav_style') == 'ajax') { ?>
		<div id="pagination"><?php next_posts_link('Previous'); ?></div>
		<?php }else{ ?>
		<nav class="navigator">
		<?php previous_posts_link('<i class="iconfont">&#xe679;</i>') ?><?php next_posts_link('<i class="iconfont">&#xe6a3;</i>') ?>
		</nav>
		<?php } ?>
	</div><!-- #primary -->
<?php
get_footer();