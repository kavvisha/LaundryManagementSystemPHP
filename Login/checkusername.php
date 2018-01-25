<?php

require_once '../inc/conn.php';

if(!empty($_POST["uname"])) {
    
    $uname=$_POST["uname"];
    $sql="SELECT uname FROM users WHERE uname='$uname'";
    $q=$conn->prepare($sql);
    $q->execute();
    $nrows=$q->rowCount();
    if($nrows==1){
        echo "<span style='color:red'>Username is not available</span>";
    }else{
        
        echo "<span class='blue'>Username is available</span>";
    }
}else{
    
    echo "Empty request, Please fill the field";
}

