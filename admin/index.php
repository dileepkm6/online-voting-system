<?php
       session_start();
?>

<!DOCTYPE html>
<html >
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
    <div id="logo" class="fl_left">
    </div>
    <nav id="mainav" class="fl_right">
      <ul class="clear">
        <li class="active"><a href="admin.php">Home</a></li>
        <li><a class="drop" href="#">Pages</a>
          <ul>
            <li><a href="index.php">Admin</a></li>
            <li><a href="http://localhost/online-voting-system/login.php">Voter</a></li>
            </ul>
        </li>     
        <li><a href="http://localhost/online-voting-system/index.php">Voter Panel</a></li>
        <li><a href="logout.php">Logout</a></li>

      </ul>
    </nav>
  </header>
</div>
<div class="wrapper bgded overlay" style="background-image:url('images/demo/backgrounds/b4.jpeg');">
  <section id="testimonials" class="hoc container clear"> 
    <h2 class="font-x3 uppercase btmspace-80"><a href="#">Online Voting System</a></h2>
    <ul class="nospace group">
      <li class="one_half">
<div class="pen-title">
  <h1 style="text-color :white;">Admin Login Form</h1>
</div>
<blockquote>
<div class="col-lg-12" >
    <form name="form1" action="login_validation.php" method="post" >
      <div class="form_group">
        <div class="form_group">
        Admin ID:<input name="Admin_id" type="text" required="required" style="color:#000000";/>
        </div>
        <div class="form_group">
        Password:<input name="Password" type="password"  required="required" style="color:#000000";/>
        </div>
      </div>
      <div class="form_group">
        <input  type="submit" name="Submit" value="Login" style="color:#000000";>
      </div>
      </form>
</blockquote>
</li>
</ul>
</section>
</div>



<div class="wrapper row6" style="background-color: black;">
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







