
<!DOCTYPE html>
<html>
    <head>
        <title>
            Mason ACM | Missing Error
        </title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <!-- CSS is placed here -->
        <link media="all" type="text/css" rel="stylesheet" href="http://masonacm.org/css/bootstrap3.css">
        <link media="all" type="text/css" rel="stylesheet" href="http://masonacm.org/css/body.css">
        <link media="all" type="text/css" rel="stylesheet" href="http://masonacm.org/css/styles.css">


        <!-- Scripts are placed here -->
        <script src="http://masonacm.org/js/jquery.min.js"></script>
        <script src="http://masonacm.org/js/bootstrap3.js"></script>
        <script src="http://masonacm.org/js/jquery.dataTables.js"></script>
        <script src="http://masonacm.org/js/bootbox.js"></script>
        <script src="http://masonacm.org/js/comfirm_delete.js"></script>



        <!-- Ckeditor css overrides -->
        <style>
    
            .cke .cke_source {
                border: none;
                color: black;
            }

        </style>
        <!--========================================================================================April Fools Joke-->
        <script>
            var d = new Date();
            if(d.getMonth()==3 && d.getDate()==1){
                document.writeln("<style>");
                document.writeln("html{");
                document.writeln("-ms-transform: rotate(180deg);");
                document.writeln("-webkit-transform: rotate(180deg);");
                document.writeln("transform: rotate(180deg);");
                document.writeln("-webkit-filter: invert(100%);");
                document.writeln("-moz-filter: invert(100%);");
                document.writeln("-o-filter: invert(100%);");
                document.writeln("-ms-filter: invert(100%);");
                document.writeln("}");
                document.writeln("</style>");
            }
        </script>
        <style>
        img{
			margin-left: 10% !important;
			margin-right: 10% !important;
			border: 3px solid #1D7341;
			-webkit-border-radius:8px;
			-moz-border-radius: 8px;
			border-radius: 8px;
		}
		</style>
    </head>
    <body>
        <div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a href="http://masonacm.org" class="navbar-brand">Mason ACM</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li><a href="http://masonacm.org/forum">Forum</a></li> 
                    <li><a href="http://masonacm.org/tutorials">Tutorials</a></li> 
                    <li><a href="http://masonacm.org/sig">Special Interest Groups</a></li> 
                    <li><a href="http://masonacm.org/lanparty" class="lanparty-button">LAN Party</a></li> 
                </ul>
            </div> <!-- /nav-collapse -->
        </div> <!-- /container -->
    </div> <!-- /navbar -->
    <!-- The Jumbotron must be outside a container div -->
    <div class="jumbotron visible-md visible-lg">
		<div class="container">
			<h1 style="text-align: center;">Missing Error</h1>
		</div>
	</div>
    <div class="container" style="padding: 20px;">
	<div class="row visible-sm visible-xs">
		<div class="col-sm-6 col-sm-offset-3">
			<img src="http://masonacm.org/img/acm_logo.png" class="logo">
		</div>
	</div>

	<div class="row">

		<ul style="text-align: center;">
			<p>Sorry, it seems that Nathan and his dinosaurs have eaten this page.</p>
			<img src="http://www.giggletimetoys.com/mm5/graphics/00000001/2139.jpg">
            <h1>If you did not purposefully receive this error,</h1>
            <h1>please email the url of the current page to kuenzign@gmail.com.</h1>
		</ul>
	</div>
    </body>


    <script>
        $(document).ready(function() {   
             $('.lanparty-button').on('click', function(e) {
                 e.preventDefault();
                 bootbox.alert('No LAN Party is scheduled at this time.');
             });
        });
    </script>

</html>