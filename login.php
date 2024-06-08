<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Time Table System</title>

    
</head>
<body>
    <div class="container" id="container">
        <div class="form-container sign-up">
            <form method="post" id="form-add" action="page/php/add-acount.php">
                <h1>Create Account</h1>
                <span>Use your email for registration</span>
                <input type="text" placeholder="Name" name="name" required>
                <input type="email" placeholder="Email" name="email" required>
                <input type="password" placeholder="Password" name="password" required>
                <section>
                    <label for="major">Major:</label>
                    <select name="major" required>
                        <?php echo $majorOptions; ?>
                    </select>
                </section>
                <button id="Signup">Sign Up</button>
            </form>
        </div>
        <div class="form-container sign-in">
            <form method="post" id="loginForm">
                <h1>Sign In</h1>
                <span>Use your email and password</span>
                <input type="email" placeholder="Email" name="email" id="email" required>
                <input type="password" placeholder="Password" name="password" id="password" required>
                <a href="recov_pass.php">Forget Your Password?</a>
                <button type="submit" name="login">Sign In</button>
                <p id="loginMessage"></p>
            </form>
        </div>
        <div class="toggle-container">
            <div class="toggle">
                <div class="toggle-panel toggle-left">
                    <h1>Welcome Back!</h1>
                    <img src="page/Picture1.png" class="image-logo" style="border-radius: 17%;">
                    <button class="hidden" id="login">Sign In</button>
                </div>
                <div class="toggle-panel toggle-right">
                    <h1>Hello!</h1>
                    <p>Time Table System For Courses</p>
                    <img src="Picture1.png" class="image-logo" style="border-radius: 17%;">
                    <button class="hidden" id="register">Sign Up</button>
                </div>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        $(document).ready(function() {
            $("#loginForm").submit(function(event) {
                event.preventDefault();
                var email = $("#email").val();
                var password = $("#password").val();

                $.ajax({
                    url: "php/login.php",
                    type: "POST",
                    data: {
                        email: email,
                        password: password
                    },
                    dataType: "json",
                    success: function(response) {
                        if (response.success) {
                            window.location.href = "index.php";
                        } else {
                            $("#loginMessage").text(response.message);
                        }
                    },
                    error: function() {
                        $("#loginMessage").text("An error occurred during the login process.");
                    }
                });
            });
        });
    </script>
</body>
</html>
