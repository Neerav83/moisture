<?php 


include 'db_connection.php';
$conn = OpenCon();
//echo "Connected Successfully";
$sql = "SELECT * FROM moisture order by id DESC LIMIT 1"; 
if ($result = $conn->query($sql)) {

    if ($result->num_rows > 0) {
        // output data of each row
        while($row = $result->fetch_assoc()) {
          echo "id: " . $row["id"]. " - Status: " . $row["status"]. " Time:" . $row["time"]. "<br>";
        }
      } else {
        echo "0 results";
      }
  

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
CloseCon($conn);



?>