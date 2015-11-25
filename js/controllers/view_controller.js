
/**
 * ViewController
 *
 */
app
.controller('ViewController', ['$route', '$routeParams', '$location', 'ServiceItem',
    function($route, $routeParams, $location, ServiceItem) {
        
        var ctlr = this;
        
        ctlr.data = {
            servicesList: [],
            newIdp: null,
            newLogin: null,
            selectedIdp: null,
            currentPage: $routeParams.page ? parseInt($routeParams.page) : 1,
            pageSize: 10,
            numberOfPages: 1,
            nextPage: 1,
            previousPage: 1
        };
        
        /**
         * Get items list
         *
         */
        var getServicesList = function(){
            
            ServiceItem.query({ page: ctlr.data.currentPage })
                .$promise.then(function(resporse) {
                    if ( resporse.data ) {
                        ctlr.data.servicesList = resporse.data;
                    }
                    if ( resporse.total ) {
                        ctlr.data.numberOfPages = Math.ceil(resporse.total /  ctlr.data.pageSize);
                        ctlr.data.nextPage = ctlr.data.currentPage < ctlr.data.numberOfPages
                            ? ctlr.data.currentPage + 1
                            : ctlr.data.currentPage;
                        ctlr.data.previousPage = ctlr.data.currentPage > 1
                            ? ctlr.data.currentPage - 1
                            : 1;
                    }
                });
            
        };
        
        /**
         * Create new service
         *
         */
        ctlr.addService = function(){
            
            var postData = {
                idp: ctlr.data.newIdp,
                login: ctlr.data.newLogin
            };
            
            var result = ServiceItem.save( postData );
            
            result.$promise.then(function(data) {
                if(data.success){
                    getServicesList();
                }
                ctlr.data.newIdp = null;
                ctlr.data.newLogin = null;
            });
            
        };
        
        /**
         * Remove service
         *
         */
        ctlr.removeService = function(){
            
            var callback_func = function(){
                
                var result = ServiceItem.remove({ itemIdp: ctlr.data.selectedIdp });
                result.$promise.then(function(data) {
                    if(data.success){
                        getServicesList();
                    }
                    ctlr.data.selectedIdp = null;
                });
                
            };
            
            notie.confirm( 'Вы уверены, что хотите удалить сервисы с IDP ' + ctlr.data.selectedIdp + '?', 'Да', 'Нет', callback_func );
            
        };
        
        getServicesList();
        
    }
]);
