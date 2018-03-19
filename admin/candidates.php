<?php
session_start();
if(!isset($_SESSION['admin_id']))
{
  header('location:index.php');
}
?>
<?php
    $mysqli=new mysqli('localhost','root','','online_voting');
    $result= $mysqli->query("SELECT * FROM candidate")
    or die("There are no records to display ... \n" . mysqli_error()); 
    if (mysqli_num_rows($result)<1){
        $result = null;
    }
?>

<?php
    $positions_retrieved= $mysqli->query("SELECT * FROM positions")
    or die("There are no records to display ... \n" . mysqli_error()); 
?>

<?php
if (isset($_POST['Submit']))
{

    $newCandidate_id =addslashes($_POST['Can_id']);
    $newCandidateName = addslashes( $_POST['Username'] ); //prevents types of SQL injection
    $newCandidateAddress = addslashes($_POST['Address']);
    $newCandidateMobile = addslashes($_POST['Mobile_no']);
    $newCandidateGender = addslashes($_POST['Gender']);
    $newCandidatePosition = addslashes( $_POST['position'] ); //prevents types of SQL injection
    

    $sql = $mysqli->query( "INSERT INTO candidate(Candidate_id,Username,Address,Mobile_no,Gender,Position) VALUES ('$newCandidate_id','$newCandidateName','$newCandidateAddress','$newCandidateMobile','$newCandidateGender','$newCandidatePosition')" )
            or die("Could not insert candidate at the moment". mysqli_error() );

    // redirect back to candidates
     header("Location: candidates.php");
    }
?>

<?php
    // deleting sql query
    // check if the 'id' variable is set in URL
     if (isset($_GET['id']))
     {
     // get id value
     $id = $_GET['id'];
     
     // delete the entry
     $result =  $mysqli->query("DELETE FROM candidate WHERE Candidate_id='$id'")
     or die("The candidate does not exist ... \n"); 
     
     // redirect back to candidates
     header("Location: candidates.php");
     }
     else
     // do nothing   
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

</head>
<body id="top" style="background-image:url('images/demo/backgrounds/b1.jpg');">
<div class="wrapper row1">
  <header id="header" class="hoc clear">   
    <div id="logo" class="fl_left">
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="candidates.php">Home</a></li>
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

<div >
<table width="380" align="center">
<CAPTION><h3>ADD NEW CANDIDATE</h3></CAPTION>
<form name="fmCandidates" id="fmCandidates" action="candidates.php" method="post" onsubmit="return candidateValidate(this)">
<tr>
    <td bgcolor="#FAEBD7">Candidate Id</td>
    <td bgcolor="#FAEBD7"><input type="text" name="Can_id" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Candidate Name</td>
    <td bgcolor="#FAEBD7"><input type="text" name="Username" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Address</td>
    <td bgcolor="#FAEBD7"><input type="text" name="Address" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Mobile No</td>
    <td bgcolor="#FAEBD7"><input type="text" name="Mobile_no" /></td>
</tr>
<tr>
    <td bgcolor="#FAEBD7">Gender</td>
    <td bgcolor="#FAEBD7"><SELECT NAME="Gender" id="Gender">
    <OPTION VALUE="select">select</OPTION>
    <OPTION VALUE="select">Male</OPTION>
    <OPTION VALUE="select">Female</OPTION>
    <OPTION VALUE="select">Common</OPTION>
    
    </SELECT>
  </td>
</tr>

<tr>
    <td bgcolor="#7FFFD4">Candidate Position</td>
    
    <td bgcolor="#7FFFD4"><SELECT NAME="position" id="position">select
    <OPTION VALUE="select">select
    <?php
        //loop through all table rows
        while ($row= mysqli_fetch_array($positions_retrieved)){
          echo "<OPTION VALUE=$row[position]>$row[position]";
        }
    ?>
    </SELECT>
    </td>
</tr>
<tr>
    <td bgcolor="#BDB76B">&nbsp;</td>
    <td bgcolor="#BDB76B"><input type="submit" name="Submit" value="Add" /></td>
</tr>
</table>
<hr>
<table border="0" width="620" align="center">
<CAPTION><h3>AVAILABLE CANDIDATES</h3></CAPTION>
<tr>
<th>Candidate ID</th>
<th>Candidate Name</th>
<th>Candidate Address</th>
<th>Candidate Mobile</th>
<th>Candidate Gender</th>
<th>Candidate Position</th>
</tr>

<?php
    //loop through all table rows
    while ($row= mysqli_fetch_array($result)){
    echo "<tr>";
    echo "<td>" . $row['Candidate_id']."</td>";
    echo "<td>" . $row['Username']."</td>";
    echo "<td>" . $row['Address']."</td>";
    echo "<td>" . $row['Mobile_no']."</td>";
    echo "<td>" . $row['Gender']."</td>";
    echo "<td>" . $row['Position']."</td>";
    echo '<td><a href="candidates.php?id=' . $row['Candidate_id'] . '">Delete Candidate</a></td>';
    echo "</tr>";
    }
    mysqli_free_result($result);
    mysqli_close($mysqli);
?>

</table>
<hr>
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








