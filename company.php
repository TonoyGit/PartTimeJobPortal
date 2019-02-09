<?php
session_start();
if(isset($_SESSION['id_user'])) {
    header("Location: jobseeker/dashboard.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Job Portal</title>

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <link rel="stylesheet" href="css/tonoy.css">
  </head>
  <body>
    
    <!-- NAVIGATION BAR -->
    <header>
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="index.php">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            //Show user dashboard link once logged in.
            if(isset($_SESSION['id_user'])) {
              ?>
              <li><a href="user/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else { ?>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">CandidateRegister</a></li>
              <li><a href="login.php">CandidateLogin</a></li>
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1 style="color: green;">Part Time Job Portal</h1>
              <p>Create Your Job Post</p>
               
            </div>
          </div>
        </div>
      </div>
    </section>

    <section>
       
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well">
            <h2 class="text-center" style="color: red;">Company</h2>
            <p class="text-center" style="color: blue;">Here you can register as a company.</p>
            <div class="pull-left">
              <a href="company-register.php" class="btn-info btn-lg">Company Register</a>
            </div>
            <div class="pull-right">
              <a href="company-login.php" class="btn-info btn-lg">Company Login</a>
            </div>
          </div>
        </div>
      
      </div>
    </section>

    
  </body>
</html>