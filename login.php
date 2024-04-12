<?php
session_start();

// CAS server URL (replace with your CAS server URL)
$cas_server_url = 'http://localhost/group68/cas_server.php';

// Check if user is already authenticated
if (isset($_SESSION['username'])) {
    header('Location: superAdmin.php');
    exit();
}

// Authentication action
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];
        $url = $cas_server_url . '?action=login';
        $data = http_build_query(['username' => $username, 'password' => $password]);
        $options = [
            'http' => [
                'method' => 'POST',
                'header' => 'Content-type: application/x-www-form-urlencoded',
                'content' => $data
            ]
        ];
        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $response = json_decode($result, true);
        if ($response && $response['success']) {
            $_SESSION['username'] = $username;
            header('Location: superAdmin.php');
            exit();
        } else {
            $error_message = 'Authentication failed. Please try again.';
        }
    } else {
        $error_message = 'Invalid username or password.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        .alert {
            position: absolute;
        }
    </style>
</head>
<body>

<div class="form-container" id="displayForm">
    <div class="login-logo">
        <a href=""><strong>TownTech</strong>Innovations</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <?php if (isset($error_message)): ?>
                <div class="alert alert-danger"><?php echo $error_message; ?></div>
            <?php endif; ?>
            <form id="loginForm" method="post">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="username" name="username" placeholder="username" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                <div class="input-group mb-3">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-8">
                        <div class="icheck-primary">
                            <input type="checkbox" id="remember" name="remember">
                            <label for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>


</body>
</html>