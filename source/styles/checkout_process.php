<?php
// Подключение к базе данных MySQL
$servername = "localhost"; // Имя сервера базы данных
$username = "username"; // Ваше имя пользователя базы данных
$password = "password"; // Ваш пароль базы данных
$dbname = "database"; // Имя вашей базы данных

// Создание соединения с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка соединения
if ($conn->connect_error) {
    die("Ошибка подключения к базе данных: " . $conn->connect_error);
}

// Получение данных из формы
$product_name = $_POST['product_name'];
$quantity = $_POST['quantity'];
$customer_name = $_POST['customer_name'];
$email = $_POST['email'];
$phone = $_POST['phone'];

// SQL запрос для вставки данных в таблицу
$sql = "INSERT INTO orders (product_name, quantity, customer_name, email, phone, created_at) 
        VALUES ('$product_name', '$quantity', '$customer_name', '$email', '$phone', NOW())";

// Проверка успешности выполнения запроса
if ($conn->query($sql) === TRUE) {
    echo "Заказ успешно оформлен.";
} else {
    echo "Ошибка при оформлении заказа: " . $conn->error;
}

// Закрытие соединения с базой данных
$conn->close();
?>
