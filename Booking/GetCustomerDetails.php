<?php
 //   require_once ("DB.php");
            session_start();
        $TelNo = $_SESSION['varname'];
$con = mysqli_connect("localhost","root","","room-booking");
    
    if (mysqli_connect_errno()){
        echo 'faild to connect';
        
    }
    echo 'connected';
        $NIC = $_POST["GNIC"];
        $Country = $_POST["GCountry"];
        $Address = $_POST["GHAddress"];    


if (!$con) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "UPDATE customer SET Country='$Country',NICPassport='$NIC',HomeAddress='$Address' WHERE phone=$TelNo";

if (mysqli_query($con, $sql)) {
    echo "Record updated successfully";
} else {
    echo "Error updating record: " . mysqli_error($con);
}

mysqli_close($con);

?>


