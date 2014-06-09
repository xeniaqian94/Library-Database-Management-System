<!-- 空输入没有报错 -->

<?php session_start();?>
<html lang="en">

<!-- checking illegal access -->
<?php include 'check_access.php'; ?>

<!-- accessing database -->
<?php 
require_once 'connectvars.php'; 
$dbc = mysqli_connect(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);
$user_id = mysqli_real_escape_string($dbc,trim($_SESSION['user_id']));
$query = "SELECT * FROM user_info WHERE user_id = '$user_id'";
$data = mysqli_query($dbc,$query);
if(mysqli_num_rows($data)==1){
  $row = mysqli_fetch_array($data);
  }
?>

<!-- include head file-->
<head>
<?php include 'header.php'; ?>
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){
  $("button#editBTN").click(function(){
    $("form#former").hide();
    $("form#latter").show();
    $("button#editBTN").hide();
  });
  $("button#doneBTN").click(function(event){
    event.preventDefault();
    var newphone = $("input#phonenum").val();
    var newemail = $("input#emailaddr").val();
    $.ajax({
      type: "POST",
      url:"user_info.php",
      data: "phone=" + newphone + "&email=" + newemail,
      success: function(){
        $('#phone_label').text(newphone);
        $('#email_label').text(newemail);
        $("form#former").show();
        $("form#latter").hide();
        $("#success").show();
        // var msgdiv = $("<div></div>");
        // msgdiv.addClass("alert alert-success alert-dismissable");
        // msgdiv.text("Your profile have been updated!");
        // msgdiv.insertBefore($('#former'));
      },
      error: function(){
        $("#fail").show()
      }
    });
  });
});
</script>
</head>

<body>

    <!-- Wrap all page content here -->
    <div id="wrap">

      <!-- Fixed navbar -->
      <?php include 'navigation.php'; ?>

      <!-- Begin page content -->
      <div class="container">
        <div class="page-header" id="page-header">
          <h1>User Infomation <button class="btn btn-sm btn-default" id='editBTN'>Edit</button></h1>
        </div>

        <!-- success prompt -->
        <div class='alert alert-success alert-dismissable' style="display:none" id="success">
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4>Success</h4>
          <strong>Your profile have been updated!</strong></a>
        </div>

        <!-- failed prompt -->
        <div class='alert alert-warning alert-dismissable' style="display:none" id="fail">
          <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>×</button>
          <h4>Failed!</h4> 
          <strong>Try again!</strong></a>
        </div>

        <!-- 用来与数据库交互 -->
        <?php
          if($_SERVER['REQUEST_METHOD']=="POST"){
            $data = FALSE;
            if($_POST['phone']!=''){
              $phone=$_POST['phone'];
              $query = "UPDATE user_info SET phone = '$phone' WHERE user_id = '$user_id'";
              $data = mysqli_query($dbc,$query) or die ("update user_info error!");
            }
            if($_POST['email']!=''){
              $email=$_POST['email'];
              $query = "UPDATE user_info SET email = '$email' WHERE user_id = '$user_id'";
              $data = mysqli_query($dbc,$query) or die ("update user_info error!");
            }
            if ($data == TRUE) {
              $data = mysqli_query($dbc, $query);
              echo "success";
            }
            else{
              echo "fail";       
            }
          }
        ?>

        <!-- page body -->
        <!-- former table used to display info of user -->
        <form class="form-horizontal" id='former'>
          <div class="form-group" >
            <label class="col-sm-2 control-label">User ID</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['user_id'];?></p>
            </div>
          </div>
          
          <div class="form-group">
            <label class="col-sm-2 control-label">User Name</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['username'];?></p>
            </div>
          </div>
           
          <div class="form-group" >
            <label class="col-sm-2 control-label">Department</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['department'];?></p>
            </div>
          </div>
           
          <div class="form-group">
            <label class="col-sm-2 control-label">Gender</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['gender'];?></p>
            </div>
          </div>
           
          <div class="form-group">
            <label class="col-sm-2 control-label">Birth Day</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['birthyear']."-".$row['birthmonth']."-".$row['birthday'];?></p>
            </div>
          </div>
           
          <div class="form-group">
            <label class="col-sm-2 control-label">Enroll time</label>
            <div class="col-sm-4">
              <p class="form-control-static"><?php echo $row['enroll_time'];?></p>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Phone</label>
            <div class="col-sm-4">
              <p class="form-control-static" id="phone_label"><?php echo $row['phone'];?></p>
            </div>
          </div>

          <div class="form-group">
            <label class="col-sm-2 control-label">Email</label>
            <div class="col-sm-4">
              <p class="form-control-static" id="email_label"><?php echo $row['email'];?></p>
            </div>
          </div>
        </form>

        <!-- latter form used to edit info -->
        <form role='form' method='post' class='form-horizontal' id='latter' style="display: none">

          <div class='form-group' >
            <label class='col-sm-2 control-label'>User ID</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['user_id'];?>' disabled>
            </div>
          </div>

          <div class='form-group' >
            <label class='col-sm-2 control-label'>User Name</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['username'];?>' disabled>
            </div>
          </div>

          <div class='form-group' >
            <label class='col-sm-2 control-label'>Enroll Time</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['department'];?>' disabled>
            </div>
          </div>

          <div class='form-group' >
            <label class='col-sm-2 control-label'>Department</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['gender'];?>' disabled>
            </div>

          </div>

          <div class='form-group' >
            <label class='col-sm-2 control-label'>Gender</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['birthyear'].'-'.$row['birthmonth'].'-'.$row['birthday'];?>'disabled>
            </div>

          </div>

          <div class='form-group' >
            <label class='col-sm-2 control-label'>Birth Day</label>
            <div class='col-sm-4'>
              <input class='form-control' id='disabledInput' type='text' placeholder='<?php echo $row['enroll_time'];?>' disabled>
            </div>

          </div>

          <div class='form-group'>
            <label class='col-sm-2 control-label'>Phone</label>
            <div class='col-sm-4'>
              <input type='tel' class='form-control' name='phone' id='phonenum' value='<?php echo $row['phone']?>' required>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-sm-2 control-label'>Email</label>
            <div class='col-sm-4'>
              <input type='email' name='email' class='form-control' id='emailaddr' value='<?php echo $row['email']?>' required>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-sm-5 control-label'></label>
            <button class='btn btn-primary' name='submit' type='submit' value='Done' id='doneBTN'>Done</button>
          </div>
        </form>

      </div>
    </div>

    <!-- page footer -->
    <?php include"footer.php"; ?>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>