
/**
 * MainController
 *
 */
app
.controller('MainController', ['$route', '$routeParams', '$location',
    function($route, $routeParams, $location) {
        
        this.settings = {
            createOpened: true,
            searchOpened: true
        };
        
    }
])

