<?php get_header();?>
<!-- **Blog Single Content** -->
<article class="content">

	<div class="pattern">
    
        <!-- **Container** -->
        <div class="container">
        	<div class="hr-invisible"> </div>
            <?php if( have_posts() ): ?>
            <?php 	while ( have_posts() ) : the_post(); ?>
            <?php 		get_template_part( 'framework/loops/content', 'single-portfolio' ); ?>
            <?php 	endwhile;
              endif;?>
        </div><!-- **Container - End** -->
        
    </div>
<div class="shadow"> </div>
</article><!-- **Blog Single Content - End** -->
<?php get_footer();?>