(function (angular) {
    angular.module('boneExplorer.search').controller('SearchController', SearchController);

    /** @ngInject */
    function SearchController($location,
                              $http,
                              animalGroupResource,
                              authorResource,
                              mediaTypeResource,
                              museumResource,
                              searchResource) {
        var vm = this;
        vm.isNavbarCollapsed = true;
        vm.isLoaded = false;
        vm.filters = {
            author: [],
            museum: [],
            animalGroup: [],
            mediaType: []
        };

        //searchResource.$promise.then(function (response) {
        //    vm.results = response.data;
        //});

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

        vm.submitQuery = function () {
            var params = {q: vm.query};
            var query = vm.query || '';
            query += vm.filters.author.map(function (item) {
                return '&authors[]=' + item.name;
            }).join('');
            query += vm.filters.museum.map(function (item) {
                return '&museums[]=' + item.name;
            }).join('');
            query += vm.filters.animalGroup.map(function (item) {
                return '&animalGroups[]=' + item.name;
            }).join('');
            query += vm.filters.mediaType.map(function (item) {
                return '&mediaTypes[]=' + item.name;
            }).join('');
            vm.isLoaded = false;
            $http.get('/api/search-stub?' + query)
            .success(function (response) {
                $location.search(params);
                vm.results = response.data;
                vm.searchedQuery = vm.query;
            })
            .finally(function () {
                vm.isLoaded = true;
            });
        };

        vm.submitQuery();
    }
})(angular);
