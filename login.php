<style>
    .alert {
        position: absolute;
    }
</style>

<div class="form-container" id="displayForm">
    <div class="login-logo">
        <a href=""><strong>TownTech</strong>Innovations</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form id="loginForm">
                <div class="input-group mb-3">
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
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
                    <!-- /.col -->
                    <div class="col-4">
                        <button type="submit" class="btn btn-primary btn-block">Sign In</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
        </div>
        <!-- /.login-card-body -->
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>


    $(document).ready(function() {
        $('#loginForm').submit(function(event) {
            event.preventDefault(); // Prevent the form from submitting normally

            // Get form data
            var formData = $(this).serialize();

            // Send AJAX request
            $.ajax({
                type: 'POST',
                url: 'authentication.php',
                data: formData,
                dataType: 'json',
                success: function(response) {
                    if (response.success) {
                        // Login successful, redirect or do something else
                        window.location.href = 'superAdmin.php';
                    } else {
                        // Login failed, display error message
                        $('.alert').remove(); // Remove existing alert messages
                        $('.login-card-body').prepend('<div class="alert alert-danger">' + response.message + '</div>');
                    }
                },
                error: function(xhr, status, error) {
                    // Handle AJAX errors
                    console.error(xhr.responseText);
                }
            });
        });
    });
</script>