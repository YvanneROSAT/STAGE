<?php
//generation de 4 tableaux: $dataGroupe,$dataMatieres ,$dataAppNet, $dataPersonnelNet, $dataApp

//*****************liste des groupes **************************
try {
    $baseUrl = "https://lycee-st-aspais.ymag.cloud/index.php";
    $jeton = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTUxNTc2MDAsImNsdCI6IjAxRUI5Qjc0LUJBNDAtNDU1Ny05ODU2LTkwODRFNUQzMjU2NSJ9.d8xy67-iyR_meqiPBndsAOb1i2BHC9PMZDr2uvVL-58";
    $url = $baseUrl . "/r/v1/formation-longue/groupes";
    $options = [
    CURLOPT_URL => $url,
    CURLOPT_HTTPHEADER => [
    "X-Auth-Token: " . $jeton,
    "Content-Type: application/json"
    ],
    CURLOPT_RETURNTRANSFER => true
    ];
   
    $ch = curl_init();
    // configuration de la session
    curl_setopt_array($ch, $options);
    // exÃ©cution de la requÃªte
    $response = curl_exec($ch);
    // fermeture de la session
curl_close($ch);

$dataGroupe = json_decode($response, true);
}
catch (RestException $e) {
echo $e;
}

//***************liste des matières********************

try {
    $baseUrl = "https://lycee-st-aspais.ymag.cloud/index.php";
    $jeton = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTUxNTc2MDAsImNsdCI6IjAxRUI5Qjc0LUJBNDAtNDU1Ny05ODU2LTkwODRFNUQzMjU2NSJ9.d8xy67-iyR_meqiPBndsAOb1i2BHC9PMZDr2uvVL-58";
    // REQUÃŠTE CONSULTATION
    $url = $baseUrl . "/r/v1/matieres";
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

$dataMatieres = json_decode($response, true);
}
catch (RestException $e) {
echo $e;
}
//**********************liste Apprenant Net********************************
try {
    $baseUrl = "https://lycee-st-aspais.ymag.cloud/index.php";
    $jeton = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTUxNTc2MDAsImNsdCI6IjAxRUI5Qjc0LUJBNDAtNDU1Ny05ODU2LTkwODRFNUQzMjU2NSJ9.d8xy67-iyR_meqiPBndsAOb1i2BHC9PMZDr2uvVL-58";
    // REQUÃŠTE CONSULTATION
     $url = $baseUrl . "/r/v1/utilisateur/apprenants";
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

$dataAppNet = json_decode($response, true);
}
catch (RestException $e) {
echo $e;
}
//***********************liste personnel Net************************
try {
    $baseUrl = "https://lycee-st-aspais.ymag.cloud/index.php";
    $jeton = "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpYXQiOjE2NTUxNTc2MDAsImNsdCI6IjAxRUI5Qjc0LUJBNDAtNDU1Ny05ODU2LTkwODRFNUQzMjU2NSJ9.d8xy67-iyR_meqiPBndsAOb1i2BHC9PMZDr2uvVL-58";
    // REQUÃŠTE CONSULTATION
     $url = $baseUrl . "/r/v1/utilisateur/personnels";
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

$dataPersonnelNet = json_decode($response, true);
}
catch (RestException $e) {
echo $e;
}
//**************************liste des Apprentis**************************
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

$dataApp = json_decode($response, true);
}
catch (RestException $e) {
echo $e;
}
?>
