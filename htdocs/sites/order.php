<!DOCTYPE html>
<html lang="pl">
<?php
        session_start();

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "canteen";

        $conn = mysqli_connect($servername, $username, $password, $dbname);

        if (!isset($_SESSION["username"]) || empty($_SESSION["username"])) {
            header("location: zaloguj");
            exit();
}
?>

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/order.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

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
                        <li><a href="administrator" data-after="Projects">Admin Panel</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>


    <div class="wrapper">

        <header>
            <h1>Zamówienie</h1>
            <br>
            <p>Wybierz danie: </p>
        </header>

        <div class="form">

            <label><input type="checkbox" id="Barszcz biały" value="Barszcz biały" spellcheck="false">Barszcz biały</label>
            <label><input type="checkbox" id="Kotlet schabowy panierowany" value="Kotlet schabowy panierowany" spellcheck="false">Kotlet schabowy panierowany</label>
            <label><input type="checkbox" id="Stek w jajku" value="Stek w jajku" spellcheck="false">Stek w jajku</label>
            <label><input type="checkbox" id="Kopytka z sosem pieczarkowym" value="Kopytka z sosem pieczarkowym" spellcheck="false">Kopytka z sosem pieczarkowym</label>
            <label><input type="checkbox" id="Ziemniaki" value="Ziemniaki" spellcheck="false">Ziemniaki</label>
            <label><input type="checkbox" id="Surówka" value="Surówka" spellcheck="false">Surówka</label>
            <label><input type="checkbox" id="Kompot" value="Kompot" spellcheck="false">Kompot</label>

            <button id="btn">Generuj kod QR</button>

        </div>
        <div class="qr-code">
            <img src="" alt="qr-code">
        </div>
    </div>
    <script src="../scripts/QR.js"></script>
    <script src="../scripts/app.js"></script>

</body>

</html>