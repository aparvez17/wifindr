function menu(){
	var menu = document.getElementById("menu_wrap");
	var body = document.getElementsByTagName("body")[0];
	if(menu.getAttribute("active") == "0"){
		menu.style.right = "0px";
		body.style.left = "-200px";
		menu.setAttribute("active", "1");
	}
	else if(menu.getAttribute("active") == "1"){
		menu.style.right = "-310px";
		body.style.left = "0px";
		menu.setAttribute("active", "0");
	}
}