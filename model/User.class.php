<?php
  require_once 'model/Security.class.php';

  class User {
    private $username;
    private $password;

    public function __construct() {
      $this->loginToken = '6789254396784537895243';
      $this->username = 'open';
      $this->password = 'sesame';
    }

    public function login($clientUserName, $clientPassword) {
      if ($clientUserName === $this->username) {
        if ($clientPassword === $this->password) {
          $_SESSION['token'] = $this->loginToken;
          return(true);
        }

        else {
          // Wrong password
          return(false);
        }
      }

      else {
        // No right user
        return(false);
      }
    }

    public function checkIfClientIsLoggedIn() {
      if (ISSET($_SESSION['token'])) {
        if ($this->loginToken === $_SESSION['token']) {
          return(true);
        }

        else {
          // wrong token
          return(false);
        }
      }

      else {
        //No sesssion
        return(false);
      }
    }


  }




?>
