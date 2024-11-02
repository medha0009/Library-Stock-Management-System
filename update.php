<?php
  include "connection.php";
  include "navbar.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<title>Updation</title>
	<style>
		body{
			background-color:seashell;
		}
		input {
			width: 25%;
			height:7%;
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
		<h1>UPDATION OF DATA </h1>
	<form action="" method="POST" >
			<input type="text" name="SERIAL_NO" placeholder="Enter serial no"><br>	
			<input type="text" name="ACCESS_NO" placeholder="Enter access no"><br>			
            <input type="text" name="STATUS" placeholder="Enter status"><br>
            <input type="text" name="SHELFNUM" placeholder="Enter shelf number"><br>
            <input type="text" name="TITLE" placeholder="Enter title"><br>
            <input type="text" name="AUTHOR" placeholder="Enter author"><br>
            <input type="text" name="PUBLICATION" placeholder="Enter publication"><br>
            <input type="text" name="EDITION" placeholder="Enter Edition"><br>
		    <input type="text" name="POSITION" placeholder="Enter position"><br>
		    <button type="submit" name="submit"> Update</button>
	</form>

</body>
</html>
<?php


if(isset($_POST['submit']))
{
	  $SERIAL_NO=$_POST['SERIAL_NO'];
    $ACCESS_NO=$_POST['ACCESS_NO'];
    $STATUS=$_POST['STATUS'];
    $SHELFNUM=$_POST['SHELFNUM'];
    $TITLE=$_POST['TITLE'];
    $AUTHOR=$_POST['AUTHOR'];
    $PUBLICATION=$_POST['PUBLICATION'];
    $EDITION=$_POST['EDITION'];
    $POSITION=$_POST['POSITION'];
    
	 $sql="UPDATE `full1` 
    SET `SERIAL_NO`='$SERIAL_NO',
    `STATUS`='$STATUS',
    `SHELFNUM`='$SHELFNUM',
    `TITLE`='$TITLE',
    `AUTHOR`='$AUTHOR',
    `PUBLICATION`='$PUBLICATION',
    `EDITION`='$EDITION',
    `POSITION`='$POSITION' 
    WHERE `ACCESS_NO`='$ACCESS_NO';";
    $query_run=mysqli_query($db,$sql);
	
	
	if ($query_run) 
	{
		echo '<script type = "text/javascript"> alert("data updated")</script>';
	}
	else
	{
		echo '<script type = "text/javascript"> alert("data not updated")</script>';
	}
}

?>