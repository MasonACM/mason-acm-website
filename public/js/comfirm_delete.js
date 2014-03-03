$(document).ready(function() {

	$('.delete-form').on('submit', function(e) {
		
		return confirm('Are you sure you want to delete?');

	});

});