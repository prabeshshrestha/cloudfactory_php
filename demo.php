<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <title>CloudFactory Demo Application</title>
  </head>

  <body>
  <?php
require_once("cloudFactory.php");
$cf = new CloudFactory();
$line = $cf->createLine();
// $line->createStation();
// $cf->getResults();
// $cf->setApiKey("dfd");
// echo "API Key : ".$cf->getApiKey();
// $line = new Line();
// echo "</br> Line Info : " .$line->getDescription();


// curl -d "line[title]=testline&line[descprition]=descriptio&line[department_name]=Other" http://php.lvh.me:3000/api/v1/lines.json?api_key=0a5da78eecf436fbec3b4ba81a6cc376baefa3d7

// 
// $url = "http://php.lvh.me:3000/api/v1/lines.json?api_key=0a5da78eecf436fbec3b4ba81a6cc376baefa3d7";    
// $curl = curl_init($url);
// curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
// curl_setopt($curl, CURLOPT_POST, TRUE);
// curl_setopt($curl, CURLOPT_POSTFIELDS, "line[title]=testlinephp&line[descprition]=descriptio&line[department_name]=Other");
// curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
// $response = curl_exec($curl);
// curl_close($curl);
?>
  </body>
  </html>