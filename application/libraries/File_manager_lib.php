<?php 

	class File_manager_lib{


		//Create With Time
		function create_image_name($file_name){
			return $file_name.time('Y-M-D');
		}

	}