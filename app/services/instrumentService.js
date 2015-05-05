(function (app) {

    var instrumentService = (function () {
        function instrumentService($http) {
            this.$http=$http;
            this.returnedData='';
            this.instruments= {};
            this.selectedInstrument= {Name:'Select',instrumentID:0,pName:'select',pID:0};
            this.newInstrument={};
         }
           
instrumentService.prototype.instrumentsInfo=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/selectInstruments.php',
                data: {},
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                vm.instruments=data;
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        instrumentService.prototype.addInstrument=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/addInstrument.php',
                data: vm.newInstrument,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        instrumentService.prototype.deleteInstrument=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/deleteInstrument.php',
                data:vm.selectedInstrument,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                if(cb)
                    cb(err);
              

            });
        };
        
        instrumentService.prototype.instrumentRegister=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/instrumentRegister.php',
                data: vm.selectedInstrument,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
               vm.returnedData='Registered'
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
         instrumentService.prototype.tutorinstrumentRegister=function(cb){
            var vm=this;
             this.$http({
                method: "post",
                url: '/Wynton/BackEnd/tutorinstrumentRegister.php',
                data: vm.selectedInstrument,
                headers: { 'Content-Type': 'application/x-www-form-urlencoded' }})
           .success(function (data,vm) {
               vm.returnedData='Registered'
                if(cb)
                    cb(null, data);
                
            })
       .error(function (err) {
                vm.returnedData = err;
                if(cb)
                    cb(err);
              

            });
        };
        
        instrumentService.$inject = ['$http'];
        return instrumentService;
    }());
    

    app.service('instrumentService', instrumentService);
}(angular.module('pages')));
