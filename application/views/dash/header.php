
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ShiftBuilder</title>
    <link rel="stylesheet" href="/assets/admin_css/bootstrap.css" media="screen">

  	<link type="text/css" href="/assets/timepicker/bootstrap-timepicker/css/bootstrap-timepicker.min.css" />
  	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

  </head>
  <body>
    <div class="navbar navbar-default navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="/dash" class="navbar-brand"><strong>SHIFT</strong>BUILDER</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
        
            <li class="<?php if($this->uri->segment(1)=="dash" && ($this->uri->segment(2)=="" || $this->uri->segment(1)=="index")){ echo ' active'; } ?>">
              <a href="/dash">My Schedule</a>
            </li>
            <li<?php if($this->uri->segment(2)=="avail"){ echo " class='active'";} ?>>
              <a href="/dash/avail">My Availability</a>
            </li>
            
            <?php if($user->admin) { ?>
            <li class="dropdown<?php if($this->uri->segment(1)=="manage"){ echo ' active'; } ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Manage <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/manage/employees">Employees</a></li>
            <li><a href="/manage/jobs">Jobs</a></li>
            <li><a href="/manage/shifts">Shifts</a></li>
            <li><a href="/manage/schedules">Schedules</a></li>
            
          </ul>
        </li>
            <?php } ?>
            
  
          </ul>

         
	<ul class="nav navbar-nav navbar-right">
        <li class="dropdown<?php if($this->uri->segment(2)=="prefs"){ echo ' active'; } ?>">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->email; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            
            <li><a href="/dash/prefs">Preferences</a></li>
            <li><a href="/auth/logout">Log Out</a></li>
            
          </ul>
        </li>
      </ul>

        </div>
      </div>
    </div>


    <div class="container" style="padding-top: 60px;">