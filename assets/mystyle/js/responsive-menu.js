var android = document.getElementById("burger");
var nav = document.getElementById("menu-left");
var navR = document.getElementById("menu-right");
	android.addEventListener("click", function(e) {
		nav.classList.toggle("animate__zoomIn");
		nav.classList.toggle("responsive-menu");
		navR.classList.toggle("responsive-menu");
		navR.classList.toggle("animate__zoomIn");
		e.preventDefault();
	});