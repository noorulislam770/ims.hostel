
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container px-lg-5">
                <a class="navbar-brand" href="http://localhost/app/">IMS Hostels</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item"><a class="nav-link active" aria-current="page" href="http://localhost/app/add_student.php">Add Student</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/app/search">Search</a></li>
                        <li class="nav-item"><a class="nav-link" href="http://localhost/app/fee_reception.php">Fee</a></li>
                    </ul>
                </div>
            </div>
        </nav>

<?php

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


function showResponse($id,$name,$room,$hostel,$batch,$fee,$city){
    $cleared = "fee unpaid";
    if($fee == 1 ){
        $cleared = " Cleared!";
    }else{
        $cleared = " Unpaid!";
    }
    return '
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/form-custom.css">
        <title>Add Student</title>
    </head>
    <body>
        <section class="add-student">
            <h1 class="title">Student Info  </h1>
    
            <div class="container">
                <form >
    
                    <div class="info-form row">
                        <div class="form-field col-lg-6">
                            <input type="number" class="input-text " readonly value= '. $id .' id="id" name = "id">
                        <label for="id" class="label">Student ID. No</label>  
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" class="input-text " readonly value= '. $name .' id="name" name = "name">
                        <label for="name" class="label">Name</label>  
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="number" class="input-text " readonly value= '. $room .' id="room" name = "room">
                        <label for="room" class="label">Room No</label>  
                    </div>
                    
                    <div class="form-field col-lg-6">
                        <input type="number" class="input-text " readonly value= '. $hostel .' id="hostel" name = "hostel">
                        <label for="hostel" class="label">Hostel No</label>  
                    </div>
    
                    <div class="form-field col-lg-6">
                        <input type="text" class="input-text " readonly value= '. $city .' id="city" name = "city">
                        <label for="city" class="label">City</label>  
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="number" class="input-text " readonly value= '. $batch .' id="batch" name = "batch">
                        <label for="batch" class="label">Batch</label>  
                    </div>
                    <div class="form-field col-lg-6">
                        <input type="text" class="input-text info info-success" readonly value= '. $cleared .' id="fee-cleared" name = "fee-cleared">
                        <label for="fee-cleared" class="label">Fee Status</label>  
                    </div>
                    
                   
                </form>
            </div>
    
        </section>
        
    
    ';
}


if (isset($_GET['show-details'])){
    $id = $_GET['id'];
    $name = $_GET['name'];
    
    if (! (empty($id))){
      $sql = "SELECT * FROM student WHERE $id = id";
      // echo $sql;
        $result = $conn->query($sql);

        if ($result->num_rows > 0 ){
            $row = $result->fetch_assoc();
            echo showResponse($row['id'],$row['name'],$row['roomId'],$row['hostel'],$row['batch'],$row['fee'],$row['city'],);

        }

      }
    }


?>

    </body>
</html>