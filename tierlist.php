<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Žaidimų Reitingas</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <nav>
        <div class="container">
            <h1>Pagrindinis Meniu</h1>
            <li class="dropdown">
                    <a href="#" class="dropbtn">Kategorijos</a> 
                    <div class="dropdown-content">
                        <a href="home.php">Pagrindinis</a>
                        <a href="Login.php">Administravimo Skydelis</a> 
                </li>
        </div>
    </nav>
    <div class="container">
    <h2>Žaidimų Reitingas</h2>
    <?php
    $games = json_decode(file_get_contents('games.json'), true);
    foreach ($games as $tier => $gamesInTier) {
        echo "<div class='tier'>";
        echo "<h3>$tier Lygis</h3>";
        echo "<div class='card-container'>";
        foreach ($gamesInTier as $game) {
            echo "<div class='card'>$game</div>";
        }
        echo "</div>";
        echo "</div>";
    }
    ?>
</div>

    </div>
</body>
</html>
