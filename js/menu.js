function menu(){
	var menu = document.getElementById("menu_wrap");
	var body = document.getElementsByTagName("body")[0];
	if(menu.getAttribute("active") == "0"){
		menu.style.right = "0px";
		body.style.marginLeft = "-200px";
		menu.setAttribute("active", "1");
	}
	else if(menu.getAttribute("active") == "1"){
		menu.style.right = "-300px";
		body.style.marginLeft = "0px";
		menu.setAttribute("active", "0");
	}
}