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
				<div class="nav-wrapper">
					<div class="col s10 grey darken-3 offset-s1">
						<a href="#" class="brand-logo">Fakeblock</a>
						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="/">Home</a></li>
						</ul>
					</div>
				</div>
			</div>
		</nav>
		<div class="row">
			<form action="/login" method="post">
				<div class="col s3 offset-s1">
					<h3>Sign in</h3>
					<div class='input-field'>
						Email Address: <input type='text' name="email">
					</div>
					<div class='input-field'>
						Password: <input type="password" name='password'>
					</div>
					<input type="hidden" name="action" value="login">
					<button class="btn deep-purple lighten-1" type="submit">Sign in</button>
				</form>
			</div>
		</div>
		<div class="row">
			<div class='col s3 offset-s1'>
				<a href="/register">Don't have an account? Register</a>
			</div>
		</div>
	</body>
</html>