(function () {
    'use strict';

    var app = angular.module('app', ['pages', 'ngAnimate', 'ui.router']);
    app.constant();
    app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function ($stateProvider, $urlRouterProvider, $locationProvider) {
        $stateProvider
        .state('manageStudent', {
            url: '/manageStudent',
            templateUrl: 'app/views/manageStudent.html'
        }
        )
        .state('tutorSelect', {
            url: '/tutorSelect',
            templateUrl: 'app/views/tutorSelect.html'
        }
        )
        .state('manageTutor', {
            url: '/manageTutor',
            templateUrl: 'app/views/manageTutor.html'
        }
        )
         .state('addanothertutorInstrument', {
            url: '/addanothertutorInstrument',
            templateUrl: 'app/views/addanothertutorInstrument.html'
        }
        )
        
        .state('manageInstrument', {
            url: '/manageInstrument',
            templateUrl: 'app/views/manageInstrument.html'
        }
        )
        .state('manageRoom', {
            url: '/manageRoom',
            templateUrl: 'app/views/manageRoom.html'
        }
        )
        .state('timetable', {
            url: '/timetable',
            templateUrl: 'app/views/timetable.html'
        }
        )
        .state('feeStatement', {
            url: '/feeStatement',
            templateUrl: 'app/views/feeStatement.html'
        }
        )
        .state('studentfeeStatement', {
            url: '/studentfeeStatement',
            templateUrl: 'app/views/studentfeeStatement.html'
        }
        )
        .state('personalDetails', {
            url: '/personalDetails',
            templateUrl: 'app/views/personalDetails.html'
        }
        )
        .state('Lessons', {
            url: '/Lessons',
            templateUrl: 'app/views/Lessons.html'
        }
        )
        .state('registerStudent', {
            url: '/registerStudent',
            templateUrl: 'app/views/registerStudent.html'
        }
        )
        .state('editStudentDetails', {
            url: '/editStudentDetails',
            templateUrl: 'app/views/editStudentDetails.html'
        }
        )
        .state('debitCredit', {
            url: '/debitCredit',
            templateUrl: 'app/views/debitCredit.html'
        }
        )
       .state('addInstrument', {
            url: '/addInstrument',
            templateUrl: 'app/views/addInstrument.html'
        }
        )
        .state('addRoom', {
            url: '/addRoom',
            templateUrl: 'app/views/addRoom.html'
        }
        )
        .state('tutorLessons', {
            url: '/tutorLessons',
            templateUrl: 'app/views/tutorLessons.html'
        }
        )
        
        .state('registerTutor', {
            url: '/registerTutor',
            templateUrl: 'app/views/registerTutor.html'
        }
        )
       .state('registerReceptionist', {
            url: '/registerReceptionist',
            templateUrl: 'app/views/registerReceptionist.html'
        }
        )
       
       
        .state('home', {
            url: '/home',
            templateUrl: 'app/views/home.html'
        }
        )

 .state('timetableMonday', {
            url: '/timetableMonday',
            templateUrl: 'app/views/timetableMonday.html'
        }
        )
.state('timetableTuesday', {
            url: '/timetableTuesday',
            templateUrl: 'app/views/timetableTuesday.html'
        }
        )
.state('timetableWednesday', {
            url: '/timetableWednesday',
            templateUrl: 'app/views/timetableWednesday.html'
        }
        )
.state('timetableThursday', {
            url: '/timetableThursday',
            templateUrl: 'app/views/timetableThursday.html'
        }
        )
.state('timetableFriday', {
            url: '/timetableFriday',
            templateUrl: 'app/views/timetableFriday.html'
        }
        )
.state('timetableSaturday', {
            url: '/timetableSaturday',
            templateUrl: 'app/views/timetableSaturday.html'
        }
        )
.state('timetableStudentView', {
            url: '/timetableStudentView',
            templateUrl: 'app/views/timetableStudentView.html'
        }
        )
.state('addLesson', {
            url: '/addLesson',
            templateUrl: 'app/views/addLesson.html'
        }
        )
.state('addLessonThisStudent', {
            url: '/addLessonThisStudent',
            templateUrl: 'app/views/addLessonThisStudent.html'
        }
        )

.state('addanotherInstrument', {
            url: '/addanotherInstrument',
            templateUrl: 'app/views/addanotherInstrument.html'
        }
        );
        $urlRouterProvider.otherwise('/home');
    }]);
   
    app.run([
        '$rootScope', function ($rootScope) {
        $rootScope.$on('$stateChangeSuccess', function () {
            $("html, body").animate({ scrollTop: 0 },0);
        });
    }]);
}());