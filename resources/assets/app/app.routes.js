(function (angular) {
    angular.module('boneExplorer').config(AppRoutes);

    /** @ngInject */
    function AppRoutes($locationProvider, $stateProvider, $urlRouterProvider) {
        $locationProvider.html5Mode(true);
        $stateProvider.state('app', {
            abstract: true,
            templateUrl: 'app.html'
        });
        $urlRouterProvider.otherwise('/');
    }
})(angular);
