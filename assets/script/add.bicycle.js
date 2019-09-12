$(document).ready(function(){

    const REDIRECT_PATH = 'http://localhost/ikinciZincir2/ilan/'
	const BASE_PATH = 'http://localhost/ikinciZincir2/Bicycle'

	$('[data-toggle="tooltip"]').tooltip()

	Dropzone.autoDiscover = false;
	$("#dZUpload").dropzone({
		url: BASE_PATH+'/add_bicycle_image',
		addRemoveLinks: true,
		success: function (file, response) {
			$('button#addProduct').attr('disabled', false);
		},
		error: function (file, response) {
			file.previewElement.classList.add("dz-error");
		}
	});


	//Html
	$('button#addProduct').attr('disabled', true);
	$('button#addHref').click(function(){
		$('textarea#description').html("<a href=''></a>");
	})

	//Wizard
	$('div#wizard2').hide()
	$('button#showWizard2').click(function(){
		$('div#wizard1').fadeOut()
		$('div#wizard2').fadeIn()
	})
	$('button#showWizard1').click(function(){
		$('div#wizard2').fadeOut()
		$('div#wizard1').fadeIn()
	})
	//Mask
    $('input#price').mask("#.##0,00", {reverse: true});
    $('input#phoneNumber').mask('000-000-00-00');

    $('button#addProduct').click(function(){
    	context= {
    		'name'		 	: 	$('input#name').val(),
    		'bicycle_name'	:   $('select#bicycleName').val(),
    		'bicycle_brand'	:   $('select#bicycleBrand').val(),
    		'bicycle_model'	:   $('select#bicycleModel').val(),
    		'bicycle_type'  :   $('select#bicycleType').val(),
    		'jant'			:   $('select#jant').val(),
    		'cadre'			: 	$('select#cadre').val(),
    		'cadre_type'	: 	$('select#cadreType').val(),
    		'status'		:   $('select#status').val(),
    		'price'			:   $('input#price').val(),
    		'front_brake'	: 	$('select#frontBrake').val(),
    		'rear_brake'	: 	$('select#rearBrake').val(),
    		'year'			: 	$('select#year').val(),
    		'phone_number'  :   $('input#phoneNumber').val(),
    		'meet_location' :   $('textarea#meetLocation').val(),
    		'description'	: 	$('textarea#description').val(),
    	}
    	$.post(BASE_PATH+'/add_bicycle', context, function(response){
    		response = JSON.parse(response)
    		if(response[0]){
                window.location.href = REDIRECT_PATH+'/'+response[1]+'/'+response[2]
    		}else if(!response[0]){
    			$('div#messageAddProduct').html(response[1])
    		}

    	})

    })



})