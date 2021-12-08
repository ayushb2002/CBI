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
    <title>Edit profile</title>
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
                                    <a class="nav-link" aria-current="page" href="welcome.php">Home</a>
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
                                    <a class="nav-link active dropdown-toggle" href="#" id="navbarDropdownMenuLink"
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
            <div class="col-12 text-center text-white">
                <h1>Enter Officer Details</h1>
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
    header('Location: index.php');
}
else
{  
            if (isset($_GET["adhaar"]) || isset($_SESSION["adhaar"])) {

                if(isset($_GET["adhaar"]))
                    $adhaar = $_GET["adhaar"];
                else
                    $adhaar = $_SESSION["adhaar"];

                $_SESSION["adhaar"] = $adhaar;
               // $sqlnew = "SELECT OfficerID FROM officer WHERE Adhaar='".$adhaar."'";
                $sql2 = "SELECT P.Name FROM person P WHERE P.adhaar = '".$adhaar."'";
                $sql3 = "SELECT OfficerID FROM officer ORDER BY OfficerID DESC LIMIT 1";
                $result2 = $conn->query($sql2);
                $result3 = $conn->query($sql3);

                if(mysqli_num_rows($result2) > 0 && mysqli_num_rows($result3) > 0)
                {
                    $row2 = mysqli_fetch_assoc($result2);
                    $row3 = mysqli_fetch_assoc($result3);
                    $lastID = (int)trim($row3["OfficerID"], "OFF");
                    $newID = $lastID + 1;
                    $officerID = "OFF".(string)$newID;
                    ?>

<div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12 p2">
                        <h2>Name of applicant - <?php echo $row2["Name"]; ?></h2>
                    </div>
                    <div class="col-12 p2">
                        <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" id="editProfile">
                            <div class="col-auto">
                                Officer ID
                                <input type="text" name="officerID" class="form-control criminalDetails" value="<?php echo $officerID; ?>"
                                    disabled>
                            </div>
                            <div class="col-auto">
                                Adhaar
                                <input type="text" name="adhaar" class="form-control criminalDetails" value="<?php echo $adhaar; ?>"
                                    disabled>
                            </div>
                            <div class="col-auto">
                                Success Rate
                                <input type="text" name="successRate" class="form-control criminalDetails" placeholder="Success Rate"
                                    required>
                            </div>
                            <div class="col-auto">
                                Status
                                <input type="text" name="statusVariable" class="form-control criminalDetails" value="Active" disabled>
                            </div>
                            <div class="col-auto">
                                Department
                                <input type="text" name="department" class="form-control criminalDetails" placeholder="Enter department"
                                    required>
                            </div>
                            <div class="col-auto">
                                Joining Date
                                <input type="date" name="joiningDate" class="form-control criminalDetails" placeholder="Enter date"
                                    required>
                            </div>
                            <div class="col-auto">
                                Details
                                <textarea name="details" class="form-control criminalDetails" style="width:30vh;height:20vh;"
                                    placeholder="Enter details in maximum 5 lines." required></textarea>
                            </div>

                            <div class="col-auto">
                                Branch

                                <select name="branch" class="form-control criminalDetails" required>
                                    <option value="none" selected disabled>Choose one</option>
                                    <?php
                            $sql4 = "SELECT * FROM branch";
                            $result4 = $conn->query($sql4);
                            
                            if($result4->num_rows > 0)
                            while($row4 = $result4->fetch_assoc())
                            {
                                ?>

                                    <option value="<?php echo $row4["BranchID"]; ?>"><?php echo $row4["BranchID"]; ?>
                                    </option>

                                    <?php
                            }
                                ?>
                                </select>
                            </div>

                            <div class="col-auto">
                                Position
                                <select name="position" class="form-control criminalDetails" required>
                                    <option value="none" selected disabled>Choose one</option>
                                    <option value="Manager">Manager</option>
                                    <option value="HOD">Head of department</option>
                                    <option value="Field Officer">Field Officer</option>
                                    <option value="Hidden Asset">Hidden Asset</option>
                                    <option value="Desk officer">Desk Officer</option>
                                </select>
                            </div>

                            <div class="col-auto">
                                Temporary Password
                                <input type="text" name="password" class="form-control criminalDetails" placeholder="Enter password "
                                    required>
                            </div>

                            <div class="col-auto">
                                Clearence
                                <input type="number" max="10" min="1" name="clearence" class="form-control criminalDetails"
                                    placeholder="Enter clearence" required>
                            </div>

                            <div class="col-auto">
                                <input type="submit" name="submit" value="Submit" class="btn btn-success">
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                    
                        $sql = "INSERT INTO officer (OfficerID, Adhaar, SuccessRate, State, Department, JoiningDate, Details, Branch, TerminationDate, Position, Password, Clearence) VALUES ('".$officerID."', '".$adhaar."', '".$_REQUEST["successRate"]."', 'Active', '".$_REQUEST["department"]."', '".$_REQUEST["joiningDate"]."', '".$_REQUEST["details"]."', '".$_REQUEST["branch"]."', NULL, '".$_REQUEST["position"]."', '".$_REQUEST["password"]."', '".$_REQUEST["clearence"]."')";
                        $result = $conn->query($sql);

                        if($result)
                        {
                            ?>

            <div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <span class="alert alert-success" role="alert">Welcome to CBI Officer!</span>
                    </div>
                </div>
            </div>

            <?php
            unset($_SESSION["adhaar"]);
                        }
                        else
                        {
                            ?>

            <div class="col-12 m-5 text-white text-center">
                <div class="row">
                    <div class="col-12">
                        <span class="alert alert-warning" role="alert">Could not add officer!</span>
                    </div>
                </div>
            </div>

            <?php
                        }
                    }
                    
                    }
                            }
                            else
                            echo "Could not find data!";
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