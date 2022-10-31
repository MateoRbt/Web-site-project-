
<!DOCTYPE html>
<html>
<head>
  <title>Registration system PHP and MySQL</title>
  <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
  <div class="header">
  	<h2>Register</h2>
  </div>
	
  <form method="post" action="signup.php">
  
  	<div class="input-group">
  	  <label>Username</label>
  	  <input type="text" name="user" value="">
  	</div>
  	<div class="input-group">
  	  <label>Email</label>
  	  <input type="email" name="email" value="">
  	</div>
  	<div class="input-group">
  	  <label>Password</label>
  	  <input type="password" name="password1">
  	</div>
  	<div class="input-group">
  	  <label>Confirm password</label>
  	  <input type="password" name="password2">
  	</div>
  	<div class="input-group">
  	  <button type="submit" class="btn" name="sign-up">Register</button>
  	</div>
  	<p>
  		Already a member? <a href="log.php">Log in</a>
  	</p>
  </form>
</body>
</html>