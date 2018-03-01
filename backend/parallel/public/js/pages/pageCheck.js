if(document.getElementById('nav_main')){
	console.log('header exists');
}else{
	var routes = [
	{name: 'admin', title: 'Admin Dashboard', path: '/admin/index', },
	{name: 'users', title: 'Users', path: '/users'},
	{name: 'adduser', title: 'Add User', path: '/user/add'},

	// admission
	{name: 'admissions', title: 'Admission', path: '/admissions/index'},
	{name: 'newadmission', title: 'New Admission', path: '/admission/new'},
	];

	var pageGroup = [
		{
			name: 'admission' , path : '/admissions', pages : ['admissions', 'newadmission']
		},
		{
			name: 'user', path: '/users', pages: ['/users', '/user/add']
		}
	];
	
	document.write('<script type="text/javascript" src="/js/jquery-3.3.1.min.js" ></script>');
	document.write('<script type="text/javascript" src="/js/vars.js"></script>');
	document.write('<script type="text/javascript" src="/js/routes.js"></script>');


	// window.location.href="/admin";
	// console.log(app);

	getPageGroup(window.location.pathname);


	// console.log(routes);



	function getPageGroup(path){
		var pageName = getPageName(path);
		var group = pageGroup;

		for (var i = 0; i < group.length; i++){
			
			console.log(group[i].pages.indexOf(pageName));

			if(group[i].pages.indexOf(pageName) >= 0){
				console.log('indexpath is ', group[i].path);

				window.location.href=group[i].path+'/redirect/{'+path+'}';
			}
		}

	}

	function getPageName(route){

	for (var i = 0; i < routes.length; i++){
	  if (routes[i].path == route){
	    return routes[i].name;
	  }
	}
}
}
