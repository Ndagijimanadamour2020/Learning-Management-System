<?php
require_once("../include/initialize.php");

if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/login.php");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrator Panel</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <style type="text/css">
        /* Sidebar Styles */
        .sidebar {
            background-color: #0037a4;
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            padding-top: 20px;
            border-radius: 0 20px 20px 0;
        }

        .sidebar a {
            color: white;
            padding: 15px 25px;
            text-decoration: none;
            font-size: 18px;
            display: block;
            border-bottom: 1px solid #ddd;
        }

        .sidebar a:hover {
            background-color: #007bff;
        }

        /* Main content area */
        .main-content {
            margin-left: 250px;
            padding: 20px;
        }

        /* Card styling */
        .card {
            border-radius: 15px;
            box-shadow: 0 4px 8px rgba(16, 24, 236, 0.1);
        }

        .card-body {
            text-align: center;
        }

        .imgstretch img {
            width: 100%;
            height: 120px;
            object-fit: contain;
            border-radius: 10px;
        }

        .secondrow {
            margin-bottom: 20px;
        }

        /* For responsiveness */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
                height: auto;
            }

            .main-content {
                margin-left: 0;
            }

            .imgstretch img {
                height: 100px;
            }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
       
        <a href="<?php echo web_root; ?>admin/index.php">Home</a>
        <a href="<?php echo web_root; ?>admin/modules/lesson/index.php">Lessons</a>
        <a href="<?php echo web_root; ?>admin/modules/exercises/index.php">Exercises</a>
        <?php if ($_SESSION['TYPE'] == "Administrator") { ?>
            <a href="<?php echo web_root; ?>admin/modules/user/index.php">Manage Users</a>
        <?php } ?>
        <a href="<?php echo web_root; ?>admin/modules/report/index.php">Reports</a>
        <a href="<?php echo web_root; ?>admin/logout.php">Logout</a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        

        <div class="row">
            <!-- Lessons Card -->
            <div class="col-md-6 secondrow">
                <div class="card text-white bg-primary">
                    <div class="card-body">
                        <div class="imgstretch">
                            <img src="<?php echo web_root; ?>admin/adminMenu/images/lesson1.gif" alt="Lessons">
                        </div>
                        <h5>Lessons</h5>
                        <a href="<?php echo web_root; ?>admin/modules/lesson/index.php" class="btn btn-light">Go to Lessons</a>
                    </div>
                </div>
            </div>

            <!-- Exercises Card -->
            <div class="col-md-6 secondrow">
                <div class="card text-white bg-warning">
                    <div class="card-body">
                        <div class="imgstretch">
                            <img src="<?php echo web_root; ?>admin/adminMenu/images/exercises.jpg" alt="Exercises">
                        </div>
                        <h5>Exercises</h5>
                        <a href="<?php echo web_root; ?>admin/modules/exercises/index.php" class="btn btn-dark">Go to Exercises</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <?php if ($_SESSION['TYPE'] == "Administrator") { ?>
                <!-- Manage Users Card -->
                <div class="col-md-6 secondrow">
                    <div class="card text-white bg-success">
                        <div class="card-body">
                            <div class="imgstretch">
                                <img src="<?php echo web_root; ?>admin/adminMenu/images/user.png" alt="Manage Users">
                            </div>
                            <h5>Manage Users</h5>
                            <a href="<?php echo web_root; ?>admin/modules/user/index.php" class="btn btn-light">Manage Users</a>
                        </div>
                    </div>
                </div>
            <?php } ?>

            <!-- Reports Card -->
            <div class="col-md-6 secondrow">
                <div class="card text-white bg-info">
                    <div class="card-body">
                        <div class="imgstretch">
                            <img src="<?php echo web_root; ?>admin/adminMenu/images/report1.png" alt="Reports">
                        </div>
                        <h5>Reports</h5>
                        <a href="<?php echo web_root; ?>admin/modules/report/index.php" class="btn btn-dark">View Reports</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
