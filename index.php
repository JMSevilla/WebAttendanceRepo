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
    <title>Web Attendance </title>
    <?php include('includes/links/links.php'); ?>
</head>
<body>
<!--From sir ben -- date opening-->
    <?php include('components/navigation/navbar.php'); ?>
    <?php include('views/indexcontent/indexviews.php'); ?>
    <div style="margin-top: 50%;">
        <?php include("components/Footer/footer.php"); ?>
    </div>
    <?php include('includes/scripts/scripts.php'); ?>
<!--From sir ben -- date closing-->
</body>
</html>