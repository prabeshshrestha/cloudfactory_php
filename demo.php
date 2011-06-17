<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>CloudFactory Demo Application</title>
</head>

<body>
<?php
require_once("cloudFactory.php");
// $cf = new CloudFactory();
// $line = $cf->CreateLine();
// $line->createStation();
// $cf->getResults();
// $cf->setApiKey("dfd");
// echo "API Key : ".$cf->getApiKey();
// $line = new Line();
// echo "</br> Line Info : " .$line->getDescription();


    $url = "{$this->apiurl}/$path";    
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
    
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, TRUE);
    switch(strtoupper($method)) {
        case "POST":
            curl_setopt($curl, CURLOPT_POST, TRUE);
            curl_setopt($curl, CURLOPT_POSTFIELDS, "line[title]=Company&line[description]=description&line[department_name]=Other");
             curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            break;
        default:
            throw(new CFException("Unknown method $method"));
            break;
    }
    
    $response = curl_exec($curl);
    curl_close($curl);
}


?>
</body>
</html>