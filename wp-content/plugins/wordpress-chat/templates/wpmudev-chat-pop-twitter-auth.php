<?php
include_once( dirname(dirname(__FILE__)) . '/lib/twitteroauth/twitteroauth.php');

session_start();
global $wpmudev_chat;
$twitter_status_message = '';
//$twitter_content = '';
$twitter_screen_name 		= '';
$twitter_profile_image_url 	= '';

//echo "_GET<pre>"; print_r($_GET); echo "</pre>";
//echo "_SESSION<pre>"; print_r($_SESSION); echo "</pre>";


if ((isset($_GET['oauth_token'])) && (!empty($_GET['oauth_token']))
 && (isset($_GET['oauth_verifier'])) && (!empty($_GET['oauth_verifier'])) ) {

	$oauth_token 		= esc_attr($_GET['oauth_token']);
	$oauth_verifier 	= esc_attr($_GET['oauth_verifier']);

	if (isset($_SESSION['wpmudev-chat-twitter-tokens'])) {

		$twitter_tokens = $_SESSION['wpmudev-chat-twitter-tokens'];
		if ((isset($twitter_tokens['oauth_token'])) && (!empty($twitter_tokens['oauth_token']))
		 && (isset($twitter_tokens['oauth_token_secret'])) && (!empty($twitter_tokens['oauth_token_secret']))) {

			$twitter_connection = new TwitterOAuthChat(
				$wpmudev_chat->get_option('twitter_api_key', 'global'),
				$wpmudev_chat->get_option('twitter_api_secret', 'global'),
				$twitter_tokens['oauth_token'], $twitter_tokens['oauth_token_secret']);

			$access_token = $twitter_connection->getAccessToken($oauth_verifier);
			//echo "access_token<pre>"; print_r($access_token); echo "</pre>";

			if ((isset($access_token['oauth_token'])) && (!empty($access_token['oauth_token']))
			 && (isset($access_token['oauth_token_secret'])) && (!empty($access_token['oauth_token_secret']))) {

				$twitter_content = $twitter_connection->get('account/verify_credentials');
				if (isset($twitter_content->errors[0]->message)) {
					//echo "twitter_content<pre>"; print_r($twitter_content); echo "</pre>";
					$twitter_status_message = __("ERROR:", $wpmudev_chat->translation_domain) ." ". $twitter_content->errors[0]->message ."<br />";
					//$twitter_content = '';
				} else {
					//echo "twitter_content<pre>"; print_r($twitter_content); echo "</pre>";
					$twitter_screen_name 		= $twitter_content->screen_name;
					$twitter_profile_image_url 	= $twitter_content->profile_image_url;
				}

			} else {
				$twitter_status_message = __("ERROR: Unable to obtain Twitter OAuth access tokens.", $wpmudev_chat->translation_domain);
			}
		} else {
			$twitter_status_message = __("ERROR: Unable to obtain Twitter OAuth access tokens.", $wpmudev_chat->translation_domain);
		}
		?><html>
		<head>
			<title></title>
			<?php $wpmudev_chat->wp_head(); ?>
		</head>
		<body class="wpmudev-chat-twitter-auth">
		<?php
			if (!empty($twitter_status_message)) {
				echo $twitter_status_message;
			} else {
				//echo "you may close this window.";
			}
		?>
		<?php $wpmudev_chat->wp_footer(); ?>
		<?php if ( (empty($twitter_status_message)) && (!empty($twitter_screen_name)) && (!empty($twitter_profile_image_url))) { ?>
			<?php
				//echo "twitter_status_message=[". $twitter_status_message ."]<br />";
				//echo "twitter_screen_name=[". $twitter_screen_name ."]<br />";
				//echo "twitter_profile_image_url=[". $twitter_profile_image_url ."]<br />";
				//echo "twitter_content<pre>"; print_r($twitter_content); echo "</pre>";
			?>
			<script type='text/javascript'>
				jQuery(document).ready(function() {
					jQuery.cookie('chat_stateless_user_type_104', 'twitter', { expires: 7, path: '/'});
					jQuery.cookie('chat_stateless_user_name_twitter', '<?php echo $twitter_content->screen_name; ?>', { expires: 7, path: '/'});
					jQuery.cookie('chat_stateless_user_image_twitter', '<?php echo $twitter_content->profile_image_url; ?>', { expires: 7, path: '/'});
					window.location.href = "<?php echo remove_query_arg(array('wpmudev-chat-action', 'oauth_token', 'oauth_verifier')); ?>";
				});
			</script>
		<?php } ?>
		</body>
		</html><?php
	}
} else if (isset($_GET['denied'])) {
	$redirect_url = remove_query_arg(array('wpmudev-chat-action', 'denied'));
	//echo "redirect_url=[". $redirect_url ."]<br />";
	wp_redirect($redirect_url);
	die();
} else {
	$twitter_connection = new TwitterOAuthChat($wpmudev_chat->get_option('twitter_api_key', 'global'), $wpmudev_chat->get_option('twitter_api_secret', 'global'));
	$query_args = array(
		'wpmudev-chat-action'	=>	'pop-twitter',
	);

	$callback_url 	= add_query_arg( $query_args, get_option('siteurl').$_SERVER['REQUEST_URI']);
	$request_token 	= $twitter_connection->getRequestToken($callback_url);

	if ((is_array($request_token)) && (isset($request_token['oauth_token']))) {
		$_SESSION['wpmudev-chat-twitter-tokens'] = $request_token;

   		$request_url = $twitter_connection->getAuthorizeURL($request_token['oauth_token']);
		wp_redirect($request_url);
	}
	die();
}