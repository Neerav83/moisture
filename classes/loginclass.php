<?php 

class login {

    public $username;
    public $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
      }

      function checklogin($conn) {

        $sql = "SELECT * FROM moisture order by id DESC LIMIT 1"; 
        if ($result = $conn->query($sql)) {
        
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
              //    echo "id: " . $row["id"]. " - Status: " . $row["status"]. " Time:" . $row["time"]. "<br>";
              $userid=$row["status"];
            }
              } else {
                echo "0 results";
              }
        
          return $userid;
      }
      
}

?>