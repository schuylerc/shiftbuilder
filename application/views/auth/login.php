

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login to eventHack</title>

    <!-- Bootstrap core CSS -->
    <link href="/assets/css/bootstrap.css" rel="stylesheet">

    <!-- Add custom CSS here -->
    <link href="/assets/css/sb-admin.css" rel="stylesheet">
    <link rel="stylesheet" href="font-awesome/css/font-awesome.min.css">
    <!-- Page Specific CSS -->
     <link href="/assets/css/cover.css" rel="stylesheet">
  </head>

  <body>


<div id="page-wrapper">
  

    <div class="container">

            <h1>eventHack</h1>

              <div id="infoMessage"><?php echo $message;?></div>

          <form class="form-signin" action="/auth/login" method="post" role="form">
            <h2 class="form-signin-heading">Please sign in</h2>
            <input type="email" name="identity" id="identity" class="form-control" placeholder="Email address" required autofocus><br>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            <label class="checkbox" style="text-align: left;">
              <input type="checkbox" name="remember" id="remember" value="remember-me"> Remember me
            </label>
            <button class="btn btn-lg btn-primary btn-block" name="submit" value="login" type="submit">Sign in</button>
          </form>
<br><br>
          <p><a href="forgot_password">Forgot your password?</a></p>

        </div> <!-- /container -->


</div> <!-- /page-wrapper>


    <!-- JavaScript -->
    <script src="/assets/js/jquery-1.10.2.js"></script>
    <script src="/assets/js/bootstrap.js"></script>

    <!-- Page Specific Plugins -->
    <script src="http://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="http://cdn.oesmith.co.uk/morris-0.4.3.min.js"></script>
    <script src="/assets/js/morris/chart-data-morris.js"></script>
    <script src="/assets/js/tablesorter/jquery.tablesorter.js"></script>
    <script src="/assets/js/tablesorter/tables.js"></script>

  </body>
</html>