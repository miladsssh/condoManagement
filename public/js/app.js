	// create the module and name it cygnusApp
	var cygnusApp = angular.module('cygnusApp', ['ngRoute', 'ui.bootstrap', 'datatables', 'ngResource' ] );

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