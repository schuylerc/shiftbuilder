
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <title>ShiftBuilder</title>
    <link rel="stylesheet" href="/assets/admin_css/bootstrap.css" media="screen">
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
        
            <li class="active">
              <a href="/dash">My Schedule</a>
            </li>
            <li>
              <a href="/dash/prefs">Preferences</a>
            </li>
            
  
          </ul>

         
	<ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown"><?php echo $user->email; ?> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="/auth/logout">Log Out</a></li>
          </ul>
        </li>
      </ul>

        </div>
      </div>
    </div>


    <div class="container" style="padding-top: 60px;">