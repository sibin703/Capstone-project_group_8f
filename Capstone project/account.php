<?php
$host = 'your_database_host';
$dbname = 'your_database_name';
$username = 'your_username';
$password = 'your_password';

try {
    $dsn = "mysql:host=$host;dbname=$dbname";
    $pdo = new PDO($dsn, $username, $password);

    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (empty($errors)) {
        // Connect to the database
        $conn = new mysqli('localhost', 'root', '', 'account');

        // Check connection to database
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    }
    $stmt = $conn->prepare("INSERT INTO account (name, email, password) VALUES (?, ?, ?, NOW())");
    $stmt->bind_param("sss", $name, $email, $password);

    echo "Database connection established successfully!";
} catch (PDOException $e) {
    echo "Database connection failed: " . $e->getMessage();
}
?>

