(function (app) {

    var studentService = (function () {
        function studentService($http) {
            this.returnedData='';
            this.$http = $http;
            this.student = {};
            this.availability={};
            this.studentPortal={};
            var vm=this;
            this.selectedStudent={Name: "",studentID:''};
            this.students= [{"Name":"Stephen"},
                   { "Name":"Gladys"},
                   { "Name":"George"},
                   {"SName":"Martha"},
                   { "Name":"Keboi"},
                   { "Name":"Yasmin"},
                   {"Name":"Kieni"},
                   { "Name":"Nicolata"},
                   { "Name":"James"},
                   {"Name":"Peter"},
                   { "Name":"Waithera"},
                   { "Name":"Waitherero"}
               ];
           
        }
studentService.prototype.savemessage = function (cb) {
            var vm = this;
           
            this.$http({
                method: "post",

                url: '/Wynton/BackEnd/registerStudent.php',
                data: vm.student,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
            })
           .success(function (data) {
             
               if (cb)
                   cb(null, data);
           })
           .error(function (err) {
               if (cb)
                   cb(err);

           });
        };
        
         studentService.prototype.studentPortalInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/studentPortalInfo.php',
                data: vm.selectedStudent,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                vm.studentPortal=data;
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        
         studentService.prototype.studentsInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
    
                url: '/Wynton/BackEnd/studentsInfo.php',
                data: {
                    
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                vm.students=data;
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        studentService.$inject = ['$http'];
        return studentService;
    }());

    app.service('studentService', studentService);
}(angular.module('pages')));
