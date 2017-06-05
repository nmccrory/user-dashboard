<html>
	<head>
		<title>Home Page</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
		<link rel="stylesheet" href="/assets/css/custom.css">
		<script src="/assets/js/materialize.js"></script>
	</head>
	<body>
		<nav>
			<div class="row">
				<nav>
					<div class="nav-wrapper">
						<div class="container">
							<div class="col s12 grey darken-3">
								<a href="#" class="brand-logo">Walls</a>
								<ul id="nav-mobile" class="right hide-on-med-and-down">
									<li><a href="/">Home</a></li>
								</ul>
							</div>
						</div>
					</div>
				</nav>
			</div>
		</nav>
		<div class="row">
			<div class="container">
				<form action="/login" method="post">
					<div class="col s12 m3 offset-m1">
						<h3>Sign in</h3>
						<div class='input-field'>
							Email Address: <input type='text' name="email">
						</div>
						<div class='input-field'>
							Password: <input type="password" name='password'>
						</div>
						<input type="hidden" name="action" value="login">
						<button class="btn deep-purple lighten-1" type="submit">Sign in</button>
					</div>
				</form>
			</div>
		</div>
		<div class="row">
			<div class="container">
				<div class='col s12 m3 offset-m1'>
					<a href="/register">Don't have an account? Register</a>
				</div>
			</div>
		</div>
	</body>
</html>