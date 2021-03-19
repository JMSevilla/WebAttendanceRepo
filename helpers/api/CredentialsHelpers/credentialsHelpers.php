<?php 

require_once "../../../controllers/Stack/CredentialsController/credentialsController.php";
if(isset($_POST['credent']) == 1){
   $mainCredentials = new mainCredentials();
   $mainCredentials->credential();
}