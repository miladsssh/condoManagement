	// cygnusApp version 1.0

	// create the controller and inject Angular's $scope
	cygnusApp.controller('boardController', function($scope) {		
		$scope.message = 'I am Angularjs!';
		$('.start').removeClass('active');
		$('.boardMenu').addClass('active');
	});
