<html lang="en">

<head>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PMS</title>
    <link rel="shortcut icon" href="favicon.ico">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/main.min.css">
    <link rel="stylesheet" href="../css/css.css">
    <link rel="stylesheet" href="../css/styleold.css">

    <link href="https://fonts.googleapis.com/css2?family=Crimson+Text:ital,wght@1,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Doppio+One&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/b8c6c27289.js" crossorigin="anonymous"></script>
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>

<body style="overflow-x: hidden">
    <!--navbar-->
    <div id="navbox">
        <br>
        <nav class="navbar navbar-expand-lg navbar-light ">
            <a class="navbar-brand" href="../index.html"><img style="margin-top: -30px;margin-left: 30px;" src="../images/hom.png" height="80px"><span style="margin-left: -2px;margin-top:30px;font-size:50px">Property Managment</span></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo02" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav ms-auto mt-2 mt-lg-0">
                    <li class="nav-item" style="align-items:right;margin-left: 600px;">
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


    </h1>

    <!-- items -->

    <div class="row items" id="it">

        <div class="col-lg-2" style="background-color: aliceblue;padding-left: 55px;height:700px;margin-top: 90px;">
            <!-- Section: Sidebar -->
            <section>
                <br><br>
                <!-- Section: Filters -->
                <section>

                    <h5>Filters</h5>

                    <!-- Section: Condition -->
                    <section class="mb-4">
                        <h6 class="font-weight-bold mb-3">Location</h6>
                        <div class="form-check pl-0 mb-3">
                        <input type="text" placeholder="Enter location" id="myInput"><br>
         <button type="button " class="btn btn-primary" onclick="getInputValue();" style=" text-transform: capitalize;">Search</button>
                        </div>
                        <h6 class="font-weight-bold mb-3">Category</h6>
                      
                        <div class="form-check pl-0 mb-3 pb-1">  
                            <input type="checkbox" id="all" name="all" value="Bike" onclick="al()">
<label for="all"> All</label><br>
                        </div>
                        <div class="form-check pl-0 mb-3 pb-1">  
                            <input type="checkbox" id="plt" name="all" value="Bike" onclick="lt()">
<label for="plt"> Land</label><br>
                        </div>
                        <div class="form-check pl-0 mb-3">
                        <input type="checkbox" id="cbd" name="all" value="Bike" onclick="commer()">
<label for="cbd">Commercial building</label><br>
                        </div>
                        <div class="form-check pl-0 mb-3">
                        <input type="checkbox" id="hm" name="all" value="Bike" onclick="hme()">
<label for="hm"> House</label><br>
                        </div>
                    

                    </section>
                    <!-- Section: Condition -->


                    <!-- Section: Price -->
                    <section class="mb-4">

                        <h6 class="font-weight-bold mb-3">Type</h6>

                        <div class="form-check pl-0 mb-3">
                        <input type="radio" id="rt" name="rt" value="Bike" onclick="rent()">
<label for="rt">Rent</label><br>
                        </div>
                        <div class="form-check pl-0 mb-3">
                        <input type="radio" id="sale" name="rt" value="Bike" onclick="sale()">
<label for="sale">Sale</label><br>
                        </div>

                    </section>                  
        </div>

<?php
$link = mysqli_connect("localhost", "root", "", "prop_mang_system");
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}


echo '<div class="col-lg-10 mx-auto justify-content-around justify-content-between d-flex flex-wrap my-2">';
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
        function moneyFormatIndia($num) {
            $explrestunits = "" ;
            if(strlen($num)>3) {
                $lastthree = substr($num, strlen($num)-3, strlen($num));
                $restunits = substr($num, 0, strlen($num)-3); // extracts the last three digits
                $restunits = (strlen($restunits)%2 == 1)?"0".$restunits:$restunits; // explodes the remaining digits in 2's formats, adds a zero in the beginning to maintain the 2's grouping.
                $expunit = str_split($restunits, 2);
                for($i=0; $i<sizeof($expunit); $i++) {
                    // creates each of the 2's group and adds a comma to the end
                    if($i==0) {
                        $explrestunits .= (int)$expunit[$i].","; // if is first value , convert into integer
                    } else {
                        $explrestunits .= $expunit[$i].",";
                    }
                }
                $thecash = $explrestunits.$lastthree;
            } else {
                $thecash = $num;
            }
            return $thecash; // writes the final format where $currency is the currency symbol.
        }
