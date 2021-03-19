<?php
require_once "../../../Middleware/Functions/Core/dataCore/dataCore.php";
class registration_Controller{
    public function registration()
    {
        $this->regis();
    }
}

class mainregistration extends registration_Controller {
    protected function regis()
    {
        $mainCore = new mainCore();
        $mainCore->core($_POST['firstname'], $_POST['lastname'], $_POST['username'],
        $_POST['email'], $_POST['password']);
    }
}