<?php
  include "connection.php";

?>
<!DOCTYPE html>
<html>
<head>

  <title> Login</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  
</head>
<body>
<header style="height: 90px;">
  

<div class="dropdown"> 
    <nav>
      
    <ul>
    <li class="active"><a href="index.php">HOME</a>
      <ul>
          <li><a href="login.php">LOGIN</a>
          </li>
          
      </ul>
    </li>

    
    
    <li><a href="contact us.php">CONTACT US</a></li>
</ul>
</nav>
     
</header>
<section>
  <div class="log_img">
    <br> <br><br>
    <div class="box1">
        <h1 style="text-align: center; font-size: 35px;font-family: Lucida Console;color:white;">Library Stock  Management </h1><br>
        <h1 style="text-align: center; font-size: 25px;">User </h1>
        <form name ="login " actions ="" method ="post">
 
 <div class="login">
          <input  class="form-control" type="text" name="username" placeholder="Username" required=""> <br>
          <input  class="form-control" type="password" name="password" placeholder="Password" required=""> <br>
          <input class="btn btn-default" type="submit" name="submit" value="Login" style="color:black;width: 70px; height:30px;"></div>
       
      <p style="color: black; padding-left: 10px ;">
        <br><br>
        <a style= "text-align: inherit; font-size: 17px; color:white;" href="">Forgot password?</a> <a style="font-size: 17px; color :yellow">New to this website?</a> 
 <a style="color:white; font-size: 17px;" href="registration.php">Sign Up</a>
      </p>
    </form>
    </div>
  </div>
</section>
<?php

    if(isset($_POST['submit']))
    {
      $count=0;
      $res=mysqli_query($db,"SELECT * FROM `registration` WHERE username='$_POST[username]' && password='$_POST[password]';");
      
      $row= mysqli_fetch_assoc($res);
      $count=mysqli_num_rows($res);

      if($count==0)
      {
        ?>
              <!--
              <script type="text/javascript">
                alert("The username and password doesn't match.");
              </script> 
              -->
          <div class="alert alert-danger" style="width: 350px; text-align: center; margin-left:500px;padding-bottom: 20px; background-color:#9a3735; color:white">
            <strong>The username and password doesn't match</strong>
          </div>    
        <?php
      }
      else
      {
        $_SESSION['pic']= $row['pic'];

        ?>
          <script type="text/javascript">
            window.location="options.html"
        $_SESSION['login_user'] = $_POST['username'];
          </script>
        <?php
      }
    }

  ?>

</body>
</html>