<?php

/**
 * Session Variable Model for DBSession
 */
class SessionVar
{

  public $sessionName;
  public $varName;
  public $varValue;
  public $LastUpdate;

  function __construct($sName)
  {
    $this->sessionName = $sName;
  }

  function toString(){
    $str = "\n
    sessionName = ".$this->sessionName."\n
    varName = ".$this->varName."\n
    varValue = ".$this->varValue."\n
    LastUpdate = ".$this->LastUpdate;
    return $str;
  }

}

 ?>
