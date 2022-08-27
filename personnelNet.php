<?php
require('../database/connectDbb.php');
require("../database/importData.php");

foreach($dataPersonnelNet as $num => $ligne) {
    $code = $ligne['codePersonnel'];
    $codeNet = $ligne['codeNetUtilisateur'];
    $nom = $ligne['nom'];
    $prenom = $ligne['prenom'];
    $email = $ligne['email'];
    $dd = $ligne['dd'];
    if (!empty($code) and !empty($codeNet) and !empty($nom) and !empty($prenom) and !empty($email)) {
        echo "→ $code $codeNet $nom $prenom $email \n";
        addPersoNet($code, $codeNet, $nom, $prenom, $email);
    }
}
