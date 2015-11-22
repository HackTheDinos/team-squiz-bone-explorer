(function (angular) {
    'use strict';

    angular.module('boneExplorer.search').service('searchApi', SearchApiService);

    /** @ngInject */
    function SearchApiService ($resource)
    {
        return $resource('/api/search-stub').get();
    }
})(angular);
