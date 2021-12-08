<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    session_start();
    if (isset($_SESSION['ID']) && isset($_SESSION['PWD']))
    {
        $officer = $_SESSION['ID'];
        $pwd = $_SESSION['PWD'];
        goto skip1;
    }
    else
    {
        if(!empty($_POST))
        {
            $officer = $_POST['cbiID'];
            $pwd = $_POST['cbiPWD'];
        }    
    }

    skip1:

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT P.* FROM person P, officer O WHERE P.Adhaar = O.Adhaar AND O.OfficerID = '".$officer."'"." AND O.Password = '".$pwd."'";
        $result = $conn->query($sql);
        if (mysqli_num_rows($result) > 0) {
            $_SESSION['ID'] = $officer;
            $_SESSION['PWD'] = $pwd;
            while($row = mysqli_fetch_assoc($result)) {
              
            
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
    <title>CBI India</title>
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
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                            aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse" id="navbarNavDropdown">
                            <ul class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a class="nav-link active" aria-current="page" href="welcome.php">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="assigned.php">Assigned cases</a>
                                </li>
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
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
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink"
                                        role="button" data-bs-toggle="dropdown" aria-expanded="false">
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
            <div class="col-6 welcomeText">
                <span>
                    <?php echo $row["Name"] ?> 
                </span>
            </div>
            <div class="col-6 welcomeText">
                <img src="img/icon.png" alt="officer" class="welcomeImg">
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Unique Adhaar - <?php echo $row["Adhaar"] ?>
                </span>
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Age - <?php echo $row["Age"] ?>
                </span>
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Mobile - <?php echo $row["Phone"] ?> 
                </span>
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Gender - <?php echo $row["Gender"]  ?>
                </span>
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Address - <?php echo $row["Address"] ?>
                </span>
            </div>
            <div class="col-6">
                <span class="welcomeDetails">
                    Qualifications - <?php echo $row["Qualification"] ?>
                </span>
                </div>
        </div>
    </div>
</body>

</html>


<?php
        }
    }
        else {
            echo "Error: Invalid Credentials";
            session_destroy();
            header('Location: index.html');
        }
    }
    mysqli_close($conn);
    ?>