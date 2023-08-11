<?php
$url = 'https://'.$_GET['ip'];
die(checkAvailable($url));

function checkAvailable($url){
    $handle = curl_init($url);
    curl_setopt($handle, CURLOPT_HEADER, true);
    curl_setopt($handle, CURLOPT_NOBODY, true);
    curl_setopt($handle, CURLOPT_TIMEOUT,10);
    curl_setopt($handle, CURLOPT_SSL_VERIFYPEER, false);
    curl_setopt($handle, CURLOPT_FOLLOWLOCATION, true);
    curl_setopt($handle, CURLOPT_MAXREDIRS, 5);
    curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

    $output = curl_exec($handle);
    $httpcode = curl_getinfo($handle, CURLINFO_HTTP_CODE);

    if($httpcode==301 || $httpcode==302){   
        $redirect = curl_getinfo($handle, CURLINFO_EFFECTIVE_URL);
        return checkAvailable($redirect);
    }
    else if($httpcode >= 200 && $httpcode < 400){
        return true;
    }
    else{
        return "Error : ". $httpcode;
    }

    curl_close($handle);
}


?>