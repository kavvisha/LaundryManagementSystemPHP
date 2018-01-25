<?php
try{
include 'co.php';


$storeFolder = 'uploads';

if (!empty($_FILES)) {
    $imgid = $_POST['imgid'];
   $tempFile = $_FILES['file']['tmp_name'];

   $targetPath = $storeFolder . "/";

    $targetFile = $targetPath . $imgid . $_FILES['file']['name'];

    move_uploaded_file($tempFile, $targetFile);
    $stmt = $conn->prepare("INSERT into packpic values('','$imgid','$targetFile')"); 
    $stmt->execute();
}}
 catch (PDOException $e){
     echo $sql . "<br>" . $e->getMessage();
}
?>     
