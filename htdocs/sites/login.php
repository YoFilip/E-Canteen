<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";
$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_SESSION["user_id"]))
{
    header("Location: konto");
        exit;
}

if (isset($_POST["login"])) {

    $fixedEmail = htmlentities($_POST["email"]);
    $fixedPassword = htmlentities($_POST["password"]);

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=? AND (password=? OR (recovercode != '000000' AND recovercode = ?))");
    mysqli_stmt_bind_param($stmt, "sss", $fixedEmail, $fixedPassword, $fixedPassword);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($result) == 1) {

        $stmt2 = mysqli_prepare($conn, "UPDATE users SET recovercode = '000000', recovercodeexpiretime = 0");
        mysqli_stmt_execute($stmt2);

        $user = mysqli_fetch_assoc($result);
        $_SESSION["user_id"] = $user["id"];
        $_SESSION["username"] = $user["email"];
        header("Location: zamowienie");
        exit;
    } else {
        $error_msg = "Niepoprawny login lub hasło";
    }
}
?>

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/login.css">
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
                        <li><a href="zaloguj" data-after="Service" class="login">Login</a></li>
                        <li><a href="rejestracja" data-after="Projects" class="login">Register</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- End Header -->

    <div class="wrapper">
        <header>
            <h1>Logowanie</h1>
            <br>
        </header>

        <div class="form">
            <?php if (isset($error_msg)) { ?>
            <p id='error'><?php echo $error_msg; ?></p>
            <?php } ?>
            <form method="post" action="zaloguj">
                <label>Email:</label>
                <input type="email" name="email" required><br><br>
                <label>Hasło:</label>
                <input type="password" name="password" required>
                <button type="submit" name="login" value="Zaloguj">Zaloguj</button>
            </form>
            <a href="odzyskaj-haslo"><button>Nie pamiętam hasła</button></a>
        </div>

    </div>
</body>

<script src="../scripts/app.js"></script>

</html>