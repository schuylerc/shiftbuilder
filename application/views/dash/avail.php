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
    	<td><input type="text" name="sun_start"></td>
    	<td><input type="text" name="sun_stop"></td>
    </tr>
    <tr>
    	<td>Monday</td>
    	<td><input type="text" name="mon_start"></td>
    	<td><input type="text" name="mon_stop"></td>
    </tr>
    <tr>
    	<td>Tuesday</td>
    	<td><input type="text" name="tue_start"></td>
    	<td><input type="text" name="tue_stop"></td>
    </tr>
    <tr>
    	<td>Wednesday</td>
    	<td><input type="text" name="wed_start"></td>
    	<td><input type="text" name="wed_stop"></td>
    </tr>
    <tr>
    	<td>Thursday</td>
    	<td><input type="text" name="thu_start"></td>
    	<td><input type="text" name="thu_stop"></td>
    </tr>
    <tr>
    	<td>Friday</td>
    	<td><input type="text" name="fri_start"></td>
    	<td><input type="text" name="fri_stop"></td>
    </tr>
    <tr>
    	<td>Saturday</td>
    	<td><input type="text" name="sat_start"></td>
    	<td><input type="text" name="sat_stop"></td>
    </tr>
    
  </table>
</div>
<button type="submit" class="btn btn-primary">Save Changes</button>
</form>
