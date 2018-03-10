
function searchWidget(){
	var key = $('#widget_search').val()

	if(key.length > 1){

		$('.widget-search-result').html(loader()+' Searching...');

		sendAPI('GET', '/system/search/'+key).then(function(response){

			$('.widget-search-result').html(response);

			$('.search-key').html(key);

		}).catch(function(error){

			errorMsg();

		});

	}else{
		$('.widget-search-result').html('');
	}
}

function widgetSearch(){

}