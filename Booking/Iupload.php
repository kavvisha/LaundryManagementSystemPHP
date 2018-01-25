<?php


require_once 'DataBase.php';

$storeFolder = 'uploads';

if (!empty($_FILES)) {
    $imgid = $_POST['imgid'];
    $tempFile = $_FILES['file']['tmp_name'];

    $targetPath = $storeFolder . "/";

    $targetFile = $targetPath . $imgid . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $targetFile);
    $sql = "INSERT into roomimage values('','$imgid','$targetFile')";
    mysqli_query($conn, $sql);
}
?> 
