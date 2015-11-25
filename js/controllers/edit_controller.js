
/**
 * EditController
 *
 */
app
.controller('EditController', ['$route', '$routeParams', '$location', 'ServiceItem',
    function($route, $routeParams, $location, ServiceItem) {
        
        var ctlr = this;
        
        ctlr.data = {
            service: {
                id: $routeParams.itemId ? parseInt($routeParams.itemId) : null,
                idp: null,
                login: '',
                email: '',
                calc_rate_type: '',
                bank: '',
                dlr_method: 'GET',
                balance: 0,
                min_balance: 0,
                dlr_data: '',
                url: '',
                credit_limit: 0
            }
        };
        
        /**
         * Get service data
         */
        var getData = function(){
            
            ctlr.data.service = ServiceItem.get({ itemId: ctlr.data.service.id });
            
        };
        
        /**
         * Save data
         *
         */
        ctlr.saveData = function(){
            
            var postData = angular.copy( ctlr.data.service );
            var result = ServiceItem.update( {itemId: ctlr.data.service.id }, postData );
            
            result.$promise
                .then(function(data) {
                    notie.alert(1, 'Данные успешно сохранены.', 2);
                    $location.path('/').replace();
                },
                function(e) {
                    notie.alert(3, 'Ошибка при сохранении.', 2);
                });
            
        };
        
        getData();
        
    }
]);
