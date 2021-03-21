<?php

class section_core {
    public function __constructsection($section){
        $this->sectionmain($section);
    }
    public function overridesectionwall($id) {
        $this->overriderevoke($id);
    }
}

class mainsection extends section_core {
    protected function sectionmain($section) {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $sectionQuery = "insert into `tbsection` values(default, :section, current_timestamp)";
            $selection = "select * from tbsection";
            if($stmt = $pdo->prepare($sectionQuery)) {

                if($statement = $pdo->query($selection)) {
                    if($statement->rowCount() >= 8) {
                        $exceedSection = array(
                            "exceedCode" => 400
                        );
                        echo json_encode($exceedSection);
                    } else {
                        $stmt->bindParam(":section", $paramsection, PDO::PARAM_STR);
                        $paramsection = $section;
                        if($stmt->execute()){
                            $response = array(
                                "statusCode" => 200
                            );
                            echo json_encode($response);
                        }
                    }
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
    //section revoke
    protected function overriderevoke($id) {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $queryrevoke = "delete from tbsection where id=:id";
            if($stmt = $pdo->prepare($queryrevoke)){
                $stmt->bindParam(":id", $pid, PDO::PARAM_INT);
                $pid= $id;
                if($stmt->execute()) {
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}