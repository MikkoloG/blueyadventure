					</div> <!-- .row -->
				</div> <!-- .container -->
			</section> <!-- .site_content -->
<?php global $asalah_blogpage_id; ?>
			<footer class="site-footer">
				<h3 class="screen-reader-text"><?php _e('Site Footer', 'asalah') ?></h3>
				<div class="footer_wrapper">
					<div class="container">

						<?php
							$first_footer = "no_first_footer";
							if (  is_active_sidebar( 'footer-1'  )
										|| is_active_sidebar( 'footer-2' )
										|| is_active_sidebar( 'footer-3'  )
							):
							$first_footer = "has_first_footer";
						?>
						<div class="first_footer widgets_footer row">
							<?php get_sidebar('footer'); ?>
						</div>
						<?php endif; ?>

						<?php if (asalah_option('asalah_footer_credits')): ?>
							<div class="second_footer <?php echo esc_attr($first_footer); ?> row">
								<div class="col-md-12">
									<div class="second_footer_content_wrapper footer_credits">
										<?php echo do_shortcode(htmlspecialchars_decode((asalah_option('asalah_footer_credits')))); ?>
									</div>
								</div>
							</div>
						<?php endif; ?>
					</div>
				</div>
			</footer><!-- .site-footer -->
		</div><!-- .site_main_container -->

		<!-- start site side container -->
		<?php if ( is_active_sidebar( 'sidebar-2' )  && asalah_cross_option('asalah_enable_sliding_sidebar', $asalah_blogpage_id) != 'no' ) : ?>
			<div class="sliding_close_helper_overlay"></div>
			<div class="site_side_container <?php if (asalah_cross_option('asalah_sticky_menu', $asalah_blogpage_id) == 'yes') { echo 'sticky_sidebar';}?>">
				<h3 class="screen-reader-text"><?php _e('Sliding Sidebar', 'asalah') ?></h3>
				<div class="info_sidebar">
					<?php dynamic_sidebar( 'sidebar-2' ); ?>
					<?php if ((intval(asalah_cross_option('asalah_site_width')) < 701) && (intval(asalah_cross_option('asalah_site_width')) > 499) && (asalah_option('asalah_sidebar_position') != 'none')) { ?>
						<?php dynamic_sidebar( 'sidebar-1' ); ?>
					<?php } ?>
				</div>

			</div>
		<?php else: ?>
			<?php if ((intval(asalah_cross_option('asalah_site_width')) < 701) && (intval(asalah_cross_option('asalah_site_width')) > 499) && (asalah_option('asalah_sidebar_position') != 'none')) { ?>
				<div class="sliding_close_helper_overlay"></div>
				<div class="site_side_container">
					<h3 class="screen-reader-text"><?php _e('Sliding Sidebar', 'asalah') ?></h3>
					<div class="info_sidebar">
							<?php dynamic_sidebar( 'sidebar-1' ); ?>
					</div>
				</div>
				<?php } ?>
		<?php endif; ?>
		</div> <!-- end site side container .site_side_container -->
</div><!-- .site -->

<?php wp_footer(); ?>
<?php if (asalah_cross_option('asalah_custom_footer_code')) {
	echo asalah_cross_option('asalah_custom_footer_code');
} ?>

