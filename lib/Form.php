<?php
/**
* 
*/
class Form
{
  private $type, $station_id,$description, $id, $title;
  function __construct($type = "TaskForm", $title, $description,$station_id, $id)
  {
    $this->type              = $type;
    $this->title             = $title;
    $this->description       = $description;
    $this->station_id        = $station_id;
    $this->id                = $id;
    }

    public function getType(){
      return $this->type;
    }

    public function getStationId(){
      return $this->station_id;
    }

    public function getId(){
      return $this->id;
    }
    
    public function setTitle($type){
      $this->type            = $type;
    }
  }

  ?>