$sql = "SELECT * FROM property";      
while($row = mysqli_fetch_array($result)){

$amount = $row['price'];
$amount = moneyFormatIndia( $amount );

echo '<div class="card sd '.$row['type'].' '.$row['city'].' '.$row['category'].'" style="width: 20rem;" id="a3">';
echo '<img src="../images/' .$row['type'].'.jpg" id="eve" class="card-img-top" alt="...">';
echo '<div class="card-body">';
echo '<h4 class="card-title">'. $row['type'] .' for ' . $row['category'] . '</h4>';
echo '<h5 class="card-text">₹'. $amount .'</h5>';
echo '<span class="card-text ">'. $row['city'] .'</span><pre></pre>';
echo '<a href="payment.html" class="btn btn-primary" style="text-transform: capitalize">Make Payment</a>';
echo '</div>';
echo '</div>';
        }
        mysqli_free_result($result);
    } else{
        echo "No records matching your query were found.";
    }
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}
mysqli_close($link);
echo '</div>';  
?>
        </div>
    </div>
    </div>
    <!--footer-->
   
<script type="text/javascript">
    
function hme() {
    // Get the checkbox
    var checkBox = document.getElementById("hm");
    if (checkBox.checked == true) {
        console.log("ck")
        var elems = document.getElementsByClassName("Land");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = "none";
        }
        var elems = document.getElementsByClassName("Apartment");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
        var elems = document.getElementsByClassName("Build");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'none';
        }
    }
}


function commer() {
    // Get the checkbox
    var checkBox = document.getElementById("cbd");
    if (checkBox.checked == true) {
        console.log("ck")
        var elems = document.getElementsByClassName("Land");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = "none";
        }
        var elems = document.getElementsByClassName("Build");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
        var elems = document.getElementsByClassName("Apartment");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'none';
        }
    }
}


function lt() {
    // Get the checkbox
    var checkBox = document.getElementById("plt");
    if (checkBox.checked == true) {
        console.log("ck")
        var elems = document.getElementsByClassName("Apartment");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = "none";
        }
        var elems = document.getElementsByClassName("Land");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
        var elems = document.getElementsByClassName("Build");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'none';
        }
    }
}


function rent() {
    // Get the checkbox
    var checkBox = document.getElementById("rt");
    if (checkBox.checked == true) {
        console.log("ck")
        var elems = document.getElementsByClassName("sale");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = "none";
        }
        var elems = document.getElementsByClassName("rent");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
    }
}

function sale() {
    // Get the checkbox
    var checkBox = document.getElementById("sale");
    if (checkBox.checked == true) {
        console.log("ck")
        var elems = document.getElementsByClassName("rent");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = "none";
        }
        var elems = document.getElementsByClassName("sale");
        for (var i = 0; i < elems.length; i += 1) {
            elems[i].style.display = 'block';
        }
    }
}

function getInputValue(){
var inputVal = document.getElementById("myInput").value;
var elems = document.getElementsByClassName("sd");
for (var i = 0; i < elems.length; i += 1) {
elems[i].style.display = "none";
}
var elems = document.getElementsByClassName(inputVal);
for (var i = 0; i < elems.length; i += 1) {
elems[i].style.display = 'block';
}
}

function al(){
    var checkBox = document.getElementById("all");
    if (checkBox.checked == true){
        var elems = document.getElementsByClassName("sd");
    for (var i = 0; i < elems.length; i += 1) {
elems[i].style.display = "block";
} 
    }
}
$("input:checkbox").on('click', function() {
  // in the handler, 'this' refers to the box clicked on
  var $box = $(this);
  if ($box.is(":checked")) {
    // the name of the box is retrieved using the .attr() method
    // as it is assumed and expected to be immutable
    var group = "input:checkbox[name='" + $box.attr("name") + "']";
    // the checked state of the group/box on the other hand will change
    // and the current value is retrieved using .prop() method
    $(group).prop("checked", false);
    $box.prop("checked", true);
  } else {
    $box.prop("checked", false);
  }
});

</script>
</body>
</html>