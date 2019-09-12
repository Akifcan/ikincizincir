<?php 

	class Redirect_header_link{

		function __construct(){
		}

		function redirect_to($slug){
			return base_url($slug);
		}

	}