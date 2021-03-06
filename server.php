
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <title>Server</title>
</head>
<body>


<?php
include ("headers/navbar.php");
$servername = "localhost";
$username = "root";
$password = "";
$db = "hostel"; 

// Create connection
global $conn ;
$conn = new mysqli($servername, $username, $password,$db);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
// echo "Connected successfully";

function successMessage($task){
  return '<div class="alert alert-success" role="alert">
  <h4 class="alert-heading">'.$task.' Successfully!</h4>
  <p>Student Added, Now you will be forwarded to the main page in 10 seconds.</p>
  <hr>
  <p class="mb-0">click here to go directly <a href="index.php"> <button type="button" class="btn btn-primary btn-lg">Home Page </button> <a> </p>
</div>';
}


function validateUser($username, $password){
  // echo "inside validate user funciotn $username , $password";
  global $conn;
  // $sql = "SELECT EXISTS (SELECT * FROM admin WHERE 'username' =" . $username . " and 'password' = ".  $password . ")";
  // response = mysqli.
  $sql = "SELECT * FROM admin WHERE name = '$username' and password = '$password'";
  // echo $sql;
  $result = mysqli_query($conn,$sql);
  // $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
  // $count = mysqli_num_rows($result);
  // echo "Ecoing result \n\n $result";
  if ($result){
    session_start();
    $_SESSION['username'] = $username;
    echo "logged in as $username";
    header("Location: http://localhost/App/App.php");
  }
  else {
    echo "U r not an admin"; 
  }
}


function errorMessage($place){
  echo '<div class="alert alert-danger" role="alert">
  <h4 class="alert-heading">'.$place.'!</h4>
  <p>Please go back and re enter a valid name or id.</p>
  <hr>
  <p class="mb-0">click here to go directly <a href="fee_reception.php"> <button type="button" class="btn btn-warning btn-lg">Retry</button> <a> </p>
</div>';
}



//for login 

if (isset($_POST['login'])){
  validateUser($_POST["username"],$_POST["password"]);
}

if (isset($_GET['add-student'])){
  $id = $_GET['id'];
  $name = $_GET['name'];
  $room = $_GET['room'];
  $city = $_GET['city'];
  $batch = $_GET['batch'];
  $hostel = $_GET['hostel'];


  if(!(empty($id) && empty($name) && empty($room) && empty($city) && empty($batch) && empty($hostel) )){
    $sql = "INSERT INTO student (id,name,roomId,city,batch,hostel) VALUES ($id,'$name',$room,'$city',$batch,$hostel)";
    // echo $sql;
    if ($conn->query($sql) === TRUE){
      echo successMessage("Student");
      $updateRoomTable = "UPDATE room SET slots_rem = slots_rem - 1 where roomNo = $room AND hostel = $hostel";
      $conn-> query($updateRoomTable);
    header('Refresh: 10; URL=http://localhost/app/index.php');
    }
  }
}

if (isset($_GET['add-room'])){
  $roomNo = $_GET['roomNo'];
  $size = $_GET['size'];
  $floor = $_GET['floor'];
  $hostel = $_GET['hostel'];
  if (! (empty($roomNo) && empty($size) && empty($floor) && empty($hostel) )){
    $sql = "INSERT INTO room (roomNo,size,floor,hostel) VALUES ($roomNo,$size, $floor, $hostel )";
    if($conn->query($sql) === TRUE){
      echo successMessage("Room");
      header ("Refresh: 10; URL=http://localhost/app/index.php");
    }
  }
  
}

if (isset($_GET['add-program'])){
  $id = $_GET['id'];
  $name = $_GET['name'];
  if (! (empty($id) && empty($name) )){
    $sql = "INSERT INTO program (id,name) VALUES ($id,'$name')";
    if($conn->query($sql) === TRUE){
      echo successMessage("Program");
      header ("Refresh: 10; URL=http://localhost/app/index.php");
    }
  }
  
}

if (isset($_GET['fee-recieved'])){
  $id = $_GET['id'];
  
  
  
  if (! (empty($id))){
    $sqlCheckStudent = "SELECT * FROM student WHERE id = $id";
    $result = $conn->query($sqlCheckStudent);

    if ($result->num_rows <= 0){
      errorMessage("Student doesnt Exists.");

    }else{

      
      $sql = "UPDATE student SET fee = 1  WHERE id = $id ";
      // echo $sql;
      if($conn->query($sql) === TRUE){
        echo successMessage("Fee Recieved ");
        header ("Refresh: 10; URL=http://localhost/app/index.php");
      }
      else{
        errorMessage("Student With $id Doesnt Exist ");
        header("Refresh : 3; Location : fee_reception.php");
      }
    }
  }
  
  
}


if (isset($_GET["remove_student"])){

  $id = $_GET['id'];
  
  if (! (empty($id))){
    $sqlCheckStudent = "SELECT * FROM student WHERE id = $id";
    $result = $conn->query($sqlCheckStudent);

    if ($result->num_rows <= 0){
      errorMessage("Student doesnt Exists.");

    }else{
      $room = 0;
      while ($row = $result->fetch_assoc()){
        $room = $row['roomId'];
      }
      
      $sql = "DELETE FROM student WHERE id = $id";
      // echo $sql;
      
      if($conn->query($sql) === TRUE){
        echo successMessage("Student Removed");
        $sqlEmptyRoom = "UPDATE room SET slots_rem = slots_rem + 1 WHERE roomNo = $room";
        $conn->query($sqlEmptyRoom);
        header ("Refresh: 10; URL=http://localhost/app/index.php");
      }
      else{
        errorMessage("Student With $id Doesnt Exist ");
        header("Refresh : 3; Location : fee_reception.php");
      }
    }
  }
  

}

  



?>
<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>

