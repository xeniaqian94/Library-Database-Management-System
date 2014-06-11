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
          <h2 class="demo-headline" style="color:#1ABC9C">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Search &nbsp;Record</h2>
        </div>
    </div>
    <div class="container">
      <form method="get" action="return.php">
          <div class="panel panel-default">
            <div class="panel-body">
                <label class="col-md-4 lead" align='center'>Please Input the Card ID</label>
                <div class="col-sm-5 form-group">
                  <div class="input-group">
                    <input class="form-control" name="cid" type="search" placeholder="Card ID Here...">
                    <span class="input-group-btn">
                      <button type="submit" class="btn"><span class="fui-search"></span></button>
                    </span>            
                  </div>
                </div>    
                <div class="col-md-2" align="center">
                <button type="submit" class="btn btn-inverse btn-wide" name="submit" value="submit">Search</button>   
              </div>
            </div>
          </div>
      </form>
      <?php
          if (isset($_GET["submit"]))
          {
            $con=mysqli_connect("127.0.0.1","root","1324","library2");
            $cid=$_GET["cid"];
            $sql="SELECT bid,bname,aid,bdate,due from record NATURAL JOIN book WHERE cid LIKE '%$cid%';";
            $arr=mysqli_query($con,$sql);
            if($arr)
            {
              // echo "<div class='container'>";
              echo "<div class='panel panel-default'>";
              echo "<div class='panel-body'>";
              echo '<table class="table table-striped">';
              echo '<tr>';
              echo  "<td width='10%' align='center' >Book ID</td>";
              echo  "<td width='30%' align='center' >Book Name</td>";
              echo  "<td width='10%' align='center' >Admin ID</td>";
              echo  "<td width='20%' align='center' >Borrow Time</td>";
              echo  "<td width='20%' align='center' >Due Time</td>";
              echo  "<td width='10%'' align='center'></td>";
              echo '</tr>';
            }
            while($val=mysqli_fetch_row($arr))
            {
               echo "<tr >";
                for($i=0;$i<count($val);$i++)
                {
                        echo "<td align='center'>".$val[$i]."</td>";
                }                
                echo "<td align='center'><button type='submit' name='return' class='btn btn-inverse' href='return_book.php?bid='.$val[0].'&bdate='.$val[3].''>Return</button></td>";
                echo "</tr>";
            }
            echo "</table></div></div>";

          }
      ?>
    
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