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

<body style="background-image:url('images/demo/backgrounds/b4.jpeg');">


  

<div class="pen-title">
  <h1>Admin Login Form</h1>
</div>

<div class="container" >
  <div class="card">
    <form name="form1" action="login_validation.php" method="post" >

      <div class="input-container">
        <input name="Admin_id" type="text" placeholder="admin_Id" required="required"/>
        
        <div class="bar"></div>
      </div>
      <div class="input-container">
        <input name="Password" type="password"  placeholder="password" required="required"/>
        
        <div class="bar"></div>
      </div>

      <div class="button-container">

        <input  type="submit" name="Submit" value="Login">

      </div>
      <br><br>
    <center>Return to <a href="http://localhost/online-voting-system/index.php">Voter Panel</a></center>

    </form>
  </div>
  
</div>


</body>
</html>




