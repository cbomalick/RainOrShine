<?php

Echo"<div class=\"navigation\">
    <ul>
        <li>
            <a href=\"index.php\">Home</a>
        </li>
        <li>
            <a class=\"active\" href=\"?action=leaderboard\">Leaderboard</a>
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
    ".$post=(new Post())->printLast(10)."
    </div>
    </div>";

?>