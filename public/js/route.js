//  cygnusApp version 1.0
	cygnusApp.config(function($routeProvider, $locationProvider ) {
		$routeProvider

		.when('/panel' , {
			  controller:  'dashboardController',
			  templateUrl: 'views/dashboard.html'
		});

		$locationProvider.html5Mode({
		  enabled: true,
		  requireBase: false
		});

	});

