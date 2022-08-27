<?php
require('database/importData.php');
require('database/connectDbb.php');

foreach ($dataGroupe as $num => $ligne) {
    $codeGroupe = $ligne['codeGroupe'];
    echo $codeGroupe . "<hr>";
    $matiere = $ligne['matieres'];

    foreach ($matiere as $uneMatiere) {
        $codeMat = $uneMatiere['codeMatiere'];
        $nomMat = $uneMatiere['nomMatiere'];
        $abregeMatiere = $uneMatiere['abregeMatiere'];
        echo $nomMat . "<br>";
        if ( !empty($codeGroupe) and !empty($codeMat) and !empty($nomMat) and !empty($abregeMatiere)) {
            //addGrpMat($codeGroupe, $codeMat, $nomMat, $abregeMatiere);
        }

        //$nomMat = $uneMatiere['nomMatiere'];

        // if (!empty($codeGroupe) and !empty($codeMat)) {

        //   echo "→ $codeGroupe  $codeMat $nomMat\n";

        //}
    }
}
