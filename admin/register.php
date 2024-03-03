<?php

include('../database/dbconn.php');

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // Retrieve username and password from POST data
    $username = $_POST['email']; // Assuming username is the first part of the email
    $password = $_POST['password'];

    // Validate username and password (basic validation)
    if (empty($username) || empty($password)) {
        die("Error: Username and password are required.");
    }

    // Generate email by concatenating username with domain
    $email = $username . '@towntechinnovation.com';

    // Check if the email is already registered
    $check_query = "SELECT * FROM users WHERE email = ?";
    $stmt = $conn->prepare($check_query);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Email already exists
        die("Error: Email already registered.");
    } else {
        // Email is not registered, proceed with registration
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        // Insert the user into the database
        $insert_query = "INSERT INTO users (email, password) VALUES (?, ?)";
        $stmt = $conn->prepare($insert_query);
        $stmt->bind_param("ss", $email, $hashed_password);
        
        if ($stmt->execute()) {
            echo "User registered successfully!";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
}

?>
