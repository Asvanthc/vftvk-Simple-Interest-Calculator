<html>
<?php
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">';
echo '<meta name="description" content="Colorlib Templates">';
echo '<meta name="author" content="Colorlib">';
echo '<meta name="keywords" content="Colorlib Templates">';
echo '<!-- Title Page-->';
echo '<title>PMS-Admin Table</title>';
echo '<link rel="preconnect" href="https://fonts.gstatic.com">';
echo '<script src="https://kit.fontawesome.com/b8c6c27289.js" crossorigin="anonymous"></script>';
echo '<link href="https://fonts.googleapis.com/css2?family=Pacifico&display=swap" rel="stylesheet">';
echo '<link href="https://fonts.googleapis.com/css2?family=Lato&family=Merienda+One&family=Permanent+Marker&family=Playfair+Display:ital@1&display=swap" rel="stylesheet">';
echo '<link rel="stylesheet" href="../css/css.css">';
echo '<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">';
echo '<link href="https://fonts.googleapis.com/css2?family=Grand+Hotel&family=Yesteryear&display=swap" rel="stylesheet">';
echo '<!-- bootstrap -->';
echo '<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">';
echo '<!-- Icons font CSS-->';
echo '<link href="vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">';
echo '<link href="vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">';
echo '<!-- Font special for pages-->';
echo '<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800,800i" rel="stylesheet">';
echo '<link href="vendor/select2/select2.min.css" rel="stylesheet" media="all">';
echo '<link href="vendor/datepicker/daterangepicker.css" rel="stylesheet" media="all">';
echo '<link href="../css/main.css" rel="stylesheet" media="all">';
echo '</head>';
echo '<body style="overflow-x: hidden;">';
echo '<div id="navbox">';
echo '<br>';
echo '<nav class="navbar navbar-expand-lg navbar-light ">';
echo '<a class="navbar-brand" href="index.html"><img style="margin-top: -30px;margin-left: 30px;" src="../images/hom.png" height="80px"><span style="margin-left: -2px;margin-top:30px;font-size:50px">Property Managment</span></a>';
echo '<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">';
echo '<span class="navbar-toggler-icon"></span>';
echo '</button>';
echo '<div class="collapse navbar-collapse" id="navbarTogglerDemo02">';
echo '<ul class="navbar-nav ms-auto mt-2 mt-lg-0">';
echo '<li class="nav-item" style="align-items: right;">';
echo '<a class="nav-link" href="admin menu.html">Home</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="mailto:asvanthc@gmail.com">Contact</a>';
echo '</li>';
echo '<li class="nav-item">';
echo '<a class="nav-link" href="../index.html">Logout</a>';
echo '</li>';
echo '</ul>';
echo '<form class="form-inline my-2 my-lg-0">';
echo '</form>';
echo '</div>';
echo '</nav>';
echo '<br>';
echo '</div>';
echo '<div class="row filter bg"  style=" background: linear-gradient(to right, #a8ff78, #78ffd6);">';
echo '<div class=" col-lg-5 mx-auto d-flex justify-content-around mt-5 sortBtn flex-wrap">';
echo '<i class="btn" style="margin-left:19px;font-size:37px;background: #C6FFDD; background: #8E0E00; background: -webkit-linear-gradient(to right, #1F1C18, #8E0E00);';
echo 'background: linear-gradient(to right, #1F1C18, #8E0E00); " id="welcome">Property List</i>';
echo '</div>';
echo '</div>';
echo '</div>';
echo '<div class="page-wrapper bg-gra-03 p-t-45 p-b-50" style=" background: linear-gradient(to right, #a8ff78, #78ffd6);font-size: 18px;">';
echo '<div class="wrapper wrapper--w790" style="margin-left:210px;">';
echo '<table class="table table-dark table-hover">';
echo '<tr>';
    echo '<th>Survey no</th>';
    echo '<th>Owner Id</th>';
    echo '<th>Broker alloted</th>';
    echo '<th>Approved by</th>';
    echo '<th>Price</th>';
    echo '<th>Street</th>';
    echo '<th>City</th>';
    echo '<th>Area</th>';
    echo '<th>Category</th>';
    echo '<th>Type</th>';
    echo '<th>Status</th>';
    echo '<th>Tax</th>';
    echo '<th>Authenticity</th>';
    echo '</tr>';
$link = mysqli_connect("localhost", "root", "", "prop_mang_system");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$sql = "SELECT * FROM property";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        
        while($row = mysqli_fetch_array($result)){
            echo "<tr>";
                echo "<td>" . $row['survey_no'] . "</td>";
                echo "<td>" . $row['owner_id'] . "</td>";
                echo "<td>" . $row['broker_alloted'] . "</td>";
                echo "<td>" . $row['approved_by'] . "</td>";
                echo "<td>" . $row['price'] . "</td>";
                echo "<td>" . $row['street'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "<td>" . $row['area'] . "</td>";
                echo "<td>" . $row['category'] . "</td>";   
                echo "<td>" . $row['type'] . "</td>";
                echo "<td>" . $row['status'] . "</td>";
                echo "<td>" . $row['prop_tax'] . "</td>";
                echo "<td>" . $row['authenticity'] . "</td>";
            echo "</tr>";
        }
        echo "</table>";
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
?>
<br>
<div style="margin-left:140px;" class="container register-form ">
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

<style type="text/css">
  
.bg {
    background-image: url("../images/homebg.jpg");
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

</html>