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
          if(isset($_GET['check']))
          {
              include "connectvar.php";
              $thiscon=$con;//mysqli_connect("127.0.0.1","root","1324","library2"); 理论上来说两个地方都用$con是不会冲突的
              $thisbid=$_GET["bid"];
              // $thissql="SELECT * FROM book WHERE bid LIKE '%$bid%';";
              $thissql="SELECT * FROM book WHERE bid LIKE '%$thisbid%';";
              $thisarr=mysqli_query($thiscon,$thissql);
              if ($thisarr) 
              {
                $thisval=mysqli_fetch_row($thisarr);
              }
          }
          if (isset($_GET['submit']))
          {
            $con=mysqli_connect("127.0.0.1","root","1324","library2");
            $bid=$_GET['bid'];
            $cid=$_GET['cid'];
            $aid=$_SESSION['aid'];
            $sql="SELECT * FROM book WHERE bid LIKE '%$bid%';";
            $arr=mysqli_query($con,$sql);
            if ($arr) 
            {
              $val=mysqli_fetch_row($arr);
              if ($val[8]>0)
              {
                $sql2="INSERT INTO record VALUES('$bid','$cid','$aid',now(),now()+INTERVAL 40 DAY);";
                echo $sql2;
                $arr2=mysqli_query($con,$sql2);
                $sql3="UPDATE book SET stock=stock-1 WHERE bid LIKE '%$bid%';";
                echo $sql3;
                $arr3=mysqli_query($con,$sql3);
                if ($arr2&&$arr3) echo "<script>alert('Borrow succeed!');window.location='borrow.php'</script>";
                else echo "<script>alert('Borrow Failed! You should login first.');window.location='borrow.php'</script>";
              }
              else 
              {
                echo "<script>alert('No stock! Last return at ".$val[9]."');window.location='borrow.php'</script>";}
            }
          }
      ?>
        <!-- page body -->
          <form class="form-horizontal" action="borrow.php" method="get">          
            <div class="form-group">
              <label class="col-sm-2 lead" align='right'>Book ID</label>
              <div class="col-sm-5" align='left'>
                 <?php 
                    if (isset($_GET["check"])) {echo "<input type='text' class='form-control' name='bid' value='".$thisbid."'></input>";}
                    else {echo "<input type='text' class='form-control' name='bid' placeholder='Input book ID here'/>";}
                 ?>
                 <!-- <input type="text" class="form-control" name="bid" placeholder="Input book ID here"></input> -->
              </div>  
              <div class="col-sm-3" align='left'>
                <button type="submit" class="btn btn-inverse" name="check" value="submit">Check Book Name</button>
              </div>
            </div>
            <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Book Name</label>
              <div class="col-sm-5" align='left'>
                 <?php
                    if (isset($_GET["check"])) {echo "<input type='text' class='form-control' name='bname' value='".$thisval[2]."'></input>";}
                    else {echo "<input type='text' class='form-control' name='bname' placeholder='Please click the [Check Book Name] bottom '/>";}
                 ?>
              </div>
            </div> 
            <div class="form-group" >
              <label class="col-sm-2 lead" align='right'>Card ID</label>
              <div class="col-sm-5" align='left'>
                 <input type="text" class="form-control" name="cid" placeholder="Input card ID here"></input>
              </div>
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