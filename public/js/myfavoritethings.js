$(document).ready(function() {

	var classes = ["blue", "red", "green","orange", "yellow", "purple"];
	var tr = $('tr:first-child, tr:nth-child(3), tr:nth-child(5)');
	var self = $('td');
	var count = 0;

	$('button').click(function() {
		var $this = $(this);
		$('table').css('opacity', 1);
		for(var i = 0; i < classes.length; i++) {
        	var className = classes[i];
	        if(self.hasClass(className)) {
	            switch(className) {
	            	case 'blue':
	            		tr.addClass('info');
	            		break;
	            	case 'red':
	            		tr.addClass('danger');
	            		break;
	            	case 'green':
	            		tr.addClass('success');
	            		break;
	            	case 'orange':
	            		tr.addClass('warning');
	            		break;
	            	case 'yellow':
	            		tr.addClass('warning');
	            		break;	
	            	case 'purple':
	            		tr.addClass('active');
	            		break;
	            	default:
	            		break;
	            }
	        }
	    }
		count++;
		if(count == 1) {
			if($('td').hasClass('little')) {
				$this.animate({
		            top: "+=210px",
		        }, 0);
		        $('table').animate({
		        	bottom: "+=30px",
		        }, 0);
			} else if($('td').hasClass('medium')) {
				$this.animate({
		            top: "+=245px",
		        }, 0);
		        $('table').animate({
		        	bottom: "+=30px",
		        }, 0);
		    } else if($('td').hasClass('large')) {
				$this.animate({
		            top: "+=320px",
		        }, 0);
		        $('table').animate({
		        	bottom: "+=30px",
		        }, 0);
		    }
		}
		if(count == 2) {
			location.reload();
		}
	});

});