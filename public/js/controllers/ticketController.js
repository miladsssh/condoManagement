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
				$scope.tickets.push( selectedItem );
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
			$scope.ticketTitle = data[data.length-1].title ;
			$scope.userID = data[0].user_id ;
			console.log(data);
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });


		$scope.open = function (size) {
			var modalInstance = $modal.open({
				templateUrl: '/newTicketReplyModal.html',
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



	cygnusApp.controller('storeReplyTicketController', function($scope, $http, $routeParams, $rootScope, $modalInstance, FileUploader, dataFactory) {
		var uploader = $scope.uploader = new FileUploader({
            url: '/api/upload'
        });

		$scope.submitReplyTicket = function () {
			var btn = $(this);
			btn.button('loading');

			if( $('#createReplyTicket input[type="file"]').val()==""){
				var newTicketReply = {
		            title: '',
					description: $scope.description,
					batchId: $routeParams.id
		        };
				dataFactory.insertTicketReply( newTicketReply )
				.success(function () {
	                $modalInstance.close(newTicketReply);
	            }).
	            error(function(error) {
	                $('#createTicketReplyAlert').show();
	            	$scope.errors = error;
	            });
			}

		};

		uploader.onCompleteAll = function(){
			var newTicketReply = {
				title: '',
				description: $scope.description,
				batchId: $routeParams.id
			};
			dataFactory.insertTicketReply( newTicketReply )
			.success(function () {
				$modalInstance.close(newTicketReply);
			}).
			error(function(error) {
				$scope.status = 'Unable to insert ticket: ' + error.message;
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	});




	cygnusApp.controller('storeTicketController', function($scope, $http, $rootScope, $modalInstance, FileUploader, dataFactory) {
		
		var uploader = $scope.uploader = new FileUploader({
            url: '/api/upload'
        });
		
		$scope.submit = function () {
			if( $('#createTicket input[type="file"]').val()==""){
				var newTicket = {
		            title: $scope.title,
		            description: $scope.description
		        };
				dataFactory.insertTicket( newTicket )
				.success(function () {
	                $modalInstance.close(newTicket);
	            }).
	            error(function(error) {
	            	$('#createTicketAlert').show();
	                $scope.errors = error;
	            });
			}
		};
		

		uploader.onCompleteAll = function(){
			var newTicket = {
				title: $scope.title,
				description: $scope.description
			};
			dataFactory.insertTicket( newTicket )
			.success(function () {
				$modalInstance.close(newTicket);
			}).
			error(function(error) {
				$scope.status = 'Unable to insert ticket: ' + error.message;
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};

	});
