<?php
session_start();

function user_login(){
    return isset($_SESSION['email']);
}

if(!user_login()){
    header('Location: index.php');
    exit();
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
 <?php include('admin/dashboard.php'); ?>
</body>
</html>