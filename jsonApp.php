<?php
try {
    $baseUrl = "https://lycee-st-aspais.ymag.cloud/index.php";
    $jeton = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTUxNTc2MDAsImNsdCI6IjAxRUI5Qjc0LUJBNDAtNDU1Ny05ODU2LTkwODRFNUQzMjU2NSJ9.d8xy67-iyR_meqiPBndsAOb1i2BHC9PMZDr2uvVL-58";
    // REQUÃŠTE CONSULTATION
    $url = $baseUrl . "/r/v1/formation-longue/apprenants";
    // options de la session

    $options = [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => [
    "X-Auth-Token: " . $jeton,
    "Content-Type: application/json"
    ],
    CURLOPT_RETURNTRANSFER => true
    ];
    // initialisation de la session
    $ch = curl_init();
    // configuration de la session
    curl_setopt_array($ch, $options);
    // exÃ©cution de la requÃªte
    $response = curl_exec($ch);
    // fermeture de la session
curl_close($ch);
// affiche les donnees au format tableau
#print_r($response);
$dataApp = json_decode($response, true);
}catch(RestException $e) {
        echo $e;
}
?>