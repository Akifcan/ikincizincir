$(document).ready(function(){

	const REDIRECT_PATH = 'http://localhost/ikinciZincir2/ilan/'
	const BASE_PATH = 'http://localhost/ikinciZincir2/Spare_part'

	//wizard
	$('div#wizard2').hide()
	$('button#showWizard2').click(function(){
		$('div#wizard1').fadeOut()
		$('div#wizard2').fadeIn()
	})
	$('button#showWizard1').click(function(){
		$('div#wizard2').fadeOut()
		$('div#wizard1').fadeIn()
	})

	//mask
	$('input#price').mask("#.##0,00", {reverse: true});
	$('input#phoneNumber').mask('000-000-00-00');

	$('button#addProduct').attr('disabled', true);
	Dropzone.autoDiscover = false;
	$("#dZUpload").dropzone({
		url: BASE_PATH+'/add_spare_part_image',
		addRemoveLinks: true,
		success: function (file, response) {
			$('button#addProduct').attr('disabled', false);
		},
		error: function (file, response) {
			file.previewElement.classList.add("dz-error");
		}
	});


	$('button#addProduct').click(function(){
		context= {
			'name'			: $('input#name').val(),
			'product_type'	: $('select#productType').val(),
			'product_name'  : $('select#productName').val(),
			'part_type'		: $('select#partType').val(),
			'phone_number'  : $('input#phoneNumber').val(),
			'meet_location' : $('textarea#meetLocation').val(),
			'description'   : $('textarea#description').val(),
			'price'			: $('input#price').val(),
		}
		$.post(BASE_PATH+'/add_spare_part', context, function(response){
			response = JSON.parse(response)
			if(response[0]){
                window.location.href = REDIRECT_PATH+'/'+response[1]+'/'+response[2]
			}else if(!response[0]){
				$('div#messageAddProduct').html(response[1])
			}

		})
	})

})