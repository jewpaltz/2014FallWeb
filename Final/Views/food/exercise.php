<header>
	<div class="container">
		<h1>Fitness Tracker - Exercise</h1>
	</div>
</header>

<div class="container content" ng-app="app" ng-controller='index' >
	
	<? //my_print($model); ?>
	<div class="row">

	<a class="btn btn-success toggle-modal add" data-target="#myModal" ng-click="click()">
		<i class="glyphicon glyphicon-plus"></i>
		Add
	</a>

	</div>
	<div class="row" >
		<div class="col-sm-8">
						
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Accuracy</th>
                  <th>Lat</th>
                  <th>Lng</th>
                  <th>Time</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
               <tr ng-repeat='row in data'>
                  <td>{{row.accuracy}}</td>
                  <td>{{row.latitude}}</td>
                  <td>{{row.longitude}}</td>
                   <td>{{row.time.toTimeString()}}</td>
                  <td>
					<a ng-click="click(row)" title="Edit" class="btn btn-default btn-sm toggle-modal edit" data-target="#myModal" href="?action=edit&id={{row.id}}">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a ng-click="click(row)" title="Delete" class="btn btn-default btn-sm toggle-modal delete" data-target="#myModal" href="?action=delete&id={{row.id}}">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
                  	
                  </td>
                </tr>			
              </tbody>
            </table>
          </div>
		</div>
		<div class="col-sm-4">
			<div class="well" ng-controller="social" >
					<img src="http://graph.facebook.com/{{me.id}}/picture" align="left" />
					<b>{{me.name}}</b><br>
					{{me.email}}
			</div>			
			<div class="well"  >
				<div id="map-canvas" style="height: 200px;"></div>
			</div>
			<div class="well">
			</div>
		</div>

</div>
			
<script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAkNyG0NB4JFbqaiSv5su-cmb_rITgidh4">	</script>		
		<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.2.26/angular.min.js"></script>
		<script type="text/javascript">
			var $mContent;
			var app = angular.module('app', [])
			.controller('index', function($scope, $http){
				$scope.data = [];

				var cb = function(position){
						console.log(position);
						position.coords.time = new Date();
						$scope.data.push(position.coords);
						$scope.$apply();
				        var mapOptions = {
				          center: { lat: position.coords.latitude, lng: position.coords.longitude},
				          zoom: 18
				        }
				        var map = new google.maps.Map(document.getElementById('map-canvas'),
					            mapOptions);
					      
					}
				$scope.click = function(){
					navigator.geolocation.getCurrentPosition(cb);					
				}
				navigator.geolocation.watchPosition(cb);
			});
			
			
			
			

			var $socialScope = null;
			app.controller('social', function($scope){
					$socialScope = $scope;
			});
			function checkLoginState() {
			    FB.getLoginStatus(function(response) {
				    $socialScope.status = response;
				    if (response.status === 'connected') {
				      FB.api('/me', function(response) {
					      $socialScope.me = response;
					      $socialScope.$apply();
					      console.log(response);
					    });
				    }
			    });
			  }

			
			
			
			$(function(){
				$(".food").addClass("active");
								

				
			});
		</script>
		<script>
				  window.fbAsyncInit = function() {
				    FB.init({
				      appId      : '908005495876889',
				      xfbml      : true,
				      cookie     : true,
				      version    : 'v2.2'
				    });
				    checkLoginState();
				  };
				
				  (function(d, s, id){
				     var js, fjs = d.getElementsByTagName(s)[0];
				     if (d.getElementById(id)) {return;}
				     js = d.createElement(s); js.id = id;
				     js.src = "//connect.facebook.net/en_US/sdk.js";
				     fjs.parentNode.insertBefore(js, fjs);
				   }(document, 'script', 'facebook-jssdk'));
		</script>
