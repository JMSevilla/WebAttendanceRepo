<?php 
require_once "../../../Middleware/Core/sectionCore/sectionCore.php";
class section_controller {
    public function sectionWall() {
        $this->sectionmaincontroller();
    }
}

class mainsectioncontroller extends section_controller {
    protected function sectionmaincontroller() {
        $callback = new mainsection();
        $callback->__constructsection($_POST['section1']);
    }
}