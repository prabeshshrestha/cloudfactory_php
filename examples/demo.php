<?php
  // Require the Main library file
  require_once("../lib/cloudFactory.php");
  
  // Initialize the Main Class
  $cf = new CloudFactory();

  // Create a New Line
  $transcriptionLine = $cf->createLine("Transcription","Other","Transcribe a sample podcast from Sprout Technology");
  
  // Set Input Formats for transcriptionLine
  $urlInputFormat = $transcriptionLine->createInputFormat("Url", true, "url");
  $durationInputFormat = $transcriptionLine->createInputFormat("Duration", true, "general");
  
  // Create a new Work Station for transcriptionLine
  $workstation = $transcriptionLine->createStation("Work");
  
  // Assign Form to workstation
  $transcriptionForm = $workstation->createForm("TaskForm", "Transcription Form", "Transcribe and fill the fields below : ");
  
  // Set Form Fields to $transcriptionForm
  $speakerField = $transcriptionForm->createFormField("SA", "Speaker", true);
  $transcriptionTextField = $transcriptionForm->createFormField("LA", "Transcription", true);
  
  // Assign a Human Worker to workstation
  $humanworker = $workstation->createWorker("HumanWorker", 1, true);
   
  // Sample run Data
  $sampleData = array("Url" => "www.sprout-technology.com/podcasts/sample.mp4",  "Duration" => "20 Minutes");
  $transcriptionRun = $transcriptionLine->createRun("title",$sampleData);
  
  // Get the Output
  $output = $transcriptionRun->getOutput();
  /* Output will return an array of units which will contain the final outputs(which also in an array) */
    $final_outputs = $output[0]->getFinalOutputs();// echo $final_outputs[0]->id;
?>