<?php
  include "connection.php";
 
?>


<!DOCTYPE html>
<html>
<head>
  <title> Upload and Download File</title>
  <style>
.form{
width: 100%;
height: 50px;
display: inline-block;
position: inherit;
padding: 6px;
}
 
.label {
padding: 10px;
width: 10%;
}
.input{
position: inherit;
padding: 3px;
margin-left: 2.3%;
}
 
.btn{
margin-left: 6.5%;
background-color: blue;
color: white;
}

  * {
  font-family: sans-serif;
  text-align: center; /* Change your font family */
}

.content-table {
  border-collapse: collapse;
  margin: 25px 0;
  font-size: 0.9em;
  min-width: 400px;
  border-radius: 5px 5px 0 0;
  overflow: hidden;
  box-shadow: 0 0 30px rgba(0, 0, 0, 0.15);
}

.content-table thead tr {
  background-color: #009879;
  color: #ffffff;
  text-align: center;
  font-weight: bold;
}

.content-table th,
.content-table td {
  padding: 15px 20px;
}

.content-table tbody tr {
  border-bottom: 1px solid #dddddd;
}

.content-table tbody tr:nth-of-type(even) {
  background-color: #f3f3f3;
}

.content-table tbody tr:last-of-type {
  border-bottom: 2px solid #009879;
}

.content-table tbody tr.active-row {
  font-weight: bold;
  color: #009879;
}

  *{
    box-sizing: border-box
  }
  .parent{
           
           border: 100px solid white;
           display:flex;
  } 

  *{
    box-sizing: border-box
  }
  .child{
           
           border: 100px solid white;
           display:flex;
  }             

    </style>
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
<center>
<h1>Upload </h1>
<br><br><br><br><br><br><br><br><br>
<form class="form" method="post" action="" enctype="multipart/form-data">
<label>Filename:</label>
<input type="text" name="filename" > <br/>
<div style="margin-left: 9%">
<label>File:</label>
<input type="file" name='filename'> <br/>
</div>
<input type="submit" name="submit" value="upload file" class="btn"><i class="fa fa-upload fw-fa"></i> 
</form>
</center>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<script type="text/javascript"></script>
<br><br><br><br><br><br><br><br><br>
 
 <section class = "parent">
    <section class = "child">
  
<table class="content-table">
  <thead>
    <tr>
      <th>ACCESS_NO of books Available</th>
      
    </tr>
  </thead>
<?php

if (isset($_POST['submit'])) 
 {
 $handle = fopen($_FILES['filename']['tmp_name'], "r");
 $headers = fgetcsv($handle, 1000, ",");
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
  for($i=0;$i<count($data);$i++)
  {
     echo "<tr><td>" . $data[$i] . "</td></tr>" . "<br />\n";
     
  }
  
 //echo $data[1];
 }
 ?>
 </table>
</section>

<?php

if (isset($_POST['submit'])) 
 {
 $handle = fopen($_FILES['filename']['tmp_name'], "r");
 $headers = fgetcsv($handle, 1000, ",");
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
 for($i=0;$i<count($data);$i++)
  {
        $sql = "UPDATE full1
         SET STATUS='1'
          WHERE ACCESS_NO = '$data[$i]';";
         mysqli_query($db,$sql);
       }
     }
   }
   ?>
   
   <section class = "child">
<table class="content-table">
  <thead>
    <tr>
      <th>ACCESS_NO of books Unavailable</th>
     
    </tr>
  </thead>
  <?php

     $sql = "SELECT *FROM full1 WHERE STATUS = '0';";  
     $result = mysqli_query($db, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          while ($row = mysqli_fetch_assoc($result)) {
            
            echo "<tr><td>" . $row['ACCESS_NO'] . "</td></tr>" . "<br />\n";
            
          }
         }
         ?>
       </table>
     </section>
   


         <?php

if (isset($_POST['submit'])) 
 {
 $handle = fopen($_FILES['filename']['tmp_name'], "r");
 $headers = fgetcsv($handle, 1000, ",");
 while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) 
 {
 for($i=0;$i<count($data);$i++)
  {
        $sql = "UPDATE full1
         SET STATUS='0'
          WHERE STATUS = '1';";
         mysqli_query($db,$sql);
       }
     }
   }
  

fclose($handle);
}
?>

</section>

</body>
</html>






  
