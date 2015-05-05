(function(app) {

    var commonService = (function() {
        function commonService($http) {
            this.returnedmessage = '';
            this.$http = $http;
            var vm = this;
            this.selectedCenter = {centerID: 1, Name: 'All Centers',
                filterName: function() {
                    if (vm.selectedCenter.Name === 'All Centers') {
                        return '';
                    }
                    else {
                        return vm.selectedCenter.Name;
                    }
                }
            };
            this.deleteRoomo={ID:0};
            this.newlesson = {};
            this.room = {};
            this.feeStatement = {};
            this.receptionist = {};
            this.returnedData = '';
            this.lessons = {};
            this.newRoom = {};
            this.Debit={};
            this.Credit={};
            this.centers = [{"Name": "Village Market", "centerID": 1},
                {"Name": "Yaya Center", "centerID": 1},
                {"Name": "Kileleshwa", "centerID": 2},
                {"Name": "Muthaiga", "centerID": 1}
            ];

        }
        commonService.prototype.roomsInfo = function(cb) {
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
        commonService.prototype.deleteRoom = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/deleteRoom.php',
                data: vm.deleteRoomo,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
  vm.returnedData=data;
                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };

        commonService.prototype.centersInfo = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/selectCenters.php',
                data: vm.selectedCenter,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
                        vm.centers = data;

                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };
        commonService.prototype.lessonsInfo = function(cb) {
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
         commonService.prototype.addRoom = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/addRoom.php',
                data: vm.newRoom,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
                        vm.returnedData=data;
                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };
        commonService.prototype.feesInfo = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/entireStatement.php',
                data: vm.selectedCenter,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}})
                    .success(function(data, vm) {
                        vm.feeStatement = data;

                        if (cb)
                            cb(null, data);

                    })
                    .error(function(err) {
                        vm.returnedData = err;
                        if (cb)
                            cb(err);


                    });
        };

        commonService.prototype.savemessage = function(cb) {
            var vm = this;

            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/registerReceptionist.php',
                data: vm.receptionist,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                    .success(function(data) {

                        if (cb)
                            cb(null, data);
                    })
                    .error(function(err) {
                        if (cb)
                            cb(err);

                    });
        };
        
        commonService.prototype.savemessage = function(cb) {
            var vm = this;

            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/registerReceptionist.php',
                data: vm.receptionist,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                    .success(function(data) {

                        if (cb)
                            cb(null, data);
                    })
                    .error(function(err) {
                        if (cb)
                            cb(err);

                    });
        };

        commonService.prototype.saveDebit = function(cb) {
            var vm = this;

            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/saveDebit.php',
                data: vm.Debit,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                    .success(function(data) {

                        if (cb)
                            cb(null, data);
                    })
                    .error(function(err) {
                        if (cb)
                            cb(err);

                    });
        };
        commonService.prototype.saveDebit = function(cb) {
            var vm = this;

            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/saveDebit.php',
                data: vm.Debit,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                    .success(function(data) {

                        if (cb)
                            cb(null, data);
                    })
                    .error(function(err) {
                        if (cb)
                            cb(err);

                    });
        };
         commonService.prototype.saveCredit = function(cb) {
            var vm = this;
            this.$http({
                method: "post",
                url: '/Wynton/BackEnd/saveCredit.php',
                data: vm.Credit,
                headers: {'Content-Type': 'application/x-www-form-urlencoded'}
            })
                    .success(function(data) {

                        if (cb)
                            cb(null, data);
                    })
                    .error(function(err) {
                        if (cb)
                            cb(err);

                    });
        };

        commonService.$inject = ['$http'];
        return commonService;
    }());

    app.service('commonService', commonService);
}(angular.module('pages')));
