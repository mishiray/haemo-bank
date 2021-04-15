<?php 

    function logger($email = '',$activity = '', $table = ''){
        global $conn;
        $sql = "INSERT INTO `log`(`email`,`activity`,`table`) VALUES ('$email','$activity','$table')";
        mysqli_query($conn,$sql);
        echo mysqli_error($conn);
    }
?>