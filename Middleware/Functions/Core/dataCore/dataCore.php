<?php

class data_Core001 {
    public function core($firstname, $lastname, $username, $email, $password)
    {
        $this->corefeature($firstname, $lastname, $username, $email, $password);
    }
}

class mainCore extends data_Core001{
    protected function corefeature($firstname, $lastname, $username, $email, $password)
    {
        require_once "../../../database/Private/connection/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $regis = "CALL route_regis(:fname, :lname, :uname, :email, :password)";
            if($statement = $pdo->prepare($regis))
            {
                $statement->bindParam(":fname", $param_fname, PDO::PARAM_STR);
                $statement->bindParam(":lname", $param_lname, PDO::PARAM_STR);
                $statement->bindParam(":uname", $param_uname, PDO::PARAM_STR);
                $statement->bindParam(":email", $param_email, PDO::PARAM_STR);
                $statement->bindParam(":password", $param_pass, PDO::PARAM_STR);
                $param_fname = $firstname;
                $param_lname = $lastname;
                $param_uname = $username;
                $param_email = $email;
                $param_pass = password_hash($password, PASSWORD_DEFAULT);
                if($statement->execute()){
                    $response = array("statusCode" => 200);
                    echo json_encode($response);
                }
                unset($statement);
                unset($pdo);
            }
        }
    }
}