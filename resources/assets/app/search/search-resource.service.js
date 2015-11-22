(function (angular) {
    'use strict';

    angular.module('boneExplorer.search')
    .service('searchResource', SearchResourceService);

    /** @ngInject */
    function SearchResourceService ($resource)
    {
        return $resource('/api/search-stub').get();
    }
})(angular);
