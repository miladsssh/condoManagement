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
				controller: 'storeTicketController',
				size: size,
				resolve: {
					params: function () {
						return '';//$scope.params;
					}
				}
			});

			modalInstance.result.then(function (selectedItem) {
				dataFactory.getTickets()
					.success(function (data) {
						$scope.tickets = data ;
					})
					.error(function (error) {
				        //  $scope.status = 'Unable to load customer data: ' + error.message;
				    });
				$rootScope.$$phase || $rootScope.$apply();
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
			$scope.userID = data[0].user_id ;
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });


		$scope.open = function (size) {
			var modalInstance = $modal.open({
				templateUrl: '/newTicketModal.html',
				controller: 'storeReplyTicketController',
				size: size,
				resolve: {
					params: function () {
						return '';//$scope.params;
					}
				}
			});

			modalInstance.result.then(function (selectedItem) {
				dataFactory.getTicket($routeParams.id)
					.success(function (data) {
						$scope.tickets = data ;
						$scope.ticketTitle = data[0].title ;
						$scope.userID = data[0].user_id ;
					})
					.error(function (error) {
				        //  $scope.status = 'Unable to load customer data: ' + error.message;
				    });
				$rootScope.$$phase || $rootScope.$apply();
			}, function () {
				//$log.info('Modal dismissed at: ' + new Date());
			});
		};
	});



	cygnusApp.controller('storeReplyTicketController', function($scope, $http, $routeParams, $rootScope, $modalInstance, params) {
		$scope.submitReplyTicket = function () {
			var btn = $(this);
			btn.button('loading');

			$http({
				method: 'post',
				url: '/api/ticket/reply',
				data: { 'batchId': $routeParams.id , 'description': $('#createReplyTicket #description').val() }
			}).success(function(data, status, headers, config) {
				$rootScope.$$phase || $rootScope.$apply();
				btn.button('reset');
				$modalInstance.close();
			}).error(function(data, status, headers, config) {
				$('#createReplyTicket #description').val(data);
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	});




	cygnusApp.controller('storeTicketController', function($scope, $http, $rootScope, $modalInstance) {
		$scope.submitTicket = function () {
			var btn = $(this);
			btn.button('loading');

			$http({
				method: 'post',
				url: '/api/ticket',
				data: { 'title': $('#createTicket #title').val() , 'description': $('#createTicket #description').val() }
			}).success(function(data, status, headers, config) {
				btn.button('reset');
				$modalInstance.close();
			}).error(function(data, status, headers, config) {
				$('#createTicket #description').val(data);
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	});
