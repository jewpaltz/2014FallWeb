		    var app = angular.module('app', ['ngAnimate', 'ngRoute'])
		    .config(['$routeProvider', function($routeProvider) {
                $routeProvider.
                  when('/list', {
                    templateUrl: 'views/exercise/list.html',
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
        .factory('map',function(){
        		var vm = { map: null, polyPath: null};
        		return {
        				vm: vm,
        				init: function (lat, lng) {
				    				var mapOptions = {
						          center: { lat: lat, lng: lng},
						          zoom: 18
						        };
						        vm.map = new google.maps.Map($('#map')[0], mapOptions);
								   	var polyOptions = {
									    strokeColor: '#000000',
								  	  strokeOpacity: 1.0,
								    	strokeWeight: 3
								  	};
								  	var poly = new google.maps.Polyline(polyOptions);
								  	poly.setMap(vm.map);
								  	vm.polyPath = poly.getPath();
        				},
        				update: function (lat, lng) {
				    			var latLng = new google.maps.LatLng(lat, lng);
				    			var marker = new google.maps.Marker({ position: latLng, title: "Hello World!" });
				    			marker.setMap(vm.map);
				    			vm.polyPath.push(latLng);
        					
        				}
        		};
        })
		    .controller('root', function($scope, $http, map){
		    	$scope.data = [];
        	var options = {enableHighAccuracy: true, timeout: 5000, maximumAge: 0, desiredAccuracy: 0, frequency: 1 };
		    	function updatePosition(position) {
		    			position.coords.time = new Date();
		    			console.log(position.coords);
		    			$scope.data.push(position.coords);
		    			$scope.$apply();
		    			
		    			if(!map.vm.map){
		    				map.init(position.coords.latitude, position.coords.longitude);
					  	}
					  	map.update(position.coords.latitude, position.coords.longitude);
		    	}
		    	//navigator.geolocation.watchPosition(updatePosition, function(err){}, options);
		    	$scope.add = function(){
		    		navigator.geolocation.getCurrentPosition(updatePosition);
		    	}
		    })
			.controller('index', function($scope, $http){
			})
			.controller('create', function($scope, $http, $location){
			})
			.controller('edit', function($scope, $http, $routeParams, $location){
			})
			.controller('delete', function($scope, $http, $routeParams, $location){
			})
			;
			var $socialScope = null;
			app.controller('social', function($scope){
					$socialScope = $scope;
			});