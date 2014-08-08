<?php
/**
 * Plugin Name: Sticky Street Integration
 * Description: It allows WordPress sites to connect with Sticky Street API
 * Version: 1.0
 * Author: Mozido Inc.
 * License: GPL2
 */

require_once "Operations.php";
use Operations\Operations;

function set_up_ss_integration() {
	$ssExists = get_page_by_title('Balance');

	if ($ssExists == NULL) {
		$page['post_type']    = 'page';
		$page['post_content'] = '[ss_balance_view]';
		$page['post_parent']  = 0;
		$page['post_author']  = 1;
		$page['post_status']  = 'publish';
		$page['post_title']   = 'Balance';
		$page['post_name']    = "sticky-street-balance";
		$page['ping_status']  = "closed";
		$pageid               = wp_insert_post($page);
	}

	$ssExists = get_page_by_title('History');

	if ($ssExists == NULL) {
		$page['post_type']    = 'page';
		$page['post_content'] = '[ss_balance_history]';
		$page['post_parent']  = 0;
		$page['post_author']  = 1;
		$page['post_status']  = 'publish';
		$page['post_title']   = 'History';
		$page['post_name']    = "sticky-street-history";
		$page['ping_status']  = "closed";
		$pageid               = wp_insert_post($page);
	}
}

function check_credentials() {
	Operations::getSingleton()->setUsername($_POST['log']);
	Operations::getSingleton()->setPassword($_POST['pwd']);
	$response = Operations::getSingleton()->login();

	if ($response) {
		add_option("ssenabled", true);
		if (!username_exists($_POST['log'])) {
			$userdata = array(
				'user_login' => $_POST['log'],
				'user_pass'  => $_POST['pwd'],
				'first_name' => Operations::getSingleton()->getUser()->getFirstName(),
				'last_name'  => Operations::getSingleton()->getUser()->getLastName(),
				'user_email' => Operations::getSingleton()->getUser()->getEmail(),
				'nickname'   => Operations::getSingleton()->getUser()->getCode()
			);

			wp_insert_user($userdata);

		}
	} else {
		add_option("ssenabled", false);
	}
}

function get_balance_view() {
	include "views/campaign/balance.php";
}

function get_history_view() {
	include "views/campaign/history.php";
}

function get_balances() {

	$currentUser = wp_get_current_user();
	$currentUser = get_user_meta($currentUser->data->ID);

	$userEmpty = Operations::getSingleton()->getUser()->isEmpty();
	if ($userEmpty) {
		Operations::getSingleton()->getUser()->createUserFromWP($currentUser);
	}

	$ssEnabled = get_option("ssenabled");
	if ($ssEnabled) {
		$balances = Operations::getSingleton()->getBalance();
		return $balances;
	}
}