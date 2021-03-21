<?php
error_reporting(0);
session_start();
if(isset($_SESSION["access"]) || $_SESSION["access"] === true){
    header("location: admin/admin");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Web Attendance | Sign in</title>
    <?php include('includes/links/links.php'); ?>
</head>
<body>
    <?php include('components/navigation/navbar.php'); ?>
    <?php include('views/signincontent/signinviews.php'); ?>
    <?php include('includes/scripts/scripts.php'); ?>

</body>
</html>