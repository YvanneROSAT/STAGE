<?php
require('database/importData.php');
require('database/connectDbb.php');
DeleteMat();
foreach ($dataMatieres as $num => $ligne) {
    $codemat = $ligne['codeMatiere'];
    $nommat = $ligne['nomMatiere'];
    $abregemat = $ligne['abregeMatiere'];
    if (!empty($codemat) and !empty($nommat) and !empty($abregemat)) {

        echo "→ $codemat  $nommat $abregemat \n";
        //addMat($codemat,  $nommat,  $abregemat);
    }
}
