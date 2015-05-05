(function(app) {
    var studentController = (function() {
        function studentController(studentService) {
            this.returnedmessage = '';
            this.student = studentService.student;
            this.studentPortal=studentService.studentPortal;
            var vm = this;
            studentService.studentPortalInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.studentPortal= infoDTO;
                studentService.studentPortal=infoDTO;
            }

            });
        }
        studentController.$inject = ['studentService'];
        return studentController;
    }());
    app.controller('studentController', studentController);
}(angular.module('pages')));
