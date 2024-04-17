<?php
session_start();
$tiers = ['S', 'A', 'B', 'C', 'D'];
// Patikrinkite, ar vartotojas yra autentifikuotas
if (!isset($_SESSION["authenticated"]) || $_SESSION["authenticated"] !== true) {
    // Jei neautentifikuotas, nukreipkite į prisijungimo puslapį
    header("Location: Login.php");
    exit;
}

// Įkele games.json failą
$games = json_decode(file_get_contents('games.json'), true);
if ($games === null) {
    $games = [
        'S' => [],
        'A' => [],
        'B' => [],
        'C' => [],
        'D' => [],
    ];
}

// Atnaujinkite games.json su textarea turiniu
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $main = [];
    foreach ($tiers as $tier) {
        if (isset($_POST[$tier])) {
            $main[$tier] = explode("\n", $_POST[$tier]);
        }
    }
    file_put_contents('games.json', json_encode($main, JSON_PRETTY_PRINT));
}

?>

<!DOCTYPE html>
<html lang="lt">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admino Panelė</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <nav>
        <div class="container">
            <h1>Admino Panelė</h1>
            <li class="dropdown">
                <a href="#" class="dropbtn">Kategorijos</a>
                <div class="dropdown-content">
                    <a href="Home.php">Pagrindinis</a>
                    <a href="Logout.php">Atsijungti</a>
                </div>
            </li>
        </div>
    </nav>
    <div class="container">


        <!-- Textareas Lygiai -->
        <div>
            <h1>Lygiai</h1>
            <form action="" method="POST">

                <?php
                
                foreach ($tiers as $tier)
                
                {
                    echo "<h2>$tier Lygis:</h2>";
                    echo "<textarea name='$tier' id='$tier' cols='30' rows='10'>" . implode("\n", $games[$tier]) . "</textarea>";
                }
                ?>
                <input type="submit" value="Išsaugoti Pakeitimus">
            </form>

        </div>

        <form action="admin.php" method="post">
            <input type="hidden" name="action" value="update">

        </form>
    </div>
</body>

</html>
