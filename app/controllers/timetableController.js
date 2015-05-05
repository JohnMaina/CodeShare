(function (app) {
    var timetableController = (function () {
        function timetableController(timetableService) {
             this.returnedmessage=timetableService.returnedmessage;
            this.availability=timetableService;
            this.newlesson=timetableService.newlesson;
            var vm=this;
            this.days=[
                    {Name:"Monday"},
                    {Name:"Tuesday"},
                    {Name:"Wednesday"},
                    {Name:"Thursday"},
                    {Name:"Friday"},
                    {Name:"Saturday"}
                    
            ];
            
            this.savemessage = function() {
                if (vm.newlesson.studentID != null && vm.newlesson.instrumentID !== null && vm.newlesson.tutorID !== null
                        && vm.newlesson.day !== null && vm.newlesson.stime !== null && vm.newlesson.roomID !== null
                        && vm.newlesson.etime !== null) {
                    document.getElementById("response").innerHTML = "The lesson has been added.";
                    timetableService.savemessage(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
                }
                else{
                      document.getElementById("response").innerHTML ='Fill all the required fields properly(check the format for time field)';
                }
            };
      
      }
        timetableController.$inject = ['timetableService'];
        return timetableController;
    }());
    app.controller('timetableController', timetableController);
}(angular.module('pages')));
