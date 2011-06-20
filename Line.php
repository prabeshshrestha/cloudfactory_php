<?php
/**
* 
*/
class Line {
  private $title, $description, $department_id, $id, $account_id, $complete, $public;

  function __construct($title= "", $description="", $department_id="4dfb23a87768f93e0200000b",$account_id="",$complete="",$public= "",$id="")
  {
    $this->title                      = $title;
    $this->description                = $description;
    $this->department_id            = $department_id;
    $this->account_id =$account_id;
    $this->complete = $complete;
    $this->public = $public;
    $this->id = $id; 
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
    
  }
  public function getComplete(){
    
  }
  public function getPublic(){
    
  }
  public function getId(){
    
  }
  
}
?>