$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip()
	$('div#contactSettings').hide()
	$('div#securitySettings').hide()

	$('button#contactButton').click(function(){
		$('div#contactSettings').fadeIn()
		$('div#securitySettings').fadeOut()
	})

	$('button#securityButton').click(function(){
		$('div#securitySettings').fadeIn()
		$('div#contactSettings').fadeOut()
	})

	//Mask
	$('input#phoneNumber').mask('000-000-00-00');
	$('textarea#meetLocation').keyup(function(e){
		if(this.value.length <= 10 && this.value.length >= 1){
			$('p#warningMeetLocation').show()   
			$('p#warningMeetLocation').text('Lütfen buluşma noktanızı daha açıklayıcı yazın.')
		}else{
			$('p#warningMeetLocation').hide()   
		}
	})

    //Ajax

    const BASE_PATH = 'http://localhost/ikinciZincir2/'

    $('form#contactForm').on('submit', function(e){
    	e.preventDefault()
    	context= {
    		'phone_number': $('input#phoneNumber').val(),
    		'meet_location': $('textarea#meetLocation').val()
    	}
    	$.post(BASE_PATH+'/Account/edit_contact', context, function(response){
    		response = JSON.parse(response)
    		if(response[0]){
    			$('div#contactMessage').html(response[1])
    		}else if(!response[0]){
    			$('div#contactMessage').html(response[1])
    		}
    	})
    })

    $('form#securityForm').on('submit', function(e){
    	e.preventDefault()
    	context= {
    		'email': $('input#email').val()
    	}
    	$.post(BASE_PATH+'/Account/edit_security', context, function(response){
    		response = JSON.parse(response)
    		if(response[0]){
    			$('div#messageSecurity').html(response[1])
    		}else if(!response[0]){
    			$('div#messageSecurity').html(response[1])
    		}
    	})
    })

    $('button#resetPassword').click(function(){
        context={
            'old_password': $('input#oldPassword').val(),
            'new_password': $('input#newPassword').val(),  
        }

        $.post(BASE_PATH+'/Account/reset_password', context, function(response){
            response = JSON.parse(response)
            if(response[0]){
                $('div#messageResetPassword').html(response[1])
            }else if(!response[0]){
                $('div#messageResetPassword').html(response[1])
            }
        })

    })

    $('button.closeResetPasswordModal').click(function(){
        $('div#messageResetPassword').html('')
    })

})