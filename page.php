<?php get_header();?>
       	<?php if( have_posts() ): ?>
       	<?php 	while ( have_posts() ) : the_post(); ?>
        <?php 		get_template_part( 'framework/loops/content', 'page' ); ?>
        <?php 	endwhile;
           	  endif;?>
<?php get_footer();?>