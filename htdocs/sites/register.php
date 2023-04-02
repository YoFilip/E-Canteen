<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="utf-8">
    <title>Kantyna Sosnowiec</title>
    <link rel="stylesheet" href="../styles/register.css">
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
            <h1>Rejestracja</h1>
            <br>
        </header>

        <?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "canteen";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if(isset($_POST["register"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    $name = htmlentities($name);
    $email = htmlentities($email);
    $password = htmlentities($password);


    $stmt = mysqli_prepare($conn, "SELECT * FROM users WHERE email=?");
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if(mysqli_num_rows($result) != 0)
    {
        echo "<p id='error'>Podany adres email jest już używany!</p>";
    }
    else
    {
        $sql = sprintf("INSERT INTO users (name,email,password,recovercode,recovercodeexpiretime) VALUES ('%s','%s','%s','000000',0)", mysqli_real_escape_string($conn, $name), mysqli_real_escape_string($conn, $email), mysqli_real_escape_string($conn, $password));
        if(mysqli_query($conn,$sql))
        {
            header("location: zaloguj");
            echo "<p id='error'>Poprawnie zarejestrowano</p>";
        } 
        else
        {
            echo "<p id='error'>Błąd rejestracji:</p> " . mysqli_error($conn);
        }
    }

    
}
?>

        <div class="form">
            <form method="post" action="">
                <label>Imię:</label>
                <input type="text" name="name"><br><br>
                <label>Email:</label>
                <input type="email" name="email"><br><br>
                <label>Hasło:</label>
                <input type="password" name="password"><br><br>
                <button type="submit" name="register" value="Zarejestruj">Zarejestruj</button>
            </form>
        </div>
    </div>
</body>
<script src="../scripts/QR.js"></script>
<script src="../scripts/app.js"></script>

</html>