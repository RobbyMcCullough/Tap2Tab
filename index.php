<?php

require('config.php');
$tmpl['userName'] = substr($_SERVER['SERVER_NAME'], 0, strpos($_SERVER['SERVER_NAME'], '.'));
$view->createPage('splash', $tmpl);
die();

// Update Saved Page
if ($_GET['addPage'] != '') {
	$account->updateSavedPage($tmpl['userName'], $_GET['addPage']);
	header('Content-type: application/javascript');
	include('js/dialog.js');
	exit();
}

// Splash Page
if (!$_GET['controller'] && strtolower($tmpl['userName']) == 'tap2tab') {
	$view->createPage('splash', $tmpl);
	exit();
}


// Register User
switch ($_GET['controller']) {
	case 'register-user/':
		$registerController->registerUser($_POST);
		exit();
		break;
	case 'clear-saved/':
		$pageController->clearSavedPage($tmpl['userName']);
		break;
}

// User Page
if (!$_GET['controller']) {
	$tmpl['savedPage'] = $account->readSavedPage($tmpl['userName']);
	$tmpl['bookmarkletJs'] = $pageController->bookmarkletJs($tmpl['userName']);
	
	if (ISMOBILE == 1 && $tmpl['savedPage'] == '') {
		//redirect($tmpl['savedPage']);
		$tmpl['mobileMessage'] = 'Add Me To Your <br />&#8962;&nbsp;Home Screen';
		$view->createPage('mobile', $tmpl);
		exit();
	} elseif (ISMOBILE == 1) {
		$tmpl['intoHeader'] = '<meta http-equiv="refresh" content="0;url=' . $tmpl['savedPage'] . '">';
		$tmpl['mobileMessage'] = 'Redirecting<br /><img src="http://tap2tab.com/images/loading.gif" />';
		$view->createPage('mobile', $tmpl);
		exit();
	}

	$view->createPage('user', $tmpl);
	exit();
}

?>