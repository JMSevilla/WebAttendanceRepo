<?php
require_once "../../../Middleware/Core/ReportOne/reportbar.php";
class report_bar_Controller {
    public function reporting()
    {
        $this->graphs();
    }
}

class mainreportgraph extends report_bar_Controller{
    protected  function graphs()
    {
        $maincorereport = new maincorereport();
        $maincorereport->wallGraph();
    }
}