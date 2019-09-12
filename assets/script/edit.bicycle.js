$(document).ready(function(){

	const BASE_PATH = 'http://localhost/ikinciZincir2/'
	$('[data-toggle="tooltip"]').tooltip()
	
	function reloadPage(){
		setTimeout(() => {
			window.location.reload()
		}, 2000)
	}

	Dropzone.autoDiscover = false;
	$("#dZUpload").dropzone({
		url: BASE_PATH+'/Bicycle/add_bicycle_image2',
		addRemoveLinks: true,
		success: function (file, response) {
			response = JSON.parse(response)
			if(response){
				$.notiny({ text: "İlanınız başarıyla güncellenmiştir.", position: 'fluid-bottom' });
				reloadPage()
			}else{
				$.notiny({ text: "Resminiz yüklenmedi. Doğru dosya tipini seçtiğinize emin olun.", position: 'fluid-bottom' });
				reloadPage()
			}
		},
		error: function (file, response) {
			file.previewElement.classList.add("dz-error");
		}
	});


	$('form#editBicycleForm').on('submit', function(e){
		e.preventDefault()
		context= {
			'name': $('input#name').val(),
			'bicyle_type': $('select#bicycleType').val(),
			'brand': $('select#brand').val(),
			'model': $('select#model').val(),
			'jant': $('select#jant').val(),
			'model': $('select#model').val(),
			'cadre': $('select#cadre').val(),
			'cadre_type': $('select#cadreType').val(),
			'front_brake': $('select#frontBrake').val(),
			'rear_brake': $('select#rearBrake').val(),
			'year': $('select#year').val(),
			'status': $('select#status').val(),
			'phone_number': $('input#phoneNumber').val(),
			'price': $('input#price').val(),
			'meet_location': $('textarea#meetLocation').val(),
			'description': $('textarea#description').val(),
		}
		$.post(BASE_PATH+'/Bicycle/edit_bicycle', context, function(response){
			response = JSON.parse(response)
			if(response[0]){
				$.notiny({ text: "İlanınız Başarıyla Güncellenmiştir", position: 'fluid-bottom' });
			}else if(!response[0]){
				$.notiny({ text: "Bir hata oldu. İlanınız güncellenemedi lütfen tekrar deneyin.", position: 'fluid-bottom' });
			}
		})
	})
	$('#deactiveBicycleImage').click(function(){
		context={
			'product_number': $(this).attr('productNumber'),
			'image_id': $(this).attr('imageId'),
		}
		$.post(BASE_PATH+'/Bicycle/deactive_image', context, function(response){
			response = JSON.parse(response)
			if(response == true){
				$.notiny({ text: "Bu resim kaldırılıştır", position: 'fluid-bottom' });
				reloadPage()
			}else if(response == false){
				$.notiny({ text: "İlanınız Başarıyla Güncellenmiştir", position: 'fluid-bottom' });
				reloadPage()
			}
		})
	})
})