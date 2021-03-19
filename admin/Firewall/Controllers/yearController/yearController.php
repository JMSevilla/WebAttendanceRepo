<?php
require_once "../../../Middleware/Core/yearCore/yearCore.php";
class year_Controller {
    public function yearcontrol()
    {
        $this->main_year_requests_checker();
    }
    public function year_revoke_wall(){
        $this->year_core_revoke_controller();
    }
}

class main_year_controller extends year_Controller {
    protected  function main_year_requests_checker(){
        $mainYearCore = new mainYearCore();
        $mainYearCore->year($_POST['data1']);
    }
    protected function year_core_revoke_controller(){
        $mainYearCore = new mainYearCore();
        $mainYearCore->core_revoke_wall($_POST['id']);
    }
}