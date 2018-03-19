<?php
session_start();
$Admin_id=$_POST['Admin_id'];
$Password=$_POST['Password'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_voting');

$q="select * from admin where Admin_id='$Admin_id' && Password='$Password';";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['admin_id']=$Admin_id;
	header('location:admin.php');
	//echo "successfully logged in";
}
else
{
?>

 <script type='text/javascript'>alert("Username and/or Password incorrect.\\nTry again."); window.location="./index.php";</script>
	
<?php
}
?>