<?php 

class login {

    public $username;
    public $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
      }

      function checklogin() {
        $userid="test";

          return $userid;
      }
      
}

?>