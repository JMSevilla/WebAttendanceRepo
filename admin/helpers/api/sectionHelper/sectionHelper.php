<?php
require_once "../../../Firewall/Controllers/sectionController/sectioncontroller.php";

if(isset($_POST['sectiontrigger']) == 1) {
    $helpescallback = new mainsectioncontroller();
    $helpescallback->sectionWall();
}

if(isset($_POST['revokesectionTrigger']) == 1) {
    $callback = new mainsectioncontroller();
    $callback->sectionRevokeWall();
}