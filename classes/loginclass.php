<?php 

class login {

    public $username;
    public $password;

    function __construct($username, $password) {
        $this->username = $username;
        $this->password = $password;
      }

      function checklogin($conn) {

        $sql = "SELECT * FROM users where username='".$this->username."'"; 
        if ($result = $conn->query($sql)) {
        
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
              //    echo "id: " . $row["id"]. " - Status: " . $row["status"]. " Time:" . $row["time"]. "<br>";
              $userid=$row["userid"];
            }
              } else {
                echo "0 results";
              }
        
          return $userid;
      }
    }

    function getRooms($conn, $userid) {

      $sql = "SELECT * FROM areas where userid='".$userid."'"; 
      if ($result = $conn->query($sql)) {
    
          if ($result->num_rows > 0) {
              // output data of each row
              $i=0;
              while($row = $result->fetch_assoc()) {
                    
                $this->rum[$i]=$row["name"];
                $this->rumid[$i]=$row["roomid"];  


                $i++;
          }
            } else {
              echo "0 results";
            }
      
    }


  }
      

  function getSensors($conn, $userid, $roomid) {

    $sql = "SELECT * FROM sensors where userid='".$userid."' and roomid='".$roomid."'" ; 
   // echo $sql;
    if ($result = $conn->query($sql)) {
  
        if ($result->num_rows > 0) {
            // output data of each row
            $i=0;
            unset($this->sensorid);
            unset($this->sensorname);


            while($row = $result->fetch_assoc()) {
                        
              $this->sensorid[$i]=$row['sensorid'];
              $this->sensorname[$i]=$row['name'];
  
              $i++;
        }
          } else {
           // $this->sensorid[0]=0;
           }
    
  }

}

}
?>