<!-- **Comment Entries** -->
<div class="commententries">

<?php if ( post_password_required() ) : ?>
	<p class="nopassword"><?php _e( 'This post is password protected. Enter the password to view any comments.',IAMD_TEXT_DOMAIN); ?></p>
<?php  return;
	endif;?>
    
    <h4> <?php comments_number(__('No Comments ',IAMD_TEXT_DOMAIN), __('Comment (1)',IAMD_TEXT_DOMAIN), __('Comments ( % )',IAMD_TEXT_DOMAIN) );?>
    	 - <?php the_title();?></h4>
    
    <?php if ( have_comments() ) : ?>
    
		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // Are there comments to navigate through? ?>
                    <div class="navigation">
                        <div class="nav-previous"><?php previous_comments_link( __( 'Older Comments',IAMD_TEXT_DOMAIN  ) ); ?></div>
                        <div class="nav-next"><?php next_comments_link( __( 'Newer Comments',IAMD_TEXT_DOMAIN) ); ?></div>
                    </div> <!-- .navigation -->
        <?php endif; // check for comment navigation ?>
        
        <ul class="commentlist">
     		<?php wp_list_comments( array( 'callback' => 'my_customComments' ) ); ?>
        </ul>
    
    <?php else: ?>
		<?php if ( ! comments_open() ) : ?>
            <p class="nocomments"><?php _e( 'Comments are closed.',IAMD_TEXT_DOMAIN); ?></p>
        <?php endif;?>    
    <?php endif; ?>

</div><!-- **.commententries Comment Entries** -->
	
<!-- Comment Form -->
<?php if ('open' == $post->comment_status) : ?>
        <?php $comments_args = array(
                'title_reply' =>  __( 'Post a comment',IAMD_TEXT_DOMAIN ),
                'title_reply_to' => __( 'Post a comment to %s',IAMD_TEXT_DOMAIN ),
                'fields'=> array(
                    'author' => '<p class="column one-half">
                                    <label>'.__('Your Name',IAMD_TEXT_DOMAIN).'<span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label>
                                    <input id="author" name="author" type="text" required />
                                </p>',
                    'email' => '<p class="column one-half last">
                                    <label>'.__('Your Email',IAMD_TEXT_DOMAIN).'<span> ('.__('required',IAMD_TEXT_DOMAIN).') </span> </label>
                                    <input id="email" name="email" type="email" required />
                                </p>'),
                'comment_field'=>'<p class="clear"><textarea id="comment" name="comment" cols="17" rows="11" required></textarea></p>',
                'comment_notes_before'=>'',
                'comment_notes_after'=>'',
                'label_submit'=>__('Comment',IAMD_TEXT_DOMAIN));		
        comment_form($comments_args);?>
<?php endif; ?>