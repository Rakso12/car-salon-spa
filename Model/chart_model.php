<?php 
  class Model { 
    private $data;

    function load_data(){
      $string = file_get_contents("Model/chart_data.json");
      $this->data = json_decode($string, true);
    }
    function get_data(){
      return $this->data;
    }
  } 
?> 