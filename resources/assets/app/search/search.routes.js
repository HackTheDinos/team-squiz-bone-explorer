(function (angular) {
    angular.module('boneExplorer.search').config(SearchRoutes);

    /** @ngInject */
    function SearchRoutes($stateProvider) {
        $stateProvider.state('app.search', {
            url: '/',
            templateUrl: 'search/search-alt.html',
            controller: 'SearchController',
            controllerAs: 'search'
        });
    }
})(angular);
