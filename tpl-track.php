<?php /*Template Name: track Template*/?>
<?php get_header();?>
       	<?php if( have_posts() ): ?>
       	<?php 	while ( have_posts() ) : the_post(); ?>
        <?php 		get_template_part( 'framework/loops/content', 'track' ); ?>
        <?php 	endwhile;
           	  endif;?>
<?php get_footer();?>