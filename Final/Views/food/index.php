<header>
	<div class="container">
		<h1>Fitness Tracker - Food</h1>
	</div>
</header>

<div class="container content">
	
	<? //my_print($model); ?>
	<a class="btn btn-success toggle-modal add" data-target="#myModal" href="?action=create">
		<i class="glyphicon glyphicon-plus"></i>
		Add
	</a>
	
	<div class="row">
		<div class="col-sm-8">
						
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
					<div></div>
				</div>
				
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Name</th>
                  <th>Type</th>
                  <th>Calories</th>
                  <th>Fat (g)</th>
                  <th>Carbs (g)</th>
                  <th>Fiber (g)</th>
                  <th>Time</th>
                  <th></th>
                </tr>
              </thead>
              <tbody>
              </tbody>
            </table>
          </div>
		</div>
		<div class="col-sm-4">
			<div class="well">
				
			</div>
			<div class="well">
				<div class="progress">Calories
				  <div class="progress-bar" id="calories-bar">
				  	
				  </div>
			</div>
		</div>
	</div>

</div>
			
			
			
		<script type="text/javascript" src="http://builds.handlebarsjs.com.s3.amazonaws.com/handlebars-v2.0.0.js"></script>
		<script type="text/javascript">
			$(function(){
				$(".food").addClass("active");
				var goalCalories  = 2000;
				var totalCalories = 0;
								
				
				var $mContent = $("#myModal .modal-content");
				var defaultContent = $mContent.html();
				
				var tmpl = Handlebars.compile($("#tmpl").html());
				
				$.getJSON('?format=json', function(data){
					$.each(data, function(i,el){
						totalCalories += +el.Calories;
						$('tbody').append(tmpl(el));
					});
					$('#calories-bar').css({width: Math.round(totalCalories / goalCalories * 100) + '%'});
				});
				
				$('body').on('click', ".toggle-modal", function(event){
					event.preventDefault();
					$("#myModal").modal("show");
					var $btn = $(this);
					
					$.get(this.href + "&format=plain", function(data){
						$mContent.html(data);
						$mContent.find('form')
						.on('submit', function(e){
							e.preventDefault();
							$("#myModal").modal("hide");
							
							$.post(this.action + '&format=json', $(this).serialize(), function(data){
								
								$("#myAlert").show().find('div').html(JSON.stringify(data));
								
								if($btn.hasClass('edit')){
									$btn.closest('tr').replaceWith(tmpl(data));							
								}
								if($btn.hasClass('add')){
									$('tbody').append(tmpl(data));							
								}
								if($btn.hasClass('delete')){
									$btn.closest('tr').remove();							
								}
								
								$('#calories-bar').css({width: Math.round(totalCalories / goalCalories * 100) + '%'});
							}, 'json');
							
							
						});
					});
				})
								
				$('#myModal').on('hidden.bs.modal', function (e) {
					$mContent.html(defaultContent);
				    
				})
				
				$('.alert .close').on('click',function(e){
					$(this).closest('.alert').slideUp();
				});

				
			});
		</script>
		
		<script type="text/x-handlebars-template" id="tmpl">
                <tr>
                  <td>{{Name}}</td>
                  <td>{{T_Name}}</td>
                  <td>{{Calories}}</td>
                  <td>{{Fat}}</td>
                  <td>{{Carbs}}</td>
                  <td>{{Fiber}}</td>
                  <td>{{Time}}</td>
                  <td>
					<a title="Edit" class="btn btn-default btn-sm toggle-modal edit" data-target="#myModal" href="?action=edit&id={{id}}">
						<i class="glyphicon glyphicon-pencil"></i>
					</a>
					<a title="Delete" class="btn btn-default btn-sm toggle-modal delete" data-target="#myModal" href="?action=delete&id={{id}}">
						<i class="glyphicon glyphicon-trash"></i>
					</a>
                  	
                  </td>
                </tr>			
		</script>
		
