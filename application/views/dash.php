<h1>My Schedule</h1>

<?php 
/*
echo isAvail($shift, $user);
echo isAvail($shift, $user);
echo isAvail($shift, &user);
*/
$shifts = $this->shifts_model->get_needed_shifts();
genSchedule($shifts);
echo $complete_shifts;
?>



