<?php
require_once("../../../include/initialize.php");
if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : 'list';

switch ($view) {
    case 'add':
        $content = 'add.php';
        break;
    case 'edit':
        $content = 'edit.php';
        break;
    case 'view':
        $content = 'view.php';
        break;
    default:
        $content = 'list.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exercise Management</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap & Font Awesome -->
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/fontawesome.min.css" rel="stylesheet">

    <style>
        body {
            overflow-x: hidden;
        }
        #sidebar {
            min-height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 240px;
            z-index: 100;
        }
        #content {
            margin-left: 240px;
            padding: 2rem;
        }
        .nav-link.active {
            background-color: #0d6efd;
            color: white !important;
        }
        .nav-link i {
            width: 20px;
        }
    </style>
</head>
<body>
    <!-- Sidebar -->
    <div id="sidebar" class="bg-dark text-white p-3">
        <h4 class="text-center text-white mb-4">Admin Panel</h4>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo web_root; ?>admin/index.php">
                    <i class="fas fa-home me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo web_root; ?>admin/modules/lesson/index.php">
                    <i class="fas fa-book me-2"></i> Lessons
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link active text-white" href="<?php echo web_root; ?>admin/modules/exercises/index.php">
                    <i class="fas fa-pencil-alt me-2"></i> Exercises
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo web_root; ?>admin/modules/report/index.php">
                    <i class="fas fa-chart-line me-2"></i> Reports
                </a>
            </li>
            <?php if ($_SESSION['TYPE'] == 'Administrator') { ?>
            <li class="nav-item">
                <a class="nav-link text-white" href="<?php echo web_root; ?>admin/modules/user/index.php">
                    <i class="fas fa-users-cog me-2"></i> Manage Users
                </a>
            </li>
            <?php } ?>
            <li class="nav-item mt-auto">
                <a class="nav-link text-danger" href="<?php echo web_root; ?>admin/logout.php">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>

    <!-- Main Content -->
    <div id="content" class="bg-light">
        <div class="container-fluid">
            <h3 class="mb-4">Exercise Management</h3>
            <?php require_once $content; ?>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="../../../js/bootstrap.bundle.min.js"></script>
    <script src="../../../js/fontawesome.min.js"></script>
</body>
</html>
