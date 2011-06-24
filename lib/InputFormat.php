<?php
/**
* 
*/
class InputFormat{
  
  private $name, $required, $valid_type, $station_id, $id;

  /*
  * __construct
  *     @param string $name                            :  Name of Input Format
  *     @param boolean $required                       : Checks for data in each row
  *     @param string $valid_type                      : general (alphabetic only)  /  number  /  email  /  url
  *     @param integer $station_id                      :
  *     Constructor for the InputFormat Class
  */
function __construct($name, $required, $valid_type = "general", $station_id= "",$id="")
{
  $this->name                   = $name;
  $this->required                = $required;
  $this->valid_type       = $valid_type;
  $this->station_id              = $station_id;
  $this->id                      = $id; 
}


public function getName(){
  return $this->name;
}

public function getRequired(){
  return $this->required;
}

public function getValidType(){
  return $this->valid_type;
}

public function getStationId(){
  return $this->station_id;
}

public function getId(){
  return $this->id;
}

}
?>
