<?php
require('HeaderFooter/header.php');

include 'database/connectDbb.php';
$liste = GetAmodifier();
echo "<br>";
echo "<table class='table mx-auto w-75' id='tbl'>";
echo "<tr>";
echo "<th onclick='sortTable(0)' scope='col'>codeApp</th>";
echo "<th onclick='sortTable(1)' scope='col'>nameApp</th>";
echo "<th onclick='sortTable(2)' scope='col'>prenomApp</th>";
echo "<th onclick='sortTable(3)' scope='col'>codeGroupeNouveau</th>";
echo "<th onclick='sortTable(3)' scope='col'>CodeGroupeAncien</th>";
echo "<th onclick='sortTable(3)' scope='col'>dateCreation</th>";
echo "</tr>";   

foreach ($liste as $unApprenant)
{
    $codeApprenant = $unApprenant['codeApp'];
    $nom = $unApprenant['nameApp'];
    $prenom = $unApprenant['prenomApp'];
    $codeGroupe = $unApprenant['codeGroupe'];
    $codeGroupeNouveau = $unApprenant[3];
    $codeGroupeAncien = $unApprenant[10];
    $dateCreation = $unApprenant['dateCreation'];
    ajouterTabAmodifier($codeApprenant, $nom, $prenom, $codeGroupeNouveau, $codeGroupeAncien, $dateCreation);
    modifGrpAppAct($codeApprenant, $codeGroupeNouveau);
    echo "<tr>";
    echo "<td>".$unApprenant['codeApp']."</td>";
    echo "<td>".$unApprenant['nameApp']."</td>";
    echo "<td>".$unApprenant['prenomApp']."</td>";  
    echo "<td>".$unApprenant['codeGroupeNouveau']."</td>";
    echo "<td>".$unApprenant['CodeGroupeAncien']."</td>";
    echo "<td>".$unApprenant['dateCreation']."</td>";
    echo "</tr>";

}
echo "</table>";
?>  