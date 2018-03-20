<?php
 	$mysqli=new mysqli('localhost','root','','online_voting') or die('connection failed'.mysqli_error());

	session_start();
	//If your session isn't valid, it returns you to the login screen for protection
	if(!isset($_SESSION['voter_id'])){
	 	header("location:login.php");
	} 
?>
<?php
    $voter_id = $_SESSION['voter_id'];
	$result=$mysqli->query("SELECT * FROM election") or die("could not run query".mysqli_error());
	if(mysqli_num_rows($result)<1)
		$result=null;
    
    //$count=mysqli_num_rows($check);
?>

<!DOCTYPE html>

<html>
<head>
<title>online voting</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<!-- <link href="css/user_styles.css" rel="stylesheet" type="text/css" /> -->
<script language="JavaScript" src="js/user.js">
</script>
<style type="text/css">
	td{color: #000000;}
	.isDisabled
	{
		pointer-events: none;
  		cursor: default;
  		text-decoration:none;
  		color:black;
	}
</style>
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="voter_homepage.php">Home</a></li>
        <li><a class="drop" href="#">Voter Pages</a>
          <ul>
            <li><a href="elections.php">Election</a></li>
            <li><a href="refresh.php">View Result</a></li>
          </ul>
        </li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
    <!-- ################################################################################################ -->
  </header>
</div>

<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/b8.jpeg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80"><a href="#">Online Voting System</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote> <div id="container">
	
        	<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE ELECTIONS</h3></CAPTION>
<tr>
<th>Election ID</th>
<th>Election Desc</th>
<th>End Date</th>
<th>Electtion Position</th>
<th>Go For Vote</th>

</tr>

<?php
    //loop through all table rows

    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Election_Id']."</td>";
    echo "<td>" . $row['Election_Desc']."</td>";
    echo "<td>" . $row['End_Date']."</td>";
    echo "<td>" . $row['Position']."</td>";
    $p =  $row['Position'];
    $check=$mysqli->query("SELECT * from voter_candidate where Voter_id='$voter_id' and Position='$p' ");
    if(mysqli_num_rows($check)>0){
    echo '<td><a class="isDisabled" href="voting_screen.php?election_id=' . $row['Election_Id'] . '&position=' . $row['Position'].'">voted</a></td>';
 }
 else{
 echo '<td><a  href="voting_screen.php?election_id=' . $row['Election_Id'] . '&position=' . $row['Position'].'">Go</a></td>';

    echo "</tr>";
    }
}
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>

</table>

		</div> </blockquote>
      
      </li>
      
    </ul>
    <!-- ################################################################################################ -->
  </section>
</div>
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
<!-- ################################################################################################ -->
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


