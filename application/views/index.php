<html>
	<head>
		<title>Great Number Game</title>
	</head>
	<body>
		<div id="contiainer">
			<?= $this->session->userdata['number'] ?>
			<?= $this->session->flashdata('result')?>
			<?= $this->session->flashdata('correct')?>
			<h1>Welcome to the Game</h1>
			<p>I am thinking of a number between 1 and 100</p>
			<p>Take a guess!</p>
			<form action="check" method="post">
				<input type="text" name="guess">
				<input type="submit" value="Submit">
			</form>
		</div>
	</body>
</html>