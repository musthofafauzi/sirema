<!DOCTYPE html>
<html>
<head>
  
	<title>LOGIN</title>
  <?php link_js('includes/lib/pea/includes/formIsRequire.js', false); ?>
	<!-- <link rel="stylesheet" type="text/css" href="slide navbar style.css"> -->
<link href="https://fonts.googleapis.com/css2?family=Jost:wght@500&display=swap" rel="stylesheet">
</head>
<body>
	<div class="body-login">
	<div class="main-login">  	
		<input type="checkbox" id="chk" aria-hidden="true">

			<div class="signup">
				<form class="form-signin formIsRequire" method="POST" action="">
					<label class="label-login" for="chk">Sign up</label>
					<input class="input-login" type="text" placeholder="<?php echo lang('Username');?>" req="any true" autofocus="" type="username" name="usr" />
					<input class="input-login" type="password" placeholder="<?php echo lang('Password');?>" req="any true" type="password" name="pwd" />
					<button class="button-login" type="submit"><?php echo lang('Login');?></button>
				</form>
			</div>

			<div class="login">
				<form>
					<label class="label-login" for="chk" aria-hidden="true">Login</label>
					<input class="input-login" type="email" name="email" placeholder="Email" required="">
					<input class="input-login" type="password" name="pswd" placeholder="Password" required="">
					<button class="button-login">Login</button>
				</form>
			</div>
	</div>
	</div>
</body>
</html>