			<header>
				<div class="container">
					<h1>Fitness Tracker - Food</h1>
				</div>
			</header>

			<div class="container content">
				<a class="btn btn-success" data-toggle="modal" data-target="#myModal" href="?action=edit&format=plain">
					<i class="glyphicon glyphicon-plus"></i>
					Add
				</a>
				
				<!-- Modal -->
				<div class="modal fade" id="myModal" tabindex="-1" >
				  <div class="modal-dialog">
				    <div class="modal-content">
				    </div>
				  </div>
				</div>
				
				<!-- Alert -->
				<div class="alert alert-success initialy-hidden" id="myAlert">
					<button type="button" class="close" data-dismiss="alert">
						<span aria-hidden="true">&times;</span><span class="sr-only">Close</span>
					</button>
					Excelent Job. Your meal has been recorded
				</div>
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Calories</th>
                  <th>Fat (g)</th>
                  <th>Carbs (g)</th>
                  <th>Fiber (g)</th>
                  <th>Time</th>
                </tr>
              </thead>
              <tbody>
              	
              	<? foreach ($model as $rs): ?>
	               <tr>
	                  <td><?=$rs['Name']?></td>
	                  <td><?=$rs['Calories']?></td>
	                  <td><?=$rs['Fat']?></td>
	                  <td><?=$rs['Carbs']?></td>
	                  <td><?=$rs['Fiber']?></td>
	                  <td> <?=$rs['Time']?></td>
	                </tr>
                <? endforeach; ?>
                
              </tbody>
            </table>
          </div>

			</div>

		<script type="text/javascript">
			$(function(){
				$(".food").addClass("active");					
				$('#myModal').on('hidden.bs.modal', function (e) {
				  $("#myAlert").show();
				})
			});
		</script>
