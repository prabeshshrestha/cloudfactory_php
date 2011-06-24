CloudFactory PHP Client library
===============================
Sprout Technology, 2011 (prabesh.shrestha@sprout-technology.com)

This is a PHP client for the CloudFactory API. It allows JSON call to CloudFactory API Server.

## Example usage:

Change $apikey, $apiurl and $apiversion according to your needs in lib/Application.php

### Now your php file can look like :

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
              $transcriptionForm = $workstation->createForm("TaskForm", "Transcription Form", "Fill the fields below : ");

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
                
Contributing
------------
1. Use it for your application and submit your [issues][1]
2. OR You can Fork it /create a branch /commit your changes / push to your branch / submit a pull request

[1]: https://github.com/sprout/cloudfactory_php/issues