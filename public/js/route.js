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
		.when('/panel/ticket/:id' , {
			  controller:  'ticketDetailController',
			  templateUrl: '/views/ticket/ticketDetail.html'
		})

		.when('/panel/board' , {
			  controller:  'boardController',
			  templateUrl: '/views/board/index.html'
		})

		.when('/panel/board/:id' , {
			  controller:  'boardDetailController',
			  templateUrl: '/views/board/boardDetail.html'
		});
		
		// .otherwise({
	 //        redirectTo: '/'
	 //    });
		

		$locationProvider.html5Mode({
		  enabled: true,
		  requireBase: false
		});

	});

