<?php
session_start();
//Including Database Connection From db.php file to avoid rewriting in all files
require_once("db.php");
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
  div.myClass*6 
  <body>
    
    <!-- NAVIGATION BAR -->
    <header >
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
            <a class="navbar-brand" href="#">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['id_user'])) {
              ?>
              <li><a href="jobseeker/dashboard.php">Dashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else { ?>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">JobseekerRegister</a></li>
              <li><a href="login.php">jobseekerLogin</a></li>
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section class="tonoy">
      <div class="container-fluid">
        <div class="row">
          <div class="col-md-12">
            <div class="jumbotron text-center">
              <h1 style="color: green;"><u>Part Time Job Portal</u></h1>
              <p>Find Your Dream Job</p>
              <p><a class="btn btn-primary btn-lg" href="register.php" role="button">CandidateRegister</a></p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- LATEST JOB POSTS -->
    <section>
      <div class="container">
        <div class="row">
          <h2 class="text-center" style="color: #212F3C;"><u>Latest Job Posts</u></h2>
          <?php 
          $sql = "SELECT * FROM job_post Order By Rand() Limit 4";
          $result = $conn->query($sql);
          if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) 
            {
             ?>
            <div class="col-md-3">  
            <div class="text-center">     
                  
              <h3><u><?php echo $row['jobtitle']; ?></u></h3>
              <p><?php echo $row['description']; ?></p>
              <p><?php echo $row['location']; ?></p>
              
            </div>
          </div>
          <?php
            }
          }
          ?>
        </div>
      </div>
    </section>

     
  </body>
</html>