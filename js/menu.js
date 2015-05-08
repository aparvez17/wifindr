function menu(){
	var menu = document.getElementById("menu_wrap");
	if(menu.getAttribute("active") == "0"){
		menu.style.right = "0px";
		menu.setAttribute("active", "1");
	}
	else if(menu.getAttribute("active") == "1"){
		menu.style.right = "-300px";
		menu.setAttribute("active", "0");
	}
}