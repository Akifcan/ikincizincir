$(document).ready(function(){
	const BASE_PATH = 'http://localhost/ikinciZincir2/'

	$('form#editSparePartForm').on('submit', function(e){
		e.preventDefault()
		context= {
			'name': $('input#name').val(),
			'product_type': $('select#productType').val(),
			'product_name': $('input#productName').val(),
			'part_type': $('select#partType').val(),			
			'phone_number': $('input#phoneNumber').val(),
			'price': $('input#price').val(),
			'meet_location': $('textarea#meetLocation').val(),
			'description': $('textarea#description').val(),
		}
		$.post(BASE_PATH+'/Spare_part/edit_spare_part', context, function(response){
			response = JSON.parse(response)
			if(response[0]){
				$.notiny({ text: "İlanınız Başarıyla Güncellenmiştir", position: 'fluid-bottom' });
			}else if(!response[0]){
				$.notiny({ text: "Bir hata oldu. İlanınız güncellenemedi lütfen tekrar deneyin.", position: 'fluid-bottom' });
			}
		})
	})

	$('button#deactiveSparePartImage').click(function(){
		context= {
			'image_id': $(this).attr('imageId'),
			'product_number': $(this).attr('productNumber'),
		}
		$.post(BASE_PATH+'Spare_part/deactive_image', context, function(response){
			response = JSON.parse(response)
			if(response){
				$.notiny({ text: "İlan resminiz kaldırılmıştır", position: 'fluid-bottom' });
			}else{
				$.notiny({ text: "Bir Hata oluştu lütfen tekrar deneyin.", position: 'fluid-bottom' });
			}
		})
	})

	Dropzone.autoDiscover = false;
	$("#dZUpload").dropzone({
		url: BASE_PATH+'/Spare_part/add_spare_part_image',
		addRemoveLinks: true,
		success: function (file, response) {
			response = JSON.parse(response)
			if(response){
				$.notiny({ text: "İlanınız resminiz eklenmiştir..", position: 'fluid-bottom' });
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

})