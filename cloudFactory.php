<?php

// ensure Curl is installed
if(!extension_loaded("curl"))
throw(new Exception(
  "Curl extension is required for CloudFactory client wrapper to work"));

// *
// * @author         Prabesh Shrestha
// * @authorURL      http://www.sprout-technology.com
// * @description    CloudFactory_php is a CloudFactory API wrapper written in PHP
// * @projectURL     http://github.com/sprout/cloudfactory_php
// * @created        19-June-2011
// * @lastUpdated    28-June-2011


class CloudFactory {
  private $cfURL = "http://php.lvh.me:3000/api/";
  private $apikey, $apiversion, $apiurl;

  public function __construct($apikey = "0a5da78eecf436fbec3b4ba81a6cc376baefa3d7", $apiurl="lines.json", $apiversion="v1") {
    $this->apikey                     = $apikey;
    $this->apiurl                     = $apiurl;
    $this->apiversion                 = $apiversion;
  }

  public function createLine($title = "", $description = "", $department_name = "Other"){
    $this->request("lines.json?api_key=".$this->apikey,"POST","");
    // $url = $this->cfURL.$this->apiversion."/lines.json?api_key=".$this->apikey;    
    // $curl = curl_init($url);
    // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    // curl_setopt($curl, CURLOPT_POST, TRUE);
    // curl_setopt($curl, CURLOPT_POSTFIELDS, "line[title]=prabesh&line[descprition]=descriptio&line[department_name]=Other");
    // curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    // $response = curl_exec($curl);
    // curl_close($curl);
  }

  public function request($path = "lines.json", $method = "POST", $vars = array()) {
    $url = $this->cfURL.$this->apiversion."/".$path;         
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    switch(strtoupper($method)) {
      case "POST":
      curl_setopt($curl, CURLOPT_POST, TRUE);
      curl_setopt($curl, CURLOPT_POSTFIELDS, "line[title]=prabesh1&line[descprition]=descriptio&line[department_name]=Other");
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      break;
      default:
      throw(new CFException("Unknown method $method"));
      break;
    }

    $response = curl_exec($curl);
    curl_close($curl);
  }

  public function getApiKey(){
    return $this->apikey;
  }

  public function setApiKey($apikey){
    $this->apikey                     = $apikey;
  }

  public function getApiVersion(){
    return $this->apiversion;
  }

  public function setApiVersion($apiversion){
    $this->apiversion                 = $apiversion;
  }

  public function getApiUrl(){
    return $this->apiurl;
  }

  public function setApiUrl($apiurl){
    $this->apiurl                     = $apiurl;
  }
}

/**
* 
*/
class Line {
  private $title, $description, $department_name;

  function __construct($title         = "title", $description="description", $department_name="digitization")
  {
    $this->title                      = $title;
    $this->description                = $description;
    $this->department_name            = $department_name;
  }

  public function getTitle(){
    return $this->title;
  }

  public function setTitle($title){
    $this->title                      = $title;
  }

  public function getDescription(){
    return $this->description;
  }

  public function setDescription($description){
    $this->description                = $description;
  }

  public function getDepartmentName(){
    return $this->department_name;
  }

  public function setDepartmentName($department_name){
    $this->department_name            = $department_name;
  }
}


/**
* 
*/
class Station
{
  private $test;
  function __construct()
  {
    $this->test = "test letters";
  }

  public function getTest(){
    return $this->test;
  }

}

/* TwilioRestClient throws TwilioException on error 
* Useful to catch this exception separately from general PHP
* exceptions, if you want
*/
class CFException extends Exception {}


  ?>
