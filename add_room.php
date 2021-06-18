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
    <section class="add-student">
        <h1 class="title">Enter Room Info </h1>

        <div class="container">
            <form action="server.php" method="get">

            <div class="form-field col-lg-6">
                    

                    <!-- <label for="hostel" class="label">Hostel</label>   -->
                    <select name="room" class="form-select" id="cars">

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
                        // echo "<p>Connected successfully</p>";


                    $sql = "SELECT roomNo FROM room WHERE  slots_rem > 0";
                    $result = $conn->query($sql);
                    // echo $sql;
                    if ($result->num_rows > 0 ){
                        while ($row = mysqli_fetch_array($result)){
                            $name = $row["roomNo"];
                            echo "inside the fucntion";
                            $html = '<option value="'.$name .'">'. $name .'</option>';
                            echo $html;
                        }
                    }

                    ?>
                    
                    </select>
                    <label for="hostel"> Room</label>
                </div>
                <div class="form-field col-lg-6">
                    <input type="number" class="input-text" id="size" name = "size" required>
                    <label for="size" class="label">Size</label>  
                </div>
                <div class="form-field col-lg-6">
                    <input type="number" class="input-text" id="floor" name = "floor" required>
                    <label for="floor" class="label">floor</label>  
                </div>
                
                
                <div class="form-field col-lg-6">
                    

                    <!-- <label for="hostel" class="label">Hostel</label>   -->
                    <select name="hostel" class="form-select" id="cars">

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
                    echo "<p>Connected successfully</p>";
                    
                    $sql = "SELECT DISTINCT hostel FROM student";
                    $result = $conn->query($sql);
                    echo $sql;
                    if ($result->num_rows > 0 ){
                        while ($row = mysqli_fetch_array($result)){
                            $name = $row["hostel"];
                            echo "inside the fucntion";
                            $html = '<option value="'.$name .'">'. $name .'</option>';
                            echo $html;
                        }
                    }

                    ?>
                    
                    </select>
                    <label for="hostel"> Hostel</label>
                </div>
                <div class="form-field col-lg-6">
                    <input type="submit" name="add-room" class="submit-btn btn-lg btn-primary">
                </div>
                
               
            </form>
        </div>

    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script >


    </script>
</body>
</html>