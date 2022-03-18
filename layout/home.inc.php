<?php
Echo"<div class=\"navigation\">
<ul>
    <li>
        <a class=\"active\" href=\"index.php\">Home</a>
    </li>
    <li>
        <a href=\"?action=leaderboard\">Leaderboard</a>
    </li>
    <li>
        <a href=\"?action=about\">About</a>
    </li>
    <li class=\"navright\">
        <a href=\"?action=login\">Log In</a>
    </li>
</ul>
</div>"; 

    Echo "
    <div class=\"content\">
    <p style=\"padding-left: 3px;\">Rain or Shine displays user's local weather conditions as provided by OpenWeatherMap</p>
    <div class=\"wrapper\">

    <div class=\"box\">
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
    </div>
</div>";

Echo"<div class=\"requestform\">
<form form method=\"post\" action=\"?p=rsub\">
    <h2>Share</h2>
    <p >Share your weather to compete with others from around the globe. Find out who is the true weather master!</p>
    <button class=\"actionbutton request\" type=\"button\" onclick=\"postJSON()\" name=\"submit\" id=\"submit\">Post Weather To Leaderboard</button>
    <p>
        <div id=\"resultDivContainer\"></div>
    </p>
</form>
</div>";
?>