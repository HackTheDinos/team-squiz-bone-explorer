(function (angular) {
    angular.module('boneExplorer').config(AppRoutes);

    /** @ngInject */
    function AppRoutes($stateProvider, $urlRouterProvider) {
        $stateProvider.state('app', {
            abstract: true,
            templateUrl: 'app.html'
        });
        $urlRouterProvider.otherwise('/');
    }
})(angular);
