var routes = [
	{name: 'admin', title: 'Admin Dashboard', path: '/admin/index', },
	{name: 'users', title: 'Users', path: '/users'},
	{name: 'adduser', title: 'Add User', path: '/user/add'},

	// admission
	{name: 'admissions', title: 'Admission', path: '/admission'},
	{name: 'newadmission', title: 'New Admission', path: '/admission/new'},
];

var pageGroup = [
	{
		name: 'admin' , path : '/admin', pages : ['admissions', 'newadmission']
	}
];