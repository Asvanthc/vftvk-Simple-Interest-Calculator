<?php
    $conn = mysqli_connect("localhost", "root", "", "prop_mang_system");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$survey_no=$_REQUEST['survey_no'];
$sql = "UPDATE property SET authenticity='success'  WHERE survey_no=$survey_no";

if (mysqli_query( $conn,$sql)) {
    header( "refresh:0.01;url=admin-prop-view.php" );
  echo "<h3>Record updated successfully...Redirecting.....</h3>";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}
mysqli_close($conn);
?>