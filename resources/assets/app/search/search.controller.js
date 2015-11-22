(function (angular) {
    angular.module('boneExplorer.search').controller('SearchController', SearchController);

    /** @ngInject */
    function SearchController($http,
                              $modal,
                              $state,
                              $stateParams,
                              $q,
                              animalGroupResource,
                              authorResource,
                              mediaTypeResource,
                              museumResource) {
        console.log($stateParams);
        var deferred = $q.defer();
        var vm = this;
        vm.isNavbarCollapsed = true;
        vm.isLoaded = false;
        vm.filters = {
            author: [],
            museum: [],
            animalGroup: [],
            mediaType: []
        };

        if (angular.isDefined($stateParams.q)) {
            vm.query = $stateParams.q;
        }

        function reloadAuthorFilter() {
            vm.filters.author = [];
            if (angular.isDefined($stateParams.authors)) {
                var names = $stateParams.authors.split(':::');
                vm.authors.forEach(function (item) {
                    if (names.indexOf(item.name) > -1) {
                        vm.filters.author.push(item);
                    }
                });
            }
        }

        function reloadAnimalGroupFilter() {
            vm.filters.animalGroup = [];
            if (angular.isDefined($stateParams.animalGroups)) {
                var names = $stateParams.animalGroups.split(':::');
                vm.animalGroups.forEach(function (item) {
                    if (names.indexOf(item.name) > -1) {
                        vm.filters.animalGroup.push(item);
                    }
                });
            }
        }

        function reloadMuseumFilter() {
            vm.filters.museum = [];
            if (angular.isDefined($stateParams.museums)) {
                var names = $stateParams.museums.split(':::');
                vm.museums.forEach(function (item) {
                    if (names.indexOf(item.name) > -1) {
                        vm.filters.museum.push(item);
                    }
                });
            }
        }


        function reloadMediaTypeFilter() {
            vm.filters.mediaType = [];
            if (angular.isDefined($stateParams.mediaTypes)) {
                var names = $stateParams.mediaTypes.split(':::');
                vm.mediaTypes.forEach(function (item) {
                    if (names.indexOf(item.name) > -1) {
                        vm.filters.mediaType.push(item);
                    }
                });
            }
        }

        function resolveDeferred () {
            if (authorResource.$resolved && animalGroupResource.$resolved &&
                museumResource.$resolved && mediaTypeResource.$resolved) {
                deferred.resolve();
            }
        }

        animalGroupResource.$promise.then(function (response) {
            vm.animalGroups = response.data;
            reloadAnimalGroupFilter();
            resolveDeferred();
        });

        authorResource.$promise.then(function (response) {
            vm.authors = response.data;
            reloadAuthorFilter();
            resolveDeferred();
        });

        mediaTypeResource.$promise.then(function (response) {
            vm.mediaTypes = response.data;
            reloadMediaTypeFilter();
            resolveDeferred();
        });

        museumResource.$promise.then(function (response) {
            vm.museums = response.data;
            reloadMuseumFilter();
            resolveDeferred();
        });

        vm.submitQuery = function () {

            var query = vm.query ? 'q=' + vm.query : '';
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

            var params = {
                q: vm.query,
                authors: vm.filters.author.map(function (item) { return item.name; }).join(':::'),
                animalGroups: vm.filters.animalGroup.map(function (item) { return item.name; }).join(':::'),
                mediaTypes: vm.filters.mediaType.map(function (item) { return item.name; }).join(':::'),
                museums: vm.filters.museum.map(function (item) { return item.name; }).join(':::')
            };


            $http.get('/api/search?' + query)
            .success(function (response) {
                $state.go($state.current, params, {notify: false});
                vm.results = response.data;
                vm.searchedQuery = vm.query;
            })
            .finally(function () {
                vm.isLoaded = true;
            });
        };

        deferred.promise.then(vm.submitQuery);


        vm.open = function (size, result) {
            var modalInstance = $modal.open({
                animation: false,
                templateUrl: 'myModalContent.html',
                controller: 'ModalInstanceCtrl',
                size: size,
                resolve: {
                    items: function () {
                        return result;
                    }
                }
            });

            modalInstance.result.then(function (selectedItem) {
                //vm.selected = selectedItem;
            }, function () {
                //$log.info('Modal dismissed at: ' + new Date());
            });
        };
    }

    angular.module('boneExplorer.search').controller('ModalInstanceCtrl', function ($scope, $modalInstance, items) {

        $scope.result = items;
        //$scope.selected = {
        //    item: $scope.items[0]
        //};
        $scope.ok = function () {
            $modalInstance.close($scope.selected.item);
        };

    });
})(angular);
