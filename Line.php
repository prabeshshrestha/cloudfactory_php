<?php
require_once("Application.php");
/**
* 
*/
class Line extends Application {
  private $title, $description, $department_id, $id, $account_id, $complete, $public;
  
  function __construct($title = "", $description="", $department_id="4dfb23a87768f93e0200000b",$account_id="",$complete="",$public= "",$id="")
  {
    $this->title              = $title;
    $this->description        = $description;
    $this->department_id      = $department_id;
    $this->account_id         = $account_id;
    $this->complete           = $complete;
    $this->public             = $public;
    $this->id                 = $id; 
  }

  //Create a new Station
  public function createStation($type = "Work"){
    $jsonresponse                   = $this->request("lines/".$this->id."/stations.json","POST","station[type]=".$type);
    $station                           = json_decode($jsonresponse);
    // echo $station->type;
    return new Station($station->type,$station->line_id,$station->_id);
  }


  public function getTitle(){
    return $this->title;
  }
  
  public function getDepartmentID(){
    return $this->department_id;
  }
  
  public function getDescription(){
    return $this->description;
  }

  public function getAccountId(){
    return $this->account_id;
  }
  
  public function getComplete(){
    return $this->complete;
  }
  
  public function getPublic(){
    return $this->public;
  }
  
  public function getId(){
    return $this->id;
  }

}
?>
