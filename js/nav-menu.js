jQuery(document).ready(function($) {
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
})