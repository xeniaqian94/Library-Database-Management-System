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
    <!-- <link href="css/switch.css" rel="stylesheet"> -->

    <link rel="shortcut icon" href="images/favicon.ico">
        

  </head>

  

  <body>  
    <!-- Fixed navbar -->
    <?php include "navbar.php" ?>    
    <div class="container">
        <div class="col-sm-5 page-header" align="left">
          <h2 class="demo-headline" style="color:#1ABC9C">
            Search &nbsp; Book</h2>
        </div>
    </div>
    <div class="container">
      <form method="get" action="search.php">
          <div class="panel panel-default">
            <div class="panel-body">
               <div class="form-group"> 
                  <div class="row">
                    <div class="col-md-3 column">
                      <!-- <span class="input-group-lg"> -->
                        <select name="select_by">
                          <option value="all">Select By</option>
                          <option value="all">All</option>
                          <option value="bid">Book ID</option>
                          <option value="bname">Book Name</option>
                          <option value="category">Category</option>
                          <option value="publisher">Publisher</option>
                          <option value="author">Author</option>
                          <option value="year">Year</option>
                          <option value="price">Price</option>
                        </select>
                        <select name="order_by">
                          <option value="bname">Order By</option>
                          <option value="bname">All</option>
                          <option value="bid">Book ID</option>
                          <option value="bname">Book Name</option>
                          <option value="publisher">Publisher</option>
                          <option value="year">Year</option>
                          <option value="price">Price</option>
                        </select>
                      <!-- </span> -->
                    </div>
                    <div class="col-md-7 column">
                        <div class="col-md-12 column">
                        <input class="form-control" type="text" name="keyword"placeholder="Keyword"></div>
                        <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">From</span>
                            <input type="text" class="form-control" name="lower" placeholder="the lower bound" />
                          </div>
                        </div>
                        <div class="col-md-6 column">
                          <div class="input-group">
                            <span class="input-group-addon">To</span>
                            <input type="text" class="form-control" name="upper" placeholder="the upper bound" />
                          </div>
                        </div>
                      </span>
                    </div>
                    <div class="col-md-2 column">

                      <button type="submit" name="submit" class="btn btn-primary btn-wide">Search</button>
                      <!-- <div class="col-md-2 column"><br /></div> -->
                      <button type="reset" class="btn btn-default btn-wide">Reset</button>
                    </div>

                  </div> 
               </div> 
           </div>
               </div>
            </div>
          </div>
      </form>
      
      <?php
          if (isset($_GET["submit"]))
          {
            $con=mysqli_connect("127.0.0.1","root","1324","library2");
            $select_by=$_GET["select_by"];
            $order_by=$_GET["order_by"];
            $lower=$_GET["lower"];
            $upper=$_GET["upper"];
            $keyword=$_GET["keyword"];
            if (!($lower|$upper))
            {
              if ($select_by=="all") $sql="SELECT * FROM book ORDER BY $order_by;";
              else
              {
                $sql="SELECT * FROM book WHERE $select_by LIKE '%$keyword%' ORDER BY $order_by";
              }
              // echo "no order.";
            }
            else 
            {
              if ($select_by=="all") $sql="SELECT * FROM book WHERE $select_by>=$upper AND $select_by<=$lower ORDER BY $order_by;";
              else
              {
                $sql="SELECT * FROM book WHERE $select_by LIKE '%$keyword%' AND $select_by>=$upper AND $select_by<=$lower ORDER BY $order_by";
              }
              echo "have order ".$lower." ".$upper." ";
            }
            
            $arr=mysqli_query($con,$sql);
            if($arr)
            {
              echo "<div class='container'>";
              echo "<div class='panel panel-default'>";
              echo "<div class='panel-body'>";
              echo '<table class="table table-striped">';
              echo '<tr>';
              echo  "<td width='2%' align='left' >ID</th>";
              echo  "<td width='5%' align='left' >Category</th>";
              echo  "<td width='40%' align='left' >&nbsp;&nbsp;Name</th>";
              echo  "<td width='29%' align='left' >Publisher</th>";
              echo  "<td width='3%' align='left' >Year</th>";
              echo  "<td width='15%' align='left' >Author</th>";
              echo  "<td width='3%' align='left' >Price</th>";
              echo  "<td width='3%' align='left' >Total</th>";
              echo  "<td width='3%' align='left' >Stock</th>";
              echo  "<td width='3%' align='left' >Last Return</th>";
              echo '</tr>';
            }
            while($val=mysqli_fetch_row($arr))
            {
               echo "<tr >";
                for($i=0;$i<count($val);$i++)
                {
                        echo "<td align='left'>".$val[$i]."</td>";
                }                
                echo "</tr>";
            }
            echo "</table></div></div></div>";
          }
      ?>
    
    </div>
    <!-- page footer-->
    <?php include "footer.php"; ?>
    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script> $("select").selectpicker({style: 'btn-inverse btn-wide',menuStyle: 'dropdown-inverse'})</script>
  </body>
</html>