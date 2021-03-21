<?php
$title = "Sync Method | Administrator";
$sync = "Sync Method";
$copyrightings = "Sync Method Learning";
require_once "database/Private/connection/core.php";
$querystringtwo = "select * from `users` where id=:id";
if($state = $pdo->prepare($querystringtwo))
{
$state->bindParam(":id", $pid, PDO::PARAM_STR);
$pid = $_SESSION['id'];
$state->execute();
if($state->rowCount() > 0){
if($row = $state->fetch()){
?>
<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $title; ?></title>
    <!-- Font Awesome -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
<!--    Data Tables-->
    <link rel="stylesheet" href="plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
    <link rel="stylesheet" href="plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
    <link rel="stylesheet" href="css/styleloader.css" >
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
            <li class="nav-item d-none d-sm-inline-block">
                <a href="admin" class="nav-link">Home</a>
            </li>

        </ul>

        <!-- SEARCH FORM -->


        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto" >
            <!-- Messages Dropdown Menu -->
            <!-- Notifications Dropdown Menu -->

            <li class="nav-item dropdown">

                <a class="nav-link" data-toggle="dropdown" href="#">

                    <?php echo $row['email']; ?>

                    <span class="badge badge-warning navbar-badge" style="margin-top: -7px;">Hi! <?php echo $row['firstname']; ?></span>
                </a>

                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

                    <span class="dropdown-header">Hello! <?php echo $row['firstname']; ?></span>

                    <a href="includes/signout.blade.php" class="dropdown-item">
                        <i class="fas fa-align-left mr-2"></i> Sign out

                    </a>
                    <a href="profile" class="dropdown-item">
                        <img class="img-fluid" src="profileImage/<?php echo $row['image']; ?>" alt="Avatar" style="width: 10%; border-radius: 60%; height: auto;"  />
                         Profile <span class="right badge badge-warning">feature work</span>

                    </a>

                </div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
                    <i class="fas fa-th-large"></i>
                </a>
            </li>
            <li class="nav-item">
<!--                <button class="nav-link" onclick="addDarkmodeWidget()" role="button">-->
<!--                    <i class="fas fa-eye"></i>-->
<!--                </button>-->
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="index3.html" class="brand-link">
            <img src="https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.0-9/95665643_103345161371710_3068525030846496768_n.png?_nc_cat=108&ccb=1-3&_nc_sid=09cbfe&_nc_eui2=AeFTLcxkQKv7-_trhw27-8GEBDZhfqOv560ENmF-o6_nre4uzF4sUt4JNomao8chWkGEafX0aKe3dC6vA8Sxr2ki&_nc_ohc=hMLJsq3FmjwAX_6wfzq&_nc_ht=scontent.fmnl16-1.fna&oh=6798fd85c580a5f187f589cfb3b7affb&oe=6074DF0D" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
            <span class="brand-text font-weight-light"><?php echo $sync; ?></span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
<!--                <div class="image">-->
<!--                    <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">-->
<!--                </div>-->
                <div class="info">

                    <a href="profile" class="d-block"><?php echo $row['firstname']; ?></a>

                    <?php
                            }

                        }
                    }

                    ?>
                </div>
            </div>

            <!-- SidebarSearch Form -->


            <!-- Sidebar Menu -->
           <?php include("sidebar/sidebar.php"); ?>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->

    <!-- /.content-wrapper -->

    <!-- Control Sidebar -->


