 <?php
  include "connection.php";
  
?>



<!DOCTYPE html>
<html>
<head>

  <title> Registration</title>
  <link rel="stylesheet" type="text/css" href="style.css">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  
</head>
<body>
<div class="wrapper">
          <header> 
<div class="logo">
    <img  src="images/photo.png" />

      <h1 style="color: white; font-size: 25px;word-spacing: 10px; line-height: 80px;margin-top: 20px;"> LIBRARY STOCK MANAGEMENT </h1>
    </div>

      
          <div class="dropdown"> 
    <nav>
      
  <ul>
    <li class="active"><a href="index.php">HOME</a>
      <ul>
          <li><a href="login.php">LOGIN</a>
          </li>
          
      </ul>
    </li>
     
    <li><a href="About us.php">ABOUT US</a></li>
    
    <li><a href="contact us.php">CONTACT US</a></li>
</ul>
      </nav>
</header>

<section>
  <div class="reg_img">

    <div class="box2">
        <h1 style="text-align: center; font-size: 25px;font-family: Lucida Console;">Library Stock Management </h1>
        <h1 style="text-align: center; font-size: 25px;">User Registration Form</h1>
      <form name="Registration" action="" method="post">
        <br>
        <div class="login">
          <input class="form-control" type="text" name="first" placeholder="FirstName" required="">   <br>
          <input class="form-control"  type="text" name="last" placeholder="LastName" required="">   <br>
          <input  class="form-control" type="text" name="username" placeholder="Username" required="">   <br>
          <input class="form-control"  type="password" name="password" placeholder="Password" required="">   <br>
         
          <input class="form-control"  type="text" name="email" placeholder="Email" required="">  <br>
 <input class="btn btn-default" type="submit" name="submit" value="Sign up" style="color:black;width: 70px; height:30px"></div>
      </form>
     
    </div>
  </div>
</section>

    <?php

      if(isset($_POST['submit']))
      {
        $count=0;
        $sql="SELECT username from `registration`";
        $res=mysqli_query($db,$sql);

        while($row=mysqli_fetch_assoc($res))
        {
          if($row['username']==$_POST['username'])
          {
            $count=$count+1;
          }
        }
        if($count==0)
        {
          mysqli_query($db,"INSERT INTO `REGISTRATION` VALUES('$_POST[first]', '$_POST[last]', '$_POST[username]', '$_POST[password]', '$_POST[email]');");
        ?>
          <script type="text/javascript">
           alert("Registration successful");
          </script>
        <?php
        }
        else
        {

          ?>
            <script type="text/javascript">
              alert("The username already exist.");
            </script>
          <?php

        }

      }

    ?>

</body>
</html>