(function (app) {

    var studentService = (function () {
        function studentService($http) {
            this.returnedData='';
            this.$http = $http;
            this.studentPortal={};
        }

        studentService.prototype.studentPortalInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/loggedinStudentInfo.php',
                data: {},
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
         
        studentService.$inject = ['$http'];
        return studentService;
    }());

    app.service('studentService', studentService);
}(angular.module('pages')));
