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
    <!-- Fixed navbar -->
    <?php include "navbar.php" ?>    
    <div class="container">
        <div class="col-sm-12 page-header" align="left">
          <h2 class="demo-headline" style="color:#1ABC9C">
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Delete &nbsp;&nbsp;Card</h2>
        </div>
    </div>
        <!-- accessing database -->
    <div class="container">
        <?php
          if(isset($_POST['submit']))
          {
             include "connectvar.php";
             //$con=mysqli_connect("127.0.0.1","root","1324","library2");
             $cid = $_POST['cid'];
             $cname = $_POST['cname'];
             $sql = "DELETE FROM card WHERE cid='$cid' AND cname='$cname'";
             $arr=mysqli_query($con,$sql);
             $ra=mysqli_affected_rows($con);
             if (mysqli_affected_rows($con)==1) echo "<script>alert('Delete card succeed!');window.location='delete_card.php'</script>";
             else if (mysqli_errno($con)==1451) echo "<script>alert('Delete card failed! Return your book first.');window.location='delete_card.php';</script>";
             else echo "<script>alert('Delete card failed! Please check your input.');window.location='delete_card.php';</script>";
             
          }
        ?>
        <!-- page body -->
        
        <form class="form-horizontal" action="delete_card.php" method="POST">
          
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Card ID</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="cid" placeholder="Input card ID here"></input>
            </div>  
          </div>
          <div class="form-group" >
            <!-- <label for="OldPassword">Old password</label> -->
            <label class="col-sm-3 lead" align='right'>Holder Name</label>
            <div class="col-sm-5" align='left'>
               <input type="text" class="form-control" name="cname" placeholder="Input holder name here"></input>
            </div>  
          </div>
          
          <div class="col-sm-8" align='right'>
            <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Delete</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <button type="submit" class="btn btn-default btn-wide" name="reset" value="reset">Reset</button>
            &nbsp;&nbsp;&nbsp;&nbsp;
          </div>
        </form>
    </div> 
    <!-- page footer-->
    <?php include "footer.php"; ?>
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
  </body>
</html>