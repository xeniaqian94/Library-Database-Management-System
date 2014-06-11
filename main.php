<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Library Administration System">
    <meta name="author" content="Xenia Qian">
    <link rel="shortcut icon" href="../../img/favicon.png">

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
    <h2 class="demo-headline" style="color:#1ABC9C">Welcome to Xenia's Library!</h2>
    <div class="demo-row">
        <div class="demo-title">
          <h6>&nbsp;</h6>
          <h4>Basic Instructions</h4>
        </div>
        <h7>&nbsp;</h7>
        <div class="demo-content">
          <p>
            1) Card: &nbsp;Where to <a href="add_card.php">add a new card</a> or <a href="delete_card.php">delete an old card</a> for either student user or teacher user,
          </p>
          <p>
            1) Search: &nbsp; Where to <a href="search.php">search for</a> one or some specific books. 
            <!-- 2) Search: <a href="http://getbootstrap.com/css/#buttons">Bootstrap buttons</a>, we have decided to add a new size: <code>btn-hg</code> which will be used for the main call to action buttons on the page: -->
          </p>
          <p>
            2) Borrow: &nbsp; Where to <a href="borrow.php">borrow</a> books.
            <!-- 3) Borrow: <a href="http://getbootstrap.com/css/#buttons">Bootstrap buttons</a>, we have decided to add a new size: <code>btn-hg</code> which will be used for the main call to action buttons on the page: -->
          </p>
          <p>
            3) Return: &nbsp; <a href="return.php">Search </a>for your borrowed  books and <a href="return.php">Return</a> ONE every time.
            <!-- 4) Return: <a href="http://getbootstrap.com/css/#buttons">Bootstrap buttons</a>, we have decided to add a new size: <code>btn-hg</code> which will be used for the main call to action buttons on the page: -->
          </p>
          <p>
            4) Add: &nbsp; Where to  <a href="return.php"> add one</a> or  <a href="return.php">a bulk of </a> books.
            <!-- 5) Card: <a href="http://getbootstrap.com/css/#buttons">Bootstrap buttons</a>, we have decided to add a new size: <code>btn-hg</code> which will be used for the main call to action buttons on the page: -->
          </p>
          <p>
            5) Card: &nbsp;Where to <a href="add_card.php">add a new card</a> or <a href="delete_card.php">delete an old card</a> for either student user or teacher user,
          </p>
          <p>
            For further information,&nbsp; please click 
            <!-- 5) Card: <a href="http://getbootstrap.com/css/#buttons">Bootstrap buttons</a>, we have decided to add a new size: <code>btn-hg</code> which will be used for the main call to action buttons on the page: -->
          </p>
          <br/>
          <p class="mbl">
            <a button class="btn btn-hg btn-primary" herf="">Readme Document</a>
          </p>
        </div>
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