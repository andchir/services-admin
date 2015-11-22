
/**
 * apiServices
 *
 */
angular.module('apiServices', ['ngResource'])
.factory('ServiceItem', ['$resource',
    function($resource){
        return $resource('app/items/:page', {}, {
            get: {
                url: 'app/items/data/:itemId',
                method: 'GET',
                params: {
                    itemId: 0
                },
                isArray: false
            },
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
            },
            update: {
                url: 'app/items/update/:itemId',
                method: 'PUT'
            }
        });
    }
]);
