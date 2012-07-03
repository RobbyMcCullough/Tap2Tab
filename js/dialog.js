runthis();

function runthis() {
	var ourPop = document.createElement('div');
	ourPop.innerHTML = '<div id="Tab2Tap_Modal_Window" style="opacity: 0; text-align: center; background: transparent url(http://tap2tab.com/images/header_bg.png) repeat-x;width: 135px;height: 59px;border: 2px solid black;position: fixed !important;top: 7px !important;left: 6px;z-index: 9999999 !important;color: white;font-family: arial, sans-serif;font-weight: 600;font-size: 14px;padding: 2px;box-shadow: 4px 3px 14px rgba(42, 42, 42, 0.3);">Sending To<img src="http://tap2tab.com/images/loading.gif" style="display: block;margin: 3px auto;" />Tap2Tab</div>';
	document.body.appendChild(ourPop);
	var domPop = document.getElementById('Tab2Tap_Modal_Window');
	fadeIn(domPop);
}

function fadeOut(element) {
  var op = 1; // init opacity
  var timer = setInterval(function () {
    if (op <= 0.1){
      clearInterval(timer);
      element.style.display = 'none';
    }
    element.style.opacity = op;
    element.style.filter = 'alpha(opacity='+ op*100+")";
    op -=op*0.1;
  },50);
}

function fadeIn(element) {
  var op = .1; // init opacity
  element.style.display = 'block';
  var timer = setInterval(function () {
    
    if (op >= 1.0){
      clearInterval(timer);
      fadeOut(element);
    }
    
    element.style.opacity = op;
    element.style.filter = 'alpha(opacity='+ op*50+")";
    op +=op*0.1;
  },50);
}