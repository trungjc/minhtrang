<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package whispli
 */

?>

	<footer class="footer" id="footer" data-class-in="in-animation" data-class-out="out-animation">
		<div class="container">
			<div class="footer-text-top"><?php echo get_option('footer_quote')?></div>
			<?php wp_nav_menu(array('container' => false,'theme_location' => 'footer_primary_menu','menu_class' => 'footer-menu-top hidden-xs'));?>
			<?php wp_nav_menu(array('container' => false,'theme_location' => 'footer_secondary_menu','menu_class' => 'footer-menu-secondary'));?>
			<ul class="footer-menu-social hidden-xs">
				<li>
					<a target="_blank" href="<?php echo get_option('facebook_link')?>"><span class="icon-facebook"></span></a>
				</li>
				<li>
					<a target="_blank" href="<?php echo get_option('twitter_link')?>"><span class="icon-twitter"></span></a>
				</li>
				<li>
					<a target="_blank" href="<?php echo get_option('linkedin_link')?>"><span class="icon-linkedin2"></span></a>
				</li>
				<li>
					<a href="http://discovery.ariba.com/profile/AN01037750328">
						<img alt="View FRAUDSEC PTY LTD profile on Ariba Discovery"  src="<?php echo get_template_directory_uri()?>/assets/img/badge_145x30.png">
					</a>
				</li>
			</ul>
			<div class="logo-small visible-xs-block center">
				<a href="http://discovery.ariba.com/profile/AN01037750328">
					<img alt="View FRAUDSEC PTY LTD profile on Ariba Discovery" src="<?php echo get_template_directory_uri()?>/assets/img/badge_145x30.png">
				</a>
			</div>
		</div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>
<?php if ( is_page_template( 'tmpl-homepage.php' ) ) { ?>
	<script type="text/javascript">
		$(function () {
			var resize_media_body = function () {
				$('.bellow-hero .media .media-body').each(function () {
					var mbHeight = ($(this).outerHeight());
					if ($( window ).width() >= 479) {
						$(this).parent().children('.pull-left').css('height', mbHeight + 'px');
					} else {
						$(this).parent().children('.pull-left').css('height', 'auto');
					}
				});
			}

			resize_media_body();

			var resizeTimer;

			$(window).on('resize', function (e) {

				clearTimeout(resizeTimer);
				resizeTimer = setTimeout(function () {
					
					resize_media_body();

				}, 250);

			});
		});
	</script>
<?php } ?>
<?php if ( is_page_template( 'tmpl-blog.php' ) ) { ?>
	<script type="text/javascript">
		$(function () {
			var $showMore = $('.load-more'), // or whatever your show more button is called
			$container = $('#posts'),
			$filterSelect = $('#FilterSelect'),
			data = {
				'action': 'load_blog_content',
				'bloghash': '',
				'security': whispli_localize.security
			};

			// Bind a click handler to the show more button

			$showMore.on('click', function() {
				data['bloghash'] = 'all';
				jQuery.post(whispli_localize.ajaxurl + "#posts-area > *",data, function (response) {
					$container.html(response).hide().fadeIn('slow');
				});
				$showMore.addClass('hidden');
			});


			// select category
			$filterSelect.on('change', function() {
				data['bloghash'] = this.value;
				jQuery.post(whispli_localize.ajaxurl + "#posts-area > *",data, function (response) {
					console.log(response);
					$container.html(response).hide().fadeIn('slow');
				});
				$showMore.addClass('hidden');
			});
		});
	</script>
<?php } ?>
<?php if ( is_single() && ! is_singular( 'product' ) ) { ?>
	<script type="text/javascript">
		$(function () {
			$('a[href*="blog"]').parent().addClass('current-menu-item');
		});
	</script>
<?php } ?>
<?php if(is_page_template('tmpl-contact.php')) {?>
	<script type="text/javascript">
		$(document).ready(function() {
			// The element where the error messages should be placed
			var $messages = $('#error-message-wrapper');

			$.validate({
				validateOnBlur: true, // disable validation when input looses focus
				errorMessagePosition: $messages,
				onSuccess: function($form) {
					$messages.html("<div class='valid-form'>your message was sent, <br/> we'll be in touch soon</div>");
					// Submit form
					return false; // Will stop the submission of the form
				},
				beforeValidation: function() {
					$messages.html("");
					return false; // Will stop the submission of the form

				}

			});
		});
	</script>
<?php }?>
<?php if (!empty(get_option('google_analytic')))  {?>
	<script>
		(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
				(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
			m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
		})(window,document,'script','//www.google-analytics.com/analytics.js','ga');

		ga('create', '<?php echo get_option('google_analytic')?>', 'auto');
		ga('send', 'pageview');

	</script>
<?php } ?>
</body>
</html>
