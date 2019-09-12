$(document).ready(function(){

	const BASE_PATH = 'http://localhost/ikinciZincir2'

	$('form#registerForm').on('submit', function(e){
		e.preventDefault()

		context= {
			'username': $("input[name='username']").val(),
			'password': $("input[name='password']").val(),
			'email': $("input[name='email']").val(),
		}

		console.log(context)

		$.post(BASE_PATH+'/Auth/register', context, function(response){
			response = JSON.parse(response)
			if(!response[0])
				$('div#messageRegister').html(response)
			else if(response[0])
				window.location.href = BASE_PATH
		})
	})

	$('form#loginForm').on('submit', function(e){
		e.preventDefault()
		context= {
			'email': $('input#email').val(),
			'password': $('input#password').val(),
		}
		$.post(BASE_PATH+'/Auth/login', context, function(response){
			response = JSON.parse(response)
			if(response[0] == 'not_exists')
				$('div#messageLogin').html(response[1])
			else if(!response[0])
				$('div#messageLogin').html(response[1])
			else
				window.location.href = BASE_PATH

		})
	})

})