<?php
/**
* 
*/
class Run extends Application{

  private $title, $line_id, $id;

  /*
  * __construct
  *     @param string $title                       : Title of Run
  *     @param integer $line_id : Line id
  *     Constructor for the Run Class
  */
function __construct($title = "",$line_id = "",$id="")
{
  $this->title              = $title;
  $this->line_id            = $line_id;
  $this->id                 = $id; 
}

/*
* getOutput
*     @param string $name                     : 
*     @param boolean required                 : 
*     @param string valid_type                : 
*     @return InputFormat                     : new InputFormat Object
*     Creates a new InputFormat for the Station Object
*/
public function getOutput(){
  $outputs                  = array();
  $jsonresponse          = $this->request("runs/".$this->id."/final_outputs.json","GET");
  foreach (json_decode($jsonresponse) as $output) {
    array_push($outputs, new Output($output->unit_id,$output->final_outputs));
  }
  return $outputs;
}

}
?>
