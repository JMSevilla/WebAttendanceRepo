<?php

class section_core {
    public function __constructsection($section){
        $this->sectionmain($section);
    }
}

class mainsection extends section_core {
    protected function sectionmain($section) {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $sectionQuery = "insert into `tbsection` values(default, :section, current_timestamp)";
            if($stmt = $pdo->prepare($sectionQuery)) {
                $stmt->bindParam(":section", $paramsection, PDO::PARAM_STR);
                $paramsection = $section;
                $stmt->execute();
                if($stmt->rowCount() > 8) {
                    $exceedSection = array(
                        "exceedCode" => 400
                    );
                    echo json_encode($exceedSection);
                } else {
                    $response = array(
                        "statusCode" => 200
                    );
                    echo json_encode($response);
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}