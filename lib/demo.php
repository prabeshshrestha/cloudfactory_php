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
    $line = $cf->createLine("Line1","Other","Test Description1");
    $line2 = $cf->createLine("Line2","Other","Test Description2");
    /* Create Lines / Get the List of Lines in CF(and public lines)
      $l = new Line("newLine", "description","Other");
      $cf->addLine($l);

      $line = $cf->createLine("Line1","Other","Test Description1");
      $line2 = $cf->createLine("Line2","Other","Test Description2");
      
      $lines = $cf->getLines();
      $publicLines = $cf->getPublicLines();
    */
    
    $publicLines = $cf->getPublicLines();
    // echo $lines[0]->getAccountId();
    /*
    $line1->setInputFormat();// :name => "Company, :required => true, :valid_type => "general"
    $line1->setInputFormat();// :name => "Website, :required => false, :valid_type => "url"
    /*/


     // $station1 = $line->createStation("Work"); //type => "(Work/Tornament/Improve) *Improve station cannot exist as first station of a line
     // $station2 = $line->createStation("Work");
     // $lineid = $station1->getLineId();
       // echo $lineid;
     /*
     $worker = $station1->createWorker(); //type => human/robot, :number => 2, :reward => 10
     $form = $station1->createForm(); //type =>(task_form/custom_task_form)
          //type => TaskForm, $form->createFormField(); :label => "first_name", :required => true, valida
      
     $run = createRun(); //:line=> $line1, :title("run name"), :input => file_path
    // $cf->getResults();
    // $cf->setApiKey("dfd");
    // echo "API Key : ".$cf->getApiKey();
    // $line = new Line();
    // echo "</br> Line Info : " .$line->getDescription();
    */
  ?>
  </body>
</html>