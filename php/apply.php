<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college_applicationss";

// Создание соединения
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = htmlspecialchars($_POST['name']);
    $email = htmlspecialchars($_POST['email']);
    $college = htmlspecialchars($_POST['college']);

    $stmt = $conn->prepare("INSERT INTO applications (name, email, college) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $name, $email, $college);

    if ($stmt->execute()) {
        echo "Заявка успешно отправлена.";
    } else {
        echo "Ошибка: " . $stmt->error;
    }

    $stmt->close();
}

$conn->close();
?>
