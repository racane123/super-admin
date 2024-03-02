<style>
    #registerForm {
        display: none;
    }
</style>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<div>
    <button onclick="displayForm()">Add Users</button>
</div>

<div class="form-container">
    <form id="registerForm">
        <input type="text" placeholder="Email" id="email" required>
        <input type="password" placeholder="Password" id="password" required>
        <button type="submit">Submit</button>
    </form>
</div>

<script>
    function displayForm() {
        var displayForm = $("#registerForm");
        if (displayForm.css("display") == "none") {
            displayForm.css("display", "block");
        } else {
            displayForm.css("display", "none");
        }
    }

    $("#registerForm").submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var email = $("#email").val();
        var password = $("#password").val();

        $.ajax({
            type: "POST",
            url: "admin/register.php",
            data: {
                email: email,
                password: password
            },
            success: function(response) {
                // Handle success
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Handle error
                console.log(error);
            }
        });
    });
</script>