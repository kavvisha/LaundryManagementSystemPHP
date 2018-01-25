<?php
require '../Login/session.php';  
require_once '../inc/conn.php';



//$EmpID=$_POST['empID'];
$fullname = $_POST['fullname'];
$NIC = $_POST['nic'];
$MNum = $_POST['mnum'];
$LNum = $_POST['lnum'];
$dpt = $_POST['dpt'];
$addr = $_POST['addr'];
$contDu = $_POST['contdu'];
$BasicSal = $_POST['bsalary'];
$post = $_POST['post'];
$addDate = date('d-m-Y');


echo $_FILES["fileToUpload"]["name"];

if (!isset($fullname) || !isset($NIC) || !isset($MNum) || !isset($LNum) || !isset($addr) || !isset($contDu) || !isset($BasicSal) || !isset($post)) {

    echo "ERROR... EMPTY REQUEST";
} else {

    echo $_FILES["fileToUpload"]["name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = pathinfo($target_file, PATHINFO_EXTENSION);
// Check if image file is a actual image or fake image
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
// Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
// Check file size
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
// Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
// Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "The file " . basename($_FILES["fileToUpload"]["name"]) . " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    $image=$_FILES["fileToUpload"]["name"];
    $sql = "INSERT INTO `employee` (`EmpID`, `EmpName`, `NIC`, `Address`, `BasicSalary`, `DivisionID`, `post`, `ContractDuration`, `MNumber`, `LNumber`, `startDate`, `image`) VALUES ('', '$fullname', '$NIC', '$addr', '$BasicSal', '$dpt', '$post', '$contDu', '$MNum', '$LNum', NOW(), '$image')";
    $stmt = $conn->prepare($sql);
    if ($stmt->execute()) {
        echo "Added";
    }
}
?>