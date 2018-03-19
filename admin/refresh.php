<?php
session_start();
//If your session isn't valid, it returns you to the login screen for protection
if(empty($_SESSION['admin_id'])){
 header("location:index.php");
}
?>
<?php
$mysqli = new mysqli('localhost','root','','online_voting') or die("connecton failed..".mysqli_error());
// retrieving candidate(s) results based on position
if (isset($_POST['Submit'])){   

  $position = addslashes( $_POST['position'] );
  
    $results = $mysqli->query("SELECT * FROM candidate where Position='$position'");
  }
?> 
<?php
// retrieving positions sql query
$positions= $mysqli->query("SELECT * FROM positions")
or die("There are no records to display ... \n" . mysqli_error()); 
?>

<!DOCTYPE html>
<html>
<head>
<title>online voting</title>


<link href="layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">

<script language="JavaScript" src="js/admin.js">
</script>

</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    
    <div id="logo" class="fl_left">
    </div>
    
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="refresh.php">Home</a></li>
        <li><a class="drop" href="#">Admin  HomePages</a>
          <ul>
            <li><a href="create_election.php">New Election</a></li>
            <li><a href="candidates.php">Add Candidate</a></li>
            <li><a href="refresh.php">View Result</a></li>
          </ul>
        </li>
        
        <li><a href="http://localhost/SE_Project/index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
    
  </header>
</div>

<div >
 
  <div >
    <table width="420" align="center">
    <form name="fmNames" id="fmNames" method="post" action="refresh.php" onSubmit="return positionValidate(this)">
    <tr>
        <td style="color:#000000";>Choose Position</td>
        <td><SELECT NAME="position" id="position">
        <OPTION  VALUE="select"><p style="color:black";>select</p>
        <?php 
        //loop through all table rows
        while ($row= mysqli_fetch_array($positions)){
          echo "<OPTION VALUE=$row[position]>$row[position]"; 
        }
        ?>
        </SELECT></td>
        <td style="color:black";><input type="submit" name="Submit" value="See Results" /></td>
    </tr>
    <tr>
     
        
    </tr>
    </form> 
    </table>
   <div>
      <?php
      if(isset($_POST['Submit'])){
        ?>
        <CAPTION><h3>Results></h3></CAPTION>
<table>
<tr>
<th>Candidate ID</th>
<th>Username</th>
<th>Candidate Votes</th>


</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($results)){
    echo "<tr>";
    echo "<td>" . $row['Candidate_id']."</td>";
    echo "<td>" . $row['Username']."</td>";
    echo "<td>" . $row['Candidate_cvote']."</td>";
    }
    mysqli_free_result($results);
    mysqli_close($mysqli);
?>

</table>
<?php
      }
?>
    </div>

  </div>
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