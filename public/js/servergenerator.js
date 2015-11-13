$(document).ready(function() {

	var count = 0;

	$('button').click(function() {
		var $this = $(this);
		$('span').css('opacity', 1);
		count++;
		if(count == 1) {
			$this.animate({
	            top: "+=40px",
	        }, 0);
	        $('h2').animate({
	        	bottom: "+=40px",
	        }, 0);
		}
		if(count == 2) {
			location.reload();
			$('span').css('opacity', 1);
		}
	});

});
