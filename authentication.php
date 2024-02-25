<?php

session_start();

require('database/dbconn.php');

// Check if "Remember Me" checkbox is checked
if (isset($_POST['remember'])) {
    setcookie('rememberedEmail', $_POST['email'], time() + (86400 * 30), "/"); // 30 days
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);

    $sql = 'SELECT * FROM users WHERE email = ?';
    $stmt = mysqli_prepare($conn, $sql);

    mysqli_stmt_bind_param($stmt, 's', $email);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $user = mysqli_fetch_assoc($result);

    if ($user && password_verify($password, $user['password'])) {
        session_regenerate_id(true);

        $_SESSION['email'] = $user['email'];
        $_SESSION['role'] = $user['role'];

        $response = [
            'message' => 'Login successful',
            'role' => $user['role'],
        ];
        http_response_code(200);
        echo json_encode($response);
    } else {
        $response = ['message' => 'Invalid credentials'];
        http_response_code(401); // Unauthorized
        echo json_encode($response);
    }

    mysqli_stmt_close($stmt);
} else {
    $response = ['message' => 'Invalid request method'];
    http_response_code(405); // Method Not Allowed
    echo json_encode($response);
}

mysqli_close($conn);
