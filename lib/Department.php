<?php
/**
* 
*/
class Department extends Application {

  private $id, $name;


  /*
  * __construct
  *     @param string $name                       : Name of Department
  *     Constructor for the line Class
  */
function __construct($name = "", $id="")
{
  $this->name              = $name;
  $this->id                = $id; 
}

/*
* getLines
*     @return Line[]                   : List of Line Object as an array
*     Gets the list of all the lines

public function getLines(){
  $lines                   = array();
  foreach (json_decode($this->request("departments/".$this->id."/lines.json","GET")) as $line) {
    array_push($lines, new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id));
  }
  return $lines;
}
*/

public function getName(){
  return $this->name;
}

}
?>
