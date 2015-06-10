<html>
	<head>
		<title>Edit Profile</title>
		<link rel="stylesheet" href="/assets/css/materialize.css">
		<link rel="stylesheet" href="/assets/css/custom.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
		<script src="/assets/js/materialize.js"></script>
	</head>
	<body>
		<div class="row">
			<nav>
				<div class="nav-wrapper">
					<div class="col s10 grey darken-3 offset-s1">
						<a href="#" class="brand-logo">Walls</a>
						<ul id="nav-mobile" class="right hide-on-med-and-down">
							<li><a href="/dashboard">Dashboard</a></li>
							<li><a href="/">Profile</a>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<!--need to add the form features of materialize. Also need to finish adding the rest of the form elements to the page-->
		<div class="container">
			<div class='row'>
				<div class="col s12">
					<h4>Edit profile</h4>
				</div>
				<div class="col s6">
					<h5>Edit Information</h5>
					<form action="" method="post">
						<div class='input-field'>
							<label>Email Address</label>
							<input type="text" name='email'>
						</div>
						<div class='input-field'>
							<label>First Name</label>
							<input type="text" name='first_name'>
						</div>
						<div class='input-field'>
							<label>Last Name</label>
							<input type="text" name='last_name'>
						</div>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>