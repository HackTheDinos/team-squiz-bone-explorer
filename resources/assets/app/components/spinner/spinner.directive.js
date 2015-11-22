(function (angular) {
    'use strict';
    angular.module('spinner')
    .directive('spinner', SpinnerDirective);

    /** @ngInject */
    function SpinnerDirective() {
        return {
            restrict: 'AE',
            transclude: true,
            templateUrl: 'components/spinner/spinner.html',
            scope: {
                isLoaded: '='
            },
            link: function (scope) {
                scope.isContentReady = false;
                var toggleIndicator = function (isLoaded) {
                    scope.isContentReady = isLoaded;
                };
                if (typeof scope.isLoaded === 'boolean') {
                    scope.$watch('isLoaded', toggleIndicator);
                } else {
                    scope.$watch('isLoaded.$resolved', toggleIndicator);
                }
            }
        };
    }
})(angular);