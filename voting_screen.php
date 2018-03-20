<?php
  $mysqli=new mysqli('localhost','root','','online_voting') or die('connection failed'.mysqli_error());

  session_start();
  
  if(empty($_SESSION['voter_id'])){
    header("location:login.php");
  }
?>


  <?php
    
     if (isset($_GET['election_id']))
     {
       
       $position = addslashes( $_GET['position'] ); 
       
       
       $candidates = $mysqli->query("SELECT * FROM candidate WHERE Position='$position'")
       or die(" There are no records at the moment ... \n".mysqli_error()); 
     
     }
     else
     // do something
  
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
    <h2 class="font-x3 uppercase btmspace-80 "><a href="#">Online Voting System</a></h2>
    <ul class="nospace group">
      <li class="one_half first">
        <blockquote> <div id="container">
  
          <table border="0" width="620" align="center">
<form action="">            
<CAPTION><h3>Candidate for <?php echo $position ?></h3></CAPTION>
<table>
<tr>
<th>Candidate ID</th>
<th>Username</th>
<th>Address</th>
<th>Mobile_no</th>
<th>Gender</th>


</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($candidates)){
    echo "<tr>";
    echo "<td>" . $row['Candidate_id']."</td>";
    echo "<td>" . $row['Username']."</td>";
    echo "<td>" . $row['Address']."</td>";
    echo "<td>" . $row['Mobile_no']."</td>";
    echo "<td>" . $row['Gender']."</td>";
    echo '<td><button name="vote"><a href="vote.php?can_id='.$row['Candidate_id'] . ' &cand_position='.$row['Position'] .'">Vote</a></button></td>';
    echo "</tr>";
    }
    mysqli_free_result($candidates);
    mysqli_close($mysqli);
?>

</table>

    </div> </blockquote>
      
      </li>
      
    </ul>
    <!-- ################################################################################################ -->
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