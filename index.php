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
		<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
		<? 
		
		Echo'<script type="text/javascript">
		JSONTest = function() {
			var resultDiv = $("#resultDivContainer");
			$.ajax({
				url: "https://scrillas.com/projects/api/api.php?action=post",
				type: "POST",
				data: JSON.stringify( { "city": "'.$visitor->city.'", "state": "'.$visitor->state.'", "temp": '.$visitor->temp.', "description": "'.$visitor->description.'", "icon": "'.$visitor->icon.'", "tempMin": '.$visitor->tempMin.', "tempMax": '.$visitor->tempMax.', "humidity": '.$visitor->humidity.'} ),
				contentType: "application/json; charset=utf-8",
				success: function (result) {
					switch (result) {
						case true:
							processResponse(result);
							break;
						default:
							resultDiv.html(result);
					}
				},
				error: function (xhr, ajaxOptions, thrownError) {
				alert(xhr.status);
				}
			});
		};

		</script>';
		
		?>
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
								<p><img src=\"http://openweathermap.org/img/wn/{$visitor->icon}@2x.png\"/></p>
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
							<div id="resultDivContainer"></div>
						</p>
						<button class="actionbutton request" type="button" onclick="JSONTest()" name="submit" id="submit">Post Weather To Leaderboard</button>
					</form>
				</div>
			</div>
		</div>
	</body>
</html>