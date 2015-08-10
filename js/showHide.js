jQuery(document).ready(function($){
	var cbox = document.getElementById('showHide');
	cbox.style.display = 'block';
	var referredBy = document.getElementById('contact_ref');
	var noref = document.getElementById('contact_noref');
	referredBy.onclick = function () {
			var ref = document.getElementById('contact_referredBy');
			var sel = referredBy.checked;
			ref.parentNode.style.display = sel ? 'block' : 'none';
			ref.disabled = !sel;
	}
	noref.onclick = function () {
			var ref = document.getElementById('contact_referredBy');
			var sel = noref.checked;
			ref.parentNode.style.display = sel ? 'none' : 'block';
			ref.disabled = !sel;
	}
		
})