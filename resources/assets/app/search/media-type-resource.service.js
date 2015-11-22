(function (angular) {
    'use strict';

    angular.module('boneExplorer.search')
    .service('mediaTypeResource', MediaTypeResourceService);

    /** @ngInject */
    function MediaTypeResourceService($resource) {
        return $resource('/api/media-type').get();
    }
})(angular);
