(function(app) {

    var tutorService = (function() {
        function tutorService($http) {
            this.returnedData = '';
            this.$http = $http;
            this.tutorPortal = {};
        }

            tutorService.prototype.tutorPortalInfo = function(cb) {
                var vm = this;
                this.$http({
                    method: "post",
                    url: '/Wynton/BackEnd/loggedinTutorlInfo.php',
                    data: {},
                    headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                        .success(function(data, vm) {
                            vm.tutorPortal = data;

                            if (cb)
                                cb(null, data);

                        })
                        .error(function(err) {
                            vm.returnedData = err;
                            if (cb)
                                cb(err);


                        });
            };

        tutorService.$inject = ['$http'];
        return tutorService;
    }());

    app.service('tutorService', tutorService);
}(angular.module('pages')));
