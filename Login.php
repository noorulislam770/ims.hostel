<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/custom.css">
    <title>Hello, world!</title>
  </head>
  <body>
    

        <nav class="navbar navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="#">
            <h2>IMS Hostels Managment</h2>
        </a>
    </div>
    </nav>

    <div class="container">
        <div class="row content">
            <div class="col-md-6">
                <h3 class="singin-text mb-3">Sign In </h3>

                <form action="server.php" method="post">
                    <div class="form-group">
                        <label for="username">Email</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="Password" name= "password" class="form-control">
                    </div>

                    <button type="submit" name='login' class="btn btn-primary btn-lg mt-3">Login</button>
                </form>

            </div>
        </div>
    </div>

    <script src="js/bootstrap.bundle.min.js"></script>
  </body>
</html>