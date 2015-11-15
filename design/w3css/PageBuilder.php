<?php
include $_SERVER['DOCUMENT_ROOT'].'\global-const.php';
/*
 A page style class based on W3.class
 See http://www.w3schools.com/w3css/default.asp
 */
class PageBuilder
{
  public static function openPage($webpage_title){
    echo '<html>
    <title>'.$webpage_title.'</title>
    <link rel="stylesheet" href="http://www.w3schools.com/lib/w3.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <body>';
    PageBuilder::navBar();
  }

  public static function closePage(){
    echo'
    </body>
    </html>
    ';
  }

  public static function navBar(){
    echo'
    <div class="w3-topnav w3-large w3-red">
      <a href="'.GlobalConst::webAddress().'"><i class="material-icons w3-xlarge">home</i></i></a>
      <a href="'.GlobalConst::webAddress().'/HW1/calculate.php">Homework 1</a>
      <a href="'.GlobalConst::webAddress().'/HW2/hw2.php">Homework 2</a>
      <a href="'.GlobalConst::webAddress().'/HW3/login.html">Homework 3</a>
      <a href="'.GlobalConst::webAddress().'/HW4/variance.html">Homework 4</a>
      <a href="'.GlobalConst::webAddress().'/HW5/DBSessionExample.php">Homework 5</a>
      </div>';
  }

  public static function header($header_options){
    $color = "w3-red";
    $text = "";
    $size = "1";

    if (array_key_exists("color", $header_options)) {
      $color = $header_options["color"];
    }
    if (array_key_exists("text", $header_options)) {
      $text = $header_options["text"];
    }
    if (array_key_exists("size", $header_options)) {
      $size= $header_options["size"];
    }

    echo '
    <header class="w3-container '.$color.'">
      <h'.$size.'>'.$text.'</h'.$size.'>
    </header>';
  }

  public static function openForm($form_options){
    $color = 'w3-red';
    $action = "";
    $form_token = "not set";

    if (array_key_exists("color", $form_options)) {
      $color = $form_options["color"];
    }
    if (array_key_exists("action", $form_options)) {
      $action = ' action = "'.$form_options["action"].'"" ';
    }
    if (array_key_exists("form_token", $form_options)) {
      $form_token = $form_options["form_token"];
    }

    echo '<form class="w3-form w3-card-8" method="POST" '.$action.' enctype="multipart/form-data">
            <input type="hidden" name="form_token" value="'.$form_token.'" />
    ';
  }

  public static function closeForm($form_options){
    $color = 'w3-red';
    $button_text = 'Submit';

    if (array_key_exists("color", $form_options)) {
      $color = $form_options["color"];
    }
    if (array_key_exists("button_text", $form_options)) {
      $button_text = $form_options["button_text"];
    }

    echo '
    <input class="w3-btn '.$color.'" type="submit" name="submit" value = "'.$button_text.'">
    </form>
    ';
  }

  public static function formTextInput($textinput){
    /* Expected format for textinput
    $textinput[x] = input[]
    -------
    input["name"] ->  (return name property string)
    input["type"] ->  (return name property string)
    input["required"] -> (return true/false)
    input["label"] -> (return input label string)
    */
    if(empty($textinput)){
      return false;
    }

    foreach ($textinput as $input) {
      $name = "";
      $required = false;
      $type = "text";
      $label = "";

      if (array_key_exists("name", $input)) {
        $name = " name = ".$input["name"]." ";
      }
      if (array_key_exists("type", $input)) {
        $type = $input["type"];
      }
      if (array_key_exists("required", $input)) {
        $required = $input["required"];
      }
      if (array_key_exists("label", $input)) {
        $label = '<label class="w3-label">'.$input["label"].'</label>';
      }

      $str = '
      <div class="w3-group">
        <input class="w3-input" type="'.$type.'" '.$name;
      if ($required) {
        $str = $str.' required';
      }
      $str = $str.'>
      '.$label.'
      </div>';

      echo $str;
    }
  }

  public static function formCheckbox($checkbox){
    /* Expected format for $checkbox
    $checkbox[x] = input[]
    -------
    input["name"] ->  (return name property string)
    input["value"] -> (return value string)
    input["label"] -> (return input label string)
    input["checked"] -> (return true/false)
    */
    if(empty($checkbox)){
      return false;
    }
    echo '<div class="w3-row">
          <div class="w3-half">';
    foreach ($checkbox as $input) {
      $name = ' name = "checkbox[]" ';
      $value = ' value = "none" ';
      $label = " Checkbox ";
      $checked = false;

      if (array_key_exists("name", $input)) {
        $name = ' name = '.$input["name"].' ';
      }
      if (array_key_exists("value", $input)) {
        $value = ' value = '.$input["value"].' ';
      }
      if (array_key_exists("checked", $input)) {
          $checked = $input["checked"];
      }
      if (array_key_exists("label", $input)) {
        $label = ' '.$input["label"].' ';
      }

      $str = '<label class="w3-checkbox">

              <input type="checkbox"'.$name.$value;
      if ($input["checked"]) {
        $str = $str.' checked="checked"';
      }
      $str = $str.'>

      <span class="w3-checkmark"></span>
       '.$label.'
       </label>
       <br>';

       echo $str;
    }
    echo '</div>';
  }


}


 ?>
