<!-- bof Advance filtering and search -->
	<div class="row">
		<div class="col-md-4 col-sm-5 col-xs-12 form-group pull-left">
			<form class="form-horizontal" method="get">
			  <fieldset>
				<div class="control-group">
				  <div class="controls">
					<div class="input-prepend input-group">
					  <span class="add-on input-group-addon"><i class="glyphicon glyphicon-calendar fa fa-calendar"></i></span>
					
						<input type="text" name="daterange" id="reservation" class="form-control" value="<?=$daterange?>" placeholder="Filter by date" />
					  <span class="input-group-btn"><button class="btn btn-default" type="submit">Go!</button></span>
					</div>
				   </div>
				</div>
			  </fieldset>
			</form>
		</div>
		
		<div class="col-md-4 col-sm-5 col-xs-12 form-group pull-left">
			<div class="col-md-12 col-sm-12 col-xs-12 form-group">
				  <form action="" method="get"> 
            		<select name="priority" class="form-control" id="status" onchange="submit(this);">
					     <option value="">Filter by Task Priority</option> 
					      <?= getPriority($db->get_post('status')); ?> 
				  	</select>
				</form>
			</div>
		</div>
    		
    	<div class="col-md-4 col-sm-7 col-xs-12 form-group pull-right">
			<div class="col-md-12 col-sm-12 col-xs-12 form-group">
				  <form action="" method="get"> 
	        		<select name="status" class="form-control" id="status" onchange="submit(this);">
					     <option value="">Filter by Task Status</option> 
					      <?= getStatus($db->get_post('status')); ?>
				  	</select>
				</form>
			</div>
		</div>
	</div>
<!-- end filtering -->

<?php  

function getPriority($priority=false){
	$priorityOptions.='';
	$priorityArray=array("Highly Urgent", "Moderately Urgent", "Less Urgent");
	foreach($priorityArray as $value){
		$sel=($priority == $value)?' selected="selected"':'';
		$priorityOptions.='<option value="'.$value.'"'.$sel.'>'.$value.'</option>';
	}
	return $priorityOptions;
}

function getStatus($status){
	$statusOptions.='';
	$statusArray=array("0"=>"Pending", "1"=>"Completed", "2"=>"Forwarded", "3"=>"Running", "4"=>"Paused", "5"=>"Resumed");
	if($statusArray){
		foreach($statusArray as $key=>$value){
			$sel=($status==$key)?' selected="selected"':'';
			$statusOptions.='<option value="'.$key.'"'.$sel.'>'.$value.'</option>';
		}
	}
	return $statusOptions;
}

?>

