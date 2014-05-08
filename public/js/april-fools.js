$(function() {
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
	}
});

