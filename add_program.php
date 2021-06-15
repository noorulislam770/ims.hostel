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
    <!-- <? // include("http://localhost/app/headers/navbar.php");?> -->
    <section class="add-student">
        <h1 class="title">Enter Program Info </h1>

        <div class="container">
            <form action="server.php" method="get">

                <div class="info-form row">
                    <div class="form-field col-lg-6">
                        <input type="number" class="input-text" id="id" name = "id">
                    <label for="id" class="label">Program Id No</label>  
                </div>
                <div class="form-field col-lg-6">
                    <input type="text" class="input-text" id="name" name = "name">
                    <label for="name" class="label">Program NAme</label>  
                </div>
                
                <div class="form-field col-lg-6">
                    <input type="submit" name="add-program" class="submit-btn btn-lg btn-primary">
                </div>
                
               
            </form>
        </div>

    </section>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script >


    </script>
</body>
</html>