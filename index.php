<?php

//Display all errors
error_reporting(E_ALL);
ini_set('display_errors', 1);

//Import classes
require_once('src/classes.inc.php');

if (isset($_GET['action'])) {
	$action = $_GET['action'];
} else {
	$action = "";
}

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
		switch($action){
			default:
			$visitor = new Visitor();
			Echo'<script type="text/javascript">
			postJSON = function() {
			var resultDiv = $("#resultDivContainer");
			$.ajax({
				url: "api.php?action=post",
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
				break;
			case"leaderboard":
				break;
			case"about":
				break;
		}
		
		?>
	</head>
	<body>
		<div class="container">
			<div class="panel">
				<h2>Rain or Shine</h2>
				<? 
					switch($action){
						default:
							require_once('layout/home.inc.php');
						break;

						case"leaderboard":
							require_once('layout/leaderboard.inc.php');
						break;

						case"about":
							require_once('layout/about.inc.php');
						break;
					}
				?>
				</div>
			</div>
		</div>
	</body>
</html>