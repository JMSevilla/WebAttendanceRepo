<?php
session_start();
require_once "../../../Middleware/Core/profileCore/profile.core.blade.php";

class profile_data_Controller {
    public function wallprofilecontroller(){
        $this->mainprofilebackend();
    }
}

class mainprofileController extends profile_data_Controller {
    protected function mainprofilebackend(){
        $main_profile_core_blade = new main_profile_core_blade();
        $main_profile_core_blade->profileupdater($_POST['firstname'], $_POST['lastname'], $_SESSION['id']);
    }
}