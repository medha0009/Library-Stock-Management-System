<?php
  include "connection.php";
  include "navbar.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Insert</title>
	<style>
		body{
			background-color: seashell;
		}
		input {
			width: 30%;
			height:8%;
			border: 1px;
			border-radius: 05px;
			padding: 8px 15px 8px 15px;
			margin: 10px 0px 15px 0px;
			box-shadow: 1px 1px 2px 1px grey;
		}

	</style>>
</head>
<body>
    <center>
		<h1>INSERTION OF DATA </h1>
    <form action="" method="POST">
            <input type="text" name="SERIAL_NO" placeholder="Enter serial no"><br>
            <input type="text" name="ACCESS_NO" placeholder="Enter access no"><br>
             <input type="text" name="SHELFNUM" placeholder="Enter shelf number"><br>			
            <input type="text" name="TITLE" placeholder="Enter title"><br>
            <input type="text" name="AUTHOR" placeholder="Enter author"><br>
            <input type="text" name="PUBLICATION" placeholder="Enter publication"><br>
            <input type="text" name="EDITION" placeholder="Enter Edition"><br>
		    <input type="text" name="POSITION" placeholder="Enter position"><br>
		   
            <button type="submit" name="submit"> Insert</button>
    </form>    
  
</body>
</html>
<?php
if(isset($_POST['submit']))
{
	 $SERIAL_NO=$_POST['SERIAL_NO'];
    $ACCESS_NO=$_POST['ACCESS_NO'];
     $SHELFNUM=$_POST['SHELFNUM'];
    $TITLE=$_POST['TITLE'];
    $AUTHOR=$_POST['AUTHOR'];
    $PUBLICATION=$_POST['PUBLICATION'];
    $EDITION=$_POST['EDITION'];
    $POSITION=$_POST['POSITION'];

    $sql="INSERT INTO `full1`(`SERIAL_NO`, `ACCESS_NO`,`SHELFNUM`,`TITLE`, `AUTHOR`, `PUBLICATION`, `EDITION`, `POSITION`)   
       VALUES ('$SERIAL_NO','$ACCESS_NO','$SHELFNUM','$TITLE','$AUTHOR','$PUBLICATION','$EDITION','$POSITION');";
  $query_run= mysqli_query($db,$sql);
  
   if ($query_run) 
	{
		echo '<script type = "text/javascript"> alert("data inserted")</script>';
	}
	else
	{
		echo '<script type = "text/javascript"> alert("data not inserted")</script>';
	}
}

?>
    
