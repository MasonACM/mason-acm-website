@extends('layouts.masterWithTitle')

@section('title')
	About
@stop

@section('content')

	<div class="row">
		<style>
			.navbar.navbar-inverse.navbar-fixed-top{
				box-shadow: 0px 0px 6px rgba(0,0,0, 0.65);
				-moz-box-shadow: 0px 0px 6px rgba(0,0,0, 0.65);
				-webkit-box-shadow: 0px 0px 6px rgba(0,0,0, 0.65);
			}
			.col-md-6.col-md-offset-3{
				width: 70%;
				margin-left: 15% !important;
				margin-right: 15% !important;
			}
			.article{
				-webkit-border-radius: 10px;
				-moz-border-radius: 10px;
				border-radius: 10px;
				border: solid 1px #000000;
				padding: 15px !important;
				box-shadow: 0px 2px 6px rgba(0,0,0, 0.65);
				-moz-box-shadow: 0px 2px 6px rgba(0,0,0, 0.65);
				-webkit-box-shadow: 0px 2px 6px rgba(0,0,0, 0.65);
			}
			.btn{
				border: solid 1px #000000 !important;
			}
			table{
				background: #0e0e0e;
				border-collapse: separate;
				-webkit-border-radius: 8px;
				-moz-border-radius: 8px;
				border-radius: 8px;
				border: 3px solid #1D7341;
			}
			td{
				padding: 8px !important;
				border: none;
				border-bottom: 3px solid #1D7341;
			}
			.tdLast{
				border: none;
			}
			img{
				margin-left: 10% !important;
				margin-right: 10% !important;
				border: 3px solid #1D7341;
				-webkit-border-radius:8px;
				-moz-border-radius: 8px;
				border-radius: 8px;
			}
		</style>
		<div class="col-md-6 col-md-offset-3">			
			<div class="article">
				<p>The Mason ACM is part of an international organization, ACM.  ACM is an organization for computing professionals to deliver resources that advance computing as a science and a profession.</p>
				<p>To learn more about ACM as a whole, please visit their <a href="http://www.acm.org/">website</a>.</p>				
			</div>
		</div>
	</div>
@stop