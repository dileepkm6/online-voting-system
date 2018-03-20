<?php
session_start();
$Voter_id=$_POST['Voter_id'];
$Password=$_POST['Password'];
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'online_voting');
if($Voter_id=="12345" and $Password="12345")
{
	header('location:admin_homepage.php');
}
else{
$q="select * from voters where Voter_id='$Voter_id' && Password='$Password';";
$result=mysqli_query($con,$q);
$num=mysqli_num_rows($result);
if($num==1)
{
	$_SESSION['username']=$Voter_id;
	header('location:voter_homepage.php');
	//echo "successfully logged in";
}
else
{
?>

 <script type='text/javascript'>alert("Username and/or Password incorrect.\\nTry again."); window.location="./login_form.php";</script>
	
<?php
}
}
?>