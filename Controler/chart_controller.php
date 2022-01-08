<?php 

require_once('Model/chart_model.php');
require_once('View/chart_view.php');

class chartController{
    private $obiekt;

    function __construct(){
        $this->obiekt = new Model();
        $this->obiekt_view = new ChartView();
    }

    function get_model_data(){
        $this->obiekt->load_data();
        return $this->obiekt->get_data();
    }
}

$controller = new chartController();
$array = $controller->get_model_data();
$controller->obiekt_view->print_chart($array);

?> 