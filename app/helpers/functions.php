<?
/**
 * Redirects the browser to a given page
 * 
 * @param string $page the page to redirect to
 */
function redirect($page) {
	header('Location: ' . $page);
}
?>