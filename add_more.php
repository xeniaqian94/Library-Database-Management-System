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
          <div class="demo-headline" style="color:#1ABC9C">
            <h2>Import &nbsp;New &nbsp;Books</h2>
          </div>
          <!-- <button type="submit" class="btn btn-primary btn-wide" name="submit" value="submit">Import</button> -->
        </div>
        <body>
        <?php
          if (isset($_POST['import']))
          {
              $con=mysql_connect("127.0.0.1","root","1324");
              $db_selected = mysql_select_db("library2",$con);
              $file = fopen("books.txt", "r") or exit("Unable to open file!");

              while(!feof($file))
              {
                  $sql=fgets($file);
                  $array0=explode(")",$sql);
                  $array1=explode("(",$array0[0]); 
                  $array=explode(",",$array1[1]);
                  $bid=$array[0];
                  $category=$array[1];
                  $bname=$array[2];
                  $publisher=$array[3];
                  $year=intval($array[4]);
                  $author=$array[5];
                  $price=floatval($array[6]);
                  $total=intval($array[7]);
                  $sql0="SELECT * FROM book WHERE bid=$bid;";
                  $arr0=mysql_query($sql0,$con);
                  // echo mysql_num_rows($arr0);

                  if (mysql_num_rows($arr0)==1) //已经有这么一本书
                  {
                    $sql1="UPDATE book SET stock=stock+$total WHERE bid=$bid;";
                    $arr1=mysql_query($sql1,$con);
                    $sql1="UPDATE book SET total=total+$total WHERE bid=$bid;";
                    $arr1=mysql_query($sql1,$con);
                    echo "<script>alert('Book already exists. Stock changed!');window.location='add_more.php'</script>";
                  }
                  else if (mysql_num_rows($arr0)==0)
                  {
                    $sql = "INSERT INTO book VALUES ('$bid','$category','$bname','$publisher',$year,'$author',$price,$total,$total,now()-now());";
                    $arr=mysql_query($sql,$con);
                    // echo mysqli_errno($con)." ".mysqli_error($con);
                    if ($arr) echo "<script>alert('Add succeed!');window.location='add_more.php'</script>";
                    else echo mysql_errno($con)." ".mysql_error($con);
                    // else echo "<script>alert('Add failed! Try again.');window.location='add_more.php'</script>";
                  }
                  }
                  fclose($file);
              // mysqli_query($con,$sql);
              // echo "<script>alert('Import Finished!');window.location=''</script>";
          }
        ?>
        <form class="form-horizontal" action="add_more.php" method="post">
          
          <div class="col-sm-7" align="left">
            <p>This page is created for import more NEW books. If you'd like that, just click the following [Import] button. </p>
          </div>
          <div class="col-sm-2" align='right'>
            <button type="submit" class="btn btn-primary btn-wide" name="import" value="submit">Import</button>
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