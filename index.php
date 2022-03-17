<?php

//Display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Import classes
require_once('src/classes.inc.php');

$visitor = new Visitor();

// Echo"<pre>";
// var_dump(get_defined_vars());
// Echo"</pre><br><br>";

?>
<html>
	<head>
		<title>Rain or Shine</title>
		<link href="css/style.css" rel="stylesheet" type="text/css" />
	</head>
	<body>
		<div class="container">
			<div class="panel">
				<h2>Rain or Shine</h2>
				<div class="navigation">
					<ul>
						<li>
							<a class="active" href="index.php">Home</a>
						</li>
						<li>
							<a href="?action=leaderboard">Leaderboard</a>
						</li>
						<li>
							<a href="?action=about">About</a>
						</li>
						<li class="navright">
							<a href="?action=login">Log In</a>
						</li>
					</ul>
				</div>
				<div class="content">
					<p>Rain or Shine displays user's local weather conditions as provided by OpenWeatherMap</p>
                    <div class="wrapper">
                        <?php

						Echo "<div class=\"box\">
							<div class=\"metric\">
								<p><img src=\"{$visitor->icon}\"/></p>
							</div>
							<div class=\"metric\">
								<h4>{$visitor->city}, {$visitor->state}</h4>
								<p>{$visitor->timestamp}</p>
							</div>
							<div class=\"metric\">
								<h4>{$visitor->temp}°F and {$visitor->description}</h4>
								<p>Weather</p>
							</div>
							<div class=\"metric\">
								<h4>{$visitor->tempMax}°F / {$visitor->tempMin}°F</h4>
								<p>Daily High / Low</p>
							</div>
							<div class=\"metric\">
								<h4>{$visitor->humidity}%</h4>
								<p>Humidity</p>
							</div>
						</div>";

                        ?>
                    </div>
				</div>
				<div class="requestform">
					<form form method="post" action="?p=rsub">
						<h2>Share</h2>
						<p >Share your weather to compete with others from around the globe. Find out who is the true weather master!</p>
						<p>
							<input name="name" id="name" value="" placeholder="Your Name">
						</p>
						<button class="actionbutton request" type="submit" name="submit" id="submit">Post Weather To Leaderboard</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>