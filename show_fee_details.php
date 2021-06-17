
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/form-custom.css">
        <title>Server</title>
        <style>
            table{
                width: 50%;
            }
        </style>
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

        <h1 class="h1 center" style="width: 100%; text-align:center;padding-top:10px; ">Fee  Details</h1>
        
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

function renderTable($rows){
    
    $text =  '<table style ="width:80%;" class="table">
    <thead class="thread-dark">
    <tr>
    <th scope="col">Student #</th>
    <th scope="col">Name</th>
    <th scope="col">Room No</th>
    <th scope="col">Batch</th>
    <th scope="col">city</th>
    <th scope="col">Hostel</th>
    <th scope="col">Fee</th>
    </tr>
    </thead>
    <tbody>' ;
    
    while ($row = mysqli_fetch_array($rows)){
        $fee_cleared = "";
        if ($row["fee"] == 1){
            $fee_cleared = "Cleared!";
        }
        else {
            $fee_cleared = "Unpaid";
        }
        $text .= '<tr>
        <th scope="row">'.$row['id'] .'</th>
        <td>'.$row['name'] .'</td>
        <td>'.$row['roomId'] .'</td>
        <td>'.$row['batch'] .'</td>
        <td>'.$row['city'] .'</td>
        <td>'.$row['hostel'] .'</td>
        <td>'.$fee_cleared .'</td>
      </tr>';

    }

    return $text;
}



if (isset($_GET["show-details"])){
    $value = $_GET['selection'];
    $bin_paid = 0;
    if ($value == "paid"){
        $bin_paid = 1;
    }else{
        $bin_paid = 0;
    }

    $sql = "SELECT * FROM student WHERE fee = $bin_paid";
    $result = $conn->query($sql);
    if($result->num_rows > 0){
        echo renderTable($result);
    }
    else{
        echo '<div class="alert alert-danger" role="alert">
        Recod not found
      </div>';
    }

}

?>