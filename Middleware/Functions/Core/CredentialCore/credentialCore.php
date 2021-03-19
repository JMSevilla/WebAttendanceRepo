<?php

    class credential_Core {
        public function credentialCore($emailusername, $password){
            $this->mainCredentialCoreBackend($emailusername, $password);
        }
    }

    class mainCoreCredential extends credential_Core {
        protected function mainCredentialCoreBackend($emailusername, $password){
            require_once "../../../database/Private/connection/config.php";
            if($_SERVER["REQUEST_METHOD"] == "POST")
            {
                $callback = "CALL route_signin(:emailusername)";
                if($statement = $pdo->prepare($callback)){
                    $statement->bindParam(":emailusername", $param_email_username, PDO::PARAM_STR);
                    $param_email_username = $emailusername;
                    if($statement->execute()){
                        if($statement->rowCount() == 1){
                            if($row = $statement->fetch()){
                                $id = $row['id'];
                                $email = $row['email'];
                                $hashed = $row['password'];
                                $istype = $row['istype'];
                                $fname = $row['firstname'];
                                $lname = $row['lastname'];
                                $uname = $row['username'];
                                if(password_verify($password, $hashed)){
                                    session_start();
                                    if($istype == 1){
                                        $_SESSION['id'] = $id;
                                        $_SESSION['email'] = $email;
                                        $_SESSION['fname'] = $fname;
                                        $_SESSION['lname'] = $lname;
                                        $_SESSION['access'] = true;
                                        $_SESSION['uname'] = $uname;
                                        echo json_encode(array("statusCode" => 200));
                                    }
                                }else{
                                    echo json_encode(array("error" => 404));
                                }
                            }
                        }else{
                            echo json_encode(array("invalid" => 505));
                        }
                    } else{
                        echo json_encode(array("something went wrong" => 506));
                    }
                    unset($statement);
                }
                unset($pdo);
            }
        }
    }