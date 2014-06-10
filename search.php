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
        <?php
          if(isset($_POST['submit']))
          {
             $con=mysqli_connect("127.0.0.1","root","1324","library2");
             $cid = $_POST['cid'];
             $cname = $_POST['cname'];
             $sql = "DELETE FROM card WHERE cid='$cid' AND cname='$cname';";
             $arr=mysqli_query($con,$sql);
             if ($arr) echo "<script>alert('Delete Card Succeed!');window.location='delete_card.php'</script>";
             else echo "<script>alert('Delete Card Failed!');window.location='delete_card.php';</script>";
          }
        ?>
        
        <!-- page body -->
    <div class="container">
    <!-- <div class="panel panel-default"> -->
      <!-- Default panel contents -->
      <form method="get" action="search.php">
        <!-- <div class="input-group"> -->
          <!-- <span class="input-group-addon"> -->
           <div class="form-group"> 
              <div class="col-md-3 column">
                <select name="seltype" id="search_menu" class="slelect select-default">
                  <option value="">搜索条件</option>
                  <option value="all">显示全部</option>
                  <option value="bno">书号</option>
                  <option value="bname">书名</option>
                  <option value="publisher">出版社</option》
                  <option value="author">作者</option>
                  <option value="year">年份</option>
                  <option value="price">价格</option>
                </select>
              </div>
              <div class="col-md-3 column" align="left">
                <select name="order" class="slelect select-default">
                  <option value="bno">排序条件</option>
                  <option value="all">显示全部</option>
                  <option value="bno">书号</option>
                  <option value="bname">书名</option>
                  <option value="publisher">出版社</option>
                  <option value="author">作者</option>
                  <option value="year">年份</option>
                  <option value="price">价格</option>
                </select>
              </div>
              <div class="col-md-3 column">
                <!-- <span class="input-group-btn"> -->
                  <div class="input-group">
                      <input class="form-control" id="navbarInput-01" type="search" placeholder="Search">
                      <span class="input-group-btn">
                        <button type="submit" class="btn"><span class="fui-search"></span></button>
                      </span>            
                  </div>
              </div>
              <div class="col-md-3 column">
                <button type="submit" class="btn btn-primary btn-wide" type="button" name="submit">Search</button>
              </div>
              <!-- </span> -->
           </div>
          
           <div class="form-group">
             <div class="col-md-6 column">
              <input id="limit_up"  type="text" placeholder="上限" class="form-control" name ="up"></div>
             <div class="col-md-6 column">
              <input id="limit_down" type="text" placeholder="下限" class="form-control" name ="down"></div>
           </div>
      </form>
      
      
      <!-- Table -->
      
        <?php
        error_reporting(0);
        
        echo $_POST["submit"];
        $con=mysqli_connect("127.0.0.1","root","1324","library");
        $seltype=$_GET["seltype"];
        $keyword=$_GET["keyword"];
        $up=$_GET["up"];
        $down=$_GET["down"];
        $order=$_GET["order"];
        
        if($seltype=="all")
          $sql="SELECT * FROM books;";
        else{
          if($up)
             $sql = "SELECT * FROM books WHERE $seltype>=$up AND $seltype <= $down ORDER BY $order;";
          else {
             $sql = "SELECT * FROM books WHERE $seltype LIKE '%$keyword%' ORDER BY $order;";
          }
        }
        //if($seltype="no_select")
          //$sql="SELECT * FROM books WHERE bname='oh,i'm not a book";
        $arr=mysqli_query($con,$sql);
        if($arr){
          echo '<table class="table">';
          echo'<div class="panel-heading" align="center">Search Result</div>';
          echo '<tr>';
          echo  "<td width='22%' align='center' >书名</td>";
          echo  "<td width='12%' align='center' >类别</td>";
          echo  "<td width='9%' align='center' >书号</td>";
          echo  "<td width='13%' align='center' >出版社</td>";
          echo  "<td width='8%' align='center' >年份</td>";
          echo  "<td width='12%' align='center' >作者</td>";
          echo  "<td width='7%' align='center' >价格</td>";
          echo  "<td width='6%' align='center' >总量</td>";
          echo  "<td width='6%' align='center' >库存</td>";
          echo '</tr>';
        }
        while($val=mysqli_fetch_row($arr)){
           echo "<tr >";
        for($i=0;$i<count($val);$i++){
                echo "<td align='center'>".$val[$i]."</td>";
                //echo "<td align='center'><a href='update.php?id=$val[0]' target='_parent'>修改</a>|<a href='del.php?id=$val[0]' target='_parent''>删除</a>"."</td>";
           }
        echo "</tr>";
      }

      ?>
      
      </table>
      </div>
      
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
    <script> $("select").selectpicker({style: 'btn-primary', menuStyle: 'dropdown-inverse'})</script>
  </body>
</html>