<<?php

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
    $str = '
    sessionName = '.$this->sessionName.'
    varName = '.$this->varName.'
    varValue = '.$this->varValue.'
    LastUpdate = '.$this->LastUpdate;
    return $str;
  }

}

 ?>
