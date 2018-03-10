clockWidget();

function clockWidget(){

	setInterval(function(){
		setData();
	}, 1000);
}

function setData(){
	var time = getTime();
	$('#clock_widget .hour').html(time.hour);
	$('#clock_widget .minute').html(time.minute);
	$('#clock_widget .second').html(time.seconds);
	$('#clock_widget .am-pm').html(time.daypart);

	$('#clock_widget .day').html(time.day);
	$('#clock_widget .month').html(time.month);
	$('#clock_widget .date').html(time.date);
	$('#clock_widget .year').html(time.year);

	// $('#clock_widget .date').html(time.day+', '+time.month+' '+time.date+' '+time.year);
}

function getTime(){
	date = new Date;
    year = date.getFullYear();
    month = date.getMonth();
    months = new Array('January', 'February', 'March', 'April', 'May', 'June', 'Jully', 'August', 'September', 'October', 'November', 'December');
    d = date.getDate();
    day = date.getDay();
    days = new Array('Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday');

    // h = date.toLocaleTimeString();

    h = date.getHours();
    daypart = 'AM';

    if(h == 0) h = 12;
    else if(h>12) {

        h = h-12;
        daypart = 'PM';
    }

    // if(h<10)
    // {
    //         h = "0"+h;
    // }
    m = date.getMinutes();
    if(m<10)
    {
            m = "0"+m;
    }
    s = date.getSeconds();

    if(s<10)
    {
            s = "0"+s;
    }

    result = ''+days[day]+', '+months[month]+' '+d+' '+year+', '+h;


   	var time = {
   		'day': days[day],
   		'date': d,
   		'month':months[month],
   		'year':year,
   		'hour': h,
   		'minute': m,
   		'seconds': s,
   		'daypart': daypart
   	}
    return time;
}