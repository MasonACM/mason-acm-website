$(function() {
	$('form[confirm]').on('submit', function(e) {
		e.preventDefault();
		var form = $(this);
		var confirm = $('#confirm-modal');

		confirm.modal('show');		
		form.attr('id', 'confirm-form');	
		$('#confirm-message').text(form.attr('confirm'));
		
		$('#confirm-yes').on('click', function() {
			document.getElementById('confirm-form').submit();
		});
	});
});