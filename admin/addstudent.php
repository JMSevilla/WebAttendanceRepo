<?php
session_start();
if(!isset($_SESSION["access"]) || $_SESSION["access"] !== true){
    header("location: ../signin");
    exit;
}
?>

<div class="container-fluid">
    <?php include("views/StudentContent/addstudentviews.php"); ?>
</div>
<?php include("includes/scripts.php"); ?>
