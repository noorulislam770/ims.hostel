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
<? include ("headers/navbar.php"); ?>
    <section class="add-student">
        <h1 class="title">Fee Details Search Page  </h1>

        <div class="container">
            <form action="show_fee_details.php" method="get">
                <div class="form-check form-field">
                    <input class="form-check-input" type="radio" name="selection" required value= "paid" id="selection" >
                    <label class="form-check-label" for="selection">
                Fee Paid
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="selection" required value= "unpaid"  id="selection1" >
                    <label class="form-check-label" for="selection1">
                Fee unPaid
                    </label>
                </div>
                <br>
                    <input style ="top: 10px" type="submit" name="show-details" class="submit-btn btn-lg btn-primary"> 
                
                <div class="form-field col-lg-6">
                    <br>
                    <h1>OR</h1>
                </div>
                    <a style ="top: 30px;" class="btn btn-primary" href="student_details.php">Search student Details</a>
                
               
            </form>
        </div>

    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script >


    </script>
</body>
</html>