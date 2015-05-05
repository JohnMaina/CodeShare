(function (app) {

    var tutorService = (function () {
        function tutorService($http) {
            this.returnedData='';
            this.$http = $http;
            this.tutor = {};
            this.availability={};
            this.tutorPortal={};
             this.selectedInstrument = {ID: 0};
            var vm=this;
            this.selectedTutor={Name: "",tutorID:''};
            this.tutors= [{"Name":"Stephen"},
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
tutorService.prototype.savemessage = function (cb) {
            var vm = this;
           
            this.$http({
                method: "post",

                url: '/Wynton/BackEnd/registerTutor.php',
                data: vm.tutor,
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
        
          tutorService.prototype.tutorPortalInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/tutorPortalInfo.php',
                data: vm.selectedTutor,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                vm.tutorPortal=data;
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        
         tutorService.prototype.tutorsInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
    
                url: '/Wynton/BackEnd/tutorsInfo.php',
                data: {
                    
                },
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                vm.tutors=data;
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        
        
        tutorService.prototype.deleteTutorInstrument = function (cb) {
            var vm = this;
           
            this.$http({
                method: "post",

                url: '/Wynton/BackEnd/deleteTutorInstrument.php',
                data: vm.selectedInstrument,
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
        tutorService.$inject = ['$http'];
        return tutorService;
    }());

    app.service('tutorService', tutorService);
}(angular.module('pages')));
