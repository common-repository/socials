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

	if(!class_exists('RAPIDDEV_SOCIALS'))
	{
		class RAPIDDEV_SOCIALS
		{
			public static function init()
			{
				return new RAPIDDEV_SOCIALS();
			}
			public function __construct()
			{
				add_action('plugins_loaded', array($this, 'languages'));
				add_action('wp_ajax_rapiddev_socials', array($this, 'ajax'));

				add_action('admin_menu', array($this, 'submenu'), 999);
				add_filter('plugin_action_links_'.RAPIDDEV_SOCIALS_BASENAME,array($this,'settings_url'));

				global $pagenow;
				if ($pagenow == 'post.php' || $pagenow == 'post-new.php')
				{
					add_action('admin_head', array($this, 'post_css'));
					add_action('admin_footer', array($this, 'post_js'));
					add_action('add_meta_boxes', array($this, 'meta_box'));
				}

				if ($pagenow == 'options-general.php' && isset($_GET['page']))
				{
					if ($_GET['page'] == 'social-share') {
						add_filter('admin_footer_text', array($this, 'footer'));
						add_action('admin_enqueue_scripts', array($this, 'settings_css'));
						add_action('admin_footer', array($this, 'settings_js'));
					}
				}

				if (get_option('social_sharing') == false )
				{
					update_option('rapiddev_socials_nonce', '{"page-id":"","page-token":"","tags":true,"url":true}');
				}

				if (get_option('rapiddev_socials_nonce') == false )
				{
					update_option('rapiddev_socials_nonce', self::rand_gen(15, RAPIDDEV_SOCIALS_URL), NULL, 'no');
				}
			}
			public static function rand_gen($length = 10, $custom = NULL)
			{
				$map = 'qwertyuiopasdfghjklzxcvbnm0987654321QWERTYUIOPASDFGHJKLZXCVBNM{}()[]:;,.<>!@#$%^&*_+=-';
				$chL = strlen($map);
				$random = '';
				for ($i = 0; $i < $length; $i++) {
					$random .= $map[rand(0, $chL - 1)];
				}
				if ($custom !== NULL) {
					if (function_exists('openssl_encrypt')) {
						$enc = openssl_encrypt($custom, 'aes-256-cbc', substr(hash('sha256', $random, true), 0, 32), OPENSSL_RAW_DATA, chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0).chr(0x0));
					}else{
						$enc = hash('sha256', $random, true);
					}
					$random = substr($enc.$random, 1, $length);
				}
				return $random;
			}
			public function languages()
			{
				load_plugin_textdomain('rd_socials',FALSE, basename(RAPIDDEV_SOCIALS_PATH).'/languages/');
			}
			public function settings_url($data)
			{
				array_push($data,'<a href="'.admin_url('/options-general.php?page=social-share').'">'.__('Settings').'</a>');
				return $data;
			}
			public function footer()
			{
				echo '<span id="rapiddev-admin-footer">Created with <span class="heart-icon dashicons dashicons-heart"></span> in Poland by RapidDev | '.__('Leave us a rating', 'rd_socials').' <a href="https://wordpress.org/support/plugin/socials/reviews?rate=5#new-post" target="_blank" rel="noopener" class="rapiddev-rating" data-rated="'.__('Thank you', 'rd_socials').' :)">★★★★★</a></span>';
			}
			public function ajax()
			{
				check_ajax_referer(get_option('rapiddev_socials_nonce', NULL), 'security');
				if (isset($_POST['post_id']))
				{
					$options = json_decode(get_option('social_sharing'), true);
					$post_id = sanitize_text_field($_POST['post_id']);
					$url = get_the_permalink($post_id);
					$excerpt = get_post_field('post_excerpt', $post_id);

					$a_url = '';$tags = '';
					if ($options['tags']){
						$tag_count = 0;
						foreach(get_tags($post_id) as $tag){
							if($tag_count < 10){
								$tags = $tags.'#'.str_replace(' ', '-', $tag->name).' ';
							}
							$tag_count++;
						}
						$tags = $tags."\n";
					}
					if ($options['url']){$a_url = "\n".$url;}
					if ($excerpt == NULL){wp_die('{"error":{"message":"There is no excerpt here"}}');}

					$message = $tags.$excerpt.$a_url;

					wp_die(wp_remote_retrieve_body(wp_remote_post('https://graph.facebook.com/'.$options['page-id'].'/feed', array(
						'body' => array(
							'access_token' => $options['page-token'],
							'link' => $url,
							'message' => $message
						)
					))));
				}
				else if(isset($_POST['page-id']) && isset($_POST['page-token']))
				{
					$data['page-id'] = sanitize_text_field($_POST['page-id']);
					$data['page-token'] = sanitize_text_field($_POST['page-token']);
					$data['tags'] = FALSE;if(isset($_POST['tags-checkbox'])){if($_POST['tags-checkbox'] == 1){$data['tags'] = TRUE;}}
					$data['url'] = FALSE;if(isset($_POST['url-checkbox'])){if($_POST['url-checkbox'] == 1){$data['url'] = TRUE;}}
					update_option('social_sharing', json_encode($data, JSON_UNESCAPED_UNICODE));
					wp_die('success');
				}else{
					wp_die('error');
				}
			}
			public function submenu()
			{
				add_submenu_page('options-general.php', __('Social sharing', 'rd_socials'), __('Social sharing', 'rd_socials'), 'manage_options', 'social-share', array($this, 'callback'));
			}
			public function callback()
			{
				if (is_file(RAPIDDEV_SOCIALS_PATH.'assets/admin-page.php')) {
					include(RAPIDDEV_SOCIALS_PATH.'assets/admin-page.php');
				}
			}
			public function meta_box()
			{
				add_meta_box('rapiddev_socials', __('Share','rd_socials'), array($this, 'meta_fields'), 'post', 'side', 'high');
			}
			public function meta_fields()
			{
				if (is_file(RAPIDDEV_SOCIALS_PATH.'assets/meta-html.php')) {
					include(RAPIDDEV_SOCIALS_PATH.'assets/meta-html.php');
				}
			}
			public function settings_css()
			{
				wp_enqueue_style('social-sharing', RAPIDDEV_SOCIALS_URL.'/assets/css/socials.css');
				wp_add_inline_style('social-sharing', '*:focus,*:active{outline: 0px solid transparent !important;outline-offset: -2px !important;}');
				wp_enqueue_style('google-font', 'https://fonts.googleapis.com/css?family=Josefin+Sans');
			}
			public function settings_js()
			{
				$options = json_decode(get_option('social_sharing'), true);
				echo '<script>var social_sharing = {page_token:"'.$options['page-token'].'",page_id:"'.$options['page-id'].'",nonce: "'.wp_create_nonce(get_option('rapiddev_socials_nonce',NULL)).'",admin_url:"'.admin_url('admin-ajax.php').'",site_url:"'.get_site_url().'"};</script><script async="async" defer="defer" src="'.RAPIDDEV_SOCIALS_URL.'/assets/js/social-admin.js'.'" />';
			}
			public function post_js()
			{
				echo '<script>var social_sharing = {nonce: "'.wp_create_nonce(get_option('rapiddev_socials_nonce',NULL)).'",admin_url:"'.admin_url('admin-ajax.php').'"};</script><script async="async" defer="defer" src="'.RAPIDDEV_SOCIALS_URL.'/assets/js/social-user.js'.'" />';
			}
			public function post_css()
			{
				echo '<style>.rapiddev-alert{display:none;position: relative;padding: 0 20px;margin-bottom: 1rem;border: 1px solid transparent;border-radius: 0.25rem;}.alert-info {color: #0c5460;background-color: #d1ecf1;border-color: #bee5eb;}.alert-info hr {border-top-color: #abdde5;}.alert-info .alert-link {color: #062c33;}.alert-heading{color: inherit;}.alert-danger {color: #721c24;background-color: #f8d7da;border-color: #f5c6cb;}.alert-danger hr {border-top-color: #f1b0b7;}.alert-danger .alert-link {color: #491217;}.rapiddev_socials_share{width:-webkit-fill-available;cursor:pointer;font-weight: 400;text-align: center;white-space: nowrap;vertical-align: middle;-webkit-user-select: none;-moz-user-select: none;-ms-user-select: none;user-select: none;border: 1px solid transparent;padding: 0.375rem 0.75rem;font-size: 1rem;line-height: 1.5;border-radius: 0.25rem;transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;}.rapiddev_socials_share:hover, .rapiddev_socials_share:focus {text-decoration: none;}.rapiddev_socials_share {color: #fff;background-color: #17a2b8;border-color: #17a2b8;}.rapiddev_socials_share:hover {color: #fff;background-color: #138496;border-color: #117a8b;}.rapiddev_socials_share:focus, .rapiddev_socials_share.focus {box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);}.rapiddev_socials_share.disabled, .rapiddev_socials_share:disabled {color: #fff;background-color: #17a2b8;border-color: #17a2b8;}.rapiddev_socials_share:not(:disabled):not(.disabled):active, .rapiddev_socials_share:not(:disabled):not(.disabled).active,.show > .rapiddev_socials_share.dropdown-toggle {color: #fff;background-color: #117a8b;border-color: #10707f;}.rapiddev_socials_share:not(:disabled):not(.disabled):active:focus, .rapiddev_socials_share:not(:disabled):not(.disabled).active:focus,.show > .rapiddev_socials_share.dropdown-toggle:focus {box-shadow: 0 0 0 0.2rem rgba(23, 162, 184, 0.5);}</style>';
			}
		}
	}