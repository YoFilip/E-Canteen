<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

$conn = mysqli_connect($servername, $username, $password, $dbname);


$user_id = $_SESSION['user_id'];
$query = "SELECT name, email, card FROM users WHERE id = $user_id";
$result = mysqli_query($conn, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/card.css">
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
                        <li><a href="konto" data-after="Service" class="login">Wyjdź</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="wrapper">

        <header>
            <h1>Zamówienie</h1>
            <br>

            <p>Zalogowany jako: <?php echo $user['name']; ?></p>
            <p>Ilość dostępnych kuponów: <?php echo $user['card']; ?></li>
            </p>

            <br><br>
            <p>Wprowadź liczbę kuponów  które chcesz dodać: </p>
        </header>

        <div class="form">
            <input type="number" id="numTickets" min="1" placeholder="Liczba kartek">
            <button id="generateQR">Generuj kod QR</button>
        </div>

        <div class="qr-code">
            <img src="" alt="qr-code">
        </div>

    </div>
    <script src="../scripts/CardQR.js"></script>
    <script src="../scripts/app.js"></script>
    <script>
    document.getElementById("generateQR").addEventListener("click", function() {
        const numTickets = document.getElementById("numTickets").value;
        if (numTickets > 0) {
            generateQRCode(`Dodano: ${numTickets} kartek`);
        }
    });

    function generateQRCode(data) {
        const qrCodeImage = document.querySelector(".qr-code img");
        qrCodeImage.src = `https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=${encodeURIComponent(data)}`;
    }
    </script>
</body>

</html>