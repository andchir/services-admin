
/**
 * apiServices
 *
 */
angular.module('apiServices', ['ngResource'])
.factory('ServiceItem', ['$resource',
    function($resource){
        return $resource('app/items/:action', {}, {
            query: {
                method: 'GET',
                params: {action: 'getlist'},
                isArray: true
            },
            save: {
                method: 'POST',
                params: {action: 'save'},
                isArray: false
            }
        });
    }
]);
