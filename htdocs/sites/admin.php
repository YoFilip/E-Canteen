<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec - Panel Administratora</title>
    <link rel="stylesheet" href="../styles/admin.css">
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
                        <li><a href="administrator" data-after="Home" class="login">Admin Panel</a></li>
                        <li><a href="konto" data-after="Service" class="login">Wyjdź</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header-->
    <div class="wrapper">
        <?php session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

    $conn=mysqli_connect($servername, $username, $password, $dbname);

    // Sprawdzenie, czy użytkownik jest zalogowany i ma uprawnienia administratora
    if(isset($_SESSION["username"])) {
        $email=$_SESSION["username"];
        $sql="SELECT is_admin FROM users WHERE email='$email'";
        $result=mysqli_query($conn, $sql);
        $row=mysqli_fetch_assoc($result);
        $is_admin=$row["is_admin"];

        if($is_admin==1) {
            // Tutaj umieszczamy kod dla panelu administratora
            echo "<h1>Panel Administratora</h1>";
            echo "<p>Witaj, ".$email."!</p>";
        }
        else {
            // Użytkownik nie ma uprawnień administratora, przekierowanie na stronę logowania
            echo "<p id='error'>Nie posiadasz uprawnień administratora.</p>";
            header("Location: zamowienie");
            exit;
        }
    }
    else {
        // Użytkownik nie jest zalogowany, przekierowanie na stronę logowania
        echo "<p id='error'>Nie jesteś zalogowany.</p>";
        header("Location: zaloguj");
        exit;
    }
?>
        <br><br>
        <!--Scaner QR -->
        <div id="qr-reader" class="qr"></div>
        <br>
        <div id="qr-text" style="margin-left:40px"></div>
    </div>

</body>
<script src="../scripts/app.js"></script>
<script src="../scripts/QR.js"></script>
<script src="../scripts/qr-scanner.js"></script>
<script>
let lastScannedText = null;


function onScanSuccess(decodedText, decodedResult) {
    console.log(`Code scanned = ${decodedText}`, decodedResult);

    if (decodedText === lastScannedText) {
        return;
    }

    document.getElementById("qr-text").innerHTML = decodedText;

    // Sprawdzenie, czy zeskanowany tekst zaczyna się od "Dodano:"
    if (decodedText.startsWith("Dodano:")) {
        const numTickets = parseInt(decodedText.substr(7));
        updateCardCount(true, numTickets);
    } else if (decodedText.startsWith("Zamówienie:")) {
        updateCardCount(false, 1);
    }

    lastScannedText = decodedText;
}



var html5QrcodeScanner = new Html5QrcodeScanner(
    "qr-reader", {
        fps: 500,
        qrbox: 250
    });
html5QrcodeScanner.render(onScanSuccess);


function updateCardCount(isAdding, amount) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "update_card_count.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                console.log(xhr.responseText);
            } else {
                console.error('Error: ' + xhr.statusText);
            }
        }
    };
    xhr.send("isAdding=" + isAdding + "&amount=" + amount);
}
</script>

</html>