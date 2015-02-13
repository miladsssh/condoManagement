	// cygnusApp version 1.0

	// create the controller and inject Angular's $scope
	cygnusApp.controller('dashboardController', function($scope, $http, DTOptionsBuilder, dataFactory) {	
		var vm = this;
		$('.start').removeClass('active');
		$('.homeMenu').addClass('active');

		dataFactory.getTickets()
		.success(function (data) {
			$scope.tickets = data ;
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });
	});
