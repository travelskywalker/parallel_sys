
var path = window.location.pathname;
var app = {
	"main_content" : $('#app-main'),
	"path" : path,
	"page_stack" : []
	};


function loadIndex(){
	loadContent(app.path+'/index', 'index');
}

function loadContent(url,pagefrom){

	// append loader
	app.main_content.html(loader());


	sendAPI('GET', url).then(function(response){

		app.main_content.html(response);

		// add page to page stack
		app.page_stack.push(url);

		console.log(app.page_stack);

		// initialize page init for jquery and other function
		if(pagefrom != 'index') init();
	})
	.catch(function(error){

		if(error){ 
			app.main_content.html('<div class="error"><i class="material-icons">error</i> something went wrong. Please refresh this page</div>');
			showToast('<i class="material-icons">error</i> something went wrong');
		}
	});
}

function initialize(){

	$('.modal').modal();

	$('.data-row').hover(function(){
		$(this).find('.data-edit-btn').show();
	});

	$('.data-row').mouseleave(function(){
		$(this).find('.data-edit-btn').hide();
	});

	
}

function showDetails(page,id){
	// window.location.href = '/'+page+'/'+id;

	var url = '/'+page+'/'+id;
	loadContent(url, page);
}


$(document).ready(function(){
	clock('system-clock');
	// initialization
	initialize();

	$('.logout').click(function(){
		window.location.href = '/logout';
	});

	$('.sidenav .nav').click(function(){
		var url = $(this).attr('url');
		loadContent(url);
	});

	$('.sub-nav .tab').click(function(){

		// add path of exempted pages for omission of 's'
		var page_exempt = ['/classes'];
		var type = $(this).attr('type');
		var newpath;

		// check if path is in exempted pages
		if($.inArray(app.path, page_exempt) >= 0) p = app.path;
		else p = app.path.slice(0, -1);

		if(type == 'index') loadIndex();
		else loadContent(p+'/'+type);
	});
	
});

function loader(){
	var loader = '<div style="width: 100%" class="center-align">';
		loader += '<div class="preloader-wrapper small active">';
		loader += '<div class="spinner-layer spinner-green-only">';
		loader += '<div class="circle-clipper left">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="gap-patch">';
		loader += '<div class="circle"></div>';
		loader += '</div><div class="circle-clipper right">';
		loader += '<div class="circle"></div>';
		loader += '</div>';
		loader += '</div>';
		loader += '</div>';
		loader += '</div>';
	return loader;
}

function timeFormat(timeString){
	var H = +timeString.substr(0, 2);
	var h = H % 12 || 12;
	var ampm = (H < 12 || H === 24) ? "AM" : "PM";
	timeString = h + timeString.substr(2, 3) + ampm;

	return timeString;
}

function showToast(message){
	Materialize.toast(message, 2000);
}
function validateForm(form){
	console.log(form.attr('id'));
}

function sendForm(form, url, successpage){
	var data = $('#'+form).serializeArray();

	sendAPI('POST', url, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		console.log(response);
		showToast(response.message);


		setTimeout(function(){
			// window.location.href="/users";
			window.location.href= '/'+successpage;
		}, 1000);
		
	})
	.catch(function(error){
		
		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');
		$.each(err.errors, function(key, val){
			console.log(val);
			$('.error-data').append('<li>'+val+'</li>');
		});

		$('html, body').animate({ scrollTop: 0 }, 'slow');
	});
}

function admissionFormSubmit(form, url){

	if($('#admission_number').hasClass('invalid')){
		showToast(language.admissionnumexist);
	}else if ($('#admission_student_id').hasClass('invalid')){
		showToast(language.studentnumexist);
	}else{
		sendForm(form,url,'admissions');
	}
}


function editDetails(page, id){
	window.location.href = '/'+page+'/edit/'+id;
}

function updateDetails(page, form){
	var data = $('#'+form).serialize();
	
	sendAPI('POST', page, data).then(function(response){
		if($('.error-data').html() != ''){
			$('.error-data').html('');
			$('.error-message').html('');
		}

		showToast('user has been updated');

		setTimeout(function(){
			window.location.href="/users";
		}, 1000);
	}).catch(function(error){
		var err = JSON.parse(error.responseText);

		$('.error-message').html(err.message);
		$('.error-data').html('');
		$.each(err.errors, function(key, val){
			console.log(val);
			$('.error-data').append('<li>'+val+'</li>');
		});

	});
}

function backbtnclick (){
	window.history.back();
}


function sendAPI(method,url,data){
	return(
		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
	        url: url,
	        data: data,
	        datatype:'json',
	        // cache: false,
	        // processData: false,
	        type: method,
	        success: function (dat) {
	            // do something with the result
	            // console.log(dat);
	        }
	    })
	);
}

function clock(id){
	/*var myVar = setInterval(function() {
	  myTimer();
	}, 1000);

	function myTimer() {
	  var d = new Date();
	  document.getElementById("system-clock").innerHTML = d.toLocaleTimeString();
	}*/

	date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    h = date.toLocaleTimeString();

    // h = date.getHours();
    // if(h<10)
    // {
    //         h = "0"+h;
    // }
    // m = date.getMinutes();
    // if(m<10)
    // {
    //         m = "0"+m;
    // }
    // s = date.getSeconds();
    // if(s<10)
    // {
    //         s = "0"+s;
    // }
    // result = ''+days[day]+' '+months[month]+' '+d+' '+year+' '+h+':'+m+':'+s;

    result = ''+days[day]+', '+months[month]+' '+d+' '+year+', '+h;


    document.getElementById(id).innerHTML = result;
    setTimeout('clock("'+id+'");','1000');
    return true;


}

function test(){

	sendAPI('GET', '/admission/add').then(function(response){
		$('.spa-content').append(response);
	})
}