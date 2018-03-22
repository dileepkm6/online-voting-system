<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:index.php");
}
?>
<?php
$mysqli = new mysqli('localhost','root','','online_voting');
if($_GET['position'])
{
	$pos = $_GET['position'];
	$r1=$mysqli->query("UPDATE candidate SET Candidate_cvote = 0 where Position = '$pos'") or die("cannot update candidate at this time..");
	$r2=$mysqli->query("UPDATE voters SET voted_position = NULL where voted_position = '$pos'") or die("cannot update voters at this time.");
	$r3=$mysqli->query("DELETE FROM voter_candidate where Position='$pos'") or die("cannot delete voter_candidate at this time.");
	if($r1 and $r2){
		echo '<script type="text/javascript">'; 
		echo 'alert("you have successfully reset the election..");'; 
		echo 'window.location.href = "refresh.php";';
		echo '</script>';
	}
}
?>