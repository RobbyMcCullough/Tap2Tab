<style>
	body, html, #container { overflow: hidden; }
	#mobile {
		width: 1024px;
		margin: 0 auto;
		text-align: center;
		position: relative;
		bottom: 10px;
		z-index: 100;
		}

	h1 { font-size: 8em; }
	footer { position: fixed; }

	
	/* IPAD Portrait */
	@media only screen and (min-width: 1024px) and (orientation:portrait) {
	    #mobile {  margin-top: 550px; }
	}
	
	/* IPAD Landscape */
	@media only screen and (min-width: 1024px) and (orientation:landscape) {
	    #mobile { margin-top: 400px; }
	}

	/* IPhone Portrait */
	@media all and (max-device-width: 480px) and (orientation:portrait) {
	    h1 { font-size: 4em; }
	    #mobile { width: 480px; margin-top: 180px; position: relative; right: 200px; }
	}
	
	/* IPhone Landscape */
	@media all and (max-device-width: 480px) and (orientation:landscape) {
	   h1 { font-size: 4em; margin-top: 50px; }
	}
</style>

<div id="mobile"><h1><?=$tmpl['mobileMessage']?></h1></div>