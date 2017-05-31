<html>
	<head>
		<title>User Dashboard</title>
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
							<li><a href="/users/edit">Profile</a>
						</ul>
					</div>
				</div>
			</nav>
		</div>
		<div class='row'>
			<div class='col s10 offset-s1'>
				<h3>All Users</h3>
			</div>
		</div>
		<div class="row">
			<div class="col s10 offset-s1">
				<table class='striped'>
					<thead>
						<th>ID</th>
						<th>Name</th>
						<th>Email</th>
						<th>Date joined</th>
						<th>User Level</th>
					</thead>
					<tbody>
					<?php foreach($users as $user): ?>
					<tr>
						<td><?=$user['id']?></td>
						<td><a href=<?php echo "/users/show/{$user['id']}";?>><?=$user['first_name']?> <?=$user['last_name']?></a></td>
						<td><?=$user['email']?></td>
						<td><?=$user['created_at']?></td>
						<td><?=$user['user_lvl']?></td>
					</tr>
				<?php endforeach; ?>
					</tbody>
				</table>
			</div>	
		</div>
	</body>
</html>