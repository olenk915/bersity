<?php

/**
 * BuddyPress - Users Activity
 *
 * @package BuddyPress
 * @subpackage bp-default
 */

?>

<div class="item-list-tabs no-ajax" id="subnav" role="navigation">
	<ul>

		<?php bp_get_options_nav() ?>

		<li id="activity-filter-select" class="last">
			<label for="activity-filter-by"><?php _e( 'Show:', 'network' ); ?></label>
			<select id="activity-filter-by">
				<option value="-1"><?php _e( 'Everything', 'network' ) ?></option>
				<option value="activity_update"><?php _e( 'Updates', 'network' ) ?></option>

				<?php
				if ( !bp_is_current_action( 'groups' ) ) :
					if ( bp_is_active( 'blogs' ) ) : ?>

						<option value="new_blog_post"><?php _e( 'Posts', 'network' ) ?></option>
						<option value="new_blog_comment"><?php _e( 'Comments', 'network' ) ?></option>

					<?php
					endif;

					if ( bp_is_active( 'friends' ) ) : ?>

						<option value="friendship_accepted,friendship_created"><?php _e( 'Friendships', 'network' ) ?></option>

					<?php endif;

				endif;

				if ( bp_is_active( 'forums' ) ) : ?>

					<!--<option value="new_forum_topic"><?php _e( 'Forum Topics', 'network' ) ?></option>
					<option value="new_forum_post"><?php _e( 'Forum Replies', 'network' ) ?></option>
-->
				<?php endif;

				if ( bp_is_active( 'groups' ) ) : ?>

					<option value="created_group"><?php _e( 'New Groups', 'network' ) ?></option>
					<option value="joined_group"><?php _e( 'Group Memberships', 'network' ) ?></option>

				<?php endif;

				do_action( 'bp_member_activity_filter_options' ); ?>

			</select>
		</li>
	</ul>
</div><!-- .item-list-tabs -->

<?php do_action( 'bp_before_member_activity_post_form' ); ?>

<?php
if ( is_user_logged_in() && bp_is_my_profile() && ( !bp_current_action() || bp_is_current_action( 'just-me' ) ) )
	locate_template( array( 'activity/post-form.php'), true );

do_action( 'bp_after_member_activity_post_form' );
do_action( 'bp_before_member_activity_content' ); ?>

<div class="activity" role="main">

	<?php locate_template( array( 'activity/activity-loop.php' ), true ); ?>

</div><!-- .activity -->

<?php do_action( 'bp_after_member_activity_content' ); ?>
