$(document).ready(function(){
	const BASE_PATH = 'http://localhost/ikinciZincir2'

    $('input#phoneNumber').mask('000-000-00-00');


	$('select#province').change(function(){
		context= {
			'province_id': $('select#province').val()
		}
		$.post(BASE_PATH+'/Ikinci_zincir/get_city', context, function(response){
			$('select#city').html(response)
		})
	})

	$('form#registerCorparate').on('submit', function(e){
		e.preventDefault()
		context= {
			'username': $('input#username').val(),
			'email': $('input#email').val(),
			'password': $('input#password').val(),
			'province': $('select#province').val(),
			'city': $('select#city').val(),
			'phone_number': $('input#phoneNumber').val(),
			'meet_location': $('textarea#meetLocation').val(),
		}
		$.post(BASE_PATH+'/Auth/register_corparate', context, function(response){
			response = JSON.parse(response)
			if(response[0]){
				window.location.href = BASE_PATH+'/ilan-turu-sec'
			}else{
				$('div#messageRegisterCorparete').html(response[1])
			}
		})
	})

})