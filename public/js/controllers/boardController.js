	// cygnusApp version 1.0

	// create the controller and inject Angular's $scope
	cygnusApp.controller('boardController', function($scope, $modal, $http, $rootScope, boardModel) {		
		$('.start').removeClass('active');
		$('.boardMenu').addClass('active');

		boardModel.getBoardItems()
		.success(function (data) {
			$scope.boardItems = data ;
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });

		$scope.open = function (size) {
			$.getScript('//cdnjs.cloudflare.com/ajax/libs/summernote/0.5.1/summernote.min.js',function(){
				$('#createBoard #description').summernote({
					height:150,
					toolbar:[
					['style',['bold','italic','underline','clear']],
					['fontface',['fontname']],
					['textsize',['fontsize']],
					['fontclr', ['color']],
					['alignment',['ul','ol','paragraph']],
					['adv',['codeview']],
					['view', ['fullscreen', 'codeview']],
					]
				});
			});

			var modalInstance = $modal.open({
				templateUrl: '/newBoardModal.html',
				controller: 'storeBoardController',
				size: size,
				resolve: {
					params: function () {
						return '';//$scope.params;
					}
				}
			});

			modalInstance.result.then(function (selectedItem) {
				$scope.boardItems.push( selectedItem );
			}, function () {
				//$log.info('Modal dismissed at: ' + new Date());
			});
		};

	});

	cygnusApp.controller('storeBoardController', function($scope, $http, $rootScope, $modalInstance, FileUploader, boardModel) {
		
		$scope.submit = function () {
			var newBoard = {
				title: $scope.title,
				description: $('div.note-editable').html(),
				author: 0,
				created_at: 'just now'
			};
			boardModel.insertBoard( newBoard )
			.success(function () {
				$modalInstance.close(newBoard);
			}).
			error(function(error) {
				$('#createBoardAlert').show();
				$scope.errors = error;
			});
		};

		$scope.cancel = function () {
			$modalInstance.dismiss('cancel');
		};
	});


	cygnusApp.controller('boardDetailController', function($scope, $modal, $http, $routeParams, $rootScope, boardModel) {	
		$('.start').removeClass('active');
		$('.boardMenu').addClass('active');

		boardModel.getBoardItem($routeParams.id)
		.success(function (data) {
			$scope.boardItem = data ;
		})
		.error(function (error) {
	        //  $scope.status = 'Unable to load customer data: ' + error.message;
	    });
	});