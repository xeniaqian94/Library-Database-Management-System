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
          <h2 class="demo-headline" style="color:#1ABC9C">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Borrow &nbsp;Book</h2>
        </div>
    </div>
        <!-- accessing database -->
    <div class="container">
        <?php
        if(isset($_POST['submit'])){
          
          $repeat_newpassword = $_POST['repeat_newpassword'];

          if($input_newpassword != $repeat_newpassword){
            echo "new passwords are different!";
          }

          else{
            require_once 'connectvars.php'; 
            $dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
            $user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));
            $query = "SELECT password FROM accounts WHERE user_id = '$user_id'";
            $data = mysqli_query($dbc,$query);
            if(mysqli_num_rows($data)==1){
              $row = mysqli_fetch_array($data);
              $oldpassword = $row['password'];
              $md5_oldpassword = md5("$input_oldpassword");
              echo $md5_oldpassword;
              if($oldpassword == $md5_oldpassword){
                $md5_newpassword = md5("$input_newpassword");
                $user_id = $_SESSION['user_id'];
                $query = "UPDATE accounts SET password = '$md5_newpassword' WHERE user_id = '$user_id'";
                $data = mysqli_query($dbc,$query) or die ("update accounts failed!");
              }
            }
          }
        }
        ?>

        <!-- page body -->
          <form class="form-horizontal" action="borrow.php" method="POST">          
            <div class="form-group">
              <!-- <label for="OldPassword">Old password</label> -->
              <label class="col-sm-2 lead" align='right'>Book ID</label>
              <div class="col-sm-5" align='left'>
                 <input type="text" class="form-control" name="bid" placeholder="Input book ID here"></input>
              </div>  
              <div class="col-sm-3" align='left'>
                <button type="submit" class="btn btn-inverse" name="check" value="submit">Check Book Name</button>
              </div>
            </div>
            <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Book Name</label>
              <div class="col-sm-5" align='left'>
                 <?php
                    if (isset($_POST["check"])) {echo "<input type='text' class='form-control' name='bname' value='Specific Book Name'/>";}
                    else {echo "<input type='text' class='form-control' name='bname' placeholder='Please click the [Check Book Name] bottom '/>";}
                 ?>
              </div>
            </div>
            <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Card ID</label>
              <div class="col-sm-5" align='left'>
                 <input type="text" class="form-control" name="bid" placeholder="Input card ID here"></input>
            </div> 
            <div class="form-group">
               <p/>
            </div> 
            <!-- <div class="form-group">       -->
             <div class="col-sm-7" align='right'>
              <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Submit</button>
              &nbsp;&nbsp;&nbsp;
              <button type="reset" class="btn btn-default btn-wide" name="reset" value="reset">Reset</button>
             </div>
            <!-- </div> -->
          </form>
          <!-- <form class="form-horizontal" id='9'> -->

          <!-- </div>
        </div>
      </div>-->
    </div> 
    <!-- page footer-->
    <br/><?php include "footer.php"; ?>

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