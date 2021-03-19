<?php

class year_Core {
    public function year($yeardata){
        $this->mainyearbackend($yeardata);
    }
    public function core_revoke_wall($id){
        $this->core_revoke($id);
    }
}

class mainYearCore extends year_Core {
    protected function mainyearbackend($yeardata){
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $yearQuery = "insert into `tbyear` values(DEFAULT , :yearlevel, current_timestamp )";
            $checkselect = "select * from `tbyear`";
            if($stmt = $pdo->prepare($yearQuery)){
                if($statementchecker = $pdo->query($checkselect)){
                    if($statementchecker->rowCount() >= 5){
                        echo json_encode(array("statusCode" => "exceed"));
                    }
                    else{
                        $stmt->bindParam(":yearlevel", $param_year, PDO::PARAM_STR);
                        $param_year = $yeardata;
                        if($stmt->execute()){
                            echo json_encode(array("statusCode" => 200));
                        }
                    }
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    protected function core_revoke($id){
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $coreRevokeQuery = "delete from tbyear where id=:id";
            if($stmt = $pdo->prepare($coreRevokeQuery)){
                $stmt->bindParam(":id", $pid, PDO::PARAM_STR);
                $pid = $id;
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}
