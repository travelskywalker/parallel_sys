loadIndex();


function init(){
	Materialize.updateTextFields();

	$('select#access_id').change(function(){
		console.log($(this).val());
		if($(this).val() > 0) $('#school_id_wrapper').show();
		else $('#school_id_wrapper').hide();
	});

}

// $('#edit_user_form').ready(function(){
	$('select#access_id').change(function(){
		console.log($(this).val());
		if($(this).val() > 0) $('#school_id_wrapper').show();
		else $('#school_id_wrapper').hide();
	});
// });
