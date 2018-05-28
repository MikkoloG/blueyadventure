<div class="author_box author-info<?php if (get_avatar( get_the_author_meta( 'user_email' ), 80 ) != '') { echo ' has_avatar';}?>">
	<div class="author-avatar">
		<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
		<?php echo get_avatar( get_the_author_meta( 'user_email' ), 80 ); ?>
		</a>
	</div><!-- .author-avatar -->

	<div class="author-description author_text">
		<h3 class="author-title">
			<a class="author-link" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>" rel="author">
			<?php echo get_the_author(); ?>
			</a>
		</h3>

		<p class="author-bio">
			<?php the_author_meta( 'description' ); ?>
		</p><!-- .author-bio -->

        <div class="social_icons_list">
						<?php if (get_the_author_meta('url') != '') { ?>
							<a rel="nofollow" href="<?php echo get_the_author_meta('url') ?>" target="_blank" class="social_icon social_url social_icon_url" ><i class="fa fa-globe"></i></a>
						<?php } ?>
            <?php if (get_the_author_meta('facebook') != "") { ?>
							<?php if (!strrpos(get_the_author_meta('facebook'), 'facebook.com') && !strrpos(get_the_author_meta('facebook'), 'fb.com')) { ?>
								<a target="_blank"rel="nofollow" href="https://facebook.com/<?php echo get_the_author_meta('facebook') ?>" class="social_icon social_facebook social_icon_facebook" ><i class="fa fa-facebook"></i></a>
							<?php } else { ?>
								<a target="_blank" rel="nofollow" href="<?php echo get_the_author_meta('facebook') ?>" class="social_icon social_facebook social_icon_facebook" ><i class="fa fa-facebook"></i></a>
							<?php } ?>
            <?php } ?>
            <?php if (get_the_author_meta('twitter') != "") {?>
							<?php if (!strrpos(get_the_author_meta('twitter'), 'twitter.com') && !strrpos(get_the_author_meta('twitter'), 'twt.com')) { ?>
								<?php if (!strpos(get_the_author_meta('twitter'), '@')) { ?>
									<a rel="nofollow" href="https://twitter.com/<?php echo get_the_author_meta('twitter') ?>" target="_blank" class="social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a>
								<?php } else {?>
									<?php $twitter = str_replace('@', '', get_the_author_meta('twitter')); ?>
									<a rel="nofollow" href="httpss://twitter.com/<?php echo $twitter; ?>" target="_blank" class="social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a>
								<?php } ?>
							<?php } else { ?>
								<a rel="nofollow" href="<?php echo get_the_author_meta('twitter') ?>" target="_blank" class="social_icon social_twitter social_icon_twitter"><i class="fa fa-twitter"></i></a>
							<?php } ?>
            <?php } ?>

            <?php if (get_the_author_meta('gplus') != "") { ?>
        	 <a rel="nofollow" href="<?php echo get_the_author_meta('gplus') ?>" target="_blank" class="social_icon social_gplus social_icon_gplus"><i class="fa fa-google-plus"></i></a>
            <?php } ?>

            <?php if (get_the_author_meta('linkedin') != "") { ?>
        	     <a rel="nofollow" href="<?php echo get_the_author_meta('linkedin') ?>" target="_blank" class="social_icon social_linkedin social_icon_linkdin"><i class="fa fa-linkedin"></i></a>
            <?php } ?>
            <?php if (get_the_author_meta('pinterest') != "") {?>

  		     <a rel="nofollow" href="<?php echo get_the_author_meta('pinterest') ?>" class="social_icon social_pinterest social_icon_pinterest" target="_blank"><i class="fa fa-pinterest"></i></a>

            <?php } ?>
        </div>

	</div><!-- .author-description -->
</div><!-- .author-info -->
