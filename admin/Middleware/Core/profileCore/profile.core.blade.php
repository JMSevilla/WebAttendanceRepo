<?php

    class profile_core{
        public function profileupdater($firstname, $lastname, $id){
            $this->backend_profile($firstname, $lastname, $id);
        }
    }
    class main_profile_core_blade extends profile_core {
        protected function backend_profile($firstname, $lastname, $id){
            require_once "../../../database/Private/connection/core.php";
            $imagesaved = "";
            $checker = "select image from `users` where email=:email";
            if($result = $pdo->prepare($checker)){
                $result->bindParam(":email", $p_email, PDO::PARAM_STR);
                $p_email = $_SESSION['email'];
                $result->execute();
                if($result->rowCount() > 0) {
                    if($row = $result->fetch()){
                        $imagesaved = $row['image'];
                    }
                    unset($result);
                }
            }
            if($_SERVER["REQUEST_METHOD"] == "POST"){
                if(empty($_FILES['file']['name'])) {
                    $backenddev = "CALL route_profile(:fname, :lname, :image, :id)";
                    if($stmt = $pdo->prepare($backenddev)) {
                        $stmt->bindParam(":fname", $pfname, PDO::PARAM_STR);
                        $stmt->bindParam(":lname", $plname, PDO::PARAM_STR);
                        $stmt->bindParam(":image", $pimage, PDO::PARAM_STR);
                        $stmt->bindParam(":id", $pid, PDO::PARAM_STR);
                        $pfname = $firstname;
                        $plname = $lastname;
                        $pimage = $imagesaved;
                        $pid = $id;
                        if($stmt->execute()) {
                            echo json_encode(array("statusCode" => 200));
                        }
                    }
                } else if(!empty($_FILES['file']['name'])) {
                    $OauthImage = explode(".", $_FILES["file"]["name"]);
                    $extension = end($OauthImage);
                    $imagename = rand(100, 999) . '.' . $extension;
                    $location = 'C:\\wamp64\\www\\webattendance\\admin\\profileImage\\' . $imagename;
                    move_uploaded_file($_FILES["file"]["tmp_name"], $location);
                    $dev = "CALL route_profile(:fname, :lname, :image, :id)";

                    if($stmt = $pdo->prepare($dev)) {
                        $stmt->bindParam(":fname", $spfname, PDO::PARAM_STR);
                        $stmt->bindParam(":lname", $splname, PDO::PARAM_STR);
                        $stmt->bindParam(":image", $spimage, PDO::PARAM_STR);
                        $stmt->bindParam(":id", $spid, PDO::PARAM_STR);
                        $spfname = $firstname;
                        $splname = $lastname;
                        $spimage = $imagename;
                        $imagesaved = $imagename;
                        $spid = $id;
                        if($stmt->execute()){
                            echo json_encode(array("statusCode" => 201));
                        }
                    }
                    unset($stmt);
                    unset($pdo);
                }
            }
        }
    }