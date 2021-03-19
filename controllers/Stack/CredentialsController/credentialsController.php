<?php
require_once "../../../Middleware/Functions/Core/CredentialCore/credentialCore.php";
class credential_Controller {
    public function credential(){
        $this->mainCredential();
    }
}

class mainCredentials extends credential_Controller {
    protected function mainCredential(){
            $mainCoreCredential = new mainCoreCredential();
            $mainCoreCredential->credentialCore($_POST['emailusername'], $_POST['password']);
    }
}