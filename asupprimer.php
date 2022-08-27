<?php
require('HeaderFooter/header.php');

include 'database/connectDbb.php';
$liste = GetAsupprimer();
echo "<br>";
echo "<table class='table mx-auto w-75' id='tbl'>";
echo "<tr>";
echo "<th onclick='sortTable(0)' scope='col'>codeApp</th>";
echo "<th onclick='sortTable(1)' scope='col'>nameApp</th>";
echo "<th onclick='sortTable(2)' scope='col'>prenomApp</th>";
echo "<th onclick='sortTable(3)' scope='col'>codeGroupe</th>";
// echo "<th onclick='sortTable(3)' scope='col'>CodeGroupe</th>";
echo "<th onclick='sortTable(3)' scope='col'>dateCreation</th>";
echo "</tr>";   
foreach ($liste as $unApprenant)
{
    
    $codeApprenant = $unApprenant['codeApp'];
    $nom = $unApprenant['nameApp'];
    $prenom = $unApprenant['prenomApp'];
    $codeGroupe = $unApprenant['codeGroupe'];
    $dateCreation = $unApprenant['dateCreation'];
    ajouterTabASuppr($codeApprenant, $nom, $prenom, $codeGroupe, $dateCreation);
    deleteAppActif($unApprenant['codeApp']);
    echo "<tr>";
    echo "<td>".$unApprenant['codeApp']."</td>";
    echo "<td>".$unApprenant['nameApp']."</td>";
    echo "<td>".$unApprenant['prenomApp']."</td>";  
    echo "<td>".$unApprenant['codeGroupe']."</td>";
    //echo "<td>".$unApprenant['CodeGroupe']."</td>";
    echo "<td>".$unApprenant['dateCreation']."</td>";


    echo "</tr>"; 
}
echo "</table>";
?>  