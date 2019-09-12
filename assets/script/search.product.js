$(document).ready(function(){

	const BASE_PATH = 'http://localhost/ikinciZincir2'

	$('div#renderProducts').hide()

	$('input#searchProduct').keyup(function(e){

		let searched_product = $(this).attr('tableName')

		const getValue = $(this).attr('getValue')
		context= {
			'searched_product': $('input#searchProduct').val(),
			'table_name': searched_product,
		}
		$.post(BASE_PATH+'/Products/search_product?ilan='+getValue, context, function(response){
			$('div#renderProducts').html(response)
			$('div#renderProducts').fadeIn()
			$('div#allProduct').hide()
		})

	})


	$('.toLookAt').click(function(){
		let productNumber = $(this).attr('productNumber')
		context={
			'product_number': productNumber
		}
		$.post(BASE_PATH+'/Products/to_look_at', context, function(response){
			response = JSON.parse(response)
			if(response == true){
				$("body").overhang({
					type: "info",
					message: "Tamam! Ürün sonradan bakılacaklar listesine eklendi!",
					closeConfirm: true,
					duration: 1.5,
				});
			}else if(response == false){
				$("body").overhang({
					type: "danger",
					message: "Bu ilan sonradan bakılacaklar listenize daha önceden eklenmiş.",
					closeConfirm: true,
					duration: 1.5,
				});
			}
		})
	})

})