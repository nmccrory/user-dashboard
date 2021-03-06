<html>
	<head>
		<title>User Information</title>
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
						<a href="#" class="brand-logo">Walls</a>
						<div class="col s4 offset-s1">
							<ul id="nav-mobile">
								<li><a href="/dashboard">Dashboard</a></li>
								<!-- <li><a href="/users/edit">Profile</a> -->
							</ul>
						</div>
						<div class='col s3 offset-s4' style="text-align:right">
							<ul id="nav-mobile">
								<li>Welcome, <?=$this->session->userdata('logged_user')['first_name']?></li>
								<li><a href='/logout'>Log Out</a></li>
							</ul>
						</div>
					</div>
				</div>
			</nav>
		</div>
		<div class="container">
			<div class="row">
				<div class='col s12'>
						<h5><?=$user['first_name']?> <?=$user['last_name']?></h5>
				</div>
			</div>
		</div>
		<div class='container'>
			<div class='row'>
				<div class='col s12'>
					<p>Email: <?=$user['email']?></p>
					<p>Joined on <i><?php 
						$dt = new DateTime($user['created_at']);
						echo $dt->format('M j, Y'); 
						?></i></p>
				</div>
			</div>
		</div>
		<div class="container">
			<div class="row">
			    <form class="col s12" action="/post_message" method='post'>
			      	<div class="row">
			        	<div class="input-field col s10">
			          		<textarea id="textarea1" class="materialize-textarea" name='content'></textarea>
			          		<label for="textarea1">Post</label>
			        	</div>
			      	  	<div class='col s4'>
			      	  		<input type="hidden" name='wallid' value=<?=$user['id']?>>
			      			<button type='submit' class='btn deep-purple lighten1'>Post</button>
			      		</div>  	
		      		</div>
			    </form>
			 </div>
		</div>
		 <?php foreach($messages as $message): ?>
	<div class="container">
		 <div class='row'>
			<div class="col s12">
				<div class="col s2">
					<h6><a href=<?php echo "/users/show/{$message['user_id']}";?>><?=$message['first_name']?> <?=$message['last_name']?></a></h6>
				</div>
				<div class="col s10" style='text-align:right'>
					<h6><i><?php 
						$dt = new DateTime($user['updated_at']);
						echo $dt->format('M j, Y h:ma'); 
						?></i></h6>
				</div>
				<div class="col s12 deep-purple lighten-4">
					<p><?=$message['message']?></p>
				</div>
			</div>
			<div class="col s12">
				<?php foreach($comments as $comment): ?>
				<?php if($comment['post_id'] == $message['id']): ?>
					<div class="col s2 offset-s2">
						<h6><a href=<?php echo "/users/show/{$comment['user_id']}";?>><?=$comment['first_name']?> <?=$comment['last_name']?></a></h6>
					</div>
					<div class="col s8" style='text-align:right'>
						<h6><i><?php 
						$dt = new DateTime($user['updated_at']);
						echo $dt->format('M j, Y h:ma'); 
						?></i></h6>
					</div>
					<div class="col s10 offset-s2 deep-purple lighten-5">
						<p><?=$comment['comment']?></p>
					</div>
					<?php endif;
				endforeach; ?>
					<div class="col s10 offset-s2">
						<form class='col s12' action="/comment" method="post">
							<div class="row">
								<div class='input-field col s12'>
									<input type='hidden' name='postid' value=<?=$message['id']?>>
									<input type='hidden' name='wallid' value=<?=$user['id']?>>
									<input type="text" name="comment">
								</div>
								<div class="col s12" style="text-align:right">
									<button type='submit' class='btn btn-s deep-purple lighten1'>Comment</button>
								</div>
							</div>
						</form>
					</div>
			</div>
		</div>
	</div>
		<?php endforeach; ?>
	</body>
</html>