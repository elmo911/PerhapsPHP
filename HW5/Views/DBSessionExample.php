<?php
  include $_SERVER['DOCUMENT_ROOT'].'\design\w3css\PageBuilder.php';
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DBSession.php';

  PageBuilder::openPage("Homework 5");

  //POST Handle
  $SessionDBName = "My Session";
  if(!empty($_POST) && isset($_POST['changeDBSession'])){
    $_SESSION['DBSessionName'] = $_POST['changeDBSession'];
  }
  if (isset($_SESSION['DBSessionName']))
  {
    $SessionDBName = $_SESSION['DBSessionName'];
  }
  $Session = new DBSession($SessionDBName);
  if(!empty($_POST)){
    if(isset($_POST['addVarName'])){
      $Session->insertvar($_POST['addVarName'], $_POST['addVarValue']);
    }
    else if(isset($_POST['updateVarName'])){
      $Session->updateVal($_POST['updateVarName'], $_POST['updateVarValue']);
    }
    else if(isset($_POST['delVarName'])){
      $Session->deleteVar($_POST['delVarName']);
    }
  }

  $form_options["action"] = "DBSessionExample.php";


  //Change Session Form
  $form_options["button_text"] = "Change Session";
  PageBuilder::openForm($form_options);

  $mediumHeader["size"] = "3";
  $mediumHeader["text"] = "Change Session Name:";
  PageBuilder::header($mediumHeader);

  $varSessionInput["name"] = "changeDBSession";
  $varSessionInput["label"] = "sessionName";
  $varSessionInput["required"] = true;
  $inputs = array($varSessionInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm($form_options);

  //Add Session Values Form
  $form_options["button_text"] = "Add Variable";
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Add Session Values:";
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "addVarName";
  $varNameInput["label"] = "varName";
  $varNameInput["required"] = true;
  $varValueInput["name"] = "addVarValue";
  $varValueInput["label"] = "varValue";
  $varValueInput["required"] = true;
  $inputs = array($varNameInput, $varValueInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm($form_options);

  //Update Session Values Form
  $form_options["button_text"] = "Update Session Variable";
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Update Session Value:";
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "updatevarName";
  $varValueInput["name"] = "updateVarValue";
  $inputs = array($varNameInput, $varValueInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm($form_options);

  //Delete Session Values Form
  $form_options["button_text"] = "Delete Variable";
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Delete Session Var:";
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "delVarName";
  $inputs = array($varNameInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm($form_options);



  //Show current variables
  $largeHeader["text"] = "Session Name: ".$Session->sessionName;
  PageBuilder::header($largeHeader);

  $mediumHeader["text"] = "Session Values:";
  PageBuilder::header($mediumHeader);
  $Session->printVars();
  PageBuilder::closePage();

?>
