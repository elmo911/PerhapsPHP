<?php
  include 'design/w3css/PageBuilder.php';
  include 'DBSession.php';

  PageBuilder::openPage("Homework 5");
  $form_options["action"] = "DBSessionExample.php";

  //Add Session Values Form
  PageBuilder::openForm($form_options);

  $mediumHeader["size"] = "2";
  $mediumHeader["text"] = "Add Session Values:"
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "addVarName";
  $varNameInput["label"] = "VarName";
  $varNameInput["required"] = true;
  $varValueInput["name"] = "addVarValue";
  $varValueInput["label"] = "VarValue";
  $varValueInput["required"] = true;
  $inputs = array($varNameInput, $varValueInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm();

  //Update Session Values Form
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Update Session Value:"
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "updateVarName";
  $varValueInput["name"] = "updateVarValue";
  $inputs = array($varNameInput, $varValueInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm();

  //Delete Session Values Form
  PageBuilder::openForm($form_options);

  $mediumHeader["text"] = "Delete Session Var:"
  PageBuilder::header($mediumHeader);

  $varNameInput["name"] = "delVarName";
  $inputs = array($varNameInput);
  PageBuilder::formTextInput($inputs);
  PageBuilder::closeForm();

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
  $largeHeader["size"] = "1";
  $largeHeader["text"] = "Session Name: ".$Session->sessionName;
  PageBuilder::header($largeHeader);

  $mediumHeader["text"] = "Session Values:";
  PageBuilder::header($mediumHeader);
  $Session->printVars();
  PageBuilder::closePage();

?>
