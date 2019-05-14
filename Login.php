<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>iHeartCoding | Login</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">

		<!-- LINEARICONS -->
		<link rel="stylesheet" href="public/css/linearicons.css">
		
		<!-- STYLE CSS -->
		<link rel="stylesheet" href="public/css/login-style.css">
	</head>

	<body>

		<div class="wrapper">
			<div class="inner">
				<a href="/iHeartCoding/"><img src="public/images/image-1.png" class="image-1"></a>

				<?php if(isset($_GET['Register'])){?>

					<form action="controllers/loginController" method="POST">
						<h3>New Account?</h3>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="Username" name="username">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="First Name" name="first_name">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="Last Name" name="last_name">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-envelope"></span>
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-holder" style="margin-bottom:50px">
							<span class="lnr lnr-lock"></span>
							<input type="password" class="form-control" placeholder="Password" autocomplete="new-password" name="password">
						</div>
						
						<input type="checkbox" name="conditions" value="accecpt"> I Agree to <strong>Terms of Use</strong> and <strong>Privacy Policy</strong><br>

						<button type="submit" name="register_user">
							<span>Register</span>
						</button>
					</form>

				<?php }else if(isset($_GET['Reset'])){?>

					<form action="controllers/loginController" method="POST">
						<h3>Can't Remember?</h3>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="First Name" name="first_name">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="Last Name" name="last_name">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-envelope"></span>
							<input type="email" class="form-control" placeholder="Email" name="email">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-lock"></span>
							<input type="password" class="form-control" placeholder="Password" autocomplete="new-password" name="password">
						</div>
						<div class="form-holder">
							<span class="lnr lnr-lock"></span>
							<input type="password" class="form-control" placeholder="Confirm Password" autocomplete="new-password" name="c_password">
						</div>
						
						<button type="submit" name="reset_user">
							<span>Reset</span>
						</button>
					</form>

				<?php }else {?>

					<form action="controllers/loginController" method="POST">
						<h3>Existing Account?</h3>
						<div class="form-holder">
							<span class="lnr lnr-user"></span>
							<input type="text" class="form-control" placeholder="Username / Email" name="username">
						</div>
						<div class="form-holder" style="margin-bottom:50px">
							<span class="lnr lnr-lock"></span>
							<input type="password" class="form-control" placeholder="Password" autocomplete="new-password" name="password">
						</div>

						<input type="checkbox" name="conditions" value="accecpt" checked> Keep me signed in<br>

						<button type="submit" name="login_user">
							<span>Login</span>
						</button>

						<div class="form-holder" style="margin-top:50px">
							<a href="Login?Reset"><span class="lnr lnr-lock"></span><span class="form-control" style="border-bottom: none; padding: 9px 42px 0px; color: #999">Forgot Your Password? <span></a>
						</div>
					</form>

				<?php } 

				if(isset($_GET['Register'])){
					echo "<a href='login'><img src='public/images/image-3.png' class='image-2'></a>";
				}else if(isset($_GET['Reset'])){
					echo "<a href='login'><img src='public/images/image-4.png' class='image-3'></a>";
				}else{
					echo "<a href='login?Register'><img src='public/images/image-2.png' class='image-3'></a>";
				}
				
				?>
				
			</div>
			
		</div>
		
		<script src="public/js/jquery.min.js"></script>
	</body>
</html>