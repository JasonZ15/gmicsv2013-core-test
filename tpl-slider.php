<?php /*Template Name: Slider Template*/?>
<?php get_header();?>
		<article id="slider-container">
			<?php putRevSlider("vip-experience") ?>
		</article>
       	<?php if( have_posts() ): ?>
       	<?php 	while ( have_posts() ) : the_post(); ?>
        <?php 		get_template_part( 'framework/loops/content', 'page' ); ?>
        <?php 	endwhile;
           	  endif;?>
<?php get_footer();?>