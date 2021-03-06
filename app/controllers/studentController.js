(function(app) {
    var studentController = (function() {
        function studentController(studentService) {
            this.students = studentService.students;
            this.selectedStudent = studentService.selectedStudent;
            this.returnedmessage = '';
            this.student = studentService.student;
            this.studentPortal = studentService.studentPortal;
            this.newlesson = studentService.newlesson;
            var vm = this;
            this.tutorThisInstrumentObj = studentService.tutorThisInstrumentObj;
            this.tutorsThisInstrumentRO = studentService.tutorsThisInstrumentRO;
            this.selectedInstrument = studentService.selectedInstrument;
            this.days = [
                {Name: "Monday"},
                {Name: "Tuesday"},
                {Name: "Wednesday"},
                {Name: "Thursday"},
                {Name: "Friday"},
                {Name: "Saturday"}

            ];
            this.tutorThisInstrument = function() {
                studentService.tutorThisInstrument(function(err, infoDTO) {
                    if (err)
                        debugger;
                    else {
                        vm.tutorsThisInstrumentRO = infoDTO;
                    }
                });
            };

            this.savemessage = function() {
                if (vm.student.fname !== null && vm.student.sname !== null && vm.student.lname !== null
                        && vm.student.pnonenumber !== null && vm.student.gender !== null && vm.student.email !== null
                        && vm.student.center !== null && vm.student.password !== null) {
                    document.getElementById("response").innerHTML = vm.student.fname + " has been sent to the server for registration";
                    studentService.savemessage(function(err, infoDTO) {
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
            this.deleteStudentInstrument = function() {
                studentService.deleteStudentInstrument(function(err, infoDTO) {
                    if (err)
                        debugger;
                    else {
                    }
                });
            };

            this.updateStudent = function() {
                studentService.updateStudent(function(err, infoDTO) {
                    if (err)
                        debugger;
                    else {
                    }
                });
            };
            this.savestudentLesson = function() {
                studentService.savestudentLesson(function(err, infoDTO) {
                    if (err)
                        debugger;
                    else {
                    }
                });
            };

            studentService.studentsInfo(function(err, infoDTO) {
                if (err)
                    debugger;
                else {
                    vm.students = infoDTO;
                    studentService.students = infoDTO;
                }

            });
            this.studentPortalInfo = studentService.studentPortalInfo(function(err, infoDTO) {
                if (err)
                    debugger;
                else {
                    vm.studentPortal = infoDTO;
                    studentService.studentPortal = infoDTO;
                }

            });
        }
        studentController.$inject = ['studentService', 'commonService', 'instrumentService'];
        return studentController;
    }());
    app.controller('studentController', studentController);
}(angular.module('pages')));
