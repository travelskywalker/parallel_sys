contactWidget();

function contactWidget(){
	$('.contact-contaner').html(loader()+' Getting contacts...');

	sendAPI('GET', '/system/contacts').then(function(response){
		console.log(response.data);

		$.each(response.data, function(key,val){
			$('.contact-container').append('<div><i class="material-icons small">person</i>'+val.guardianname+' ('+val.emergencycontactnumber+')</div>');
		})

	}).catch(function(error){

		errorMsg();

	});
}
