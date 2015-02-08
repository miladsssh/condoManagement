	// create the module and name it cygnusApp
	var cygnusApp = angular.module('cygnusApp', ['ngRoute', 'ui.bootstrap', 'datatables', 'ngResource', 'angularFileUpload' ] );

	cygnusApp.factory('dataFactory', ['$http', function($http) {

        var dataFactory = {};

        dataFactory.getTickets = function(){
            return $http.get('/api/ticket');
        };

        dataFactory.getTicket = function(id){ 
            return $http.get('/api/ticket/' + id);
        };

        // dataFactory.getCustomer = function (id) {
        //     return $http.get(urlBase + '/' + id);
        // };

        // dataFactory.insertCustomer = function (cust) {
        //     return $http.post(urlBase, cust);
        // };

        // dataFactory.updateCustomer = function (cust) {
        //     return $http.put(urlBase + '/' + cust.ID, cust)
        // };

        // dataFactory.deleteCustomer = function (id) {
        //     return $http.delete(urlBase + '/' + id);
        // };

        // dataFactory.getOrders = function (id) {
        //     return $http.get(urlBase + '/' + id + '/orders');
        // };

        return dataFactory;
    }]);


    cygnusApp.directive('ngThumb', ['$window', function($window) {
        var helper = {
            support: !!($window.FileReader && $window.CanvasRenderingContext2D),
            isFile: function(item) {
                return angular.isObject(item) && item instanceof $window.File;
            },
            isImage: function(file) {
                var type =  '|' + file.type.slice(file.type.lastIndexOf('/') + 1) + '|';
                return '|jpg|png|jpeg|bmp|gif|'.indexOf(type) !== -1;
            }
        };

        return {
            restrict: 'A',
            template: '<canvas/>',
            link: function(scope, element, attributes) {
                if (!helper.support) return;

                var params = scope.$eval(attributes.ngThumb);

                if (!helper.isFile(params.file)) return;
                if (!helper.isImage(params.file)) return;

                var canvas = element.find('canvas');
                var reader = new FileReader();

                reader.onload = onLoadFile;
                reader.readAsDataURL(params.file);

                function onLoadFile(event) {
                    var img = new Image();
                    img.onload = onLoadImage;
                    img.src = event.target.result;
                }

                function onLoadImage() {
                    var width = params.width || this.width / this.height * params.height;
                    var height = params.height || this.height / this.width * params.width;
                    canvas.attr({ width: width, height: height });
                    canvas[0].getContext('2d').drawImage(this, 0, 0, width, height);
                }
            }
        };
    }]);