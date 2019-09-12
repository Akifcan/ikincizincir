$(document).ready(function(){
	$('[data-toggle="tooltip"]').tooltip()

	const BASE_PATH = 'http://localhost/ikinciZincir2/'

	$('button#deactiveProduct').click(function(){
		context={
			'table_name': $(this).attr('tableName'),
			'product_number': $(this).attr('productNumber'),
		}
		$.post(BASE_PATH+'/Products/deactive_product', context, function(response){
			response = JSON.parse(response)
			if(response == true){
				window.location.href = BASE_PATH+'?deactived'
			}
		})
	})

	$('form#reportProductForm').submit(function(e){
		e.preventDefault()
		context= {
			'product_number': $(this).attr('process'),
			'table_name': $(this).attr('processid'),
			'report_reason': $('select#reportReason').val(),
		}
		$.post(BASE_PATH+'/Products/report_product', context, function(response){
			response = JSON.parse(response)
			if(response[0]){
				$.notiny({ text: 'Bu ilanı rapor ettiniz. Talebiniz ile ilgileneceğiz.', position: 'fluid-bottom' })
				$('#reportProductModal').modal('hide')
				$('button.reportButton').attr('disabled', true)
				$('button.reportButton').text('Bu ilanı rapor ettiniz')
			}else if(!response[0]){
				$('div#messageReport').html(response[1])
			}
		})		
	})


})