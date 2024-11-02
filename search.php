<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html>
<head>
  <title>List</title>
  <style type="text/css">
      .srch
      {
        padding-left: 1000px;
      }
  </style>
</head>
<body>
    <!---_______________________search bar_____________________-->
    <div class="srch">
        <form class="navbar-form" method="post" name="form1">
            
                <input class="form-control" width=50px type="text" name="search" placeholder="search..." required="">
                <button  style="background-color:#6db6b9e6;" type="submit" name="submit" class="btn btn-default">
                    <span class="glyphicon glyphicon-search"></span>
                    

                </button>
                
            </form>
        </div>
        
    </h2>
  <h2>List</h2>
   <?php
   if(isset($_POST['submit']))
   {
    $q=mysqli_query($db,"SELECT * from  full1 where ACCESS_NO like '%$_POST[search]%'");
    if(mysqli_num_rows($q)==0)
    {
        echo "Sorry! No book found.Try searching again with valid access number.";
    }
    else
    {
        echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        echo "<th>"; echo "SERIAL_NO"; echo "</th>";
        echo "<th>"; echo "ACCESS_NO";  echo "</th>";
        echo "<th>"; echo "TITLE ";  echo "</th>";
        echo "<th>"; echo "AUTHOR";  echo "</th>";
        echo "<th>"; echo "PUBLICATION";  echo "</th>";
          echo "<th>"; echo "EDITION";  echo "</th>";
            echo "<th>"; echo "POSITION ";  echo "</th>";
             echo "<th>"; echo "SHELFNUM";  echo "</th>";
      echo "</tr>"; 
while ($row = mysqli_fetch_assoc($q))
      {
        echo "<tr>";
        echo "<td>"; echo $row['SERIAL_NO']; echo "</td>";
        echo "<td>"; echo $row['ACCESS_NO']; echo "</td>";
        echo "<td>"; echo $row['TITLE']; echo "</td>";
        echo "<td>"; echo $row['AUTHOR']; echo "</td>";
        echo "<td>"; echo $row['PUBLICATION']; echo "</td>";
        echo "<td>"; echo $row['EDITION']; echo "</td>";
        echo "<td>"; echo $row['POSITION']; echo "</td>";
          echo "<td>"; echo $row['SHELFNUM']; echo "</td>";
 echo "</tr>"; 

      }
    echo "</table>";
    }

   }
   /*if button is not pressed.*/
   else
   {
    $result = mysqli_query($db, "SELECT * FROM full1");
echo "<table class='table table-bordered table-hover' >";
      echo "<tr style='background-color: #6db6b9e6;'>";
        //Table header
        echo "<th>"; echo "SERIAL_NO"; echo "</th>";
        echo "<th>"; echo "ACCESS_NO";  echo "</th>";
        echo "<th>"; echo "TITLE ";  echo "</th>";
        echo "<th>"; echo "AUTHOR";  echo "</th>";
        echo "<th>"; echo "PUBLICATION";  echo "</th>";
          echo "<th>"; echo "EDITION";  echo "</th>";
            echo "<th>"; echo "POSITION ";  echo "</th>";
             echo "<th>"; echo "SHELFNUM";  echo "</th>";
      echo "</tr>"; 
while ($row = mysqli_fetch_assoc($result))
      {
        echo "<tr>";
        echo "<td>"; echo $row['SERIAL_NO']; echo "</td>";
        echo "<td>"; echo $row['ACCESS_NO']; echo "</td>";
        echo "<td>"; echo $row['TITLE']; echo "</td>";
        echo "<td>"; echo $row['AUTHOR']; echo "</td>";
        echo "<td>"; echo $row['PUBLICATION']; echo "</td>";
        echo "<td>"; echo $row['EDITION']; echo "</td>";
        echo "<td>"; echo $row['POSITION']; echo "</td>";
        echo "<td>"; echo $row['SHELFNUM']; echo "</td>";
 echo "</tr>"; 

      }
    echo "</table>";

   }

?>
</body>
</html>