<?php

class Login {

  public function saltPassword($password)
  {
    // yes I know about the sha1 hash
    // I didn't use it since it's no longer considered secure
    $password = hash('sha256', $password);
    $saltpassword = "mis412".$password;
    $password = hash('sha256', $saltpassword);

    return $password;
  }

  public static function logout(){
    // Begin the session
    session_start();

    // Unset all of the session variables.
    session_unset();

    // Destroy the session.
    session_destroy();
  }

  public function login($username, $password){
    include 'db.php';

    //hash password for compare (I'd normally compare in my SQL)
    $hashed_pw = $this->saltPassword($password);

    try {
      $sql_select = "SELECT username, password, fname, lname
      FROM user
      WHERE username = '".$username."'";

      $stmt = $conn->prepare($sql_select);
      $stmt->execute();
      $user = $stmt->fetch();

      if($user == false){
        $result["error"] = "Login failed: username does not exist";
        return $result;
      }
      elseif($hashed_pw != $user["password"]) {
        $result["error"] = "Login failed: password incorrect";
      }
      else {
        return $user;
      }
    } catch (Exception $e) {
      $result["error"] = var_dump($e);
    }
  }

}


 ?>
