<?php 
    $db_host = "localhost";
    $db_user = "root";
    $db_pass = "";
    $db_id = "biometricdb";
    $conn = "";
    
    try {
        $conn = mysqli_connect( $db_host, 
                                $db_user, 
                                $db_pass, 
                                $db_id);
    } catch (mysqli_sql_exception) {
        echo "Unable Connect to the server";
    }
    if($conn){
        header("../page/home.php");
    }else{
        echo "Unable Connect to the server";
    }
?>