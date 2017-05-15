/**
 * Created by Beau on 5/8/2017.
 */
(function () {
    'use strict';
    angular
        .module('app', ['ngRoute'])
        .config(config);

    config.$inject = ['$routeProvider'];

    function config($routeProvider) {
        $routeProvider.when('/', {
            //basically sets the main page to use the list template
            templateUrl: 'js/phone-list.template.html',
            controller: 'PhoneListController',
            controllerAs: 'vm'
        }).when('/phones/:phoneId', {
            //basically when a phone is clicked, it routes to /phones/*phoneID*
            // and then uses the phone detail template
            templateUrl: 'js/phone-detail.template.html',
            controller: 'PhoneDetailController',
            controllerAs: 'vm'
        }).otherwise({
            redirectTo: '/'
        });
    }
})();
