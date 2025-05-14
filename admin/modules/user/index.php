<?php
require_once("../../../include/initialize.php");
if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : 'list';

switch ($view) {
    case 'search':
        $content = 'list.php';
        break;
    default:
        $content = 'list.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/fontawesome.min.css" rel="stylesheet">
    <style>
        body {
            margin: 0;
            padding: 0;
        }

        .sidebar {
            position: fixed;
            top: 0;
            bottom: 0;
            left: 0;
            width: 240px;
            background-color: #343a40;
            color: white;
            padding-top: 20px;
            overflow-y: auto;
            z-index: 100;
        }

        .sidebar .nav-link {
            color: #ffffff;
        }

        .sidebar .nav-link:hover,
        .sidebar .nav-link.active {
            background-color: #495057;
        }

        .main-content {
            margin-left: 240px;
            padding: 2rem;
            background-color: #f8f9fa;
            min-height: 100vh;
        }

        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                position: relative;
            }
            .main-content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar d-flex flex-column p-3">
    <h4 class="text-center">Admin Panel</h4>
    <hr class="text-white">
    <ul class="nav flex-column">
        <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/index.php"><i class="fas fa-home me-2"></i> Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fas fa-book me-2"></i> Lessons</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fas fa-pencil-alt me-2"></i> Exercises</a></li>
        <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/report/index.php"><i class="fas fa-chart-line me-2"></i> Reports</a></li>
        <?php if ($_SESSION['TYPE'] == 'Administrator') { ?>
            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-users-cog me-2"></i> Manage Users</a></li>
        <?php } ?>
        <li class="nav-item mt-auto"><a class="nav-link text-danger" href="<?php echo web_root; ?>admin/logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
    </ul>
</div>

<!-- Main Content -->
<div class="main-content">
    <div class="container-fluid">
        <h3 class="mb-4">User Management</h3>
        <?php require_once $content; ?>
    </div>
</div>

<!-- Bootstrap JS and FontAwesome -->
<script src="../../../js/bootstrap.bundle.min.js"></script>
<script src="../../../js/fontawesome.min.js"></script>
</body>
</html>
