<?php
require_once("Line.php");
require_once("Station.php");
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
  private $apikey, $apiversion, $apiurl;

  public function __construct($apikey = "0a5da78eecf436fbec3b4ba81a6cc376baefa3d7", $apiurl="http://php.lvh.me:3000/api/", $apiversion="v1") {
    $this->apikey                     = $apikey;
    $this->apiurl                     = $apiurl;
    $this->apiversion                 = $apiversion;
  }

  public function createLine($title = "", $department_name = "Other", $description = ""){
    $paramaters = "line[title]=".$title."&line[description]=".$description."&line[department_name]=".$department_name;
    $jsonresponse = $this->request("lines.json?api_key=".$this->apikey,"POST",$paramaters);
    $jsonline =  json_decode($jsonresponse);
    $line = new Line($jsonline->title,$jsonline->description,$jsonline->department_id,$jsonline->account_id,$jsonline->complete,$jsonline->public,$jsonline->_id);
    return $line;
  }

  public function request($path = "lines.json", $method = "POST", $params = "") { 
    $url = $this->apiurl.$this->apiversion."/".$path;         
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    switch(strtoupper($method)) {
      case "POST":
      curl_setopt($curl, CURLOPT_POST, TRUE);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      break;
      default:
      throw(new CFException("Unknown method $method"));
      break;
    }

    $response = curl_exec($curl);
    curl_close($curl);
    return $response;
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



/* TwilioRestClient throws TwilioException on error 
* Useful to catch this exception separately from general PHP
* exceptions, if you want
*/
class CFException extends Exception {}


  ?>
