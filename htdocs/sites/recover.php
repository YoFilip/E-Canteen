

<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/recover.css">
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

    <div id="recover" class="wrapper">
        <header>
       
            <section>
            <h2>Zmiana Hasła</h2>
            <form method="post"><br><br>
                <label for="new_password">Podaj email:</label>
                <input type="email" name="email" required placeholder="Email"><br><br>
                <button type="submit" >Wyślij</button>

                <?php

session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";
if(isset($_SESSION["user_id"]))
{
    header("Location: konto");
        exit;
}

if(isset($_POST['email']))
{
    $fixedEmail = htmlentities($_POST['email']);
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $fixedEmail);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);


    if (mysqli_num_rows($result) == 1) {
        //$user = mysqli_fetch_assoc($result);
        $userEmail = $_POST['email'];

        $randomRecoverCode = strval(rand(111111, 999999));

        $mailChallenge = mail ("$userEmail", 'Odzyskiwanie hasła, MyCanteen', "Oto twój kod do odzyskania hasła: $randomRecoverCode. Użyj go do zalogowania się podając go jako hasło a następnie jak najszybciej zmień hasło w ustawieniach konta. Pośpiesz się ponieważ kod nie będzie działać wiecznie i zostanie zdezaktywowany zaraz po zalogowaniu!", "Content-Type: text/html; charset=UTF-8");
        
        if($mailChallenge == true)
        {
            echo "<br><br>Wysłano na twoją pocztę ($userEmail) kod odzyskiwujący, sprawdź swoją skrzynkę odbiorczą oraz ".'<a href="zaloguj">zaloguj się</a> ponownie!';
            $stmt2 = mysqli_prepare($conn, "UPDATE users SET recovercode = ?, recovercodeexpiretime = 300 WHERE email = ?");
            mysqli_stmt_bind_param($stmt2, "ss", $randomRecoverCode, $userEmail);
            mysqli_stmt_execute($stmt2);
        }
        else{
            echo "Wystąpił błąd, nie udało się wysłać wiadomości!";
        }


    } else {
        $error_msg = "Niepoprawny adres email (żaden z użytkowników nie posiada takiego adresu)";
        echo $error_msg;
    }

}


?>

            </form>
        </section>
            </header>
    </div>
</body>
<script src="../scripts/app.js"></script>
<script src="../scripts/QR.js"></script>

</html>
