
<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
  header('location:index.php');
}
?>
<?php
$mysqli=new mysqli('localhost','root','','online_voting');
$positions_retrieved=$mysqli->query("select * from positions")
or die("there is no position to display \n".mysqli_error());
?>
<?php
if(isset($_GET['position']))
{
  $p=$_GET['position'];
  $avlCandidate=$mysqli->query("select * from candidate where Position='$p'") or
  die("there is no candidate to display\n".mysqli_error());
  header("location:candidate.php");
}
?>
<?php
if(isset($_POST['Submit']))
{
  $election_id   = addslashes($_POST['election_id']);
  $election_desc = addslashes( $_POST['election_desc'] );
  $end_date      = addslashes($_POST['end_date']);
  $position      = addslashes( $_POST['position'] );
  $sql = $mysqli->query( "INSERT INTO election(Election_id,Election_Desc,End_Date,Position) VALUES ('$election_id','$election_desc','$end_date','$position')" )
            or die("Could not insert candidate at the moment". mysqli_error() );

    // redirect back to candidates
     header("Location: create_election.php");
}
?>
<!DOCTYPE html>
<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script language="JavaScript" src="js/user.js">
</script>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<script src="action.js"></script>

</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Admin HomePages</a>
          <ul>
            <li><a href="create_election.php">New Election</a></li>
            <li><a href="candidates.php">Add Candidate</a></li>
            <li><a href="refresh.php">View Result</a></li>
          </ul>
        </li>
        
        <li><a href="http://localhost/online_voting/index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/b1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
   
    <h2 class="font-x3 uppercase btmspace-80 "><a href="#">Online Voting System</a></h2>
    
       
          <div class="col-lg-12">
                        <form id="register-form" action="create_election.php" method="post" role="form" >
							<div class="form-group">
								<div class="form-group" >
										Election Id: <input type="text" id="election_id" name="election_id" style="color:#000000";>
									</div>

									<div class="form-group">
										Election Description:<input type="text" id="Election_Desc" name="election_desc" style="color:#000000";>
									</div>

									<div class="form-group">
										End Date: <input type="date" id="end_date" name="end_date" style="color:#000000";>
									</div>
									<div class="form-group" >
                    Select Position:
                    <SELECT style="color:#000000" name="position" id="position">select
                    <OPTION VALUE="select">select
                       <?php
                              //loop through all table rows
                            while ($row= mysqli_fetch_array($positions_retrieved)){
                               echo "<OPTION VALUE=$row[position]>$row[position]";
                                 }
                               ?>
                   </SELECT>
                   <div class="form_group">
                        <input type="submit" name="Submit" id="login-submit" style="background-color:blue;" value="Create Election">
                     </div>
						</form>
			</div>
        
      

   
   
  </section>
</div>
<div class="wrapper row6">
  <div> 
    <p>Dileep Kr Maurya</p>
    <p>NITK Surathkal</p>
    <p>Email:<a href="https://gmail.com">dileepkm6@gmail.com</a></p>
  </div>
</div>

<a id="backtotop" href="#top"><i class="fa fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->
<script src="layout/scripts/jquery.min.js"></script>
<script src="layout/scripts/jquery.backtotop.js"></script>
<script src="layout/scripts/jquery.mobilemenu.js"></script>
<!-- IE9 Placeholder Support -->
<script src="layout/scripts/jquery.placeholder.min.js"></script>
<!-- / IE9 Placeholder Support -->
</body>
</html>
