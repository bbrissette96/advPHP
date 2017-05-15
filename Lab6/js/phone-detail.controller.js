/**
 * Created by Beau on 5/8/2017.
 */
(function () {

    'use strict';

    angular
        .module('app')
        .controller('PhoneDetailController', PhoneDetailController);

    PhoneDetailController.$inject = ['$routeParams', 'PhonesService'];

    //finds a phone based on id then takes the data and puts it in vm.phone where you call the parts of
    // vm.phone in the template
    function PhoneDetailController($routeParams, PhonesService) {
        var vm = this;

        vm.phone = {};
        var id = $routeParams.phoneId;

        activate();

        //calls the findPhone Function from phoneService and returns phones id
        function activate() {
            PhonesService.findPhone(id).then(function (response) {
                vm.phone = response;
            })
        }
    }

})();