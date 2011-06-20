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
$line = $cf->createLine("Prabesh","Other","Test Description");
echo $line->getTitle();
// $line->createStation();
// $cf->getResults();
// $cf->setApiKey("dfd");
// echo "API Key : ".$cf->getApiKey();
// $line = new Line();
// echo "</br> Line Info : " .$line->getDescription();
?>
  </body>
  </html>