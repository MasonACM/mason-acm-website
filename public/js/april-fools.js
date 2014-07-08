var date = new Date;

if (date.getMonth() == 3 && date.getDate() == 1) {
	alert('x')
    var rand = Math.floor((Math.random() * 180) + 1);

    $('.fa').addClass('ai-troll').removeClass('fa');

    $('html').css({    	
		'transform':         'rotate(' + rand + 'deg)',
		'-ms-transform':     'rotate(' + rand + 'deg)',
		'-webkit-transform': 'rotate(' + rand + 'deg)'
    });
}