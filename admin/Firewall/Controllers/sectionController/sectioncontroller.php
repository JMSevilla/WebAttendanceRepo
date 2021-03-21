<?php 
require_once "../../../Middleware/Core/sectionCore/sectionCore.php";
class section_controller {
    public function sectionWall() {
        $this->sectionmaincontroller();
    }
    public function sectionRevokeWall() {
        $this->route_core_revoke();
    }
}

class mainsectioncontroller extends section_controller {
    protected function sectionmaincontroller() {
        $callback = new mainsection();
        $callback->__constructsection($_POST['section1']);
    }
    protected function route_core_revoke() {
        $callback = new mainsection();
        $callback->overridesectionwall($_POST['id']);
    }
}