<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
            background: linear-gradient(to right, #ece9e6, #ffffff);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .form-container {
            background-color: #fff;
            padding: 40px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.6); /* Black box shadow */
            max-width: 400px;
            width: 100%;
            border-radius: 5px;
        }

        .form-title {
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
            color: #007bff;
        }

        .form-control {
            padding-left: 40px; /* Space for icons */
            border-bottom-color: #007bff;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #007bff; /* Colored icons */
        }

        .btn-submit {
            background-color: #007bff;
            color: #fff;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
        }

        .btn-submit:hover {
            background-color: #0056b3;
        }

        .signup-link {
            text-align: center;
            margin-top: 15px;
        }

        .signup-link a {
            color: #007bff;
            text-decoration: none;
        }

        .signup-link a:hover {
            text-decoration: underline;
        }
    </style>
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
</head>
<body>
    <div class="form-container">
        <h2 class="form-title">Login</h2>
        <?php
if (isset($_GET["error"])) {
    switch ($_GET["error"]) {
        case "user_dont_exist":
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    The username does not exist. Please check your username.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;
        case "wrong_credentials":
            echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    Incorrect username or password. Please try again.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;
        case "success":
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    Login successful! Welcome to your dashboard.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;
        default:
            echo '<div class="alert alert-info alert-dismissible fade show" role="alert">
                    Please log in to continue.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
            break;
    }
}
?>
        <form action="includes/login.inc.php" method="post">
            <!-- Username Input -->
            <div class="mb-3 position-relative">
                <i class="bi bi-person input-icon"></i>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" required>
            </div>
            <!-- Password Input -->
            <div class="mb-3 position-relative">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" required>
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Login" class="btn-submit" name="submit">
            </div>
        </form>
        <!-- Signup Link -->
        <div class="signup-link">
            Don't have an account? <a href="signup.php">Sign up here</a>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
