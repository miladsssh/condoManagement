//  cygnusApp version 1.0
	cygnusApp.config(function($routeProvider, $locationProvider ) {
		$routeProvider

		.when('/panel/index' , {
			  controller:  'dashboardController',
			  templateUrl: '/views/dashboard.html'
		})
		.when('/panel/ticket' , {
			  controller:  'ticketController',
			  templateUrl: '/views/ticket/index.html'
		})
		.when('/panel/board' , {
			  controller:  'boardController',
			  templateUrl: '/views/board/index.html'
		});

		$locationProvider.html5Mode({
		  enabled: true,
		  requireBase: false
		});

	});

