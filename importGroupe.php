<?php
require('database/importData.php');
require('database/connectDbb.php');
DeleteTableGrp();
foreach ($dataGroupe as $num => $ligne) {
    $codeGroupe = $ligne['codeGroupe'];
    $nomGroupe = $ligne['nomGroupe'];
    $codeMat = $ligne['codeMatiere'];
    if (!empty($codeGroupe) and !empty($nomGroupe) and !empty($codeMat)) {

        echo "→ $codeGroupe  $nomGroupe $codeMat \n";
        addGrp($codeGroupe,  $nomGroupe,  $codeMat);
    }
}
