<?php
  session_start();
  if(isset($_SESSION['aid']))
  {
    session_unset();
    session_destroy();
      // echo "<script language=javascript>alert('See you next time!')";
  }
  // setcookie('user_id','',time()-3600);
  // setcookie('username','',time()-3600);
//
?>
<?php
  // session_start();
  // $_SESSION['login']='login';
//location首部使浏览器重定向到另一个页面
//$home_url = 'index.php';
//header('Location:'.$home_url);
?>

<html>
<head>
<script type="text/javascript"> 
//3秒钟之后跳转到指定的页面 
// alert('See you next time!');
setTimeout(window.location.href='login.php',5); 
</script> 
</head>
</html>