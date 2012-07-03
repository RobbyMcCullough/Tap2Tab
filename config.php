<?php

// MySQL DATABASE INFO
define(DBHOST, '');
define(DBUSER, '');
define(DBPASS, '');
define(DBNAME, '');


// Open database connection
$db = new mysqli(DBHOST, DBUSER, DBPASS, DBNAME);

define(ROOT, dirname(__FILE__) . '/');      	// Root directory

require(ROOT . 'app/helpers/functions.php');
require(ROOT . 'app/helpers/libraries/Mobile_Detect.php');
require(ROOT . 'app/models/account.php');
require(ROOT . 'app/controllers/registerController.php');
require(ROOT . 'app/controllers/pageController.php');
require(ROOT . 'app/views/view.php');

require('js/bookmarklet.js.php');

$tmpl['intoHeader'] = '';

define(ISMOBILE,$mobileDetect->isMobile());
?>