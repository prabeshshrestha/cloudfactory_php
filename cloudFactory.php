<?php
require_once("Line.php");
require_once("Station.php");
require_once("Application.php");

class CloudFactory extends Application {

  //Create a new Line
  public function createLine($title = "", $department_name = "Other", $description = ""){
    $paramaters                     = "line[title]=".$title."&line[description]=".$description."&line[department_name]=".$department_name;
    $jsonresponse                   = $this->request("lines.json","POST",$paramaters);
    $line                           = json_decode($jsonresponse);
    return new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id);
  }

  //Get the list of all the lines
  public function getLines(){
    $lines                          = array();
    foreach (json_decode($this->request("lines.json","GET")) as $line) {
      array_push($lines, new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id));
    }
    return $lines;
  }

}
