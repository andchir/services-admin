
/**
 * apiServices
 *
 */
angular.module('apiServices', ['ngResource'])
.factory('ServiceItem', ['$resource',
    function($resource){
        return $resource('app/items/:page', {}, {
            query: {
                method: 'GET',
                params: {
                    page: 1
                },
                isArray: false
            },
            save: {
                method: 'POST',
                isArray: false
            },
            remove: {
                url: 'app/items/:itemIdp',
                method: 'DELETE'
            }
        });
    }
]);
