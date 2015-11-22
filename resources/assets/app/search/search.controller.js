(function (angular) {
    angular.module('boneExplorer.search').controller('SearchController', SearchController);

    /** @ngInject */
    function SearchController(searchApi) {
        var vm = this;
        searchApi.$promise.then(function (response) {
            console.log(response);
            vm.results = response.data;
        });
    }
})(angular);
