<?php
require('HeaderFooter/header.php');

include 'database/connectDbb.php';
$liste = GetAajouter();
echo "<br>";
echo "<table class='table mx-auto w-75' id='tbl'>";
echo "<tr>";
echo "<th onclick='sortTable(0)' scope='col'>codeApp</th>";
echo "<th onclick='sortTable(1)' scope='col'>nameApp</th>";
echo "<th onclick='sortTable(2)' scope='col'>prenomApp</th>";
echo "<th onclick='sortTable(2)' scope='col'>numeroBadge</th>";
echo "<th onclick='sortTable(3)' scope='col'>codeGroupe</th>";
echo "<th onclick='sortTable(3)' scope='col'>codeCivilite</th>";
echo "<th onclick='sortTable(3)' scope='col'>dateDepart</th>";
echo "</tr>";   
foreach ($liste as $unApprenant)
{

    $codeApprenant = $unApprenant['codeApp'];
    $nom = $unApprenant['nameApp'];
    $prenom = $unApprenant['prenomApp'];
    $numeroBadge = $unApprenant['numeroBadge'];
    $codeGroupe = $unApprenant['codeGroupe'];
    $codeCivilite = $unApprenant['codeCivilite'];
    $dateDepart = $unApprenant['dateDepart'];
    ajouterTabAajout($codeApprenant, $nom, $prenom, $codeGroupe,$dateCreation);
    insertAppActif($codeApprenant, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge, $dateDepart);
    echo "<tr>";
    echo "<td>".$unApprenant['codeApp']."</td>";
    echo "<td>".$unApprenant['nameApp']."</td>";
    echo "<td>".$unApprenant['prenomApp']."</td>";  
    echo "<td>".$unApprenant['numeroBadge']."</td>";
    echo "<td>".$unApprenant['codeGroupe']."</td>";
    echo "<td>".$unApprenant['codeCivilite']."</td>";
    echo "<td>".$unApprenant['dateDepart']."</td>";
    echo "</tr>";

}
echo "</table>";
?>  