<?php if (asalah_cross_option('asalah_sticky_menu', $asalah_blogpage_id) == "yes") {
	?>
	<script type="text/javascript">
	jQuery(window).scroll(function() {
			var scrolling = jQuery(window).scrollTop();
			var main_navbar_offset = jQuery('.site_header').height();
			<?php if (asalah_cross_option('asalah_sticky_logo') == "yes") { ?>if (jQuery('body').width() > 992) { <?php } ?>
			if (jQuery(window).scrollTop() > main_navbar_offset) {
				jQuery('.sticky_header .header_info_wrapper').not('.mobile_menu_opened .header_info_wrapper').show('slow');
			} else if (jQuery(window).scrollTop() < main_navbar_offset) {
				jQuery('.sticky_header .header_info_wrapper').not('.mobile_menu_opened .header_info_wrapper').hide('slow');

			}
			<?php if (asalah_cross_option('asalah_sticky_logo') == "yes") { ?>} <?php } ?>
			if ((jQuery('body').hasClass('admin-bar')) && (jQuery('body').width() < 600)) {
				if (jQuery(window).scrollTop() < jQuery('#wpadminbar').height()) {
					var top = jQuery('#wpadminbar').height() - jQuery(window).scrollTop();
					jQuery('.sticky_header').css('top', top);
					jQuery('.sticky_logo').css('top', top+jQuery('.sticky_header').height());
			} else {
				jQuery('.sticky_header').css('top', '0');
				jQuery('.sticky_logo').css('top', jQuery('.sticky_header').height());
			}
		}
		<?php if ((asalah_option('asalah_reading_progress') == "yes") && (is_single())) : ?>
		if (jQuery('.header_logo_wrapper .container').width() < 600) {
 		 var top = jQuery('.sticky_header').height();
 	 } else {
 		 var top = jQuery('.sticky_header').height() + jQuery('.invisible_header').offset().top;
 	 }
 	 jQuery('#reading_progress.progress_sticky_header').css('top', top);
	 <?php endif; ?>
	 });

	 jQuery(document).ready( function() {
		 if ((jQuery('body.admin-bar').length)) {
 			var top = jQuery('#wpadminbar').height();
 			jQuery('.admin-bar .sticky_header').css('top', top);
 		}
	 <?php if ((asalah_option('asalah_reading_progress') == "yes") && (is_single())) : ?>
		 if (jQuery('.header_logo_wrapper .container').width() < 600) {
			 var top = jQuery('.sticky_header').height();
		 } else {
			 var top = jQuery('.sticky_header').height() + jQuery('.invisible_header').offset().top;
		 }
		 jQuery('#reading_progress.progress_sticky_header').css('top', top);

		 <?php endif; ?>
 });

 </script>
<?php } ?>
<?php if (( true == asalah_cross_option('asalah_center_logo')) && ((is_active_sidebar( 'sidebar-2' )  && (asalah_cross_option('asalah_enable_sliding_sidebar', $asalah_blogpage_id) != 'no')) || ((intval(asalah_cross_option('asalah_site_width')) < 701) && (intval(asalah_cross_option('asalah_site_width')) > 499) && (asalah_option('asalah_sidebar_position') != 'none')))) {
	?>
	<script type="text/javascript">


	jQuery(window).ready(function() {
		asalah_center_logo();
		function asalah_center_logo() {
		  if ((jQuery('.site_logo').width() + jQuery('.logo_dot').width() + 10) >= (jQuery('.header_logo_wrapper .container').width() * 0.6)) {
				jQuery('.site_logo, .site_logo a').css('display', 'inline');
				if (jQuery('body.rtl').length) {
				jQuery('.logo_wrapper').css({'max-width':'100%', 'width':'100%', 'padding-right' :'0'});
		    jQuery('.header_logo_wrapper .header_info_wrapper').css({'float':'unset', 'width':'100%','padding-right' :'0'});
			} else {
				jQuery('.logo_wrapper').css({'max-width':'100%', 'width':'100%', 'padding-left' :'0'});
		    jQuery('.header_logo_wrapper .header_info_wrapper').css({'float':'unset', 'width':'100%','padding-left' :'0'});
			}
				jQuery('.logo_wrapper').css('padding-bottom', '10px');
		    jQuery('.header_logo_wrapper .header_info_wrapper .user_info_button').css({'float':'unset', 'display':'block','margin':'auto'});
		  } else {
				if (jQuery('body.rtl').length) {
					jQuery('.logo_wrapper').css({'max-width':'80%', 'width':'80%','padding-right' :'20%'});
					jQuery('.header_logo_wrapper .header_info_wrapper').css({'float':'left', 'width':'auto','padding-right':'0'});
					jQuery('.header_logo_wrapper .header_info_wrapper .user_info_button').css({'float':'left', 'display':'inline-block','margin':'auto'});
				} else {
					jQuery('.logo_wrapper').css({'max-width':'80%', 'width':'80%','padding-left' :'20%'});
			    jQuery('.header_logo_wrapper .header_info_wrapper').css({'float':'right', 'width':'auto','padding-left':'0'});
			    jQuery('.header_logo_wrapper .header_info_wrapper .user_info_button').css({'float':'right', 'display':'inline-block','margin':'auto'});
				}
				jQuery('.logo_wrapper').css('padding-bottom', '0');
		  }
		}
		jQuery(window).resize( function() {
			asalah_center_logo();
		});
	});

	</script>
	<?php
} ?>
</body>
</html>