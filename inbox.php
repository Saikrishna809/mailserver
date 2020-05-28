<br><style>.button {  border-radius: 4px;  background-color: #660066;  border: none;  color: #FFFFFF;  text-align: center;  font-size: 18px;  padding: 10px;  width: 100px;  transition: all 0.5s;  cursor: pointer;  margin: 5px;}.button {  cursor: pointer;  display: inline-block;  position: relative;  transition: 0.5s;}.button :after {  content: '\00bb';  position: absolute;  opacity: 0;  top: 0;  right: -20px;  transition: 0.5s;}.button:hover  {  padding-right: 25px;}.button:hover  {	background: #0000ff;color: #ffffff;   opacity: 1;  right: 0;}</style>
<?php
include_once('connection.php');

$id=$_SESSION['sid'];


$sql="SELECT * FROM usermail where rec_id='$id'";
$dd=mysqli_query($ccon,$sql);

echo "<div style='margin-left:10px;width:100%;height:auto;'>";

	echo "<table class='table'>";
	echo "<tr><th>Check </th><th>Sender </th><th>Subject </th><th>Date</th></tr>";
while(list($mid,$rid,$sid,$s,$m,$a,$d)=mysqli_fetch_array($dd))
{
	echo "<tr>";
	echo "<form action='delete_msg.php' method='post'>";
	echo "<td><input type='checkbox' name='ch[]' value='$mid'/></td>";
	echo "<td>".$sid."</td>";
	echo "<td><a href='HomePage.php?coninb=$mid'>".$s."</a></td>";
	echo "<td>".$d."</td>";
	echo "</tr>";	
	}
	echo "</table>";
	
	
	


?>
<center><input type='submit'  class="button" value='Delete' name='delete'/></center>
</div></form>


