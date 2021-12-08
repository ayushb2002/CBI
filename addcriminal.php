<?php

session_start();

if(isset($_SESSION['ID']) && isset($_SESSION['PWD']))
   {
   
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"
        integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous">
    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js"
        integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous">
    </script>

    <script src="js/main.js"></script>
    <title>Add New Criminal</title>
</head>

<body>
    <div class="container-fluid bg-black">
        <div class="row" id="loader">
            <div class="col-5">
            </div>
            <div class="col-2">
                <div id="loadingBox">
                    <div id="loaderText">C.B.I.</div>
                </div>
            </div>
            <div class="col-5"></div>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark bg-black" id="hidenav">
        <div class="container-fluid">
            <a class="navbar-brand" href="welcome.php">Central Bureau of Investigation</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" aria-current="page" href="welcome.php">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="assigned.php">Assigned cases</a>
                    </li>
                    <li class="nav-item dropdown">
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        Add options
                                    </a>
                                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="addcriminal.php">Add Criminal</a></li>
                            <li><a class="dropdown-item" href="addofficers.php">Add Officer</a></li>
                            <li><a class="dropdown-item" href="addcitizen.php">Add Citizen</a></li>
                            <li><a class="dropdown-item" href="addvictim.php">Add Victim</a></li>
                            <li><a class="dropdown-item" href="addbranch.php">Add Branch</a></li>
                            <li><a class="dropdown-item" href="addcase.php">Add Case</a></li>
                        </ul>
                                </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Display options
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="criminal.php">Criminal List</a></li>
                            <li><a class="dropdown-item" href="officers.php">Officer List</a></li>
                            <li><a class="dropdown-item" href="citizen.php">Citizen List</a></li>
                            <li><a class="dropdown-item" href="victim.php">Victim List</a></li>
                            <li><a class="dropdown-item" href="branch.php">Branch List</a></li>
                            <li><a class="dropdown-item" href="case.php">Case List</a></li>
                            <li><a class="dropdown-item" href="profile.php">Edit profile</a></li>
                        </ul>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Log Out</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid bg-black">

        <div class="row text-white" id="welcomeBody">
            <div class="col-12 text-center text-white">
                <h1>Enter Criminal Details</h1>
            </div>

            <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "project";
                $conn = new mysqli($servername, $username, $password, $dbname);
                if($conn->connect_error)
                {
                    die("Connection failed: " . $conn->connect_error);
                    header('Location: welcome.php');
                }
                else
                {
                    $sql1 = "SELECT O.* FROM officer O WHERE O.OfficerID = '".$_SESSION['ID']."'";

                    $result1 = $conn->query($sql1);

                    if(mysqli_num_rows($result1) > 0)
                    {
                        $row1 = mysqli_fetch_assoc($result1);
                        
                        if($row1["Clearence"] >= 8)
                        {
                            ?>

            <div class="col-12 text-white text-center">
                <form method="GET" action="askcriminaldetails.php">
                    <div class="mb-3">
                        <input type="text" name="adhaar" class="form-control m-3" placeholder="Enter officer adhaar: "
                            required>
                        <button type="submit" class="btn btn-success">Search</button>
                    </div>
                </form>
            </div>

            <?php      
                        }
                        else
                        {
                            ?>
            <div class="col-12 text-center text-white">
                Above your clearence level!
            </div>
            <?php
                        }
                    }
                    else
                    {
                        ?>
            <div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <span class="alert alert-warning" role="alert">Not found!</span>
                    </div>
                </div>
            </div>
            <?php
                    }
                }
            ?>

        </div>
    </div>
</body>

</html>
<?php
   }
    else
    {
        header('Location: index.html');
        exit;
    }
?>