<h1>My Schedule</h1>

<p>Displaying this week's schedule</p>


<div class="table-responsive">
  <table class="table">
  	<tr>
  		<th>#</th>
  		<th>Day</th>
  		<th>Shift</th>
  		<th>Actions</th>
  	</tr>
  	<?php $counter = 1; ?>
    <?php foreach($shifts as $shift): ?>
    	<tr>
    		<td><?php echo $counter++; ?></td>
    		<td><?php echo $shift->day; ?></td>
    		<td><?php echo $shift->start_time." to ".$shift->end_time; ?></td>
    		
    		<td><a class="btn btn-info btn-small" href="/dash/request_coverage/<?php print $shift->id; ?>">Request Coverage</a></td>
    		
    	</tr>
    <?php endforeach;?>
  </table>
</div>