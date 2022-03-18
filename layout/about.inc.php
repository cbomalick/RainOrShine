<?php

Echo"<div class=\"navigation\">
    <ul>
        <li>
            <a href=\"index.php\">Home</a>
        </li>
        <li>
            <a href=\"?action=leaderboard\">Leaderboard</a>
        </li>
        <li>
            <a class=\"active\" href=\"?action=about\">About</a>
        </li>
        <li class=\"navright\">
            <a href=\"?action=login\">Log In</a>
        </li>
    </ul>
</div>"; 
Echo "
    <div class=\"content\">
        <p>
            Rain or Shine was developed as a project to gain experience working with and developing APIs. The back end is written in PHP and MySQL, while the front end leverages jQuery.
        </p>
        <p>
            This project is <a class=\"clickable\" href=\"https://github.com/cbomalick/RainOrShine\">Open Source</a> and takes advantage of the following external APIs:
            <ul>
                <li>
                    Geoplugin, to convert a visitor's IP address into city, state, longitude, and latitude
                </li>
            </ul>
            <ul>
                <li>
                    OpenWeatherMap, to provide the weather details for the visitor's location
                </li>
            </ul>
        </p>
    </div>";

?>