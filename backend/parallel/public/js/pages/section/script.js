loadIndex();

function init(){
	$('select#school_id').change(function(){

		var teacher_url ='/api/school/'+$(this).val()+'/teachers';
		var classes_url ='/api/school/'+$(this).val()+'/classes';

		populate_select('teacher_id', teacher_url, 'teachers');
		populate_select('classes_id',classes_url, 'class');

	});

	$('#timefrom').change(function(){

		if($('#timeto').val() != ''){
			if( !compareTime( getJsTimestamp( $(this).val() ), getJsTimestamp( $('#timeto').val() ) ) ){
				$(this).addClass('invalid');

				showToast('Time To should not be later than Time From');
			}else{
				$(this.removeClass('invalid'));
			}
		}
	});

	$('#timeto').change(function(){

		console.log( compareTime( getJsTimestamp( $('#timefrom').val() ), getJsTimestamp( $(this).val() ) ) );

		if($('#timefrom').val() != ''){
			if( !compareTime( getJsTimestamp( $('#timefrom').val() ), getJsTimestamp( $(this).val() ) ) ){
				$(this).addClass('invalid')

				showToast('Time To should not be later than Time From');
			}else{
				$(this).removeClass('invalid');
			}
		}
	});



}

