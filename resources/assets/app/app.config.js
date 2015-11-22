(function (angular) {
    'use strict';

    angular.module('boneExplorer').config(AppConfig);

    /** @ngInject */
    function AppConfig($resourceProvider)
    {
        angular.extend($resourceProvider.defaults.actions, {
            'remove': {
                method: 'DELETE',
                transformRequest: function (envelope) {
                    return angular.toJson(envelope.data);
                }
            },
            'delete': {
                method: 'DELETE',
                transformRequest: function (envelope) {
                    return angular.toJson(envelope.data);
                }
            },
            save: {
                method: 'POST',
                transformRequest: function (envelope) {
                    return angular.toJson(envelope.data);
                }
            },
            update: {
                method: 'PATCH',
                transformRequest: function (envelope) {
                    return angular.toJson(envelope.data);
                }
            }
        });
    }
})(angular);
