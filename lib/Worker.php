<?php

/**
* 
*/
class Worker
{
  private $type, $number, $reward, $station_id, $id;
  function __construct($type, $station_id, $number = 1, $reward = true, $id = "")
  {
    $this->type                                    = $type;
    $this->number                                  = $number;
    $this->reward                                  = $reward;
    $this->station_id                              = $station_id;
  }

  public function getType(){
    return $this->type;
  }

  public function getNumber(){
    return $this->number;
  }

  public function getStationId(){
    return $this->reward;
  }

  public function getReward(){
    return $this->station_id;
  } 

  public function getId(){
    return $this->id;
  }
}

?>
