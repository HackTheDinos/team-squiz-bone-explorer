(function (angular) {
    angular.module('boneExplorer', [
    /** App */
        'boneExplorer.search',
        'spinner',
    /** vendor */
        'eehNavigation',
        'ngAnimate',
        'ngSanitize',
        'ui.bootstrap',
        'ui.router'
    ]);
})(angular);
