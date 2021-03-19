<?php

class course_Core {
    public function course($coursedata){
    $this->maincourse($coursedata);
    }
    public function editing($id){
        $this->modifyselection($id);
    }
    public function HTTP_WALL(){
        $this->HTTPGet_Query();
    }
}

class mainCourseCore extends course_Core {
    protected function maincourse($coursedata)
    {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $queries = "insert into `course` values(default, :details, current_timestamp )";
            if($statement = $pdo->prepare($queries))
            {
                $statement->bindParam(":details", $param_course_details, PDO::PARAM_STR);
                $param_course_details = $_POST['data1'];
                if($statement->execute())
                {
                    echo json_encode(array("statusCode" => 200));
                }
                unset($statement);
                unset($pdo);
            }
        }
    }
    protected function modifyselection($id){

        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $modequery = "select * from `course` where id=:id";
            if($result = $pdo->prepare($modequery)){
                $result->bindParam(":id", $prm_id, PDO::PARAM_INT);
                $prm_id = $id;
                if($result->execute()){
                    if($result->rowCount() > 0){
                        if($row = $result->fetch()){
                            echo json_encode(array("statusCode" => $row['course_details'], "statusID" => $row['id']));
                        }
                    }
                }
                unset($result);
                unset($pdo);
            }
        }
    }
    protected function HTTPGet_Query(){
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $queryselector = "select * from course order by id desc";
            if($result = $pdo->query($queryselector)){
                if($result->rowCount() > 0){
                    while($row = $result->fetch(PDO::FETCH_ASSOC)){
                        echo "<tr>";
                        echo "<th scope='row'>".$row['id']."</th>";
                        echo "<td>".$row['course_details']."</td>";
                        echo "<td>".$row['created_at']."</td>";
                        echo "<td>
                        <button class='btn btn-outline-primary' onclick='onmodifycourse(".$row['id'].")'>Modify</button>&nbsp;
                        <button class='btn btn-outline-danger' >Revoke</button>
                        </td>";
                        echo "</tr>";
                    }
                    unset($result);
                }
            }
            unset($pdo);
        }
    }
}

//Data Modifying for Course
class modify_core {
    public function modifier($coursename, $id){
        $this->main_modify($coursename, $id);
    }

}

class mainModifyCore extends modify_core {
    protected function main_modify($coursename, $id){
        
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            
            $storedupdater  = "CALL route_course_updater(:course, :p_id)";
            if($stmt = $pdo->prepare($storedupdater))
            {
                $stmt->bindParam(":course", $param_name, PDO::PARAM_STR);
                $stmt->bindParam(":p_id", $param_id, PDO::PARAM_INT);
                $param_name = $coursename;
                $param_id = $id;
                if($stmt->execute())
                {
                    echo json_encode(array("statusCode" => 200));
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }

}

class revoke_core {
    public function revokeWall($revokeid){
        $this->mainrevoke($revokeid);
    }
}

class mainRevokeCore extends revoke_core {
    protected function mainrevoke($revokeid) {
        require_once "../../../database/Private/connection/core.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $revokeQuery = "delete from course where id=:id";
            if($statement = $pdo->prepare($revokeQuery))
            {
                $statement->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $revokeid;
                if($statement->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
                unset($statement);
                unset($pdo);
            }
        }
    }
}