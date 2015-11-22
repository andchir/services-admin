
/**
 * ViewController
 *
 */
app
.controller('ViewController', ['$route', '$routeParams', '$location', 'ServiceItem',
    function($route, $routeParams, $location, ServiceItem) {
        
        var ctlr = this;
        
        ctlr.data = {
            servicesList: ServiceItem.query(),
            newIdp: null,
            newLogin: null,
            selectedId: null
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
                    ctlr.data.servicesList = ServiceItem.query();
                }
            });
            
        };
        
        /**
         * Remove service
         *
         */
        ctlr.removeService = function(){
            
            console.log( 'removeService', ctlr.data.selectedId );
            
        };
        
    }
]);
