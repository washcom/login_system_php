<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
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
            color: #28a745;
        }

        .form-control {
            padding-left: 40px; /* Space for icons */
            border-bottom-color: #28a745; /* Green border */
        }

        .input-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #28a745; /* Green color for the icons */
            font-size: 18px; /* Icon size */
        }

        .btn-submit {
            background-color: #28a745; /* Green color */
            color: #fff;
            font-size: 16px;
            padding: 10px;
            width: 100%;
            border: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .btn-submit:hover {
            background-color: #218838; /* Darker green on hover */
        }

        .text-center a {
            color: #007bff;
            text-decoration: none;
        }

        .text-center a:hover {
            text-decoration: underline;
        }

        .position-relative {
            position: relative;
        }

        .mb-3 {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="form-container">
    <?php
    if (isset($_GET["error"])) {
        switch ($_GET["error"]) {
            case "emptyinput":
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Please fill in all the fields.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            case "invalid_username":
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Username is invalid. Please use a valid username.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            case "invalid_email":
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Email is invalid. Please provide a valid email address.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            case "password_dont_match":
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Passwords do not match. Please ensure the passwords are the same.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            case "username_taken":
                echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
                    Username or Email is already taken. Please choose a different username.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            case "stmt_failed":
                echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
                    A database error occurred. Please try again later.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
                break;
            default:
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> Your registration was successful.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
?>



        <h2 class="form-title">User Registration</h2>
        <form action="includes/signup.inc.php" method="post">
            <!-- Username -->
            <div class="mb-3 position-relative">
                <i class="bi bi-person input-icon"></i>
                <input type="text" id="username" name="username" class="form-control" placeholder="Username" >
            </div>
            <!-- Email -->
            <div class="mb-3 position-relative">
                <i class="bi bi-envelope input-icon"></i>
                <input type="email" id="email" name="email" class="form-control" placeholder="Email" >
            </div>
            <!-- Password -->
            <div class="mb-3 position-relative">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" id="password" name="password" class="form-control" placeholder="Password" >
            </div>
            <!-- Confirm Password -->
            <div class="mb-3 position-relative">
                <i class="bi bi-lock input-icon"></i>
                <input type="password" id="confirm-password" name="confirm_password" class="form-control" placeholder="Confirm Password" >
            </div>
            <!-- Submit Button -->
            <div class="text-center">
                <input type="submit" value="Sign-up" class="btn-submit" name="submit">
            </div>
            <!-- Link to Login page -->
            <div class="text-center mt-3">
                <p>Already have an account? <a href="login.php">Login</a></p>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
