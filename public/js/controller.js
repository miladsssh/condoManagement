	// cygnusApp version 1.0

	// create the controller and inject Angular's $scope
	cygnusApp.controller('dashboardController', function($scope, $http, DTOptionsBuilder, dataFactory) {	
		var vm = this;
		$('.start').removeClass('active');
		$('.homeMenu').addClass('active');

		dataFactory.getTickets()
		.success(function (data) {
			$scope.tickets = data ;

		    vm.dtOptions = DTOptionsBuilder.newOptions();
		    vm.changeOptions = changeOptions;

		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });

	    function changeOptions() {
	        vm.dtOptions.withPaginationType('full_numbers')
	            .withDisplayLength(1)
	            .withDOM('pitrfl');
	    }
	});


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

	cygnusApp.controller('boardController', function($scope) {		
		$scope.message = 'I am Angularjs!';
		$('.start').removeClass('active');
		$('.boardMenu').addClass('active');
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
