<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if (!isset($_SESSION['user_id'])) {
    header('Location: zaloguj');
    exit();
}

$user_id = $_SESSION['user_id'];
$query = "SELECT name, email, card FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);


if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_password'])) {
    $new_password = htmlentities($_POST['new_password']);
    $query = sprintf("UPDATE users SET password = '%s' WHERE id = '%s'", mysqli_real_escape_string($conn, $new_password), mysqli_real_escape_string($conn, $user_id));

    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn).'<br>'.$query);
    }
}

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['new_email'])) {
    $new_email = $_POST['new_email'];
    $query = "UPDATE users SET email = '$new_email' WHERE id = $user_id";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Query failed: " . mysqli_error($conn));
    }
    $user['email'] = $new_email;
}
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/account.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

    <!-- Header -->
    <section id="header">
        <div class="header container" style="background-color: #282B2C;">
            <div class="nav-bar">
                <div class="nav-list">
                    <div class="hamburger">
                        <div class="bar"></div>
                    </div>
                    <ul>
                        <li><a href="zamowienie" data-after="Home">Zamawiam</a></li>
                        <li><a href="konto" data-after="Service">Konto</a></li>
                        <li><a href="kartki" data-after="Service">Kupony</a></li>
                        <li><a href="administrator" data-after="Projects">Admin Panel</a></li>

                    </ul>
                </div>
            </div>
        </div>
    </section>

    <div id="account" class="wrapper">
        <header>
            <h1>Konto</h1>
            <br>

            <p>Zalogowany jako: <?php echo $user['name']; ?></p>
            <p>Ilość dostępnych kuponów: <?php echo $user['card']; ?></li>
            </p>
        </header>

        <section>
            <h2>Zmień adres e-mail</h2>
            <form method="post">
                <label for="new_email">Nowy adres e-mail:</label>
                <input type="email" id="new_email" name="new_email" required placeholder="Nowy email">
                <button type="submit">Zmień adres e-mail</button>
            </form>
        </section>

        <section>
            <h2>Zmień hasło</h2>
            <form method="post">
                <label for="new_password">Nowe hasło:</label>
                <input type="password" id="new_password" name="new_password" required placeholder="Nowe hasło">
                <button type="submit">Zmień hasło</button>
            </form>
        </section>

        <form method="POST" action="wyloguj">
            <br>
            <button type="submit" name="logout">Wyloguj</button>
            </from>
    </div>
    </div>
</body>
<script src="../scripts/app.js"></script>
<script src="../scripts/QR.js"></script>

</html>