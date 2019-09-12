$(document).ready(function(){
	
	const BASE_PATH = 'http://localhost/ikinciZincir2'

	if(window.location.href == BASE_PATH+'/?deactived'){
		$("body").overhang({
			type: "info",
			message: "Tamam! İlanınız kaldırımıştır. İlanınızı Tekrar aktif etmek için bize ulaşabilirsiniz",
			closeConfirm: true,
			duration: 1.5,
		});
	}

	$('.quickShow').click(function(){
		let productTable = $(this).attr('productTable')
		let productNumber = $(this).attr('productNumber')
		$.post(BASE_PATH+'/Home/get_product_detail/'+productTable+'/'+productNumber, function(response){
			$('div#quickShow').html(response)
		})
	})
	$('#closeModal').click(function(){
		alert()
	})
})