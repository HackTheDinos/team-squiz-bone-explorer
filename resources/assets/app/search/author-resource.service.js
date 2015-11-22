(function (angular) {
    'use strict';

    angular.module('boneExplorer.search')
    .service('authorResource', AuthorResourceService);

    /** @ngInject */
    function AuthorResourceService($resource) {
        return $resource('/api/author').get();
    }
})(angular);
