<br>
<?php
include_once('connection.php');

$id=$_SESSION['sid'];


$sql="SELECT * FROM draft where user_id='$id'";
$dd=mysqli_query($con,$sql);

echo "<div style='margin-left:10px;width:100%;height:auto;'>";

	echo "<table border='1' width='100%' class='table'>";
	echo "<tr><th>Subject </th><th>Attachement </th><th>Message</th><th>Date</th></tr>";
while(list($draftId,$u_id,$sub,$file,$msg,$date)=mysqli_fetch_array($dd))
{
	echo "<tr>";
	echo "<td>".$sub."</td>";
	
	echo "<td>".$file."</td>";
	echo "<td>".$msg."</td>";
	echo "<td>".$date."</td>";
	echo "</tr>";	
	}
	echo "</table>";
	
	

echo "</div>";
	
echo "</form>";

?>
