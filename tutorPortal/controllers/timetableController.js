(function (app) {
    var timetableController = (function () {
        function timetableController(timetableService) {
             this.returnedmessage=timetableService.returnedmessage;
            this.room=timetableService.room;
            this.lessons=timetableService.lessons; 
            var vm=this;
      timetableService.lessonsInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.lessons= infoDTO;
                timetableService.lessons=infoDTO;
            }});
         timetableService.roomsInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.room= infoDTO;
                timetableService.room=infoDTO;
            }});
    }
        timetableController.$inject = ['timetableService'];
        return timetableController;
    }());
    app.controller('timetableController', timetableController);
}(angular.module('pages')));
