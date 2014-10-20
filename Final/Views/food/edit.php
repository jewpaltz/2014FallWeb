  <div class="modal-header">
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
    <h4 class="modal-title" id="myModalLabel">Record a food</h4>
  </div>
  <div class="modal-body">

		<form class="form-horizontal" >
		  <div class="form-group">
		    <label for="txtName" class="col-sm-2 control-label">Name</label>
		    <div class="col-sm-10">
		      <input type="text" class="form-control" id="txtName" placeholder="Name" value="<?=$model['Name']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCalories" class="col-sm-2 control-label">Calories</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCalories" placeholder="Calories" value="<?=$model['Calories']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFat" class="col-sm-2 control-label">Fat</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtFat" placeholder="Fat" value="<?=$model['Fat']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtCarbs" class="col-sm-2 control-label">Carbs</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtCarbs" placeholder="Carbs" value="<?=$model['Carbs']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtFiber" class="col-sm-2 control-label">Fiber</label>
		    <div class="col-sm-10">
		      <input type="number" class="form-control" id="txtFiber" placeholder="Fiber" value="<?=$model['Fiber']?>">
		    </div>
		  </div>
		  <div class="form-group">
		    <label for="txtTime" class="col-sm-2 control-label">Time</label>
		    <div class="col-sm-10">
		      <input type="datetime" class="form-control" id="txtTime" placeholder="Time"  value="<?=date('m/d/Y H:i:s', strtotime( $model['Time'])) ?>">
		    </div>
		  </div>
		</form>
  </div>
  <div class="modal-footer">
    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
    <button type="button" class="btn btn-primary">Save changes</button>
  </div>
