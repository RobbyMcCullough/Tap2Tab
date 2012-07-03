<?php

/**
 * Handles user pages, routes, and updates
 */
class PageController {
    public function __construct() { }
	
	public function browserPage() {
		//echo 'ima broweser';
	}
	
	public function mobileRoute() {
		//echo 'goto saved page';
	}
	
	public function clearSavedPage($user) {
		global $account;
		
		if (strtolower($user) != 'tap2tab') {
			$account->deleteSavedPage($user);
			redirect("http://$user.tap2tab.com");
		}
	}
	
	public function bookmarkletJs($user) {
		$bookmarkletJs =
			"javascript: function tap2tab() {
			 var d = document,
			  z = d.createElement('scr' + 'ipt'),
			  b = d.body,
			  l = d.location;
			 try {
			  if (!b) throw (0);
			  z.type = 'text/javascript';
			  z.setAttribute('src', l.protocol + '//$user.tap2tab.com/?addPage=' + encodeURIComponent(l.href)+'&t='+(new Date().getTime()));
			  b.appendChild(z);
			 } catch (e) {
			   alert('Please wait until the page has loaded.');
			 }
			}
			tap2tab();
			void(0)";
			
		$bookmarkletJs = str_replace("\r\n", '', trim($bookmarkletJs));
		return $bookmarkletJs;
	}
}

$pageController = new PageController();
?>