<?php
/**
* 
*/
class Form extends Application
{
  
  private $type, $station_id,$description, $id, $title;
  
  function __construct($type = "TaskForm", $title, $description,$station_id, $id)
  {
    $this->type              = $type;
    $this->title             = $title;
    $this->description       = $description;
    $this->station_id        = $station_id;
    $this->id                = $id;
  }

  /*
   * createFormField
   *     @param string $field_type      : Type of Form Field
   *     @param string $label           : Label of Form Field
   *     @param boolean $required       : 
   *     @return FormField              :  new FormField Object
   *     Creates a new FormField with the parameter passed
   */
  public function createFormField($field_type = "SA", $label = "First Name", $required = true){
    $paramaters                     = "form_field[label]=".$label."&form_field[field_type]=".$field_type."&form_field[required]=".$required;
    $jsonresponse                   = $this->request("stations/".$this->getStationId()."/form/form_fields.json","POST",$paramaters);
    $form_field                           = json_decode($jsonresponse);
    return new FormField($form_field->field_type, $this->id, $form_field->label, $form_field->required, $form_field->_id);
  }

  public function getType(){
    return $this->type;
  }

  public function getStationId(){
    return $this->station_id;
  }

  public function getId(){
    return $this->id;
  }

  public function getDescription(){
    return $this->description;
  }

  public function getTitle(){
    return $this->title;
  }

}

?>
