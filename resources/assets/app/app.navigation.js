(function (angular) {
    angular.module('boneExplorer').config(AppNavigation);

    /** @ngInject */
    function AppNavigation($translateProvider, eehNavigationProvider) {
        $translateProvider.useSanitizeValueStrategy('sanitize');
        //eehNavigationProvider
        //.iconBaseClass('fa')
        //.menuItem('main.home', {
        //    text: 'Home',
        //    iconClass: 'fa-home',
        //    state: 'app',
        //    weight: -10
        //});
    }
})(angular);
