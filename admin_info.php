<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <meta name="author" content="Xenia Qian">
    <link rel="shortcut icon" href="images/favicon.png">

    <title>Library Administration System by Xenia Qian</title>
    
    <!-- Loading Bootstrap -->
    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="images/favicon.ico">
  </head>

<body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <?php include 'navbar.php'; ?>

      <!-- Begin page content -->
      <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:#1ABC9C">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Admin &nbsp; Info</h2>
        </div>
        <?php 
          // session_start();
          $con = mysqli_connect('127.0.0.1','root','1324','library2');
          $aid = $_SESSION['aid'];
          $sql = "SELECT * FROM admin WHERE aid = '$aid';";
          $arr = mysqli_query($con,$sql);
          if($arr)
          {
            $row = mysqli_fetch_row($arr);
          }
        ?>

        <form class="form-horizontal" id='former'>
          <div class="form-group" >
            <label class="col-sm-2 control-label">admin ID</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[0];?></p>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">Password</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[1];?></p>
            </div>
          </div>
           
          <div class="form-group" >
            <label class="col-sm-2 control-label">Administrator</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[2];?></p>
            </div>
          </div>
          <div class="form-group" >
            <label class="col-sm-2 control-label">Telephone</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row[2];?></p>
            </div>
          </div>

        </form>


      </div>
    </div>

    <!-- page footer -->
    <?php include "footer.php"; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>