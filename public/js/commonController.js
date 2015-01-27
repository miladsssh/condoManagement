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
	

	cygnusApp.controller('ModalInstanceCtrl', function($scope, $http, $rootScope, $modalInstance, params) {
		$scope.submitTicket = function () {
			var btn = $(this);
			btn.button('loading');
			//console.log( params ); 

			$http({
				method: 'post',
				url: '/api/ticket/',
				data: { 'title': $('#createTicket #title').val() , 'description': $('#createTicket #description').val() }
			}).success(function(data, status, headers, config) {
				$rootScope.$$phase || $rootScope.$apply();
				console.log(data);
				btn.button('reset');
				$modalInstance.close();
			}).error(function(data, status, headers, config) {
				$('.createTicket #description').val(data);
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	});
