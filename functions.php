<?php 

    function logger($email = '',$activity = '', $table = ''){
        global $conn;
        $sql = "INSERT INTO `log`(`email`,`activity`,`table`) VALUES ('$email','$activity','$table')";
        mysqli_query($conn,$sql);
        echo mysqli_error($conn);
    }

    function receiversOf($bloodType){
        global $conn;
        $sql = "SELECT `give` FROM `compatibility` WHERE `blood_type` = '$bloodType'";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_object($result);
        return (json_decode($result->give));
    }

    function givesTo($bloodType){
        global $conn;
        $sql = "SELECT `receive` FROM `compatibility` WHERE `blood_type` = '$bloodType'";
		$result = mysqli_query($conn, $sql);
		$result = mysqli_fetch_object($result);
        return (json_decode($result->receive));
    }

    function stringGen($length) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    
    function escape_string($param) {
        if(is_array($param))
            return array_map(__METHOD__, $param);
    
        if(!empty($param) && is_string($param)) {
            return str_replace(array('\\', "\0", "\n", "\r", "'", '"', "\x1a"), array('\\\\', '\\0', '\\n', '\\r', "\\'", '\\"', '\\Z'), $param);
        }
    
        return $param;
    }

    function cleanUp($value) {
        $newVal = trim($value);
        $newVal = htmlspecialchars($newVal);
        $newVal = escape_string(stripslashes($newVal));
        return $newVal;
    }
?>