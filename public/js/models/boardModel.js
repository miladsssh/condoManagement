	// create the ticket model 
	cygnusApp.factory('boardModel', ['$http', function($http) {

        var boardModel = {};

        boardModel.getBoardItems = function(){
            return $http.get('/api/board');
        };

        boardModel.getBoardItem = function(id){ 
            return $http.get('/api/board/' + id);
        };

        boardModel.insertBoard = function (newBoard) {
            return $http.post('/api/board', newBoard );
        };

        boardModel.insertTicketReply = function (newTicketReply) {
            return $http.post('/api/ticket/reply', newTicketReply );
        };

        // boardModel.updateCustomer = function (cust) {
        //     return $http.put(urlBase + '/' + cust.ID, cust)
        // };

        // boardModel.deleteCustomer = function (id) {
        //     return $http.delete(urlBase + '/' + id);
        // };

        // boardModel.getOrders = function (id) {
        //     return $http.get(urlBase + '/' + id + '/orders');
        // };

        return boardModel;
    }]);