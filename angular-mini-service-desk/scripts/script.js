
var myApp = angular
                .module("myModule", ["ngRoute"])
                // .config(function ($routeProvider, $locationProvider) {
                    // $routeProvider
                    //     .when("/home", {
                    //         templateUrl: "/home.html",
                    //         controller: "HomeController as home"
                    //     })
                        // .otherwise()
                // })
                .controller('studentData', function ($scope, $http, $log) {
                    $scope.getStudents = function(){
                        $http({
                            method: 'get',
                            url: 'index.php/Students/getStudents'
                            })
                            .then(function (response) {
                            $scope.students = response.data;
                            $log.info(response);
                            },
                            function (reason) {
                                $scope.error = reason;
                                $log.info(reason);
                            }
                        ); 
                    }
                    });


                // .controller("myController1", function($scope) {
                //     var anObject = {
                //         key1 : "value1",
                //         key2 : "value2",
                //         key3 : "value3"
                //     }
                //     $scope.message = "Angular";
                //     $scope.anObject = anObject;
                // }

                // .controller("imageController", function($scope) {
                //     var object2 = {
                //         key1 : "ng-src",
                //         image1 : "../images/agent.png"
                //     }
                //     $scope.object2 = object2;
                // })
                // .controller("dataBinding", function($scope) {
                //     var bindObject = {
                //         key1 : "value"
                //     }
                //     var message = "ng-model";
                //     $scope.message = message;
                //     $scope.bindObject = bindObject;
                // })
                // .controller("ngRepeat", function($scope) {
                //     var repeatObject = [
                //         { key1 : "object1", key2 : "arrayOfObject1", key3 : "value1" },
                //         { key1 : "object2", key2 : "arrayOfObject2", key3 : "value2" },
                //         { key1 : "object3", key2 : "arrayOfObject3", key3 : "value3" },
                //         { key1 : "object4", key2 : "arrayOfObject4", key3 : "value4" }
                //     ]
                //     var states = [
                //         { name : "Gujarat", cities : [{ name: "Ahmedabad" }, { name: "Vadodara" }] },
                //         { name : "Maharastra", cities : [{name: "Mumbai" }, { name: "pune" }] },
                //         { name : "UP", cities : [{ name: "Lucknow" }, {name: "agra"}] }
                //     ]
                //     $scope.repeatObject = repeatObject;
                //     $scope.states = states;
                // })
                // .controller("ngEvent", function($scope) {
                //     var techs = [
                //         { name : "Java", likes : "0", dislikes : "0" },
                //         { name : "ReactJS", likes : "0", dislikes : "0" },
                //         { name : "PHP", likes : "0", dislikes : "0" },
                //         { name : "Codeigniter", likes : "0", dislikes : "0" }
                //     ]
                //     $scope.techs = techs;
                //     $scope.inLike = function (tech) {
                //         tech.likes++;
                //     }
                //     $scope.inDisLike = function (tech) {
                //         tech.dislikes++;
                //     }
                // })
                // .controller("filters", function($scope) {
                //     var phones = [
                //         {name : "redmi", releaseDate: new Date("July 12, 2013"), price: 5999 },
                //         {name : "iPhone", releaseDate: new Date("January 9, 2007"), price: 49719 },
                //         {name : "Nokia", releaseDate: new Date("November 10, 1992"), price: 5688},
                //         {name : "Realme", releaseDate: new Date("May 4, 2018"), price: 8990 },
                //         {name : "Vivo", releaseDate: new Date("July 2015"), price: 49719 },
                //     ]
                //     $scope.phones = phones;
                //     $scope.rowLimit = 3;
                // })
                // .controller("sorting", function($scope) {
                //     var phones = [
                //         {name : "redmi", releaseDate: new Date("July 12, 2013"), price: 5999 },
                //         {name : "iPhone", releaseDate: new Date("January 9, 2007"), price: 49719 },
                //         {name : "Nokia", releaseDate: new Date("November 10, 1992"), price: 5688},
                //         {name : "Realme", releaseDate: new Date("May 4, 2018"), price: 8990 },
                //         {name : "Vivo", releaseDate: new Date("July 2015"), price: 15300 },
                //     ]
                //     $scope.phones = phones;
                //     $scope.sort = "name";
                // })
                // .controller("sortByClick", function($scope) {
                //     var phones = [
                //         {name : "redmi", releaseDate: new Date("July 12, 2013"), price: 5999 },
                //         {name : "iPhone", releaseDate: new Date("January 9, 2007"), price: 49719 },
                //         {name : "Nokia", releaseDate: new Date("November 10, 1992"), price: 5688},
                //         {name : "Realme", releaseDate: new Date("May 4, 2018"), price: 8990 },
                //         {name : "Vivo", releaseDate: new Date("July 2015"), price: 15300 },
                //     ]
                //     $scope.phones = phones;
                //     $scope.sortCol = "name";
                //     $scope.sortRev = false;
                //     // function for sort data
                //     $scope.sortData = function (col) {
                //         $scope.sortRev = ($scope.sortCol == col) ? !$scope.sortRev : false;
                //         $scope.sortCol = col;
                //     }
                //     // function to get sorting arrow class
                //     $scope.getSortClass = function (col) {
                //         if($scope.sortCol == col) {
                //             return $scope.sortRev ? 'arrow-down' : 'arrow-up';
                //         }
                //         return '';
                //     }
                // })

                // .controller("search", function($scope) {
                //     var phones = [
                //         {name : "redmi", price: 5999 , origin: "China"},
                //         {name : "iPhone", price: 49719 , origin:"California"},
                //         {name : "Nokia", price: 5688 , origin: "Finland"},
                //         {name : "Realme", price: 8990 , origin: "China" },
                //         {name : "Vivo", price: 15300 , origin: "China" },
                //     ]
                //     $scope.phones = phones;
                // })
                // .controller("multipleFilter", function($scope) {
                //     var phones = [
                //         {name : "redmi", price: 5999 , origin: "China"},
                //         {name : "iPhone", price: 49719 , origin:"California"},
                //         {name : "Nokia", price: 5688 , origin: "Finland"},
                //         {name : "Realme", price: 8990 , origin: "China" },
                //         {name : "Vivo", price: 15300 , origin: "China" },
                //     ];
                //     $scope.phones = phones;
                //     $scope.search = function (item) {
                //         if($scope.searchText == undefined){ 
                //             return true; 
                //         }
                //         else {
                //             if(item.name.toLowerCase().indexOf($scope.searchText.toLowerCase()) != -1 ||
                //                item.origin.toLowerCase().indexOf($scope.searchText.toLowerCase()) != -1)
                //             {
                //                 return true;
                //             }
                //         }
                //         return false;
                //     };
                // })

                
                // .controller("customFilters", function($scope) {
                //     // 1 = purple, 2 = Blue , 3 = Green
                //     var phones = [
                //         {name : "redmi", price: 5999 , colour: 2 },
                //         {name : "iPhone", price: 49719 , colour: 1 },
                //         {name : "Nokia", price: 5688, colour: 2 },
                //         {name : "Realme", price: 8990 , colour: 3 },
                //         {name : "Vivo", price: 15300 , colour: 1 },
                //     ];
                //     $scope.phones = phones;
                // })
                
                // .controller("hideANDshow", function($scope) {
                //     var phones = [
                //                 {name : "redmi", price: 5999 , colour: "Blue" },
                //                 {name : "iPhone", price: 49719 , colour: "Purple" },
                //                 {name : "Nokia", price: 5688, colour: "Blue" },
                //                 {name : "Realme", price: 8990 , colour: "Green" },
                //                 {name : "Vivo", price: 15300 , colour: "Purple" },
                //             ];
                //             $scope.phones = phones;
                // })
                // .controller("ngInclude", function($scope) {
                //    var phones = [
                //         {name : "redmi", price: 5999 , origin: "China"},
                //         {name : "iPhone", price: 49719 , origin:"California"},
                //         {name : "Nokia", price: 5688 , origin: "Finland"},
                //         {name : "Realme", price: 8990 , origin: "China" },
                //         {name : "Vivo", price: 15300 , origin: "China" },
                //     ]
                //     $scope.phones = phones;
                //     $scope.phoneView = "phoneTable.html";
                // })
                // .controller("customService", function($scope, service) {
                //     $scope.transform = function(input) {      
                //         $scope.output = service.process(input);
                //     }
                // })
                // .controller("controllerAS", function() {
                //     this.message = "Controller as syntax ";
                // });
                // .controller("myController", function($scope, $http) {
                //     $http({
                //             method: 'get',
                //             url: '<?= base_url() ?>index.php/Students/getStudents'
                //         })
                //         .then( function(response) {
                //             $scope.students = response.data;
                //         });
                //         $scope.getStudents();
                //     });
                //     var fetch = angular.module('myapp', [])