<?php
/**
* 
*/
class Line extends Application {
  private $title, $description, $department_id, $id, $account_id, $complete, $public;


  /*
  * __construct
  *     @param string $title                       : Title of Line
  *     @param string $description                 : Description of Line
  *     @param integer $department_id              : Department Id of the Line
  *     @param integer $account_id                 : Account Id of the line
  *     @param boolean $complete                   :
  *     @param boolean $public                     :
  *     Constructor for the line Class
  */
function __construct($title         = "", $description="", $department_id="4dfb23a87768f93e0200000b",$account_id="",$complete="",$public= "",$id="")
{
  $this->title                      = $title;
  $this->description                = $description;
  $this->department_id              = $department_id;
  $this->account_id                 = $account_id;
  $this->complete                   = $complete;
  $this->public                     = $public;
  $this->id                         = $id; 
}

/*
* createRun
*     @param string $name                     : 
*     @param boolean required                 : 
*     @param string valid_type                : 
*     @return InputFormat                      : new InputFormat Object
*     Creates a new InputFormat for the Station Object
*/
public function createRun($title = "title"){
  $parameters = "run[title]=".$title."&data[][Company]=dhaubaji";
  /*
  $parameters = data = [{:Company =>"aaple"},{:Company => "sprout"}]
  data[company] 
  data[][Company]=dhaubaji
  */
$jsonresponse     = $this->request("lines/".$this->id."/runs.json","POST",$parameters);
$run   = json_decode($jsonresponse);
return new Run($run->title,$run->line_id,$run->_id);
}

/*
* createInputHeader
*     @param string $name                     : 
*     @param boolean required                 : 
*     @param string valid_type                : 
*     @return InputFormat                      : new InputFormat Object
*     Creates a new InputFormat for the Station Object
*/
public function createInputFormat($name = "Company", $required = true, $valid_type = "general"){
  $parameters = "input_format[name]=".$name."&input_format[required]=".$required."&input_format[valid_type]=".$valid_type;
  $jsonresponse     = $this->request("lines/".$this->id."/input_formats.json","POST",$parameters);
  $iFormat   = json_decode($jsonresponse);
  return new InputFormat($iFormat->name,$iFormat->required,$iFormat->valid_type,$iFormat->line_id,$iFormat->_id);
}

/*
* createStation
*     @param string $type                       : Type of Station( e.g Work / Tournament  / Improve)
*     @param integer $max_judges                : Maximum Number of Judges
*     @param boolean $enabled                   :  
*     @return Station                           :  new Station Object
*     Creates a new Station for the line Object
*/
public function createStation($type = "Work", $max_judges = 1, $enabled = true){
  $parameters                       = "station[type]=".$type."&station[jury_worker[max_judges]]=".$max_judges."&station[auto_judge[enabled]]=".$enabled;
  $jsonresponse                     = $this->request("lines/".$this->id."/stations.json","POST", $parameters);
  $station                          = json_decode($jsonresponse);
  return new Station($station->type,$station->line_id,$station->_id);
}

/*
 * getStations
 *     @return Station[]                   : List of Station Object as an array
 *     Gets the list of all the stations
 */
public function getStations(){
  $stations                          = array();
  foreach (json_decode($this->request("lines/".$this->id."/stations.json","GET")) as $station) {
        array_push($stations, new Station($station->type,$station->line_id,$station->_id));
      }
  return $stations;
}

//GET /lines/:line_id/stations.json

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
