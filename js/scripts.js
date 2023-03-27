console.log(window.location.href);

var myApp = angular
                .module("myModule", ["ui.router"])
                .run(function($rootScope) {
                  console.log(localStorage.getItem('isLoggedin'));
                  if (localStorage.getItem('isLoggedin') === 'true') {
                    $rootScope.isLoggedin = true;
                  }
                  })
                .config(function($stateProvider, $urlRouterProvider, $locationProvider,$urlMatcherFactoryProvider) {
                  $urlRouterProvider.otherwise('/home');
                   $urlMatcherFactoryProvider.caseInsensitive(true);
                  $stateProvider
                    .state('home', {
                      url: '/home',
                      templateUrl: 'templates/home.html',
                      resolve: {
                        auth: function($state) {
                          if (localStorage.getItem('isLoggedin') === 'false') {
                            $state.go('signin');
                          }
                            }
                          }
                    })
                    .state('addTicket', {
                      url: '/addTicket',
                      templateUrl: 'templates/addticket.html',
                      controller: 'AddTicketController',
                      resolve: {
                        auth: function($state) {
                          if (localStorage.getItem('isLoggedin') === 'false') {
                            $state.go('signin');
                          }
                            }
                          }
                        }
                    )
                    .state('showtickets', {
                      url: '/showtickets',
                      templateUrl: 'templates/showtickets.html',
                      controller: 'showtickets',
                      resolve: {
                        auth: function($state) {
                          if (localStorage.getItem('isLoggedin') === 'false') {
                            $state.go('signin');
                          }
                            }
                          }
                    })
                    .state('signin', { 
                      url: '/signin',
                      templateUrl: 'templates/signin.html',
                      controller: 'signinController',
                      resolve: {
                        auth: function($state) {
                          if (localStorage.getItem('isLoggedin') === 'true') {
                            $state.go('home');
                          }
                            }
                          }
                    })
                    .state('logout', {
                      url: '/signin',
                      templateUrl: 'templates/signin.html',
                      controller: 'logout',
                      
                    })
                    .state('register', {
                      url: '/register',
                      templateUrl: 'templates/register.html',
                      controller: 'registerController',
                      resolve: {
                        auth: function($state) {
                          if (localStorage.getItem('isLoggedin') === 'true') {
                            $state.go('home');
                          }
                            }
                          }
                    });
                    $locationProvider.html5Mode({
                      enabled: true,
                      requireBase: false
                    });
                })
                .controller("signinController", function($scope, $http, $state, $rootScope, $log){
                  $scope.message = "";
                    $scope.signin = function() {
                        var data = {
                            email : $scope.email,
                            password : $scope.password
                        };
                        $http.post('signin/process', data)
                            .then(function(response){
                                if(response.data.status == "success") {
                                  localStorage.setItem('isLoggedin', true);
                                  $rootScope.isLoggedin = true ;           
                                  $state.go('home');
                                } 
                                else if(response.data.status == "failed") {             
                                  $scope.message = response.data.message;
                                }
                            },
                            function(reason) {
                              console.log(reason);
                            });
                            // if (localStorage.getItem('isLoggedin') === 'true') {
                            //   $rootScope.isLoggedin = true;
                            // }
                      }
                })
                .controller("registerController", function($scope, $http, $window, $state) {
                  $scope.message = "";
                  $scope.register = function() {
                    var data = {
                        name: $scope.name,
                        email : $scope.email,
                        password : $scope.password,
                        conpassword: $scope.conpassword
                    };
                    $http.post('register/process', data)
                        .then(function(response){
                          if(response.data.status == "success") {
                            $scope.message = response.data.message;
                          } 
                          else if(response.data.status == "failed") {               
                            $scope.message = response.data.message;
                          }                         
                        },
                        function(reason) {
                          console.log(reason);
                        });
                  }
                })
                .controller('AddTicketController', function($scope, $http, $scope) {
                  if (localStorage.getItem('isLoggedin') === 'false') {
                    $state.go('signin');
                  }
                  else{
                    $scope.error = "";
                    $scope.subject = null;
                    $scope.message = null;
                    $scope.category = "Manage Account";
                    
                    $scope.submitTicket = function(subject,message,category) {
                      var data = {
                        subject: subject,
                        message: message,
                        category: category,
                      }
                      $http.post('addticket/create', data)
                      .then(function(response) {
                        if(response.data.status == "success") {
                            $scope.error = "TICKET ADDED SUCCESSFULLY";
                          } else {
                               $scope.error = "FAILED TO ADD TICKET";
                          }
                          });
                    };
                  }
                  })               
                .controller("showtickets", function($scope, $http, $log, $rootScope) {
                    $scope.getTickets = function() {
                        $http ({
                            method: 'GET',
                            url: 'showtickets/getTickets'
                        })
                        .then(function(response) {
                            $scope.tickets = response.data;
                        }, function(reason) {
                            $scope.error = reason.data;
                        })
                    }
                    $scope.getTickets();
                })
                .controller("logout", function($http, $rootScope, $state,$scope){
                  $scope.logout = function() {
                    $http.post('logout/index')
                        .then(function(response){
                          console.log(response.data);
                            if(response.data.status == "success") {
                              localStorage.setItem('isLoggedin', false);
                              //  alert("log out");
                              $rootScope.isLoggedin = false;
                              $state.go('signin');
                            }
                        },
                        function(reason) {
                          console.log(reason);
                        });
                  }
                  $scope.logout();
                });