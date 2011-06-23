<?php
/**
* 
*/
class Form extends Application
{

  private $type, $station_id,$description, $id, $title;

  function __construct($type                = "TaskForm", $title, $description,$station_id, $id)
  {
    $this->type                             = $type;
    $this->title                            = $title;
    $this->description                      = $description;
    $this->station_id                       = $station_id;
    $this->id                               = $id;
  }

  /*
  * createFormField
  *     @param string $field_type              : Type of Form Field
  *     @param string $label                   : Label of Form Field
  *     @param boolean $required               : 
  *     @return FormField                      :  new FormField Object
  *     Creates a new FormField with the parameter passed
  */
public function createFormField($field_type = "SA", $label = "First Name", $required = true){
  $paramaters                               = "form_field[label]=".$label."&form_field[field_type]=".$field_type."&form_field[required]=".$required;
  $jsonresponse                             = $this->request("stations/".$this->getStationId()."/form/form_fields.json","POST",$paramaters);
  $form_field                               = json_decode($jsonresponse);
  return new FormField($form_field->field_type, $form_field->label, $this->id, $form_field->required, $form_field->_id);
}

/*
* addFormField
*     @param FormField $formfield            : Line object created within the PHP application
*     @return FormField                      :  new FormField Object
*     Adds the FormField object created to Form Object
*/
public function addFormField(FormField $formfield){
  $paramaters                               = "form_field[label]=".$formfield->getLabel()."&form_field[field_type]=".$formfield->getFieldType()."&form_field[required]=".$formfield->getRequired();
  $jsonresponse                             = $this->request("stations/".$this->getStationId()."/form/form_fields.json","POST",$paramaters);
  $form_field                               = json_decode($jsonresponse);
  return new FormField($form_field->field_type, $form_field->label, $this->id, $form_field->required, $form_field->_id);
}

/*
* getFormFields
*     @return FormField[]                   : List of FormField Object as an array
*     Gets the list of all the form_fields
*

public function getFormFields(){
$form_fields                                = array();
foreach (json_decode($this->request("stations/".$this->getStationId()."/form/form_fields.json","GET")) as $form_field) {
array_push($form_field, new FormField($form_field->field_type,$form_field->label,$form_field->$this->id,$form_field->required,$form_field->_id));
}
return $form_fields;
} */

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
