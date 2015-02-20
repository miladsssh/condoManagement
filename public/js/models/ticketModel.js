	// create the ticket model 
	cygnusApp.factory('dataFactory', ['$http', function($http) {

        var dataFactory = {};

        dataFactory.getTickets = function(){
            return $http.get('/api/ticket');
        };

        dataFactory.getTicket = function(id){ 
            return $http.get('/api/ticket/' + id);
        };

        dataFactory.insertTicket = function (newTicket) {
            return $http.post('/api/ticket', newTicket );
        };

        dataFactory.insertTicketReply = function (newTicketReply) {
            return $http.post('/api/ticket/reply', newTicketReply );
        };

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