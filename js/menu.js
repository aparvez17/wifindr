function menu(){
	var menu = document.getElementById("menu_wrap");
	var icon = document.getElementById("menu_icon");
	var body = document.getElementsByTagName("body")[0];
	if(menu.getAttribute("active") == "0"){
		menu.style.right = "0px";
		body.style.left = "-200px";
		icon.style.opacity = "0";
		menu.setAttribute("active", "1");
		icon.style.visibility = "hidden";
	}
	else if(menu.getAttribute("active") == "1"){
		menu.style.right = "-310px";
		body.style.left = "0px";
		icon.style.opacity = "1";
		menu.setAttribute("active", "0");
		icon.style.visibility = "visible";
	}
}