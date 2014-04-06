<h1>Manage Employees</h1>
<p>Manage settings and add or remove employees</p>
<div class="table-responsive">
  <table class="table">
  	<tr>
  		<th>#</th>
  		<th>Name</th>
  		<th>E-mail</th>
  		<th>Hours</th>
  		<th>Actions</th>
  	</tr>
  	<?php $counter = 1; ?>
    <?php foreach($users as $user): ?>
    	<tr>
    		<td><?php echo $counter++; ?></td>
    		<td><?php echo $user->first_name." ".$user->last_name; ?></td>
    		<td><?php echo $user->email; ?></td>
    		<td><?php echo $user->hours_scheduled." / ".$user->max_hours; ?></td>
    		<td><a class="btn btn-info btn-small" href="/auth/edit_user/<?php echo $user->id; ?>">Employee Settings</a> <?php if($user->active){ ?><a class="btn btn-primary btn-small" href="/auth/deactivate/<?php echo $user->id; ?>">Deactivate Account</a><?php } else { ?><a class="btn btn-primary btn-small" href="/auth/activate/<?php echo $user->id; ?>">Activate Account</a><?php } ?> <a class="btn btn-primary btn-small" href="#">Remove User</a></td>
    		
    	</tr>
    <?php endforeach;?>
  </table>
</div>

<div class="pull-right"><a href="/auth/create_user" class="btn btn-success">Add New Employee</a></div>