<?php
session_start();
if(isset($_POST['register-submit']))
{
  $Voter_id=$_POST['Voter_id'];
  $username=$_POST['Username'];
  $password=$_POST['Password'];
  $repeat_password=$_POST['Repeat_Password'];
  $mysqli=new mysqli('localhost','root','','online_voting');
  $id=$mysqli->query("SELECT * from voter_id;") or die("cannot fetch voter id at this time");
  $flag=false;
  while($row=mysqli_fetch_array($id))
  {
    $voterid = $row['Voter_Id'];
    if(strcmp($Voter_id,$voterid)==0)
    {
      $flag=true;
    }
  }
  if($flag==true)
  {
    if(strcmp($password,$repeat_password)==0)
    {
      $result = $mysqli->query("INSERT into voters (Voter_id,Username,Password) values ('$Voter_id','$username','$password');") or die("cannot insert at this time");
      if($result)
      {
        $_SESSION['username']=$username;
        ?>
        <script type="text/javascript">
          r=confirm('registerd succesfully.Ok for login.');
          if(r)
          {
            window.location.href="login.php";
          }
          else
          {
             window.location.href="registeracc.php";
          }
        </script>
        <?php
    
      }
      else
      {
        echo "something error..try again";
        header('location:registeracc.php');
      }
    }
    else
    {
    ?>
      <script type="text/javascript">alert("password did't match..try again.");</script>
    <?php
      header('location:registeracc.php');
    }
  }
  else
  {
    ?>
      <script type="text/javascript">alert("wrong voter id ..try again..");
      window.location.href='registeracc.php';
    </script>
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
<style>
input
{
  color: #000000;
}
</style>
</head>
<body id="top">
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="index.php">Home</a></li>
        
        <li><a href="logout.php">Logout</a></li>
      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/b4.jpeg');">
  <section id="testimonials" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <h2 class="font-x3 uppercase btmspace-80"><a href="#">Online Voting System</a></h2>
    <ul class="nospace group">
      <li class="one_half">
        <blockquote>
<div class="container">
      <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <div class="panel panel-login">

          <div class="panel-body">
            <div class="row">
              <div class="col-lg-12">
                <form id="register-form" action="registeracc.php" method="post" role="form" >
                  <div class="form-group">
                    Voter Id<input type="text" name="Voter_id" id="Voter_id" tabindex="1" class="form-control" placeholder="Voter_id" value="">
                  </div>
                  <div class="form-group">
                    Username<input type="text" name="Username" id="Username" tabindex="1" class="form-control" placeholder="Username" value="">
                  </div>
                  <div class="form-group">
                    Password<input type="password" name="Password" id="Password" tabindex="2" class="form-control" placeholder="Password">
                  </div>
                  <div class="form-group">
                    Confirm Password<input type="password" name="Repeat_Password" id="confirm-password" tabindex="2" class="form-control" placeholder="Confirm Password">
                  </div>
                  
                        <input type="submit" name="register-submit" id="register-submit" tabindex="4"  value="Register Now">
                      
                </form>
              </div>
              <div class="text-center">
                      Already registered<a href="login.php"> Click here</a> to login.
                      </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

<center>
<br>Already have an account? <a href="login.php"><b>Login Here</b></a>
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

