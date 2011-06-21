<?php
require_once("Line.php");
require_once("Station.php");
require_once("Application.php");

class CloudFactory extends Application {

  /*
   * createLine
   *     $title  : Title of Line
   *     $department_name : Department Name of Line (e.g Other)
   *     $description : Description about the Line
   *     @return  new Line Object
   *     Creates a new Line with the parameter passed
   */
  public function createLine($title = "", $department_name = "Other", $description = ""){
    $paramaters                     = "line[title]=".$title."&line[description]=".$description."&line[department_name]=".$department_name;
    $jsonresponse                   = $this->request("lines.json","POST",$paramaters);
    $line                           = json_decode($jsonresponse);
    return new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id);
  }

  /*
   * addLine
   *     $line  : Line object created within the PHP application
   *     @return  new Line Object
   *     Adds the line object created to cloudfactory
   */
  public function addLine($line){
    $paramaters                     = "line[title]=".$line->getTitle()."&line[description]=".$line->getDescription()."&line[department_name]=".$line->getDepartmentID();
    $jsonresponse                   = $this->request("lines.json","POST",$paramaters);
    $line                           = json_decode($jsonresponse);
    return new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id);
  }

  /*
   * getLines
   *     @return List of Line Object as an array
   *     Gets the list of all the lines
   */
  public function getLines(){
    $lines                          = array();
    foreach (json_decode($this->request("lines.json","GET")) as $line) {
      array_push($lines, new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id));
    }
    return $lines;
  }
  
  /*
   * getLines
   *     @return List of Line Object as an array
   *     Gets the list of all the lines
   */
  public function getPublicLines(){
    $lines                          = array();
    foreach (json_decode($this->request("public_lines.json","GET")) as $line) {
      array_push($lines, new Line($line->title,$line->description,$line->department_id,$line->account_id,$line->complete,$line->public,$line->_id));
    }
    return $lines;
  }

}