<?php

require_once "../../../Middleware/Core/courseCore/courseCore.php";

class course_Controller {
    public function courseControl()
    {
        $this->coursemain();
    }
    public function courseselectedgetter(){
        $this->grabedit();
    }
    public function modifierwall(){
        $this->modifycourse();
    }
    public function HTTPGETDATA(){
        $this->queryselector();
    }
    public function HTTPRevoke(){
        $this->mainrevokeController();
    }
    public function walltest() {
        $this->testinsert();
    }
}

class mainControllerCourse extends course_Controller
{
    protected function coursemain()
    {
        $mainCourseCore = new mainCourseCore();
        $mainCourseCore->course($_POST['data1']);
    }
    protected function grabedit(){
        $mainCourseCore = new mainCourseCore();
        $mainCourseCore->editing($_POST['id']);
    }
    protected function modifycourse()
    {
        $mainModifyCore = new mainModifyCore();
        $mainModifyCore->modifier($_POST['data1'], $_POST['id']);
    }
    protected function queryselector(){
        $mainCourseCore  = new mainCourseCore();
        $mainCourseCore->HTTP_WALL();
    }
    protected function mainrevokeController(){
       $mainRevokeCore = new mainRevokeCore();
       $mainRevokeCore->revokeWall($_POST['id']);
    }
    protected function testinsert() {
        //main core
        $mainCourseCore = new mainCourseCore();
        $mainCourseCore->testinsertcore($_POST['mytestdata']);
    }
}

