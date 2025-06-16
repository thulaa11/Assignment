<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        /* Reset some default styles */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
        }

        /* Header styles */
        header {
            background: linear-gradient(to right,#38a3a5,#57cc99, #80ed99);
            color: white; /* White text */
            padding: 10px 20px; /* Padding around the header */
        }

        /* Navigation styles */
        nav {
            display: flex;
            justify-content: space-between; /* Space between left and right sections */
            align-items: center; /* Center items vertically */
        }

        /* Left navigation styles */
        .left {
            display: flex;
            align-items: center;
        }

        .left a {
            color: white; /* White text */
            text-decoration: none; /* Remove underline */
            padding: 10px 15px; /* Padding for links */
            transition: background-color 0.3s; /* Smooth background transition */
        }

        /* Hover effect for links */
        .left a:hover {
            background-color:#22577a; 
        }

        /* Dropdown styles */
        .dropdown {
            position: relative; /* Position relative for dropdown */
        }

        .dropdown-content {
            display: none; /* Hide dropdown by default */
            position: absolute; /* Position it below the dropdown link */
            background-color: #f9f9f9; /* Light background for dropdown */
            min-width: 160px; /* Minimum width */
            box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2); /* Shadow effect */
            z-index: 1; /* Ensure it appears above other content */
        }

        .dropdown:hover .dropdown-content {
            display: block; /* Show dropdown on hover */
        }

        .dropdown-content a {
            color: black; /* Black text for dropdown links */
            padding: 12px 16px; /* Padding for dropdown links */
            text-decoration: none; /* Remove underline */
            display: block; /* Make links block elements */
        }

        /* Hover effect for dropdown links */
        .dropdown-content a:hover {
            background-color: #f1f1f1; /* Light gray on hover */
        }

        /* Right navigation styles */
        .right {
            display: flex;
            align-items: center;
        }

        .right a {
            color: white; /* White text */
            text-decoration: none; /* Remove underline */
            padding: 10px 15px; /* Padding for links */
            transition: background-color 0.3s; /* Smooth background transition */
        }

        /* Hover effect for right links */
        .right a:hover {
            background-color: #45a049; /* Darker green on hover */
        }

        /* Responsive design */
        @media (max-width: 768px) {
            nav {
                flex-direction: column; /* Stack items vertically on small screens */
            }
            .left, .right {
                width: 100%; /* Full width for left and right sections */
                text-align: center; /* Center text */
            }
        }
    </style>
</head>
<body>
    <header>
        <nav>
            <div class="left">
                <a href="../index.php">Home</a>
                <div class="dropdown">
                    <a href="#">Products</a>
                    <div class="dropdown-content">
                        <a href="../products/foods.php">Foods</a>
                        <a href="../products/tools.php">Tools</a>
                    </div>
                </div>
                <div class="dropdown">
                    <a href="#">Services</a>
                    <div class="dropdown-content">
                        <a href="../services/pet_grooming.php">Grooming</a>
                        <a href="../services/pet_health.php">Health</a>
                        <a href="../services/pet_boarding.php">Boarding</a>
                    </div>
                </div>
            </div>

            <div class="right">
                <?php if (!isset($_SESSION['role'])): ?>
                    <a href="../login.php">Login</a>
                <?php elseif ($_SESSION['role'] == 'user'): ?>
                    <a href="../user/dashboard.php">Profile</a>
                    <a href="../logout.php">Logout</a>
                <?php elseif ($_SESSION['role'] == 'admin'): ?>
                    <a href="manage_products.php">Manage Products</a>
                    <a href="manage_services.php">Manage Services</a>
                    <a href="../logout.php">Logout</a>
                <?php endif; ?>
            </div>
        </nav>
    </header>
</body>
</html>
