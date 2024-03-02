

<div class="form-container" id="displayForm">
    <div class="login-logo">
        <a href=""><strong>TownTech</strong>Innovations</a>
    </div>
    <div class="card">
        <div class="card-body login-card-body">
            <p class="login-box-msg">Sign in to start your session</p>
            <form  id="loginForm">
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




<script>

    $(document).ready(function () {
        $('#loginForm').submit(function (e) {
            e.preventDefault();

            // Gather form data
            var formData = $(this).serialize();

            // Check if "Remember Me" checkbox is checked
            var rememberMe = $('#remember').prop('checked') ? 'true' : 'false';

            // Send AJAX request
            $.ajax({
                url: 'authentication.php',
                type: 'POST',
                data: formData + '&remember=' + rememberMe, // Pass remember value to the server
                dataType: 'json',  // Assuming the response is in JSON format
                success: function (response) {
                    if (response && response.message) {
                        var alertClass = response.message.includes("successful") ? 'alert-success' : 'alert-danger';
                        var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert" id="Close">' +
                            response.message +
                            '<button type="button" class="btn-close text-left" data-bs-dismiss="alert" aria-label="Close" onclick="fClose()">X</button>' +
                            '</div>';

                        $('#background').before(alertHTML);

                        if (response.role) {
                            // Check the role and redirect accordingly
                            setTimeout(function () {
                                if (response.role === 'admin') {
                                    window.location.href = "superAdmin.php";
                                } else if (response.role === 'user') {
                                    window.location.href = "../index.php";
                                } else if (response.role === 'driver') {
                                    window.location.href = "../driver/driver-map.php";
                                }
                            }, 2200);
                        }
                    } else {
                        console.error('Invalid response format.');
                    }
                },
                error: function (error) {
                    console.log('Error:', error);
                }
            });
        });
    });


</script>