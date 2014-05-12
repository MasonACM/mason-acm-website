@extends('layouts.master')

@section('pageTitle')
	<div class="banner">
	    <div class="container" style="padding: 20px;">                   
	        <div class="row">	            
                <div class="banner-heading">
                    @yield('icon')
                    @yield('title')                                  
                </div>    
	        </div>                  
	    </div>
	</div>
@stop