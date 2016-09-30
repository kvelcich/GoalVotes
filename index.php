<!DOCTYPE html>
<html>
  <head>
		<meta charset="UTF-8">
		<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
		<title>Goal Votes</title>
		<meta name="viewport" content="width=device-width">
		<link rel="stylesheet" href="styles/main.css">
		<link href='https://fonts.googleapis.com/css?family=Merriweather:400,700' rel='stylesheet' type='text/css'>
		<link href='https://fonts.googleapis.com/css?family=Roboto:700' rel='stylesheet' type='text/css'>
		<script type="text/javascript" src="javascript.js" ></script>
		<script src="javascript.js"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	</head>
  
	<header role="banner" class="header"></header>
 
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
	
	<main class="container">
		<article class="box" style="background-image: url('images/pattern6.png')">
			<div class="description">
				<div class="photo">
					<a id="wiki_1" target="_blank">
						<img id="photo_1" class="photo" src="images/players/loading.png">
					</a>
				</div>
				<div>
					<p id="name_1" class="name">Name</p>			
					<p id="about_1" class="goal-descr">Team Vs. Team</p>
					<div class="score">
						<img id="home_1" class="crest">
						<p id="score_1" class="num">0 - 0</p>
						<img id="away_1" class="crest">
					</div>
					<a href="#" class="big button" onclick="won(1)">Vote</a>
				</div>
			</div>
			<iframe class="iframe" id="video_1" style="border:none" frameBorder="0" scrolling="no" onclick="playPause(0)" loop></iframe>
		
		</article>
		
		<article class="box" style="background-image: url('images/pattern6.png')">
			<div class="description">
				<div class="photo">
					<a id="wiki_2" target="_blank">
						<img id="photo_2" class="photo" src="images/players/loading.png">
					</a>
				</div>
				<div>
					<p id="name_2" class="name">Name</p>			
					<p id="about_2" class="goal-descr">Team Vs. Team</p>
					<div class="score">
						<img id="home_2" class="crest">
						<p id="score_2" class="num">0 - 0</p>
						<img id="away_2" class="crest">
					</div>
					<a href="#" class="big button" onclick="won(2)">Vote</a>
				</div>
			</div>
			<iframe class="iframe" id="video_2" style="border:none" frameBorder="0" scrolling="no" onclick="playPause(0)" loop"></iframe>
		</article>
		
	</main>
	
	<script>
		var id_1, id_2, rating_1, rating_2;
		var obj1, obj2;
	
		function load() {
			$.ajax({ url: 'functions/functions.php',
				data: {action: 'load', num: 0},
				type: 'post',
				success: function(output) {					
					var myObj= jQuery.parseJSON(output);
					obj1 = output;

					document.getElementById("name_1").textContent = myObj[0].name;
					document.getElementById("wiki_1").href = myObj[0].wiki;
					document.getElementById("photo_1").src = myObj[0].photo;
					document.getElementById("about_1").textContent = myObj[0].about;
					document.getElementById("home_1").src = myObj[0].home;
					document.getElementById("away_1").src = myObj[0].away;
					document.getElementById("score_1").textContent = myObj[0].score;
					document.getElementById("video_1").src = myObj[0].video;

					id_1 = myObj[0].id;
					rating_1 = myObj[0].rating;
				}
			});
			$.ajax({ url: 'functions/functions.php',
				data: {action: 'load', num: id_1},
				type: 'post',
				success: function(output) {
					var myObj= jQuery.parseJSON(output);
					obj2 = output;
				
					document.getElementById("name_2").textContent = myObj[0].name;
					document.getElementById("wiki_2").href = myObj[0].wiki;
					document.getElementById("photo_2").src = myObj[0].photo;
					document.getElementById("about_2").textContent = myObj[0].about;
					document.getElementById("home_2").src = myObj[0].home;
					document.getElementById("away_2").src = myObj[0].away;
					document.getElementById("score_2").textContent = myObj[0].score;
					document.getElementById("video_2").src = myObj[0].video;
				
					id_2 = myObj[0].id;
					rating_2 = myObj[0].rating;
				}
			});
		}
	
		function won(winner) {
			$.ajax({ url: 'functions/functions.php',
				data: {action: 'won', won: winner, id1: id_1, id2: id_2, r1: rating_1, r2: rating_2},
				type: 'post',
				success: function(output) {
				}
			});
			load();
		}
	
		load();
	</script>
</body>
</html>