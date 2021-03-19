<?php

class graph_core {
    public function wallGraph()
    {
        $this->courselist();
    }
}
//From ryan - 3/14/2021
//backend development
class maincorereport extends graph_core {
    protected function courselist()
    {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $reportQuery = "SELECT * FROM course";
            if($result = $pdo->query($reportQuery))
            {
                $jsonarray = array();
                if($result->rowCount() > 0){
                    while($row = $result->fetch())
                    {
                        $jsonItem = array();
                        $jsonItem['label'] = $row['course_details'];
                        $jsonItem['value'] = $row['id'];
                        array_push($jsonarray, $jsonItem);
                    }
                    unset($result);
                }
            }
            unset($pdo);
            header("Content-type: application/json");
            echo json_encode($jsonarray);
        }
    }
}
//ryan code -> closing.