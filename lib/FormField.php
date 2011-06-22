<?php
/**
* 
*/
class FormField
{
  private $field_type, $form_id,$label, $id, $required;
  function __construct($field_type = "", $form_id, $label,$required, $id)
  {
    $this->field_type              = $field_type;
    $this->form_id                 = $form_id;
    $this->label                   = $label;
    $this->required                = $required;
    $this->id                      = $id;
  }

  public function getFieldType(){
    return $this->field_type;
  }

  public function getFormId(){
    return $this->form_id;
  }

  public function getId(){
    return $this->id;
  }

  public function getRequired(){
    return $this->required;
  }

  public function getLabel(){
    return $this->label;
  }
}

?>
