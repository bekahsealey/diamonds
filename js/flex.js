addLoadEvent(function() {
	resizeColumns("flex-column");
	resizeWidgets("flex", "aside");
});

function resizeWidgets(classname, tag) {
	if (!document.getElementsByClassName || !document.getElementsByTagName) return false;
	
	var sidebars = document.getElementsByClassName(classname);
	if (sidebars == null) return false;
	for (var s=0; s<sidebars.length; s++) {
		var widgets = sidebars[s].getElementsByTagName(tag);
		var numWidgets = convertToWord(widgets.length);
		//var children = sidebar.childNodes;
		
		for (var i=0; i<widgets.length; i++) {
			//alert(children[i].className);
			addClass(widgets[i],numWidgets);
		}
	}
}

function resizeColumns(flex) {
	if (!document.getElementsByClassName || !document.getElementById ) return false;
	
	var columns = document.getElementsByClassName(flex);
	if (columns == null) return false;
	//var numColumns = columnClasses(columns.length);
	var main = document.getElementById("main");
	var left = document.getElementById("left");
	var right = document.getElementById("right");
		
	switch (columns.length) {
    case 1:
		addClass(main, "three-quarters no-float");
        break;
    case 2:
		addClass(main, "two-thirds");
		if (left != null) {
			addClass(left, "third");
			addClass(main, "reverse");
		} else {
			addClass(right, "third reverse");
		}
        break;
    case 3:
		addClass(main, "half");
		addClass(left, "fourth");
		addClass(right, "fourth reverse");
        break;
}

}

function convertToWord(num) {
	//alert (num);
	if (num == 1) {
		return "full no-float";
	} else if (num == 2) {
		return "half";
	} else if (num == 3) {
		return "third";
	} else if (num >= 4) {
		return "fourth";
	}
}

function addClass(elem,value) {
	if (!elem.className) {
		elem.className = value;
	} else {
		newClassName = elem.className;
		newClassName+= " ";
		newClassName+= value;
		elem.className = newClassName;
	}
}

function addLoadEvent(func) {
	var oldonload = window.onload;
	if (typeof window.onload != 'function') {
		window.onload = func;
	} else {
		window.onload = function() {
			oldonload();
			func();
		}
	}
}