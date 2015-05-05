(function (app) {
    var instrumentController = (function () {
        function instrumentController(instrumentService) {
            this.instruments=instrumentService.instruments;
            this.packages=instrumentService.packages;
            this.selectedInstrument=instrumentService.selectedInstrument;
             var vm=this;
             this.newInstrument=instrumentService.newInstrument;
             this.deleteInstrument=function (){
                instrumentService.deleteInstrument(function (err, infoDTO) {
                if (err)
                    debugger;
                else{}
            });
        };
        
        this.addInstrument=function (){
                instrumentService.addInstrument(function (err, infoDTO) {
                if (err)
                    debugger;
                else{}
            });
        };
        this.instrumentRegister=function (){
                instrumentService.instrumentRegister(function (err, infoDTO) {
                if (err)
                    debugger;
                else{}
            });
        };
        this.tutorinstrumentRegister=function (){
                instrumentService.tutorinstrumentRegister(function (err, infoDTO) {
                if (err)
                    debugger;
                else{}
            });
        };
            
           instrumentService.instrumentsInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.instruments= infoDTO;
                instrumentService.instruments=infoDTO;
            }});
            
     }
        instrumentController.$inject = ['instrumentService'];
        return instrumentController;
    }());
    app.controller('instrumentController', instrumentController);
}(angular.module('pages')));
