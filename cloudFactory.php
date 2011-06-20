<?php
require_once("Line.php");
require_once("Station.php");
require_once("Application.php");

class CloudFactory extends Application {

  public function createLine($title = "", $department_name = "Other", $description = ""){
    $paramaters = "line[title]=".$title."&line[description]=".$description."&line[department_name]=".$department_name;
    $jsonresponse = $this->request("lines.json","POST",$paramaters);
    $line =  json_decode($jsonresponse);
    return new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id);
  }

}