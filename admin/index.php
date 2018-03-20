<?php
       session_start();
?>

<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Admin Login Form</title>
  
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">

  <link rel='stylesheet prefetch' href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,500,700,900|RobotoDraft:400,100,300,500,700,900'>
<link rel='stylesheet prefetch' href='https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css'>

      <link rel="stylesheet" href="css/style.css">

      <script language="JavaScript" src="js/admin.js">
  </script>

  
</head>

<body style="background-image:url('images/demo/backgrounds/b8.jpeg');">


  

<div class="pen-title">
  <h1>Admin Login Form</h1>
</div>

<div class="container" >
  <div class="card"></div>

  <div class="card">
    <h1 class="title">Login</h1>
    <form name="form1" action="login_validation.php" method="post" >

      <div class="input-container">
        <input name="Admin_id" type="text" required="required"/>
        <label>Admin_Id</label>
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="Password" type="password"  required="required"/>
        <label>Password</label>
        <div class="bar"></div>
      </div>

      <center><tr><td colspan="2" align="center"><input type="checkbox" name="remember" value="1"> <font color="blue">Remember Me</font></td></tr></center><br>

      <div class="button-container">

        <input  type="submit" name="Submit">

      </div>
      <br><br>
    <center>Return to <a href="http://localhost/online-voting-system/index.php">Voter Panel</a></center>

    </form>
  </div>
  
</div>


</body>
</html>




