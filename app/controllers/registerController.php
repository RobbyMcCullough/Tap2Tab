<?php

/**
 * Controls cookies
 * 
 * Handles the setting and removal of login cookies.
 */
class RegisterController {
	
	// Initate Cookie Time variable
    public function __construct() { }
	
	public function registerUser($args) {
		global $account;
		global $view;
		global $tmpl;
		
		$pageSlug = $args['pageSlug'];
		
		// make sure form wasn't empty && make sure the URL slug is not taken
		if ($account->readUserId($pageSlug) || empty($pageSlug)) {
			$tmpl['validate'] = '';
			$view->createPage('splash', $tmpl);
		}
		
		if (!preg_match('/^[A-Za-z0-9_]+$/',$pageSlug)) {
			die('usernames can only contain letters, numbers and underscores.');
		}
		
		$account->create($pageSlug);
		redirect('http://' . $pageSlug . '.tap2tab.com/');
	}
	
}

$registerController = new RegisterController();
?>