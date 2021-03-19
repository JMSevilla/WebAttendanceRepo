<?php

require "../../../Firewall/Controllers/yearController/yearController.php";

if(isset($_POST['yeartrigger']) == 1){
    $main_year_controller = new main_year_controller();
    $main_year_controller->yearcontrol();

}

if(isset($_POST['yearRevokeTrigger']) == 1){
    $main_year_controller = new main_year_controller();
    $main_year_controller->year_revoke_wall();
}