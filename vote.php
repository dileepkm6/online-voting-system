<?php
session_start();
if(!isset($_SESSION['voter_id']))
{
	header('location:login.php');
}
$mysqli = new mysqli('localhost','root','','online_voting') or die('connection failed'.mysqli_error());
?>
<?php
    if(isset($_GET['can_id']))
  {
      $candidate_id=addslashes($_GET['can_id']);
      $candidate_position=addslashes($_GET['cand_position']);
      $voter_id = $_SESSION['voter_id'];
      $result=$mysqli->query("INSERT INTO voter_candidate(Voter_id,Candidate_id,Position) values ('$voter_id','$candidate_id','$candidate_position')") or die("can't insert at this time".mysqli_error());
      $mysqli->query("UPDATE candidate SET Candidate_cvote=Candidate_cvote+1 WHERE Candidate_id='$candidate_id'");
      if($result)
      {
        header('location:elections.php');
      }
    }
  ?>