var d = new Date;
if (d.getMonth() == 3 && d.getDate() ==1) {
    var rand = Math.floor((Math.random()*180)+1);
    document.writeln("<style>");
    document.writeln("html{");
    document.writeln("  -ms-transform: rotate("+rand+"deg);");
    document.writeln("  -webkit-transform: rotate("+rand+"deg);");
    document.writeln("  transform: rotate("+rand+"deg);");
    document.writeln("}");
    document.writeln("</style>");
    var icons = document.getElementsByTagName('i');
	for (var i = 0; i < icons.length; i++) {
	    icons[i].className = 'ai ai-troll';
	}
	var icons = document.getElementsByTagName('span');
	for (var i = 0; i < icons.length; i++) {
		if(icons[i].className != ''){
	    	icons[i].className = 'ai ai-troll';
	    }
	}
}
