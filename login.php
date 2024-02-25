<div class="form-container" id="displayForm"> 
    <div class="login-text"><strong>Towntech</strong>Innovations</div>
        <form class="login-form" id="loginForm">
            <p>Login to start your session</p>
            <input class="input-box" type="email" id="email" name="email" placeholder="Email" required>
            <input class="input-box" type="password" id="password" name="password" placeholder="Password" required>
            <div class="bottom-form">
                <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember">Remember Me
                </div>
                <button type="submit">Login</button>
            </div>
        </form>
    </div>



<script>

$(document).ready(function() {
    $('#loginForm').submit(function(e) {
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
            success: function(response) {
                if (response && response.message) {
                    var alertClass = response.message.includes("successful") ? 'alert-success' : 'alert-danger';
                    var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert" id="Close">' +
                        response.message +
                        '<button type="button" class="btn-close text-left" data-bs-dismiss="alert" aria-label="Close" onclick="fClose()">X</button>' +
                        '</div>';

                    $('#background').before(alertHTML);

                    if (response.role) {
                        // Check the role and redirect accordingly
                        setTimeout(function (){
                            if (response.role === 'admin') {
                                window.location.href="superAdmin.php";
                            } else if (response.role === 'user') {
                                window.location.href="../index.php";
                            } else if(response.role === 'driver'){
                              window.location.href="../driver/driver-map.php";
                            }
                        }, 2200);
                    }
                } else {
                    console.error('Invalid response format.');
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
});


</script>