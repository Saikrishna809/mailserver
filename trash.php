<br>
<?php
include_once('connection.php');

$id=$_SESSION['sid'];


$sql="SELECT * FROM trash where rec_id='$id'";
$dd=mysqli_query($con,$sql);

echo "<div class='table'>";

	echo "<table border='1' width='100%'>";
	echo "<tr><th scope='col'>Check </th><th scope='col'>Sender </th><th scope='col'>Subject </th><th scope='col'>Date</th></tr>";
while(list($mid,$rid,$sid,$s,$m,$d)=mysqli_fetch_array($dd))
{
	echo "<tr>";
	echo "<form>";
	echo "<td><input type='checkbox' name='ch[]' value='$mid'/></td>";
	echo "<td>".$sid."</td>";
	echo "<td><a href='HomePage.php?coninb=$mid'>".$s."</a></td>";
	echo "<td>".$d."</td>";
	echo "</tr>";	
	}
	echo "</table>";
	


?>
