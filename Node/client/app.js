		    var app = angular.module('app', ['ngAnimate', 'ngRoute'])
		    .config(['$routeProvider', function($routeProvider) {
                $routeProvider.
                  when('/list', {
                    templateUrl: 'views/list.html',
                    controller: 'index'
                  }).
                  when('/create', {
                    templateUrl: 'views/edit.html',
                    controller: 'create'
                  }).
                  when('/edit/:id', {
                    templateUrl: 'views/edit.html',
                    controller: 'edit'
                  }).
                  when('/delete/:id', {
                    templateUrl: 'views/delete.html',
                    controller: 'delete'
                  }).
                  otherwise({
                    redirectTo: '/list'
                  });
            }])
		    .factory('sum', function(){
		        return function (data, field){
    				var total = 0;
    				$.each(data, function(i, el){
    					total += +el[field];
    				});
    				return total;
    			}
		    })
		    .factory('first', function(){
		        return function (data, predicate){
							for (var index = 0; index < data.length; ++index) {
							   if(predicate(data[index])) return data[index];
							}
    				return null;
    			}
		    })
		    .controller('root', function($scope, $http, sum){
				$scope.dataQ = $http.get('/food')
				.success(function(data){
					$scope.data = data;
					$scope.calories = function(){
					    return (sum(data.food, 'Calories') / 2000 * 100) + '%';
					};
					$scope.fat = function(){ return (sum(data.food, 'Fat') / 60 * 100) + '%';  };
					$scope.fiber = function(){ return (sum(data.food, 'Fiber') / 60 * 100) + '%';  };
					$scope.barClass = function(precent, inverse){
						var p = parseInt(precent);
						if(inverse) p = 100 - p;
						if(p < 33) return "progress-bar-success";
						if(p < 66) return "progress-bar-warning";
						return "progress-bar-danger";
					}
				});
		    })
			.controller('bmiCalculator', function ($scope){
				$scope.results = function(){
					return ($scope.weight / ($scope.height * $scope.height)) * 703;
				};
			})
			.controller('index', function($scope, $http){
				$scope.quickAdd = false;
				$('.typeahead').typeahead({}, {
					displayKey: 'Name',
					source: function(q, cb){
						$http.get('/food/search/' + q)
						.success(function(matches){
							cb(matches);
						})
					}
				});
			})
			.controller('create', function($scope, $http, $location){
			    $scope.row = null;
					$scope.save = function(){
						$http.post('/food/', $scope.row)
						.success(function(data){
							$scope.data.food.push(data.row);
							$location.path( '/' );
						});
					}
			})
			.controller('edit', function($scope, $http, $routeParams, $location, first){
				$scope.dataQ.success(function(){
		    	$scope.row = first($scope.data.food, function(el){ return el.id == $routeParams.id });
				});
				$scope.save = function(){
					$http.put('/food/' + $scope.row.id, $scope.row)
					.success(function(data){
						$scope.data.food[$scope.data.food.indexOf($scope.row)] = data.row;
						$location.path( '/' );
					});
				}
			})
			.controller('delete', function($scope, $http, $routeParams, $location, first){
				$scope.dataQ.success(function(){
		    	$scope.row = first($scope.data.food, function(el){ return el.id == $routeParams.id });
				});
				$scope.save = function(){
					$http.delete('/food/' + $scope.row.id)
					.success(function(status){
						console.log(status);
						$scope.data.food.splice($scope.data.food.indexOf($scope.row), 1);
						$location.path( '/' );
					});
				};
			})
			;
			var $socialScope = null;
			app.controller('social', function($scope){
				$socialScope = $scope;
			});