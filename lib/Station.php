<?php
/**
* 
*/
class Station extends Application
{

  private $type, $line_id, $id;

  function __construct($type, $line_id = "", $id = "")
  {
    $this->type                    = $type;
    $this->line_id                 = $line_id;
    $this->id                      = $id;
  }

  /*
  * createWorker
  *     @param string $type                  : Type of Worker( e.g HumanWorker/ RobotWorker)
  *     @param integer $number               :  Number of Worker
  *     @param boolean $reward               :  
  *     @return Worker                       :  new Worker Object
  *     Creates a new Worker for the Station Object
  */
public function createWorker($type, $number = 1, $reward = true){
  $parameters                      = "worker[type]=".$type."&worker[number]=".$number."&worker[reward]=".$reward;
  $jsonresponse                    = $this->request("stations/".$this->id."/workers.json","POST",$parameters);
  $worker                          = json_decode($jsonresponse);
  return new Worker($worker->type,$worker->station_id,$worker->number,$worker->reward,$worker->_id);
}

/*
* createForm
*     @param string $type               : Type of Form( e.g TaskForm)
*     @param title                      : 
*     @param description                :
*     @return Worker                    :  new Worker Object
*     Creates a new Form for the Station Object
*/
public function createForm($type, $title = "", $description = ""){
  $parameters                      = "form[_type]=".$type."&form[title]=".$title."&form[description]=".$description;
  $jsonresponse                    = $this->request("stations/".$this->id."/form.json","POST",$parameters);
  $form                            = json_decode($jsonresponse);
  // $this->id is used for now since mongo does not return the station_id as form is an embedded object
  return new Form($form->_type,$form->title,$form->description,$this->id,$form->_id);  
}

/*
 * getWorkers
 *     @return Worker[]                   : List of Worker Object as an array
 *     Gets the list of all the Worker
 
public function getWorkers(){
  $workers                          = array();
  echo $this->request("stations/".$this->id."/workers.json","GET");
  foreach (json_decode($this->request("stations/".$this->id."/workers.json","GET")) as $worker) {
        array_push($workers, new Worker($worker->type,$worker->station_id,$worker->number,$worker->reward,$worker->_id));
      }
  return $workers;
}
*/

/*
* getForm
*     Gets a new form for the Station Object
*/
public function getForm(){
  $jsonresponse                    = $this->request("stations/".$this->id."/form.json","GET");
  $form                            = json_decode($jsonresponse);
  return new Form($form->_type,$form->title,$form->description,$this->id,$form->_id);  
}

public function getType(){
  return $this->type;
}

public function getLineId(){
  return $this->line_id;
}

public function getId(){
  return $this->id;
}

}

?>
