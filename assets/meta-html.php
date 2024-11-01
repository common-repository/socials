<?php defined('ABSPATH') or die('No script kiddies please!');
/**
 * @package WordPress
 * @subpackage Socials
 *
 * @author RapidDev | Polish technology company
 * @copyright Copyright (c) 2018, RapidDev
 * @link https://www.rapiddev.pl/en/socials
 * @license https://opensource.org/licenses/MIT
 */
?>
	<div id="fb-sharing" class="rapiddev-alert alert-info" role="alert">
		<h4 class="alert-heading">
			<div style="float:left;margin-right: 20px;">
				<svg version="1.1" id="loader-1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="40px" height="40px" viewBox="0 0 50 50" xml:space="preserve">
					<path fill="#2a5c73" d="M25.251,6.461c-10.318,0-18.683,8.365-18.683,18.683h4.068c0-8.071,6.543-14.615,14.615-14.615V6.461z">
						<animateTransform attributeType="xml" attributeName="transform" type="rotate" from="0 25 25" to="360 25 25" dur="0.6s" repeatCount="indefinite"/>
					</path>
				</svg>
			</div>
		<?php _e('Publishing a post on facebook', 'rd_socials') ?>
	</div>
	
	<div id="fb-error" class="rapiddev-alert alert-danger" role="alert">
		<h4 class="alert-heading"><?php _e('Something went wrong', 'rd_socials') ?>!</h4>
		<p><span id="fb_response"><i><?php _e('An unknown error has occurred', 'rd_socials') ?></i></p>
	</div>

	<div id="fb-success" class="rapiddev-alert alert-info" role="alert">
		<h4 class="alert-heading"><?php _e('Success', 'rd_socials') ?>!</h4>
		<p><span id="fb_response"><?php _e('The post has been properly published on Facebook', 'rd_socials') ?></p>
	</div>
	
	<p>
		<button post-id="<?php the_ID(); ?>" class="rapiddev_socials_share" type="button" id="rd_facebook_share">Facebook</button>
	</p>
	<?php /*
	<p>
		<button post-id="<?php the_ID(); ?>" class="rapiddev_socials_share" type="button" id="rd_twitter_share">Twitter</button>
	</p>
	*/ ?>