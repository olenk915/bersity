<?php
/**
 * Renders form elements for admin settings pages.
 */
class Bau_AdminFormRenderer {

	function _get_option () {
		return get_site_option('bau');
	}

	function _create_radiobox ($name, $label, $value) {
		$opt = $this->_get_option();
		$checked = (@$opt[$name] == $value) ? true : false;
		return "<input type='radio' name='bau[{$name}]' id='{$name}-{$value}' value='{$value}' " . ($checked ? 'checked="checked" ' : '') . " /> " .
			"<label for='{$name}-{$value}'>{$label}</label>";
	}

	function create_show_add_new_users_box () {
		$options = array (
			'add_users' => __('Yes', 'bau'),
			'manage_network_options' => __('Super Admins only', 'bau'),
			'' => __('No', 'bau'),
		);
		foreach ($options as $opt => $label) {
			echo $this->_create_radiobox('show_add_new_users', $label, $opt) . '<br />';
		}
	}

	function create_show_add_existing_users_box () {
		$options = array (
			'add_users' => __('Yes', 'bau'),
			'manage_network_options' => __('Super Admins only', 'bau'),
			'' => __('No', 'bau'),
		);
		foreach ($options as $opt => $label) {
			echo $this->_create_radiobox('show_add_existing_users', $label, $opt) . '<br />';
		}
	}

	function create_show_add_blogs_box () {
		$options = array (
			'add_users' => __('Yes', 'bau'),
			'manage_network_options' => __('Super Admins only', 'bau'),
			'' => __('No', 'bau'),
		);
		foreach ($options as $opt => $label) {
			echo $this->_create_radiobox('show_add_blogs', $label, $opt) . '<br />';
		}
	}

	function create_messages_info () {
		echo '<p><em>' . __('This is where you can set up message pop-ups for certain fields in the Creator interface. You can make use of these messages to e.g. explain format restrictions to your users.', 'bau') . '</em></p>';
		echo '<p><em>' . __('Simply leave the message boxes empty in order not to show them.', 'bau') . '</em></p>';
	}

	function create_username_popup_box () {
		$opt = $this->_get_option();
		$ttl = @$opt['username_msg_title'];
		$msg = @$opt['username_msg_body'];

		echo
			'<label for="bau-email_message_title">Message title</label>' .
			'<input type="text" class="widefat" name="bau[username_msg_title]" value="' . esc_html(wp_strip_all_tags($ttl)) . '" />' .
			'<label for="bau-email_message_title">Message body</label>' .
			'<textarea class="widefat" rows="4" name="bau[username_msg_body]">' . esc_html(wp_strip_all_tags($msg)) . '</textarea>'
		;
	}

	function create_password_popup_box () {
		$opt = $this->_get_option();
		$ttl = @$opt['password_msg_title'];
		$msg = @$opt['password_msg_body'];

		echo
			'<label for="bau-password_message_title">Message title</label>' .
			'<input type="text" class="widefat" name="bau[password_msg_title]" value="' . esc_html(wp_strip_all_tags($ttl)) . '" />' .
			'<label for="bau-password_message_title">Message body</label>' .
			'<textarea class="widefat" rows="4" name="bau[password_msg_body]">' . esc_html(wp_strip_all_tags($msg)) . '</textarea>'
		;
	}

	function create_email_popup_box () {
		$opt = $this->_get_option();
		$ttl = @$opt['email_msg_title'];
		$msg = @$opt['email_msg_body'];

		echo
			'<label for="bau-email_message_title">Message title</label>' .
			'<input type="text" class="widefat" name="bau[email_msg_title]" value="' . esc_html(wp_strip_all_tags($ttl)) . '" />' .
			'<label for="bau-email_message_title">Message body</label>' .
			'<textarea class="widefat" rows="4" name="bau[email_msg_body]">' . esc_html(wp_strip_all_tags($msg)) . '</textarea>'
		;
	}

}