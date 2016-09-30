<!DOCTYPE html>
<html>
  <head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Rankings - Goal Votes</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="styles/header.css">
		<link rel="stylesheet" href="styles/rank.css">
		<script type="text/javascript" src="javascript.js" ></script>
	</head>
	<body>
		<div id="main_container">
			<div id="wrapper">
				<ul>
					<div id="title">
						<a href="http://goalvotes.com">
							<img border="0" src="../images/title.png" width="226px" height="30px">
						</a>
					</div>
						<li> <a href="">League</a>
						<ul>
						<li><a href="http://goalvotes.com">All</a></li>
						<li><a href="http://goalvotes.com/champions.php">Champions League</a></li>
						<li><a href="http://goalvotes.com">English Premier League</a></li>
						</ul>
					</li>
					<li><a href="http://goalvotes.com/rankings.php">Rankings</a></li>
					<li id="about"><a href="http://goalvotes.com/about.php">About</a></li>
				</ul>
			</div>
		</div>
		
		<p class="rankings"><?php include 'functions/rank.php' ?></p>
		
	</body>
</html>