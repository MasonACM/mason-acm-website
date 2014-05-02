$(function() {
	var d = new Date;
	if (date.getMonth() == 3 && date.getDate() ==1) {
	    var rand = Math.floor((Math.random()*180)+1);
	    document.writeln("<style>");
	    document.writeln("html{");
	    document.writeln("  -ms-transform: rotate("+rand+"deg);");
	    document.writeln("  -webkit-transform: rotate("+rand+"deg);");
	    document.writeln("  transform: rotate("+rand+"deg);");
	    document.writeln("}");
	    document.writeln("</style>");
});

