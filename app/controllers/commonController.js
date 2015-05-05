(function (app) {
    var commonController = (function () {
        function commonController(commonService) {
            this.returnedmessage=commonService.returnedmessage;
           this.centers=commonService.centers;
            this.room=commonService.room;
              this.feeStatement=commonService.feeStatement;
               this.receptionist=commonService.receptionist;
               this.lessons=commonService.lessons;
               this.newlesson={};
               this.selectedCenter=commonService.selectedCenter;
            var vm=this;
            this.newRoom=commonService.newRoom;
            this.deleteRoomo=commonService.deleteRoomo;
            this.Debit=commonService.Debit;
            this.Credit=commonService.Credit;
            this.savemessage = function() {
                if (vm.receptionist.fname !== null && vm.receptionist.sname !== null && vm.receptionist.lname !== null
                        && vm.receptionist.pnonenumber !== null && vm.receptionist.gender !== null && 
                        vm.receptionist.center !== null && vm.receptionist.email !== null && vm.receptionist.password !== null) {
                    document.getElementById("response").innerHTML = vm.receptionist.fname+" has been sent to the server for registration";
                    commonService.savemessage(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
                }
                else{
                      document.getElementById("response").innerHTML ='Fill all the required fields';
                }
            };
            
            this.deleteRoom = function() {
                    commonService.deleteRoom(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
            };
             this.saveDebit = function() {
                    commonService.saveDebit(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
            };
            this.saveCredit = function() {
                    commonService.saveCredit(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
            };
            
             this.addRoom = function() {
                if (vm.newRoom.name !== null && vm.newRoom.capacity !== null){
                    commonService.addRoom(function(err, infoDTO) {
                        if (err)
                            debugger;
                        else {
                            vm.returnedmessage = infoDTO;
                        }
                    });
                }
                else{
                      document.getElementById("response").innerHTML ='Fill all the required fields';
                }
            };
           commonService.roomsInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.room= infoDTO;
                commonService.room=infoDTO;
            }});
        
         commonService.centersInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.centers= infoDTO;
                commonService.centers=infoDTO;
            }});
          commonService.lessonsInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.lessons= infoDTO;
                commonService.lessons=infoDTO;
            }});
         commonService.feesInfo(function (err, infoDTO) {
                if (err)
                    debugger;
                else{
                vm.feeStatement= infoDTO;
                commonService.feeStatement=infoDTO;
            }});

     }
        commonController.$inject = ['commonService'];
        return commonController;
    }());
    app.controller('commonController', commonController);
}(angular.module('pages')));
