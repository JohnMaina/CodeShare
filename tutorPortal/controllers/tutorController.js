(function(app) {
    var tutorController = (function() {
        function tutorController(tutorService) {
            this.tutorPortal=tutorService.tutorPortal;
            this.returnedmessage = '';
            var vm = this;
           
            tutorService.tutorPortalInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.tutorPortal= infoDTO;
                tutorService.tutorPortal=infoDTO;
            }

            });
        }
        tutorController.$inject = ['tutorService'];
        return tutorController;
    }());
    app.controller('tutorController', tutorController);
}(angular.module('pages')));
