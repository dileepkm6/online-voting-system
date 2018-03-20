<?php
session_start();
  $mysqli=new mysqli('localhost','root','','online_voting') or die("connection failed".mysqli_error());
  if(isset($_POST['Submit']))
  {
    $voter_id=addslashes($_POST['voter_id']);
    $password=addslashes($_POST['password']);
    $result=$mysqli->query("select * from voters where Voter_id='$voter_id' && Password='$password'") or 
    die("could not run the query".mysqli_error());
    $num=mysqli_num_rows($result);
    if($num==1)
    {
      $_SESSION['voter_id']=$voter_id;
      header('location:voter_homepage.php');
      //echo "successfully logged in";
    }
    else
    {
    ?>

      <script type='text/javascript'>alert("Username and/or Password incorrect.\\nTry again."); window.location="./login.php";</script>
  
    <?php
    }
  }
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

</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="fl_left">
      <h1><a href="index.html">ONLINE VOTING</a></h1>
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/background1.jpg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80"><a href="#">Online Voting System</a></h2>
    <ul class="nospace group">
      <li class="one_half">
        <blockquote>
     <div class="col-lg-12">
            <form id="login-form" action="login.php" method="post" role="form" >
              <div class="form-group">
                <div class="form-group" >
                    Voter Id: <input type="text" id="election_id" name="voter_id" style="color:#000000";>
                  </div>

                  <div class="form-group">
                    Password:<input type="text" id="Election_Desc" name="password" style="color:#000000";>
                  </div>

                  <div class="form_group">
                    <input type="submit" name="Submit" id="login-submit" style="background-color:#000000;" value="Login">
                  </div>
            </form>
      </div>

<center>
<br>Not yet registered? <a href="registeracc.php"><b>Register Here</b></a>
</center>

        </blockquote>
      
      </li>
    </ul>
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


