<?php
session_start(); // Start the session

require('database/dbconn.php');

function isValidAccessToken($conn, $token)
{
    // Check if the access token exists in the database and is not expired
    $currentDateTime = date("Y-m-d H:i:s");
    $query = "SELECT * FROM access_tokens WHERE token = ? AND expiration_date > ?";
    $stmt = mysqli_prepare($conn, $query);
    mysqli_stmt_bind_param($stmt, "ss", $token, $currentDateTime);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    return mysqli_num_rows($result) > 0;
}

function isLogin()
{
    return isset($_SESSION['email']);
}

if ($_SERVER["REQUEST_METHOD"] === "GET") {
    // Check if the user is logged in
    if (isLogin()) {
        // Retrieve the access token associated with the logged-in user
        $email = $_SESSION['email'];
        $query = "SELECT at.* FROM access_tokens AS at JOIN users AS u ON u.id = at.user_id WHERE u.email = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $email);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if ($row = mysqli_fetch_assoc($result)){
            $token = $row['token'];

            // Check if the access token is valid
            if (isValidAccessToken($conn, $token)) {
                // Access token is valid, grant access
                echo "<script>alert('Welcome " . $_SESSION['email'] . "');</script>";
            } else {
                // Access token is invalid or expired, redirect to login page
                header("Location: login.php");
                exit;
            }
        } else {
            // No access token found for the user, redirect to login page
            header("Location: login.php");
            exit;
        }
    } else {
        // User is not logged in, redirect to login page
        header("Location: login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Towntech Innovations</title>
</head>

<body>
    <?php include('supadmin-header.php'); ?>
    <?php include('admin/dashboard.php'); ?>
</body>

</html>