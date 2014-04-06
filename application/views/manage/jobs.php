<h1>Manage Job Types</h1>

<p>Manage posts that can be filled, and who can fill them</p>

<div class="table-responsive">
  <table class="table">
  	<tr>
  		<th>#</th>
  		<th>Job Type</th>
  		<th>Actions</th>
  	</tr>
  	<?php $counter = 1; ?>
    <?php foreach($jobs as $job): ?>
    	<tr>
    		<td><?php echo $counter++; ?></td>
    		<td><?php echo $job->name; ?></td>
    		<td><a class="btn btn-info btn-small" href="<?php echo $job->id; ?>">Manage Job Type</a></td>
    		
    	</tr>
    <?php endforeach;?>
  </table>
</div>

<div class="pull-right"><a href="#" class="btn btn-success">Add New Job Type</a></div>
