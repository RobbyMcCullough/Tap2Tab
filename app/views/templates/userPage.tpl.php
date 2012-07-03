<div id="userPage">
	<div id="instructions">
		<h1>How To Use</h1>
		<div id="instructionsContainer"> 
		<h2>First - Bookmark <a href="#"><?=$tmpl['userName']?>.tap2tab.com</a> on your tablet </h2> 
		<p>When you visit Tap2Tab on your mobile device it will immediately send you to your saved page. Set a bookmark now while there's nothing saved. Or later, use the red X to clear a saved page. This is helpful for adding additional devices.</p>
		<h2>Second -- Setup the bookmarklet on your computer</h2>
		<p>Drag this bookmarklet: <a href="<?=$tmpl['bookmarkletJs']?>">Tap2Tab</a> to your bookmarks bar and you're ready to go! Whenever you hit the bookmarklet, the page you are viewing will automatically show up when you visit Tap2Tab on your tablet.</p> 	
		</div>
	</div>
	<div id="preview">
		<h1>Your Saved Page <a href="clear-saved/" class="remove" title="Clear Saved Page">X</a> </h1>
		<? if ($tmpl['savedPage'] == '') : ?>
		<div id="fauxSavedPage">
			<div>
				<h2>Add Tap2Tab as a bookmark on your tablet before you start saving pages.</h2>
			</div>
		</div>
		<? else: ?>
		<iframe src="<?=$tmpl['savedPage']?>" id="pagePreview" scrolling="no" frameborder="0"><p>Your browser does not support iframes.</p></iframe>
		<? endif; ?>
	</div>	
</div>
<div style="clear: both;"></div>