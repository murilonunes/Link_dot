<?php

function post_curl($url,$param="")
{
    $ch = curl_init();
    curl_setopt($ch,CURLOPT_URL,$url);
    if($param!="")
        curl_setopt($ch,CURLOPT_POSTFIELDS,$param);
        
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    $result = curl_exec($ch);
    
    $errors = curl_error($ch);
    $response = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    
    curl_close($ch);
    // also get the error and response code

    
    var_dump($errors);
    var_dump($response);
    
    return $result;
}

function get_curl()
{
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
        CURLOPT_RETURNTRANSFER => 1,
        CURLOPT_URL => 'https://api.linkedin.com/v2/organizationBrands?q=vanityName&vanityName=Linkedin',
        CURLOPT_USERAGENT => 'Codular Sample cURL Request'
    ));
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 0);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 0);
    // Send the request & save response to $resp
    $resp = curl_exec($curl);
    
    $errors = curl_error($curl);
    $response = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    // Close request to clear up some resources
    curl_close($curl);
    
    var_dump($errors);
    var_dump($response);
    
    return $resp;
}

$url    = 'https://www.linkedin.com/uas/oauth2/accessToken';
//$url    = 'https://www.linkedin.com/oauth/v2/authorization';
 
    $uri    = 'http://localhost/link/code.php';
    $param  = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$uri.'&client_id=86nfscmcrc4htb&client_secret=MjSfokDgE3q3rDqc';
    $return = (json_decode(post_curl($url,$param),true));
    //    $param  = 'grant_type=authorization_code&code='.$_GET['code'].'&redirect_uri='.$config['callback_url'].'&client_id='.$config['Client_ID'].'&client_secret='.$config['Client_Secret'];
var_dump($return);

$variab = get_curl();
var_dump($variab);

