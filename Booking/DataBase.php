<?php

$con = mysqli_connect("localhost","root","","hotel");
  if (mysqli_connect_errno()){
        echo 'faild to connect';
        
    }
    echo 'connected';