<?php

$GLOBALS["str"] = "";
get_URLs("http://192.168.56.101/.hidden/");

$arrURLs = array();


file_put_contents("./result.txt", $GLOBALS["str"]);
$arr = explode("\n", $GLOBALS["str"]);
foreach ($arr as $value) {
    if(preg_match("/[0-9]+/", $value))
    {
        echo $value . "\n";
    }
}

function get_URLs($url) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    $ret = curl_exec($ch);
    preg_match_all("/>[a-zA-Z]+\/?</", $ret, $arr);
    foreach ($arr[0] as $value) {
        $tmp = substr($value, 1, strlen($value) - 2);
        $urlbis = $url . $tmp;
        curl_setopt($ch, CURLOPT_URL, $urlbis);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $ret = curl_exec($ch);
        if ($tmp == "README") {
            $GLOBALS["str"] .= $ret;
        } else {
            get_URLs($urlbis);
        }
    }
    curl_close($ch);
}

?>