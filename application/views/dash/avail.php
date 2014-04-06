<h1>My Availability</h1>

<p>
Set your availibility to recieve the most optimal schedule
</p>
<form method="post">
<?php echo $msg; ?>
<div class="table-responsive">
  <table class="table">
    <tr>
    	<th>Day</th>
    	<th>Start Availibility</th>
    	<th>End Availibility</th>
    </tr>
    <tr>
    	<td>Sunday</td>
    	<td><input type="text" name="sun_start" value="<?php echo $user->sun_availability_start; ?>"></td>
    	<td><input type="text" name="sun_stop" value="<?php echo $user->sun_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Monday</td>
    	<td><input type="text" name="mon_start" value="<?php echo $user->mon_availability_start; ?>"></td>
    	<td><input type="text" name="mon_stop" value="<?php echo $user->mon_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Tuesday</td>
    	<td><input type="text" name="tue_start" value="<?php echo $user->tue_availability_start; ?>"></td>
    	<td><input type="text" name="tue_stop" value="<?php echo $user->tue_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Wednesday</td>
    	<td><input type="text" name="wed_start" value="<?php echo $user->wed_availability_start; ?>"></td>
    	<td><input type="text" name="wed_stop" value="<?php echo $user->wed_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Thursday</td>
    	<td><input type="text" name="thu_start" value="<?php echo $user->thu_availability_start; ?>"></td>
    	<td><input type="text" name="thu_stop" value="<?php echo $user->thu_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Friday</td>
    	<td><input type="text" name="fri_start" value="<?php echo $user->fri_availability_start; ?>"></td>
    	<td><input type="text" name="fri_stop" value="<?php echo $user->fri_availability_stop; ?>"></td>
    </tr>
    <tr>
    	<td>Saturday</td>
    	<td><input type="text" name="sat_start" value="<?php echo $user->sat_availability_start; ?>"></td>
    	<td><input type="text" name="sat_stop" value="<?php echo $user->sat_availability_stop; ?>"></td>
    </tr>
    
  </table>
</div>
<button type="submit" class="btn btn-primary">Save Changes</button>
</form>
