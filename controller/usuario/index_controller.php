<?php
require_once './model/usuario/index.php';

class index_controller {
    private $indexModel;

    public function __construct() {
        $this->indexModel = new index();
    }

    public function index() {
        include './view/usuario/index.php';

    }
}
?>