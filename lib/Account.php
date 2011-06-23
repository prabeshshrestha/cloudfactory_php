<?php
/**
* 
*/
class Account{

  private $id, $name;


  /*
  * __construct
  *     @param string $name                       : Name of Account
  *     Constructor for the Account Class
  */
function __construct($name = "", $id="")
{
  $this->name              = $name;
  $this->id                = $id; 
}

public function getName(){
  return $this->name;
}

}
?>
