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
		<? include 'inc/_nav.php'; ?>
			<header>
				<div class="container">
					<h1>Fitness Tracker - Food</h1>
				</div>
			</header>

			<div class="container content">
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Calories</th>
                  <th>Fat (g)</th>
                  <th>Carbs (g)</th>
                  <th>Fiber (g)</th>
                  <th>Protien (g)</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Pizza</td>
                  <td>500</td>
                  <td>18.0</td>
                  <td>5.0</td>
                  <td>2.0</td>
                  <td>3.0</td>
                  <td> Sunday 9:15am</td>
                </tr>
                <tr>
                  <td>Yogurt</td>
                  <td>80</td>
                  <td>0.5</td>
                  <td>0.0</td>
                  <td>0.0</td>
                  <td>3.0</td>
                  <td> Sunday 10:15am</td>
                </tr>
                <tr>
                  <td>Slim-Bar</td>
                  <td>100</td>
                  <td>2.0</td>
                  <td>5.0</td>
                  <td>5.0</td>
                  <td>3.0</td>
                  <td> Sunday 11:15am</td>
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
	</body>
</html>
