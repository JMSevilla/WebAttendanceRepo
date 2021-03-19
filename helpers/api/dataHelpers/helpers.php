<?php

require_once "../../../controllers/Stack/RegistrationController/registrationController.php";

if(isset($_POST['trigger']) == 1){
   $mainregistration = new mainregistration();
   $mainregistration->registration();
}