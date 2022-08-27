<?php
require('database/importData.php');
require('database/connectDbb.php');

foreach($dataAppNet as $num => $ligne){
    $codeApp = $ligne['codeApprenant'];
    $codeNet = $ligne['codeNetUtilisateur'];
    $nom = $ligne['nom'];
    $prenom = $ligne['prenom'];
    $email = $ligne['email'];
    $abrg = $ligne['abregeGroupe'];
    $nomGroupe = $ligne['nomGroupe'];
    if(!empty($codeApp) and !empty($codeNet) and !empty($nom) and !empty($prenom) and !empty($email) and !empty($abrg) and !empty($nomGroupe) and !empty($nom)){
        echo "→ $codeApp  $codeNet  $nom $prenom $email $abrg $nomGroupe\n";
        //addAppNet($codeApp,  $codeNet,  $nom, $prenom, $email, $abrg, $nomGroupe);
    }
}