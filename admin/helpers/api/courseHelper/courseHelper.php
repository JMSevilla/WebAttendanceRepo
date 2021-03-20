<?php

require_once "../../../Firewall/Controllers/courseController/courseController.php";

if(isset($_POST['coursetrigger']) == 1)
{
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->courseControl();
}
if(isset($_POST['selectionTrigger']) == 1){
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->courseselectedgetter();
}
if(isset($_POST['rebuildTrigger']) == 1)
{
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->modifierwall();
}

if(isset($_POST['queryselectorTrigger']) == 1){
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->HTTPGETDATA();
}
if(isset($_POST['revokeTrigger']) == 1){
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->HTTPRevoke();
}
if(isset($_POST['triggerringtest']) == 1) {
    $mainControllerCourse = new mainControllerCourse();
    $mainControllerCourse->walltest();
}