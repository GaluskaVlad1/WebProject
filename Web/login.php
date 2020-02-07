<?php include('server.php') ?>
<!DOCTYPE html>
<html>
<head>
</head>
<body>
  <div class="header">
  	<h2>Login</h2>
  </div>
  <form class="modal-content animate" action="loggedin.php" method="post">
  <?php include('errors.php'); ?>
<div class="container">
      <label for="uname"><b>Username</b></label>
      <input type="text" placeholder="Enter Username" name="uname" required>

      <label for="psw"><b>Password</b></label>
      <input type="password" placeholder="Enter Password" name="psw" required>
        
      <button type="submit" name="login_user">Login</button>
    </div>
	</body>
	</form>
</html>