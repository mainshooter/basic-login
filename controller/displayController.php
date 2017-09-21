<?php
  require_once 'model/User.class.php';

  class displayController {
    private $User;

    public function __construct() {
      $this->User = new User();
    }

    /**
     * The default method of the controller that present the default view
     */
    public function index() {
      if ($this->User->checkIfClientIsLoggedIn()) {
        // Client isn't logged in
        header('Location: '. $GLOBALS['config']['base_url'] . "display/loggedin");
      }

      else {
        // Client needs to login
        include 'view/header.php';
          include 'view/result.php';
        include 'view/footer.php';
      }

    }

    public function login() {
      $clientUserName = $_POST['username'];
      $clientPassword = $_POST['password'];

      $loginResult = $this->User->login($clientUserName, $clientPassword);
      if ($loginResult === true) {
        // Login is a succes
        header('Location: '. $GLOBALS['config']['base_url'] . "display/loggedin");
      }

      else {
        // Login has failt
        header('Location: '. $GLOBALS['config']['base_url']);
      }
    }

    public function loggedin() {
      if ($this->User->checkIfClientIsLoggedIn()) {
        include 'view/header.php';
          include 'view/loggedin.php';
        include 'view/footer.php';
      }

      else {
        header('Location: '. $GLOBALS['config']['base_url']);
      }
    }

    public function logout() {
      $this->User->logout();
      header('Location: '. $GLOBALS['config']['base_url']);
    }
  }

?>
