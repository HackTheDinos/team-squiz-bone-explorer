(function (angular) {
    'use strict';

    angular.module('boneExplorer.search')
    .service('museumResource', MuseumResourceService);

    /** @ngInject */
    function MuseumResourceService($resource) {
        return $resource('/api/museum').get();
    }
})(angular);
