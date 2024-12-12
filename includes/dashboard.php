<?php
$_SESSION_st;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="styles.css"> <!-- Custom CSS -->
    <style>
        /* Custom styles for dashboard */
        body {
            background-color: #f7f9fc;
            font-family: "Times New Roman", Times, serif;
        }

        /* Increase height of navbar and add box shadow */
        .navbar {
            position: sticky;
            top: 0;
            z-index: 1000;
            background: linear-gradient(90deg, #1c7430, #007bff); /* Gradient */
            padding-top: 20px;  /* Increase top padding */
            padding-bottom: 20px; /* Increase bottom padding */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.8); /* Black box shadow */
        }

        .navbar .navbar-brand, .navbar-nav .nav-link {
            padding-top: 10px; /* Adjust brand padding */
            padding-bottom: 10px; /* Adjust nav item padding */
            color: #fff;
        }

        .navbar .navbar-brand:hover, .navbar-nav .nav-link:hover {
            color: #d1d3e2;
        }

        /* Search Box Styles with box shadow */
        .search-container {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 20px;
        }

        .search-box {
            background: white;
            padding: 10px 20px;
            border-radius: 30px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.6); /* Black box shadow */
            display: flex;
            align-items: center;
            width: 100%;
            max-width: 400px;
        }

        .search-box input {
            border: none;
            outline: none;
            flex-grow: 1;
            border-radius: 30px;
            padding-left: 10px;
            font-size: 14px;
        }

        .search-box input::placeholder {
            color: #888;
        }

        .search-box button {
            background-color: #28a745;
            color: white;
            border: none;
            border-radius: 30px;
            padding: 5px 15px;
            cursor: pointer;
            font-size: 14px;
            margin-left: 10px;
        }

        .search-box button:hover {
            background-color: #218838;
        }

        .search-box i {
            color: white;
            margin-right: 10px;
        }

        /* Footer with box shadow */
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: fixed;
            bottom: 0;
            width: 100%;
            box-shadow: 0 -4px 6px rgba(0, 0, 0, 0.6); /* Black box shadow */
        }

        /* Custom CSS for responsive design */
        @media (max-width: 768px) {
            .content {
                margin-left: 0;
            }
        }
    </style>
</head>

<body>


    <!-- Sticky Top Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
   
        <div class="container-fluid">
            <a class="navbar-brand" href="#">&#128522; Hi, User</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" href="#"><i class="fas fa-home"></i> Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Orders</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-user-circle"></i> Profile</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#"><i class="fas fa-shopping-cart"></i> Cart</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php"><i class="fas fa-sign-out-alt"></i> Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    if (isset($_GET["error"])) {
        if ($_GET["error"] === "success") {
            echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>Success!</strong> You are now logged in.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>';
        }
    }
?>

    <!-- Search Box -->
    <div class="search-container">
        <div class="search-box">
            <input type="text" placeholder="Search for something...">
            <button type="submit"><i class="fas fa-search"></i></button>
        </div>
    </div>

    <!-- Footer -->
    <div class="footer">
        <p>&copy; 2024 E-farm. All rights reserved.</p>
    </div>

    <!-- Bootstrap JS and FontAwesome Icons -->
    <script src="https://kit.fontawesome.com/a076d05399.js"></script> <!-- Correct FontAwesome CDN -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
