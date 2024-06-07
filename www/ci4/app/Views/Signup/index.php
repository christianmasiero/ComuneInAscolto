<html>

<head>
	<meta charset="utf-8">
	<title>SignUp</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="author" content="Christian Masiero">
	<link rel="stylesheet"
		href="<?php echo base_url('fonts/material-design-iconic-font/css/material-design-iconic-font.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('css/styleSignup.css'); ?>">
	<!-- <link rel="stylesheet" href="<?php echo base_url('css/styleNuovaSegn.css'); ?>"> -->
</head>
<script src="<?php echo base_url('js/Dropdown.js'); ?>"></script>
<div class="wrapper" style="background-image: url('<?php echo base_url('images/backgroundSignup.jpg'); ?>');">
	<div class="inner">
		<div class="image-holder" style="padding-top: 65px; width: 45%; padding-left: 10px;">
			<img src="<?php echo base_url('images/Italia.png'); ?>" alt="Stemma repubblica italiana">
		</div>
		<form method="POST" action="<?php echo base_url('Utenti/Signingup'); ?>">
			<h3>Registrati</h3>
			<div class="form-group" style="margin-bottom: 0;">
				<input type="text" placeholder="First Name" class="form-control" name="nome">
				<input type="text" placeholder="Last Name" class="form-control" name="cognome">
			</div>
			<div class="form-wrapper">
				<input type="text" placeholder="Username" class="form-control" name="username">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="form-wrapper">
				<input type="text" placeholder="Email Address" class="form-control" name="email">
				<i class="zmdi zmdi-email"></i>
			</div>

			<div class="form-wrapper">
				<input type="text" placeholder="Telefono" class="form-control" name="telefono">
				<i class="zmdi zmdi-smartphone-iphone"></i>
			</div>
			<div class="form-wrapper">
				<input type="text" placeholder="Comune di residenza" class="form-control" id="searchInput" style="margin-bottom: 0;"
					name="comuneresidenza">
				<i class="zmdi zmdi-city"></i>
			</div>
			<div id="searchResults" class="searchResults"></div>



			<div class="form-wrapper">
				<input type="password" placeholder="Password" class="form-control" name="password" style="margin-top: 25px;">
				<i class="zmdi zmdi-lock"></i>
			</div>
			<div class="form-wrapper">
				<input type="password" placeholder="Confirm Password" class="form-control" name="confirm_password">
				<i class="zmdi zmdi-lock"></i>
			</div>
			<button>Register
				<i class="zmdi zmdi-arrow-right"></i>
			</button>
		</form>
	</div>
</div>
</div>
</body>

</html>