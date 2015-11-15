<?php
  include $_SERVER['DOCUMENT_ROOT'].'\design\w3css\PageBuilder.php';
  include $_SERVER['DOCUMENT_ROOT'].'\HW5\Controllers\DBSession.php';

  PageBuilder::openPage("Homework 5");
  $form_options["action"] = "DBSessionExample.php";
  $form_options["button_text"] = "Add Variable";

  //Add Session Values Form
  PageBuilder::openForm($form_options);

  $mediumHeader["size"] = "3";
  $mediumHeader["text"] = "Add Session Values:";
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "addVarName";
  $varNameInput["label"] = "VarName";
  $varNameInput["required"] = true;
  $varValueInput["name"] = "addVarValue";
  $varValueInput["label"] = "VarValue";
  $varValueInput["required"] = true;
  $inputs = array($varNameInput, $varValueInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm($form_options);

  //Update Session Values Form
  $form_options["button_text"] = "Update Session Variable";
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Update Session Value:";
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "updateVarName";
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

  //POST Handle
  $Session = new DBSession("My Session");
  if(!empty($_POST)){
    if(isset($_POST['addVarName'])){
      $Session->insertvar($_POST['addVarName'], $_POST['addVarValue']);
    }
    else if(isset($_POST['updateVarName'])){
      $Session->updateVal($_POST['updateVarName'], $_POST['updateVarValue']);
    }
    else if(isset($_POST['deleteVarName'])){
      $Session->deleteVar($_POST['deleteVarName']);
    }
  }

  //Show current variables
  $largeHeader["text"] = "Session Name: ".$Session->sessionName;
  PageBuilder::header($largeHeader);

  $mediumHeader["text"] = "Session Values:";
  PageBuilder::header($mediumHeader);
  $Session->printVars();
  PageBuilder::closePage();

?>
