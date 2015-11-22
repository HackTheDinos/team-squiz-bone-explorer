(function (angular) {
    'use strict';

    angular.module('boneExplorer.search')
    .service('animalGroupResource', AnimalGroupResourceService);

    /** @ngInject */
    function AnimalGroupResourceService($resource) {
        return $resource('/api/animal-group').get();
    }
})(angular);
