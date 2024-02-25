
/** Event Click Button to the login */
var btn = document.getElementById('btn');

btn.addEventListener('click', () => {
    const form = document.getElementById('displayForm');

    if (form.style.display === 'none') {
        form.style.display = 'block';
    } else {
        form.style.display = 'none';
    }
});


//Ajax for Login Form 


$(document).ready(function() {
    $('#loginForm').submit(function(e) {
        e.preventDefault();

        // Gather form data
        var formData = $(this).serialize();

        // Check if "Remember Me" checkbox is checked
        var rememberMe = $('#remember').is(':checked');

        // Send AJAX request
        $.ajax({
            url: './authentication.php',
            type: 'POST',
            data: formData + '&remember=' + rememberMe, // Pass remember value to the server
            dataType: 'json',  // Assuming the response is in JSON format
            success: function(response) {
                var alertClass = response.message.includes("successful") ? 'alert-success' : 'alert-danger';
                var alertHTML = '<div class="alert ' + alertClass + ' alert-dismissible fade show" role="alert" id="Close">' +
                    response.message +
                    '<button type="button" class="btn-close text-left" data-bs-dismiss="alert" aria-label="Close" onclick="fClose()">X</button>' +
                    '</div>';

                $('#background').before(alertHTML);

                if (response.message.includes("successful")) {
                    // Check the role and redirect accordingly
                    setTimeout(function (){
                        if (response.role === 'admin') {
                            window.location.href="./superAdmin.php";
                        } else if (response.role === 'user') {
                            window.location.href="../index.php";
                        } else if(response.role === 'driver'){
                          window.location.href="../driver/driver-map.php";
                        }
                        
                    }, 2200);
                }
            },
            error: function(error) {
                console.log('Error:', error);
            }
        });
    });
});

function fClose(){
    document.getElementById('Close').style.display="none";
}





