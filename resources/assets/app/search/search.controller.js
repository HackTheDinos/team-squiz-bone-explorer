(function (angular) {
    angular.module('boneExplorer.search').controller('SearchController', SearchController);

    /** @ngInject */
    function SearchController($location, animalGroupResource, authorResource, mediaTypeResource, museumResource, searchResource) {
        var vm = this;

        vm.filters = {
            author: [],
            museum: [],
            animalGroup: [],
            mediaTyp: []
        };

        searchResource.$promise.then(function (response) {
            vm.results = response.data;
        });

        animalGroupResource.$promise.then(function (response) {
            vm.animalGroups = response.data;
        });

        authorResource.$promise.then(function (response) {
            vm.authors = response.data;
        });

        mediaTypeResource.$promise.then(function (response) {
            vm.mediaTypes = response.data;
        });

        museumResource.$promise.then(function (response) {
            vm.museums = response.data;
        });

        vm.submitQuery = function (query) {
            var params = {q: query};
            searchResource.$get(params);
            searchResource.$promise.then(function (response) {
                $location.search(params);
                vm.results = response.data;
            });
        };
    }
})(angular);
