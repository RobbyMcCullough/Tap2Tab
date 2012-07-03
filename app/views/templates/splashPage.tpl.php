<h1 id="firstIntro">
	Tap2Tab is a bookmarklet that instantly sends a site<br />
	from your computer to your iPad, tablet, or phone.
</h1>

<img src="images/infographic.png" id="infoGraphic" height="202" width="522" />


<h1 id="want2Try">Want To Give It A Try?</h1>

<h1 id="urlChoose">Choose your personal Tap2Tab URL</h1>

<form action="/register-user/" method="POST" id="registerForm">
	<div class="urlBox">http://</div>
	<input type="text" name="pageSlug" id="pageSlug" />
	<div class="urlBox">.tap2tab.com</div>
	<br />	<br />
	<p class="validate <?=$tmpl['validate']?>">Oops, this username has been taken</p>
	<input type="submit" id="startNow" name="startNow" value="Start Now" />
</form>