<?php
require_once("../../../include/initialize.php");
if (!isset($_SESSION['USERID'])) {
    redirect(web_root . "admin/index.php");
}

$view = (isset($_GET['view']) && $_GET['view'] != '') ? $_GET['view'] : 'list';

switch ($view) {
    case 'view':
        $content = 'view.php';
        break;
    case 'generate':
        $content = 'generate.php';
        break;
    default:
        $content = 'list.php';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Reports</title>
    <link href="../../../css/bootstrap.min.css" rel="stylesheet">
    <link href="../../../css/fontawesome.min.css" rel="stylesheet">
    <style>
        body {
            overflow-x: hidden;
        }
        #sidebar {
            min-height: 100vh;
        }
        #sidebar .nav-link {
            color: #ffffff;
        }
        #sidebar .nav-link:hover {
            background-color: #495057;
        }
        #content {
            padding: 2rem;
        }
    </style>
</head>
<body>
<div class="d-flex">
    <!-- Sidebar -->
    <div id="sidebar" class="bg-dark text-white col-md-2 d-flex flex-column p-3">
        <h4 class="text-center">Admin Panel</h4>
        <hr class="text-white">
        <ul class="nav flex-column">
            <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/index.php"><i class="fas fa-home me-2"></i> Dashboard</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/lesson/index.php"><i class="fas fa-book me-2"></i> Lessons</a></li>
            <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/exercises/index.php"><i class="fas fa-pencil-alt me-2"></i> Exercises</a></li>
            <li class="nav-item"><a class="nav-link active" href="#"><i class="fas fa-chart-line me-2"></i> Reports</a></li>
            <?php if ($_SESSION['TYPE'] == 'Administrator') { ?>
                <li class="nav-item"><a class="nav-link" href="<?php echo web_root; ?>admin/modules/user/index.php"><i class="fas fa-users-cog me-2"></i> Manage Users</a></li>
            <?php } ?>
            <li class="nav-item mt-auto"><a class="nav-link text-danger" href="<?php echo web_root; ?>admin/logout.php"><i class="fas fa-sign-out-alt me-2"></i> Logout</a></li>
        </ul>
    </div>

    <!-- Main content -->
    <div id="content" class="flex-grow-1 bg-light">
        <div class="container-fluid">
            <h3 class="mb-4">Reports</h3>
            <?php require_once $content; ?>
        </div>
    </div>
</div>

<script src="../../../js/bootstrap.bundle.min.js"></script>
<script src="../../../js/fontawesome.min.js"></script>
</body>
</html>
