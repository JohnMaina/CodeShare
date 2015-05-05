(function(app) {

    var timetableService = (function() {
        function timetableService($http) {
            this.$http=$http;
            this.availability = {};
            this.newlesson = {};
            this.returnedmessage = '';
            var vm=this;
        }
        timetableService.prototype.savemessage = function (cb) {
            var vm = this;
            this.$http({
                method: "post",

                url: '/Wynton/BackEnd/addLesson.php',
                data: vm.newlesson,
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
        timetableService.$inject = ['$http'];
        return timetableService;
    }());

    app.service('timetableService', timetableService);
}(angular.module('pages')));
