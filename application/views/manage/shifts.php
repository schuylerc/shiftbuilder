<h1>Manage Shifts</h1>

<p>Manage shifts that need to be filled by your employees</p>

<div class="table-responsive">
  <table class="table">
  	<tr>
  		<th>#</th>
  		<th>Start</th>
  		<th>Stop</th>
  		<th>Actions</th>
  	</tr>
  	<?php $counter = 1; ?>
    <?php foreach($shifts as $shift): ?>
    	<tr>
    		<td><?php echo $counter++; ?></td>
    		<td><?php echo $job->name; ?></td>
    		<td><a class="btn btn-info btn-small" href="<?php echo $job->id; ?>">Manage Job Type</a></td>
    		
    	</tr>
    <?php endforeach;?>
  </table>
</div>

<div class="pull-right"><a href="#" class="btn btn-success">Add New Job Type</a></div>
