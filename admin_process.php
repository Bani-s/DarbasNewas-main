<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $newGame = $_POST['game'];
    $tier = $_POST['tier'];


    $games = json_decode(file_get_contents('games.json'), true);

    $games[$tier][] = $newGame;

    file_put_contents('games.json', json_encode($games, JSON_PRETTY_PRINT));

    header('Location: admin.php');
}
?>
