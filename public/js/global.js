$(function() {

    //----------------------------------------//
    //-- Confirm modal -----------------------//
    //----------------------------------------//
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

    //----------------------------------------//
    //-- April Fools joke---------------------//
    //----------------------------------------//
    var date = new Date;
    if (date.getMonth() == 3 && date.getDate() == 1) {
        var rand = Math.floor((Math.random() * 180) + 1);

        $('.fa').addClass('ai-troll').removeClass('fa');

        $('html').css({
            'transform':         'rotate(' + rand + 'deg)',
            '-ms-transform':     'rotate(' + rand + 'deg)',
            '-webkit-transform': 'rotate(' + rand + 'deg)'
        });
    }
});