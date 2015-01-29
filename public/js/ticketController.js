	// cygnusApp version 1.0

	// create the controller and inject Angular's $scope
	cygnusApp.controller('ticketController', function($scope, $modal, $http, $rootScope, dataFactory) {		
		var vm = this;
		$('.start').removeClass('active');
		$('.ticketMenu').addClass('active');

		dataFactory.getTickets()
		.success(function (data) {
			$scope.tickets = data ;
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });

		$scope.open = function (size) {
			var modalInstance = $modal.open({
				templateUrl: '/newTicketModal.html',
				controller: 'ModalInstanceCtrl',
				size: size,
				resolve: {
					params: function () {
						return '';//$scope.params;
					}
				}
			});

			modalInstance.result.then(function (selectedItem) {
				//$scope.selected = selectedItem;
			}, function () {
				//$log.info('Modal dismissed at: ' + new Date());
			});
		};
	});



	cygnusApp.controller('ticketDetailController', function($scope, $modal, $http, $routeParams, $rootScope, dataFactory) {	
		$('.start').removeClass('active');
		$('.ticketMenu').addClass('active');

		dataFactory.getTicket($routeParams.id)
		.success(function (data) {
			$scope.tickets = data ;
			$scope.ticketTitle = data[0].title ;
			console.log(data);
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });


		$scope.open = function (size) {
			var modalInstance = $modal.open({
				templateUrl: '/newTicketModal.html',
				controller: 'ModalInstanceCtrl',
				size: size,
				resolve: {
					params: function () {
						return '';//$scope.params;
					}
				}
			});

			modalInstance.result.then(function (selectedItem) {
				//$scope.selected = selectedItem;
			}, function () {
				//$log.info('Modal dismissed at: ' + new Date());
			});
		};
	});

