<?php
/**
* 
*/
class Output{

  private $unit_id, $final_outputs;

  /*
  * __construct
  *     @param string $unit_id                       : Unit ID
  *     @param array $final_outputs                  : Array of Final Outputs returned by CloudFactory
  *     Constructor for the Output Class
  */
function __construct($unit_id, $final_outputs)
{
  $this->unit_id       = $unit_id;
  $this->final_outputs = $final_outputs;
}

public function getUnitId()
{
  return $this->unit_id;
}

public function getFinalOutputs()
{
  return $this->final_outputs;
}

}
?>
