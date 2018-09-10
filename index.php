<?php

function get_curl()
{
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://www.linkedin.com/oauth/v2/authorization?client_id=86nfscmcrc4htb&redirect_uri=http://localhost/link/code.php&response_type=code',
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    // Close request to clear up some resources
    curl_close($curl);
    
    return $resp;
}

$variab = get_curl();

var_dump($variab);

?>