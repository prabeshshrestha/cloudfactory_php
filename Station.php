<?php

/**
* 
*/
class Station
{
  private $type, $line_id, $id;
  function __construct($type, $line_id, $id)
  {
    $this->type    = $type;
    $this->line_id = $line_id;
    $this->id      = $id;
    }

    public function getType(){
      return $this->type;
    }

    public function getLineId(){
      return $this->line_id;
    }

    public function getId(){
      $this->id;
    }

  }

  ?>
