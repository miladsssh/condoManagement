	// create the module and name it cygnusApp
	var cygnusApp = angular.module('cygnusApp', ['ngRoute', 'ui.bootstrap', 'datatables', 'ngResource', 'angularFileUpload' ] );

	cygnusApp.filter('unsafe', function($sce) {
		return function(val) {
			return $sce.trustAsHtml(val);
		};
	});