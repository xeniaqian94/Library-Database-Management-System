<div class="navbar navbar-inverse " role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="active navbar-brand" href="main.php">Library Administration System</a>
    </div>
    <div class="collapse navbar-collapse">
      <ul class="nav navbar-nav">
        <!-- <li class="active"><a href="index.php">Home</a></li> -->
        
        <li><a href="search.php">Search</a></li>
        <li><a href="borrow.php">Borrow</a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Return<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="return.php">Query</a></li>
            <li><a href="return_book.php">Return</a></li>
          </ul>
        </li>

        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Add<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="add_one.php">Single</a></li>
            <li><a href="add_more.php">More</a></li>
          </ul>
        </li>
        <li class="dropdown">
          <!-- <li><a href="#about">Card</a></li> -->
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Card<b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="add_card.php">Add Card</a></li>
            <li><a href="delete_card.php">Delete Card</a></li>
          </ul>
        </li>
      </ul>
      <p class="nav navbar-text navbar-right">
        <?php 
           session_start();
          if(isset($_SESSION["aid"])) echo 'Hello, <a href="admin_info.php">'.$_SESSION["admin_name"]." ";
          if(isset($_SESSION["aid"])) echo '<a href="logout.php"> Sign Out</a>';
          else echo'<a href="login.php">Sign In</a>';
        ?> 
      </p>
    </div><!--/.nav-collapse -->
  </div>
</div>