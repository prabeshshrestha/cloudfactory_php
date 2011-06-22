<?php

/**
*
* Copyright 2011 Sprout Technology.
*
*/
if (!function_exists('curl_init')) {
  throw new Exception('CloudFactory needs the CURL PHP extension.');
}
if (!function_exists('json_decode')) {
  throw new Exception('CloudFactory needs the JSON PHP extension.');
}

// *
// * @author            Prabesh Shrestha ( prabesh.shrestha@sprout-technology.com)
// * @authorURL         http://www.sprout-technology.com
// * @description       CloudFactory_php is a CloudFactory API wrapper written in PHP
// * @projectURL        http://github.com/sprout/cloudfactory_php
// * @created           19-June-2011
// * @lastUpdated       28-June-2011



/*
*  Application Class
*     All the helper methods and constants for the application are defined in this class
*     
*/
class Application {

  protected $apikey           = "0a5da78eecf436fbec3b4ba81a6cc376baefa3d7";
  protected $apiurl           = "http://php.lvh.me:3000/api/";
  protected $apiversion       = "v1";


  /*
  * request
  *     @param string $path                 : path that needs to be hit in the API server
  *     @param string $method               : GET/POST/DELETE/PUT
  *     @param string $params               : additional parameters for the request to the API server
  *     @return JsonObject                  : Returns whatever response is returned by the Cloudfactorey API server
  *     Constructor for the line Class
  */
public function request($path = "lines.json", $method = "GET", $params = "") { 
  $url                        = $this->apiurl.$this->apiversion."/".$path."?api_key=".$this->apikey;         
  $curl                       = curl_init($url);
  curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
  curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
  switch(strtoupper($method)) {
    case "GET":
    curl_setopt($curl, CURLOPT_HTTPGET, TRUE);
    break;
    case "POST":
    curl_setopt($curl, CURLOPT_POST, TRUE);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $params);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    break;
    case "DELETE":
    curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
    break;
    default:
    throw(new CFException("Unknown method $method"));
    break;
  }

  $response                   = curl_exec($curl);
  curl_close($curl);
  return $response;
}

public function setApiKey($apikey){
  $this->apikey               = $apikey;
}

public function getApiKey()
{
  return $this->apikey;
}

public function setApiVersion($apiversion){
  $this->apiversion           = $apiversion;
}

public function getApiVersion()
{
  return $this->apiversion;
}

public function setApiUrl($apiurl){
  $this->apiurl               = $apiurl;
}

public function getApiUrl()
{
  return $this->apiurl;
}

}
?>
