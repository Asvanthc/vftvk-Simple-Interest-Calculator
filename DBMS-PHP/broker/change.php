<?php
    $conn = mysqli_connect("localhost", "root", "", "prop_mang_system");
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
$commission=$_REQUEST['com'];
$sql = "UPDATE property SET price=price+$commission";

if (mysqli_query( $conn,$sql)) {
    header( "refresh:1;url=broker.php" );
  echo "<h3>Records updated successfully...Redirecting.....</h3>";
} else {
  echo "Error updating record: " . mysqli_error($conn);
}

mysqli_close($conn);
?>