<h1>My Preferences</h1>

<p>Preferences can be changed at any time</p>

<form class="form-horizontal" method="post">
<fieldset>

<!-- Form Name -->
<?php print $msg; ?>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="first_name">First Name</label>  
  <div class="col-md-4">
  <input id="first_name" name="first_name" placeholder="" value="<?php echo $user->first_name; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="last_name">Last Name</label>  
  <div class="col-md-4">
  <input id="last_name" name="last_name" placeholder="" value="<?php echo $user->last_name; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="get_texts">Get Texts</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="get_texts-0">
      <input name="get_texts" id="get_texts-0" value="1"<?php if($user->get_texts){ echo ' checked="checked"'; } ?> type="radio">
      Yes
    </label> 
    <label class="radio-inline" for="get_texts-1">
      <input name="get_texts" id="get_texts-1" value="0"<?php if(!$user->get_texts){ echo ' checked="checked"'; } ?> type="radio">
      No
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="phone_number">Phone Number</label>  
  <div class="col-md-4">
  <input id="phone_number" name="phone_number" placeholder="" value="<?php echo $user->phone; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Multiple Radios (inline) -->
<div class="form-group">
  <label class="col-md-4 control-label" for="get_email">Get E-mail</label>
  <div class="col-md-4"> 
    <label class="radio-inline" for="get_email-0">
      <input name="get_email" id="get_email-0" value="1"<?php if($user->get_emails){ echo ' checked="checked"'; } ?> type="radio">
      Yes
    </label> 
    <label class="radio-inline" for="get_email-1">
      <input name="get_email" id="get_email-1" value="0"<?php if(!$user->get_emails){ echo ' checked="checked"'; } ?> type="radio">
      No
    </label>
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="email_address">E-mail Address</label>  
  <div class="col-md-4">
  <input id="email_address" name="email_address" placeholder="" value="<?php echo $user->email; ?>" class="form-control input-md" required="" type="text">
    
  </div>
</div>

<!-- Text input-->
<div class="form-group">
  <label class="col-md-4 control-label" for="max_hours">Maximum Hours</label>  
  <div class="col-md-4">
  <input id="max_hours" name="max_hours" type="text" placeholder="" value="<?php echo $user->max_hours; ?>" class="form-control input-md" required="">
  <span class="help-block">(per week)</span>  
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pref_time_1">Preferred Time</label>
  <div class="col-md-4">
    <select id="pref_time_1" name="pref_time_1" class="form-control">
      <option value="1"<?php if($user->pref_time_1 == "1"){ echo ' selected'; } ?>>Morning</option>
      <option value="2"<?php if($user->pref_time_1 == "2"){ echo ' selected'; } ?>>Afternoon</option>
      <option value="3"<?php if($user->pref_time_1 == "3"){ echo ' selected'; } ?>>Evening</option>
      <option value="4"<?php if($user->pref_time_1 == "4"){ echo ' selected'; } ?>>Night</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pref_time_2">Second Preference</label>
  <div class="col-md-4">
    <select id="pref_time_2" name="pref_time_2" class="form-control">
      <option value="1"<?php if($user->pref_time_2 == "1"){ echo ' selected'; } ?>>Morning</option>
      <option value="2"<?php if($user->pref_time_2 == "2"){ echo ' selected'; } ?>>Afternoon</option>
      <option value="3"<?php if($user->pref_time_2 == "3"){ echo ' selected'; } ?>>Evening</option>
      <option value="4"<?php if($user->pref_time_2 == "4"){ echo ' selected'; } ?>>Night</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pref_time_3">Third Preference</label>
  <div class="col-md-4">
    <select id="pref_time_3" name="pref_time_3" class="form-control">
      <option value="1"<?php if($user->pref_time_3 == "1"){ echo ' selected'; } ?>>Morning</option>
      <option value="2"<?php if($user->pref_time_3 == "2"){ echo ' selected'; } ?>>Afternoon</option>
      <option value="3"<?php if($user->pref_time_3 == "3"){ echo ' selected'; } ?>>Evening</option>
      <option value="4"<?php if($user->pref_time_3 == "4"){ echo ' selected'; } ?>>Night</option>
    </select>
  </div>
</div>

<!-- Select Basic -->
<div class="form-group">
  <label class="col-md-4 control-label" for="pref_time_4">Least Preferred</label>
  <div class="col-md-4">
    <select id="pref_time_4" name="pref_time_4" class="form-control">
      <option value="1"<?php if($user->pref_time_4 == "1"){ echo ' selected'; } ?>>Morning</option>
      <option value="2"<?php if($user->pref_time_4 == "2"){ echo ' selected'; } ?>>Afternoon</option>
      <option value="3"<?php if($user->pref_time_4 == "3"){ echo ' selected'; } ?>>Evening</option>
      <option value="4"<?php if($user->pref_time_4 == "4"){ echo ' selected'; } ?>>Night</option>
    </select>
  </div>
</div>

<!-- Button -->
<div class="form-group">
  <label class="col-md-4 control-label" for=""></label>
  <div class="col-md-4">
    <button id="" name="" class="btn btn-primary">Save Changes</button>
  </div>
</div>

</fieldset>
</form>