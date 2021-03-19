<?php

    require_once "../../../Firewall/Controllers/profileController/profileController.php";
    if(isset($_POST['acts']) == "update"){
        $mainprofileController = new mainprofileController();
        $mainprofileController->wallprofilecontroller();
    }