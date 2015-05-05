(function(app) {
    var tutorController = (function() {
        function tutorController(tutorService) {
            this.tutors = tutorService.tutors;
            this.tutorPortal = tutorService.tutorPortal;
            this.selectedTutor = tutorService.selectedTutor;
            this.returnedmessage = '';
            this.selectedInstrument =tutorService.selectedInstrument;
            this.tutor = tutorService.tutor;
            //this.tutorPortal=tutorService.tutorPortal;
            var vm = this;
            this.savemessage = function() {
                if (vm.tutor.fname !== null && vm.tutor.sname !== null && vm.tutor.lname !== null
                        && vm.tutor.pnonenumber !== null && vm.tutor.gender !== null && vm.tutor.password !== null
                        && vm.tutor.email !== null) {
                    document.getElementById("response").innerHTML = vm.tutor.fname + " has been sent to the server for registration";
                    tutorService.savemessage(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
                }
                else {
                    document.getElementById("response").innerHTML = 'Fill all the required fields';
                }
            };
            tutorService.tutorsInfo(function(err, infoDTO) {
                if (err)
                    debugger;
                else {
                    vm.tutors = infoDTO;
                    tutorService.tutors = infoDTO;
                }

            });
            this.tutorPortalInfo = tutorService.tutorPortalInfo(function(err, infoDTO) {
                if (err)
                    debugger;
                else {
                    vm.tutorPortal = infoDTO;
                    tutorService.tutorPortal = infoDTO;
                }

            });

            this.deleteTutorInstrument = tutorService.deleteTutorInstrument(function(err, infoDTO) {
                if (err)
                    debugger;
                else {
                  vm.returnedmessage = infoDTO;
                }

            });
        }
        tutorController.$inject = ['tutorService'];
        return tutorController;
    }());
    app.controller('tutorController', tutorController);
}(angular.module('pages')));
