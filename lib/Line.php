<?php
require_once("Application.php");
/**
* 
*/
class Line extends Application {
  private $title, $description, $department_id, $id, $account_id, $complete, $public;
  
  
  /*
   * __construct
   *     $title  : Title of Line
   *     $description : Description of Line
   *     $department_id : Department Id of the Line
   *     $account_id : Account Id of the line
   *     $complete
   *     $public
   *     Constructor for the line Class
   */
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

  

  /*
   * createStation
   *     $type  : Type of Station( e.g Work)
   *     @return  new Station Object
   *     Creates a new Station for the line Object
   */
  public function createStation($type = "Work"){
    $jsonresponse                   = $this->request("lines/".$this->id."/stations.json","POST","station[type]=".$type);
    $station                           = json_decode($jsonresponse);
    return new Station($station->type,$station->line_id,$station->_id);
  }

  // public function deleteLine($line_id){
  //   $paramaters                     = "id=$line_id;
  //   $jsonresponse                   = $this->request("lines.json","DELETE",$paramaters);
  //   return "Line Deleted Successfully";
  // }

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
