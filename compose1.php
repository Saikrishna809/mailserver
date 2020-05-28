<h1 align="center">Compose</h1><?php
include_once('connection.php');
@$to=$_POST['to'];
@$sub=$_POST['sub'];
@$msg=$_POST['msg'];
$file=$_FILES['file']['name'];

$id=$_SESSION['sid'];

if(@$_REQUEST['send'])
{
	if($to=="" || $sub=="" || $msg=="")
	{
	$err= "Enter the below details";
	}
	
	else
	{
	$d=mysql_query("SELECT * FROM userinfo where user_name='$to'");
	$row=mysql_num_rows($d);
	if($row==1)
		{
		mysql_query("INSERT INTO usermail values('','$to','$id','$sub','$msg','',sysdate())");
		$err= "Message sent...";
		}
	else
		{
		$sub=$sub."--"."msg failed";
		mysql_query("INSERT INTO usermail values('','$id','$id','$sub','$msg','',sysdate())");
		$err= "Message failed...";

		}	
	}
}	


if(@$_REQUEST['save'])
{
	if($sub=="" || $msg=="")
	{
	$err= "<font color='red'>fill subject and msg first</font>";
	}
	
	else
	{
	$query="INSERT INTO draft values('','$id','$sub','$file','$msg',sysdate())";
	mysql_query($query);
	$err= "Message saved...";
	}
}	

	
?>
<head><style>.button {  border-radius: 4px;  background-color: #660066;  border: none;  color: #FFFFFF;  text-align: center;  font-size: 18px;  padding: 10px;  width: 100px;  transition: all 0.5s;  cursor: pointer;  margin: 5px;}.button {  cursor: pointer;  display: inline-block;  position: relative;  transition: 0.5s;}.button :after {  content: '\00bb';  position: absolute;  opacity: 0;  top: 0;  right: -20px;  transition: 0.5s;}.button:hover  {  padding-right: 25px;}.button:hover  {	background: #0000ff;color: #ffffff;   opacity: 1;  right: 0;}</style>
	<style>
	input[type=text]
	{
	width:200px;
	height:35px;
	}	.buttonStyle:hover { background: #0000ff;color: #ffffff; font-size="12px";}
</style>
</head>
<body>
<form method="post" enctype="multipart/form-data">
<table width="100%" border="1">
  <?php echo @$err; ?>
  <tr>
    <th width="213" height="35" scope="row">To</th>
    <td width="277">
	<input type="text" name="to" />	</td>
  </tr>
  <tr>
    <th height="36" scope="row">Cc</th>
    <td><input type="text" name="cc"/></td>
  </tr>
  <tr>
    <th height="36" scope="row">Subject</th>
    <td><input type="text" name="sub" /></td>
  </tr>
  <tr>
    <th height="36" scope="row">Upload your file</th>
    <td><input type="file" name="file" id="file"/></td>
  </tr>
  <tr>
    <th height="52" scope="row">Message</th>
    <td><textarea rows="8" cols="40" name="msg"></textarea></td>
  </tr>
  <tr>
    <th height="35" colspan="2" scope="row">	
	<input type="submit" class="button" name="send"  value="Send" class="buttonStyle"/>
	<input type="submit" name="save" class="button" value="Save" class="buttonStyle"/>
	<input type="reset" value="Cancel" class="button" class="buttonStyle"/>	</th>
  </tr>
</table>

</body>
</form>
</html>
