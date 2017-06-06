<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
		<link rel="stylesheet" href="/assets/css/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="/assets/js/materialize.js"></script>
	</head>
	<body>
		<div class="row">
			<nav>
				<div class="nav-wrapper">
					<div class="container">
						<div class="col s12 grey darken-3">
							<a class="brand-logo">Walls</a>
							<ul id="nav-mobile" class="right hide-on-med-and-down">
								<li><a href="/">Home</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="row">
			<div class="container">
				<div class="col s12 m4 l4">
					<form action="register" method="post">
						<h3>Register</h3>
						<div class='row'>
							<div class="input-field">
								<i class="mdi-action-account-circle prefix"></i>
								<input type="text" id="icon_prefix" class="validate" name="first_name">
								<label for='icon_prefix'>First Name</label>
							</div>
						</div>
						<div class='row'>
							<div class="input-field">
								<i class="mdi-action-account-circle prefix"></i>
								<input type="text" id='icon_last'class="validate" name="last_name">
								<label for='icon_last'>Last Name</label>
							</div>
						</div>
						<div class='row'>
							<div class="input-field">
								<i class="mdi-communication-email prefix"></i>
								<input type="email" id='email' class="validate" name="email">
								<label for='email'>Email</label>
							</div>
						</div>
						<div class='row'>
							<div class='input-field'>
								<i class="mdi-communication-vpn-key prefix"></i>
								<input type="password" id='icon_pass' class="input-field" name='password'>
								<label for="icon_pass">Password</label>
							</div>
						</div>
						<div class='row'>
							<div class='input-field'>
								<i class="mdi-communication-vpn-key prefix"></i>
								<input type="password" id='icon_cpass' class="input-field" name="confirm_password">
								<label for="icon_cpass">Confirm Password</label>
							</div>
						</div>
						<input type="hidden" name="action" value="register">
						<button class="btn deep-purple lighten-1" type="submit">Sign in</button>
					</form>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class='col s12 m4 l4'>
					<a href="/signin">Already have an account? Log in</a>
				</div>
			</div>
		</div>
	</body>
</html>