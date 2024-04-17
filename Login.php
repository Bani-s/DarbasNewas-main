<?php
session_start();

// Patikrinkite, ar buvo pateiktas prisijungimo forma
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Patikrinkite, ar vartotojo vardas ir slaptažodis yra teisingi (pakeiskite juos į savo tikrus prisijungimo duomenis)
    $username = "1";
    $password = "1";

    // Patikrinkite vartotojo vardą ir slaptažodį
    if ($_POST["username"] == $username && $_POST["password"] == $password) {
        // Autentifikacija sėkminga, nustatykite sesijos kintamąjį
        $_SESSION["authenticated"] = true;
        // Nukreipkite į admino panelę
        header("Location: admin.php");
        exit;
    } else {
        // Autentifikacija nepavyko, rodykite klaidos pranešimą
        $error_message = "Neteisingas vartotojo vardas ar slaptažodis";
    }
}
?>

<!DOCTYPE html>
<html lang="lt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Prisijungimas - Admino Panelė</title>
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
                        <a href="Login.php">Administravimo Skydelis</a>
                        <a href="tierlist.php">Lygių Sąrašas</a>
                    </div>
                </li>
            </ul>
        </div>
    </nav>
    <div class="container">
        <h2>Prisijungimas - Admino Panelė</h2>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div class="form-group">
                <label for="username">Vartotojo vardas:</label>
                <input type="text" id="username" name="username">
            </div>
            <div class="form-group">
                <label for="password">Slaptažodis:</label>
                <input type="password" id="password" name="password">
            </div>
            <div class="form-group">
                <input type="submit" value="Prisijungti">
            </div>
        </form>
        <?php if (isset($error_message)) echo "<p class='error'>$error_message</p>"; ?>
    </div>
</body>
</html>
