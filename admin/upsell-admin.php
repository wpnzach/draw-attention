<?php
class DrawAttention_Upsell {
	var $admin;

	function __construct( $admin ) {
		$this->admin = $admin;

		add_action( 'admin_menu', array( $this, 'admin_menu' ), 20 );

		// Add an action link pointing to the upgrade page.
		$plugin_basename = 'draw-attention/' . $this->admin->instance->plugin_slug . '.php';
		add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );

		// add_filter( 'plugin_action_links_' . $plugin_basename, array( $this, 'add_action_links' ) );
	}

	public function admin_menu() {
		add_submenu_page( 'edit.php?post_type=da_image', 'Upgrade to Pro', 'Upgrade to Pro', 'edit_posts', 'da_upgrade_to_pro', array( $this, 'display_plugin_admin_page' ) );
	}

	public function add_action_links( $links ) {

		return array_merge(
			$links,
			array(
				'upgrade' => '<strong><a href="http://wpdrawattention.com/" target="_blank">' . __( 'Upgrade to Pro', 'drawattention' ) . '</a></strong>'
			)
		);

	}
}