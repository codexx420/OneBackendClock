<?php

class Shopware_Controllers_Backend_OneBackendClockWidget extends Enlight_Controller_Action {
    public function indexAction() {
        $this->view->assign("timeString",date("H:i:s"));
    }
}