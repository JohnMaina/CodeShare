(function(app) {

    var timetableService = (function() {
        function timetableService($http) {
            this.$http = $http;
            this.room = {};
            this.lessons = {};
            var vm=this;
            this.returnedmessage = '';
        }
        timetableService.prototype.roomsInfo = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/selectRooms.php',
                data: vm.selectedCenter,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
                        vm.room = data;

                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };
          timetableService.prototype.lessonsInfo = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/lessons.php',
                data: {},
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
                        vm.lessons = data;

                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };

        timetableService.$inject = ['$http'];
        return timetableService;
    }());

    app.service('timetableService', timetableService);
}(angular.module('pages')));
