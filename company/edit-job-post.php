<?php
session_start();
if(empty($_SESSION['id_user'])) {
    header("Location: jobseeker/dashboard.php");
    exit();
  }
require_once("../db.php");
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

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
            <a class="navbar-brand" href="#">Job Portal</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">     
            <ul class="nav navbar-nav navbar-right">
            <?php
            if(isset($_SESSION['id_user'])) {
              ?>
              <li><a href="dashboard.php">CompanyDashboard</a></li>
              <li><a href="logout.php">Logout</a></li>
            <?php
            } else { ?>
              <li><a href="company.php">Company</a></li>
              <li><a href="register.php">Register</a></li>
              <li><a href="login.php">Login</a></li>
            <?php } ?>
            </ul>
          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
    </header>

    <section>
      <div class="container">
        <div class="row">
          <div class="col-md-4 col-md-offset-4 well">
          <h2 class="text-center">Update Job Post</h2>
            <form method="post" action="editpost.php">
            <?php
            //Sql Query for show job post to edit if it is created with logged in company.
            $sql = "SELECT * FROM job_post WHERE id_jobpost='$_GET[id]' AND id_company='$_SESSION[id_user]'";
              $result = $conn->query($sql);
              if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) 
                {
            ?>
              <div class="form-group">
                <label for="jobtitle">Job Title</label>
                <input type="text" class="form-control" id="jobtitle" name="jobtitle" value="<?php echo $row['jobtitle']; ?>" placeholder="Job Title" required="">
              </div>
              <div class="form-group">
                <label for="description">Job Description</label>
                <textarea class="form-control" id="description" name="description" placeholder="Job Description" required=""><?php echo $row['description']; ?></textarea>
              </div>
              <div class="form-group">
                <label for="minimumsalary">Minimum Salary</label>
                <input type="text" class="form-control" id="minimumsalary" value="<?php echo $row['minimumsalary']; ?>" name="minimumsalary" placeholder="Minimum Salary" required="">
              </div>
              <div class="form-group">
                <label for="maximumsalary">Maximum Salary</label>
                <input type="text" class="form-control" id="maximumsalary" name="maximumsalary" value="<?php echo $row['maximumsalary']; ?>" placeholder="Maximum Salary" required="">
              </div>
              <div class="form-group">
                <label for="experience">Experience Required</label>
                <input type="text" class="form-control" id="experience" name="experience" value="<?php echo $row['experience']; ?>" placeholder="Experience Required" required="">
              </div>
              <div class="form-group">
                <label for="qualification">Qualification Required</label>
                <input type="text" class="form-control" id="qualification" name="qualification" value="<?php echo $row['qualification']; ?>" placeholder="Qualification Required" required="">
              </div>
              <input type="hidden" name="target_id" value="<?php echo $_GET['id']; ?>">
              <div class="text-center">
                <button type="submit" class="btn btn-success">Update</button>
              </div>
              <?php 
                }
              } else {
                header("Location: dashboard.php");
                exit();
              }
              ?>     
            </form>
          </div>
        </div>
      </div>
    </section>

    
  </body>
</html>