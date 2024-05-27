<?php
session_start();
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_applications";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);

    // Пример проверки пароля
    // В реальной системе пароль должен быть захеширован и проверка производится с хешем
    $sql = "SELECT * FROM users WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['email'] = $email;
        header("Location: ../profile.html");
    } else {
        echo "Неправильный email или пароль.";
    }
}

$conn->close();
?>
