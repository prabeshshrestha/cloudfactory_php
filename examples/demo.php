  <?php
    require_once("../lib/cloudFactory.php");
    $cf = new CloudFactory();
    // $departments = $cf->getDepartments();
    // $accounts = $cf->getAccounts();
    // echo $departments[0]->getName();
    // echo count($departments[0]->getLines());
    /* 
    assign input formats
    assign a work station 
      assign form to the station
      assign some form fields to the station
      assign a human worker
    assign a tournament station
      assign form to the station
      assign some form fields to the station
      assign a human worker
    assign a improve station
      assign form to the station
      assign some form fields to the station
      assign a human workers
      
    Create Lines / Get the List of Lines in CF(and public lines)
      $l = new Line("newLine", "description","Other");
      $cf->addLine($l);      
      $lines = $cf->getLines();
      $publicLines = $cf->getPublicLines();
    */
    $line = $cf->createLine("Linasdfe111","Other","Test Description1");
    $inputformat1 = $line->createInputFormat("Company",true,"general");
    // $inputFormats = $line->getInputFormats();
     $station1 = $line->createStation("Work"); //type => "(Work/Tournament/Improve) *Improve station cannot exist as first station of a line
     $worker1 = $station1->createWorker("HumanWorker",1,true);
     $workers = $station1->getWorkers();
     echo count($workers);
     //     
     $form1 = $station1->createForm("TaskForm","My new Test","descriptiontest");
     $station1form = $station1->getForm();
     $formField1 = $form1->createFormField("SA", "First Name", true);
     $formField2 = $form1->createFormField("SA", "Middle Name", true);
     $form1->getFormFields();
     // $run1 = $line->createRun("title");
     // 
     // $output1 = $run1->getOutput();
     
     
     // echo $run1->getTitle();
    //"post", "/lines/" + this.id + "/runs.json", "run[title]="+title+"&data="+data);
     
     // $formfield2 = new FormField("SA", "First Name");
     // $form1->addFormField($formfield2);

     // echo "Worker Type : ".$worker1->getType();
     // $station2 = $line->createStation("Tournament",1,true)
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