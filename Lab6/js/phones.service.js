/**
 * Created by Beau on 5/8/2017.
 */
(function () {

    'use strict';
    angular
        .module('app')
        .factory('PhonesService', PhonesService);

    PhonesService.$inject = ['$http', 'REQUEST'];


    //the phonesService function sets up the services that can be called from this function like findPhone or getPhones
    function PhonesService($http, REQUEST) {
        var url = REQUEST.Phones;
        var service = {
            'getPhones': getPhones,
            'findPhone': findPhone
        };

        return service;

        //this function is set to retrieve a phone from a list of data and return the relevant information
        function getPhones() {
            return $http.get(url)
                .then(getPhonesComplete, getPhonesFailed);

            function getPhonesComplete(response) {
                return response.data;
            }

            function getPhonesFailed(error) {
                return [];
            }
        }

        //This function will find data on phones from a json file, stores it in results array
        function findPhone(id) {
            return getPhones()
                .then(function (data) {
                    return findPhoneComplete(data);
                });
            function findPhoneComplete(data) {
                var results = {};

                angular.forEach(data, function (value, key) {
                    if (!results.length) {
                        if (value.hasOwnProperty('id') && value.id === id) {
                            results = angular.copy(value);
                        }
                    }
                }, results);
                return results;
            }

        }

    }


})();