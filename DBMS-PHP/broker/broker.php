<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">
    <title>Broker</title>
<link rel="preconnect" href="https://fonts.gstatic.com">
<script src="https://kit.fontawesome.com/b8c6c27289.js" crossorigin="anonymous"></script>
<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lato&family=Merienda+One&family=Permanent+Marker&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Yesteryear&display=swap" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">
    <link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">
    <link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">
    <link href="../css/main.css" rel="stylesheet" media="all">
</head>
<style type="text/css">
.bg {
    background-image: url("../images/homebg.jpg");
    min-height: 600px;
    background-attachment: fixed;
    background-position: left;
    background-repeat: no-repeat;
   background-size: cover;
}
  .note
{
    text-align: center;
    height: 80px;
    background: -webkit-linear-gradient(left, #0072ff, #8811c5);
    color: #fff;
    font-weight: bold;
    line-height: 80px;
}
.form-content
{
    padding: 5%;
    border: 1px solid #ced4da;
    margin-bottom: 2%;
}
.form-control{
    border-radius:1.5rem;
}
.btnSubmit
{
    border:none;
    border-radius:1.5rem;
    padding: 1%;
    width: 20%;
    cursor: pointer;
    background: #0062cc;
    color: #fff;
}
    </style>

<body>
     <div id="navbox">
        <br>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="../index.html"><img style="margin-top: -30px;margin-left: 30px;" src="../images/hom.png" height="80px"><span style="margin-left: -2px;margin-top:30px;font-size:50px">Property Managment</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item" style="align-items: right;">
                        <a class="nav-link" href="../index.html">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:asvanthc@gmail.com">Contact</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../index.html">Logout</a>
                    </li>

                </ul>
                <form class="form-inline my-2 my-lg-0">
                </form>
            </div>
        </nav>
        <br>
    </div>  
<div class="bg">
<?php
    $link = mysqli_connect("localhost", "root", "", "prop_mang_system");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$user_id = $_SESSION['user_id'];

$_SESSION['user_id'] = $user_id;
 
$sql = "SELECT * FROM broker natural join property where broker_id='$user_id'";
echo '<br><table class="table table-dark table-hover"  style="margin-left:500px; width:500px">';
echo '<tr>';
echo '<th style="text-align: center;">Broker Alloted</th>';
echo '<th style="text-align: center; text-size:15px">Survey Number</th>';
echo '<th style="text-align: center;">Area(acre)</th>';
echo '<th style="text-align: center;">Property Cost</th>';
echo '<th style="text-align: center;">Broker Fee</th>';
echo '<th style="text-align: center;">Status</th>';
echo '<th style="text-align: center;">Authenticity</th>';
echo '</tr>';

if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            echo "<td style='text-align: center;'>" . $row['broker_id'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['survey_no'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['area']  . "</td>";
            echo "<td style='text-align: center;'>" . $row['price'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['price']*0.1 . "</td>";
            echo "<td style='text-align: center;'>" . $row['status'] . "</td>";
            echo "<td style='text-align: center;'>" . $row['authenticity'] . "</td>";
            echo "</tr>";
        }
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
echo "</table>";
mysqli_close($link);
?>

    <div class="container register-form ">
        <div class="form">
            <div class="note">
                <p>Property Verification</p>
            </div>
<form action="update.php" method="post">
            <div class="form-content" style="background: linear-gradient(to right, #00000063, #ffb4f983); ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="survey_no" class="form-control" placeholder="Survey Number *" value=""/>
                        </div>
                    </div>
                <br>
                <input type="submit" value="Verify" class="btnSubmit"></input>
            </div>
        </div>
    </div>
    </form>
    <form action="change.php" method="post">
            <div class="form-content" style="background: linear-gradient(to right, #00000063, #ffb4f983); ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="com" class="form-control" placeholder="Request Cost Change(service-charge) *" value=""/>
                        </div>
                    </div>
                <br>
                <input type="submit" value="Submit" class="btnSubmit"></input>
            </div>
        </div>    
    </form>
    <form action="change-status.php" method="post">
            <div class="form-content" style="background: linear-gradient(to right, #00000063, #ffb4f983); ">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="survey_no" class="form-control" placeholder="Survey Number*" value=""/>
                        </div>
                    </div>
                <br>
                <input type="submit" value="Sold" class="btnSubmit"></input>
            </div>
        </div>    
    </form>

    <br>
</div>
    
</body>
</html>