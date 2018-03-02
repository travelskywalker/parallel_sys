loadIndex();

function init(){
	
	$('select#school_id').change(function(){

		// get api
		var url ='/api/school/'+$(this).val()+'/teachers';
		sendAPI('GET', url).then(function(response){

			console.log(response.data);
			// remove section content
			$('#teacher_id option').remove();

			// populate
			$.each(response.data, function(key,val){
				$('#teacher_id').append('<option value="'+val.id+'">'+val.firstname+' '+val.lastname+'</option>');
			});

			$('select').material_select();
		});
	});
	
}