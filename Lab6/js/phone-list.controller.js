/**
 * Created by Beau on 5/8/2017.
 */
(function () {

    'use strict';

    angular
        .module('app')
        .controller('PhoneListController', PhoneListController);

    PhoneListController.$inject = ['PhonesService'];

    //gets data on a phone, stores it in vm.phones, then gets displayed in list template
    function PhoneListController(PhonesService) {
        var vm = this;

        vm.phones = [];

        activate();

        //calls the getPhones function
        function activate() {
            PhonesService.getPhones().then(function (response) {
                vm.phones = response;
            });
        }
    }

})();