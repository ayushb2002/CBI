<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "project";
    $officer = $_POST['cbiID'];
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }
    else
    {
        $sql = "SELECT P.name FROM person P, officer O WHERE P.Adhaar = O.Adhaar AND O.OfficerID = '".$officer."'";
        $result = $conn->query($sql);
        if ($result) {
                 $row = $result->fetch_row();
                 if($row == NULL)
                    header("Location: index.html");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-W8fXfP3gkOKtndU4JGtKDvXbO53Wy8SZCQHczT5FMiiqmQfUpWbYdTil/SxwZgAN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.min.js" integrity="sha384-skAcpIdS7UcVUC05LJ9Dxay8AXcDYfBJqt1CJ85S/CFujBsIzCIv+l9liuYLaMQ/" crossorigin="anonymous"></script>
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
        <div class="row" id="siteBody">
            <div class="col-12 text-center" id="siteHead">
                <span>Central Bureau of Investigation, India</span><br>
                <span>Welcome <?php echo $row[0]; ?></span>
            </div>
            <div class="col-12">
                <div class="row">
                    <div class="col-3"></div>
                    <div class="col-6" id="arcDesign">
                        <div id="arcs">
                            <div class="arcDiv1">
                                <div class="arcDiv2">
                                  
                                      <div class="arcDiv3 text-center">
                                        <div class="glitch" data-text="Satyamev Jayate">Satyamev Jayate</div> 
                                        <form action="welcome.php" method="POST">
                                            <input type="hidden" name="cbiID" value="<?php echo $officer; ?>">
                                            <div class="form-control siteForm">
                                                <input type="password" name="cbiPWD" id="cbiID" placeholder="Enter your password" required>
                                            </div>
                                            <div class="form-control siteForm">
                                                <input type="submit" name="Proceed" class="btn btn-outline-light">
                                            </div>
                                        </form>
                                        
                                  </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-3"></div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

  
<?php
        }
        else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    mysqli_close($conn);
    ?>