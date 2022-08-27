<?php
require('../database/importData.php');
require('../database/connectDbb.php');
DeleteTableApp();
$today = date("Y-m-d");
foreach ($dataApp as $num => $ligne) {
    $codeApprenant = $ligne['codeApprenant'];
    $nom = $ligne['nomApprenant'];
    $prenom = $ligne['prenomApprenant'];
    $codeGroupe = $ligne['informationsCourantes']['codeGroupe'];
    $codeCivilite = $ligne['codeCivilite'];
    //$numeroBadge = $ligne['numeroBadge'];

    $dateDepart = getDateFinApp($codeApprenant);

if($dateDepart!="")
{
$tab= explode("/",$dateDepart);
$annee =  $tab[2];
$mois =  $tab[1];
$jour =  $tab[0];
$df =$annee."-".$mois."-".$jour;
if ($today < $df) 
    $df ="";

}else{
$df = $dateDepart;
}
    
echo $codeApprenant."<br>";
addApp($codeApprenant, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge, $df);
 
}