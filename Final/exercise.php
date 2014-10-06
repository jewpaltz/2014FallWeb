<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">

		<title>Fitness Tracker</title>
		<meta name="viewport" content="width=device-width; initial-scale=1.0">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
		<link rel="stylesheet" href="content/css/main.css">
		
	</head>

	<body>
		<div id="top-nav"></div>
			<header>
				<div class="container">
					<h1>Fitness Tracker - Exrcise</h1>
				</div>
			</header>

			<div class="container content">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Place</th>
                  <th>Type</th>
                  <th>Distance (m)</th>
                  <th>Calories Burned</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Treadmill</td>
                  <td>Running</td>
                  <td>18.0</td>
                  <td>500</td>
                  <td> Sunday 9:15am</td>
                </tr>
                <tr>
                  <td>Treadmill</td>
                  <td>Running</td>
                  <td>18.0</td>
                  <td>500</td>
                  <td> Sunday 9:15am</td>
                </tr>
                <tr>
                  <td>The tripping fields</td>
                  <td>Biking</td>
                  <td>18.0</td>
                  <td>500</td>
                  <td> Sunday 9:15am</td>
                </tr>
              </tbody>
            </table>
          </div>

			</div>

			<footer>
				<div class="container">
					<p>
						&copy; Copyright  by Moshe
					</p>
				</div>
			</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/holder/2.4.0/holder.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#top-nav").load("inc/_nav.html", function(){
					$(".exercise").addClass("active");					
				});
			});
		</script>
	</body>
</html>
