<style>
.buttonStyle:hover { background: #0000ff;
color: #ffffff; 
font-size="12px";}

</style>
<?php
error_reporting(1);
include_once('connection.php');
if(isset($_POST['signIn']))
{
	if($_POST['id']=="" || $_POST['pwd']=="")
	{
	$err="Enter your id and password";
	}
	else
	{
	$d=mysql_query("SELECT * FROM userinfo where user_name='{$_POST['id']}'");
	$row=mysql_fetch_object($d);
		$fid=$row->user_name;
		$fpass=$row->password;
		if($fid==$_POST['id'] && $fpass==$_POST['pwd'])
		{
		$_SESSION['sid']=$_POST['id'];
		//header('location:HomePage.php');
		echo "<script>window.location='HomePage.php'</script>";
		}
		else
		{
		$err="Invalid id or password";
		}
	}
}
?>
<style>
.button {
  border-radius: 4px;
  background-color: #660066;
  border: none;
  color: #FFFFFF;
  text-align: center;
  font-size: 18px;
  padding: 10px;
  width: 100px;
  transition: all 0.5s;
  cursor: pointer;
  margin: 5px;
}

.button {
  cursor: pointer;
  display: inline-block;
  position: relative;
  transition: 0.5s;
}

.button :after {
  content: '\00bb';
  position: absolute;
  opacity: 0;
  top: 0;
  right: -20px;
  transition: 0.5s;
}

.button:hover  {
  padding-right: 25px;
}

.button:hover  {
	background: #0000ff;
color: #ffffff; 
  opacity: 1;
  right: 0;
}
</style>
<form method="post"><br>
<br><br><h2 style="background:#99FF33;padding:5px" style= "font-family: Calibri" align="center">Login</h2><style>p.small {  line-height: 2;}</style><br><br>
<table width="100%" border="1" align="center">
  	
		<Td colspan="2" align="center"> <font color="#FF0000"><?php echo @$err; ?></font></Td>
	
  <tr>
    <th  scope="row">Enter your id </th>
    <td >
		<input type="text" name="id" />
	</td>
  </tr>
  <tr>
    <th scope="row">Enter your password </th>
    <td>
			<input type="password" name="pwd" />
	</td>
  </tr>
  <tr>
    <th colspan="2" scope="row">
	<input type="submit" class="button" value="SignIn" name="signIn"/><br>
		</th>
  </tr>
</table>
</form>