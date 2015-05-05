(function () {
    'use strict';

    var app = angular.module('app', ['pages', 'ngAnimate', 'ui.router']);
    app.constant();
    app.config(['$stateProvider', '$urlRouterProvider', '$locationProvider', function ($stateProvider, $urlRouterProvider) {
        $stateProvider
        .state('timetable', {
            url: '/timetable',
            templateUrl: 'views/timetable.html'
        }
        )
       
        .state('studentfeeStatement', {
            url: '/studentfeeStatement',
            templateUrl: 'views/studentfeeStatement.html'
        }
        )
        .state('personalDetails', {
            url: '/personalDetails',
            templateUrl: 'views/personalDetails.html'
        }
        )
        .state('Lessons', {
            url: '/Lessons',
            templateUrl: 'views/Lessons.html'
        }
        )
       
 .state('timetableMonday', {
            url: '/timetableMonday',
            templateUrl: 'views/timetableMonday.html'
        }
        )
.state('timetableTuesday', {
            url: '/timetableTuesday',
            templateUrl: 'views/timetableTuesday.html'
        }
        )
.state('timetableWednesday', {
            url: '/timetableWednesday',
            templateUrl: 'views/timetableWednesday.html'
        }
        )
.state('timetableThursday', {
            url: '/timetableThursday',
            templateUrl: 'views/timetableThursday.html'
        }
        )
.state('timetableFriday', {
            url: '/timetableFriday',
            templateUrl: 'views/timetableFriday.html'
        }
        )
.state('timetableSaturday', {
            url: '/timetableSaturday',
            templateUrl: 'views/timetableSaturday.html'
        }
        );

        $urlRouterProvider.otherwise('/personalDetails');
    }]);
   
    app.run([
        '$rootScope', function ($rootScope) {
        $rootScope.$on('$stateChangeSuccess', function () {
            $("html, body").animate({ scrollTop: 0 },0);
        });
    }]);
}());