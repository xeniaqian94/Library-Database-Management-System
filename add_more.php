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
              $con=mysqli_connect("127.0.0.1","root","1324","library2");
              $file = fopen("books.txt", "r") or exit("Unable to open file!");

              while(!feof($file))
              {
                  $sql=fgets($file);
                  echo strlen($sql)." ";
                  // if ($sql!="")   //读到文件结尾的空行时会报错
                    $arr=mysqli_query($con,$sql);
              }
              fclose($file);
              mysqli_query($con,$sql);
              echo "<script>alert('Import Finished!');window.location=''</script>";
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