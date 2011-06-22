<?php
require_once("Application.php");
require_once("Worker.php");
/**
* 
*/
class Station extends Application
{
  private $type, $line_id, $id;
  function __construct($type, $line_id, $id)
  {
    $this->type    = $type;
    $this->line_id = $line_id;
    $this->id      = $id;
    }

    /*
     * createWorker
     *     @param string $type  : Type of Worker( e.g HumanWorker)
     *     @return Worker :  new Worker Object
     *     Creates a new Worker for the Station Object
     */
    public function createWorker($type = "HumanWorker",$number = 1,$reward = true){
      $parameters = "worker[type]=".$type."&worker[number]=".$number."&worker[reward]=".$reward;
      $jsonresponse                   = $this->request("stations/".$this->id."/workers.json","POST",$parameters);
      $worker                           = json_decode($jsonresponse);
       return new Worker($worker->type,$worker->station_id,$worker->number,$worker->reward,$worker->_id);
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
    
    public function setType($type){
      $this->type = $type;
    }

    public function setLineId($line_id){
      $this->line_id = $line_id;
    }

    public function setId($id){
      $this->id = $id;
    }
    

  }

  ?>
