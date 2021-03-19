<?php

require_once "../../../Firewall/Controllers/ReportBarController/reportController.php";

if(isset($_POST['action']) == "bargraph")
{
//    echo json_encode(array("status" => 200));
    $mainreportgraph = new mainreportgraph();
    $mainreportgraph->reporting();
}