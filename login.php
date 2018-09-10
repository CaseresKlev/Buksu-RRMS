
<!DOCTYPE html>
<!-- ANNE -->
<html>
<head>
    <meta charset="UTF-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login - BUKSU RRMS</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/login.css">
</head>
<body>

    <div id="content">
        <!-- Place The login Dialog Here.-->

		<div class="header2">
	<h2>LOG IN</h2>
</div>

		<form method="post" action="process.php">
	<div class="input-group">
		<label>Username</label>
		<input type="text" name="username" value="">
	</div>
	<!-- <div class="input-group">
		<label>Email</label>
		<input type="email" name="email" value="">
	</div> -->
	<div class="input-group">
		<label>Password</label>
		<input type="password" name="password">
	</div>
	<!-- <div class="input-group">
		<label>Confirm password</label>
		<input type="password" name="password_2">
	</div> -->
	<div class="input-group">
		<button type="submit" class="btn" name="register_btn">SUBMIT</button>
	</div>
	<!-- <p>
		Already a member? <a href="login.php">Sign in</a>
	</p> -->
</form>
    </div>

</body>
</html>
