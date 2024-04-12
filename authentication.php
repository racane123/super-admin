<?php

require('database/dbconn.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "SELECT * FROM registeruser WHERE email=?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($user = mysqli_fetch_assoc($result)) {
        $hashedPassword = $user["password"];
        
        if (password_verify($password, $hashedPassword)) {
            session_start();
            $_SESSION['email'] = $user['email'];

            // Generate access token
            $token = bin2hex(random_bytes(32)); // Generate a random 256-bit token
            
            // Insert token into the database
            $userId = $user["user_id"];
            $expirationDate = date("Y-m-d H:i:s", strtotime("+1 day"));
            $query = "INSERT INTO access_tokens (token, user_id, expiration_date) VALUES (?, ?, ?)";
            $stmt = mysqli_prepare($conn, $query);
            mysqli_stmt_bind_param($stmt, "sis", $token, $userId, $expirationDate);
            mysqli_stmt_execute($stmt);

            header('Content-Type: application/json');
            echo json_encode(array("success" => true, "token" => $token));
        } else {
            echo json_encode(array("success" => false, "message" => "Invalid email or password."));
        }
    } else {
        echo json_encode(array("success" => false, "message" => "Invalid email or password."));
    }
}

?>
