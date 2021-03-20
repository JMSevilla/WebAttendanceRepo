<?php
session_start();
if(!isset($_SESSION["access"]) || $_SESSION["access"] !== true){
    header("location: ../signin");
    exit;
}
?>
<?php include("includes/navbar.php"); ?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Section Settings</h1> <span class="right badge badge-warning">Feature work</span>
                </div><!-- /.col -->

            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <div class="content">
        <div class="container-fluid">
            <?php include("views/sectionContent/sectionviews.php"); ?>
        </div>
    </div>
</div>

<?php include("includes/scripts.php"); ?>

