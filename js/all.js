jQuery(document).ready(function($) {
	//load slicknav
    $('#menu-main').slicknav();
	
	// diamonds load
	var view= $( window ).width();
	if ( view <= 640 ) {
		$(".diamondswrap").diamonds({
			size: 120, // Size of the squares
			gap: 3, // Pixels between squares
			hideIncompleteRow : true
		});
	} 
	if (view > 640 ) {
		$(".diamondswrap").diamonds({
			size: 250, // Size of the squares
			gap: 4, // Pixels between squares
			hideIncompleteRow : true,
			redraw: true
		});
		var rowWidth = $(".diamonds").first().width();
		$(".diamondswrap").css("max-width", rowWidth);
	}
	
	//nav menu html correction if menu left default
	if ( $(".wrapper>header div.menu") == null) {
		return false;
	}
	$(".wrapper>header div.menu").each(function() {
		$(this).find("ul").attr("id", "menu-main").attr("class", "menu horiz column reverse");
		var menucontent = $(this).html();
		$(this).replaceWith('<nav class="menu column half reverse"></nav>');
		$("nav.menu").append(menucontent).removeClass("menu ");
		
	});
	if ( $(".wrapper>header div#social") == null) {
		return false;
	}
	$(".wrapper>header div#social").each(function() {
		$(this).find("a").contents()
  .filter(function(){
    return this.nodeType !== 1;
  })
  .wrap( '<span></span>' );
		
	});
	
	// reorder document structure for mobile
	if ( $("div#left") == null || $("div#main") == null || $("main") == null) return false; 
	var viewWidth = $( window ).width();
	if ( viewWidth >= 900 ) {
		return;
	} else {
		var sidebar = $("div#left").detach();
		$("div#main").append(sidebar);
		sidebar = null;
	}
	
})