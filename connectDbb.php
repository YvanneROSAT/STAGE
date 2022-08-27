<?php
try {
    $bdd = new PDO('mysql:host=mysql-gestufa.alwaysdata.net;dbname=gestufa_databases;charset=utf8', 'gestufa', 'Staspais');
    $bdd->query("SET NAMES UTF8");
} catch (exception $e) {
    die('Une erreur a été trouver : ' . $e->getMessage());
}

/********************* Les Fonction D'ajoute dans la base de donnée **********************/

function addApp($codeApprenant, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge, $dateDepart)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO apprenant (codeApp, nameApp, prenomApp, codeGroupe, codeCivilite, numeroBadge, dateDepart) VALUES ( :codeApprenant ,:nomApprenant ,:prenomApprenant ,:codeGroupe, :codeCivilite, :numeroBadge, :dateDepart)');
    $req->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupe' => $codeGroupe,
        'codeCivilite' => $codeCivilite,
        'numeroBadge' => $numeroBadge,
        'dateDepart' => $dateDepart,
    ));
}
function addAppActif($codeApprenant, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge, $dateDepart)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO appActif (codeApp, nameApp, prenomApp, codeGroupe, codeCivilite, numeroBadge, dateDepart) VALUES ( :codeApprenant ,:nomApprenant ,:prenomApprenant ,:codeGroupe, :codeCivilite, :numeroBadge, :dateDepart)');
    $req->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupe' => $codeGroupe,
        'codeCivilite' => $codeCivilite,
        'numeroBadge' => $numeroBadge,
        'dateDepart' => $dateDepart,
    ));
}

/* function addAppNet($codeApp,  $codeNet,  $nom, $prenom, $email, $abrg, $nomGroupe) {
    global $bdd;
    $req = $bdd->prepare('INSERT INTO apprenantNet(codeApp, codeNet, nom, prenom, email, abrg, nomGroupe) VALUES (:codeApprenant, :codeNetApprenent, :nomApprenant, :prenomApprenant, :emailApprenant, :abrgApprenant, :nomGroupeApprenant)');
    $req->execute(array(
        'codeApprenant' => $codeApp,
        'codeNetApprenent' => $codeNet,
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'emailApprenant' => $email,
        'abrgApprenant' => $abrg,
        'nomGroupeApprenant' => $nomGroupe, 
    ));
} */

 function addPersoNet($code, $codeNet, $nom, $prenom, $email){
    global $bdd;
    $req = $bdd->prepare('INSERT INTO personnelNet(codePersonnel, codeNetUtilisateur, nom, prenom, email) VALUES (:codePerso, :codeNet, :nomPerso, :prenomPerso, :emailPersonnel)');
    $req->execute(array(
        'codePerso' => $code,
        'codeNet' => $codeNet,
        'nomPerso' => $nom,
        'prenomPerso' => $prenom,
        'emailPersonnel' => $email
    ));
}  
/*function addMat($codeMat, $nomMat, $abregeMat){
    global $bdd;
    $req = $bdd->prepare('INSERT INTO matiere(codeMatiere, nomMatiere,abregeMatiere,) VALUES (:code, :nom, :abrege)');
    $req->execute(array(
        'code' => $codeMat,
        'nom' => $nomMat,
        'abrege' => $abregeMat,
        
    ));
} */
function addGrp($codeGroupe, $nomGroupe, $codeMat){
    global $bdd;
    $req = $bdd->prepare('INSERT INTO groupe(codeGroupe, nomGroupe,codeMatiere) VALUES (:codegrp, :nomgrp, :codemat)');
    $req->execute(array(
        'codegrp' => $codeGroupe,
        'nomgrp' => $nomGroupe,
        'codemat' => $codeMat,

        
    ));
} 
function addGrpMat($codeGroupe, $codeMat, $nomMat, $abregeMatiere)
{

    global $bdd;
    $req = $bdd->prepare('INSERT INTO groupeMatiere(codeGroupe, codeMatiere, nomMatiere, abregeMatiere) VALUES (:codegrp, :codemat, :nommat, :abrege)');
    $req->execute(array(
        'codegrp' => $codeGroupe,
        'codemat' => $codeMat,
        'nommat' => $nomMat,
        'abrege' => $abregeMatiere,


    ));
}






/********************* Fin de fonction D'ajoute dans la base de donnée **********************/



/*************************** Début des fonction d'affichage ****************/


/*function addApp($code, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge)
{
    global $bdd;
    $req = $bdd->prepare('INSERT INTO apprenant (codeApp, nameApp, prenomApp, codeGroupe, codeCivilite, numeroBadge) VALUES ( :codeApprenant ,:nomApprenant ,:prenomApprenant ,:codeGroupe, :codeCivilite, :numeroBadge)');
    $req->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $code,
        'codeGroupe' => $codeGroupe,
        'codeCivilite' => $codeCivilite,
        'numeroBadge' => $numeroBadge
    ));
}*/

function allApp()
{
    global $bdd;
    $sql = "SELECT * FROM appActif,groupe,apprenantNet where (appActif.codeGroupe = groupe.codeGroupe)and (appActif.codeApp = apprenantNet.codeApp) order by groupe.codeGroupe,appActif.nameApp";


    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}

function allAppNet()
{
    global $bdd;
    $sql = "SELECT * FROM apprenantNet";


    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}

function allGroupe()
{
    global $bdd;
    $sql = "SELECT distinct(nomGroupe) as nomGroupe, CodeGroupe FROM apprenant,apprenantNet where apprenant.codeApp = apprenantNet.codeApp order by CodeGroupe,apprenant.nameApp";


    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}
function AppParGrp($x)
{
    global $bdd;
    $sql = "SELECT * FROM appActif,groupe where appActif.codeGroupe = groupe.codeGroupe  and groupe.codeGroupe = $x order by groupe.codeGroupe,appActif.nameApp";


    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}


function allProNet()
{
    global $bdd;
    $sql = "SELECT * FROM personnelNet";


    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}
function allMat()
{
    global $bdd;
    $sql = "SELECT * FROM matiere";
    $qsl = "SELECT nomGroupe FROM apprenantNet";


    $ObjetResult = $bdd->query($sql);
    $liste1 = $ObjetResult->fetchAll();
    return $liste1;
}
function MatParGrp($x)
{
    global $bdd;
    $sql = "SELECT * FROM groupeMatiere WHERE codeGroupe = $x";

    $ObjetResult = $bdd->query($sql);
    $liste1 = $ObjetResult->fetchAll();
    return $liste1;
}
function chercherApp($r)
{
    global $bdd;
    //$sql = "SELECT * FROM apprenant WHERE nomApp LIKE '$r'%"; 
    //correction
    $sql = "SELECT * FROM appActif,groupe WHERE appActif.codeGroupe = groupe.codeGroupe AND nameApp LIKE '$r%'";

    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}

/*function addGrpMat($codeGroupe, $codeMat, $nomMat)
{

    global $bdd;
    $req = $bdd->prepare('INSERT INTO groupeMatieres(codeGroupe, codeMatiere, nomMatiere) VALUES (:codegrp, :codemat, :nommat)');
    $req->execute(array(
        'codegrp' => $codeGroupe,
        'codemat' => $codeMat,
        'nommat' => $nomMat,


    ));
}*/
/*************************** fin de fonction d'affichage *******************/
function DeleteTableApp()
{
    global $bdd;
    //$sql = "SELECT * FROM apprenant WHERE nomApp LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM apprenant ";

    $ObjetResult = $bdd->query($sql);
}
function DeleteTableAppActif()
{
    global $bdd;
    //$sql = "SELECT * FROM appActif WHERE nomApp LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM appActif ";

    $ObjetResult = $bdd->query($sql);
}
function DeleteTablePerso()
{
    global $bdd;
    //$sql = "SELECT * FROM personnelNet WHERE nom LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM personnelNet ";

    $ObjetResult = $bdd->query($sql);
}
function DeleteTableGrp()
{
    global $bdd;
    //$sql = "SELECT * FROM personnelNet WHERE nom LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM groupe ";

    $ObjetResult = $bdd->query($sql);
}
function DeleteMat()
{
    global $bdd;
    //$sql = "SELECT * FROM matiere WHERE nomMat LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM matiere ";

    $ObjetResult = $bdd->query($sql);
}
function deleteTableGroupeMatiere()
{
    global $bdd;
    //$sql = "SELECT * FROM apprenant WHERE nomApp LIKE '$r'%"; 
    //correction
    $sql = "DELETE FROM groupeMatiere ";

    $ObjetResult = $bdd->query($sql);
}

function allAppSortie()
{
    global $bdd;
    $sql = "SELECT * FROM apprenant,groupe,apprenantNet where (apprenant.codeApp = apprenantNet.codeApp) and (apprenant.codeGroupe = groupe.codeGroupe) and (apprenant.dateDepart<>'') order by groupe.codeGroupe,apprenant.nameApp";

    $ObjetResult = $bdd->query($sql);
    $liste = $ObjetResult->fetchAll();
    return $liste;
}
function GetAsupprimer()
{
    global $bdd;
    $sql = "SELECT * FROM appActif WHERE (codeApp NOT IN (SELECT codeApp FROM apprenant)) or(codeApp IN (SELECT codeApp FROM apprenant where apprenant.dateDepart<>''))";

    $liste = $bdd->query($sql);
    return $liste;
}
function deleteAppActif($codeApp)
{
    global $bdd;
    $sql = "DELETE FROM appActif WHERE codeApp = $codeApp";
    $ObjetResult = $bdd->query($sql);
}
function ajouterTabASuppr($codeApprenant, $nom, $prenom, $codeGroupe)
{
    global $bdd;
    $sql = $bdd->prepare('INSERT INTO aSupprimer(codeApp, nameApp, prenomApp, codeGroupe, dateCreation) VALUES ( :codeApprenant, :nomApprenant, :prenomApprenant, :codeGroupe, :dateCreation)');
    $sql->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupe' => $codeGroupe,
        'dateCreation' => date("Y-m-d"),
    ));
    echo $nom;
}



function GetAajouter()
{
    global $bdd;
    $sql = "SELECT * FROM apprenant WHERE (apprenant.dateDepart='' or apprenant.dateDepart is NULL ) and codeApp NOT IN (SELECT codeApp FROM appActif)";

    $liste = $bdd->query($sql);
    return $liste;
}
function insertAppActif($codeApprenant, $nom, $prenom, $codeGroupe, $codeCivilite, $numeroBadge, $dateDepart)
{
    global $bdd;
    $sql = $bdd->prepare("INSERT INTO appActif(codeApp, nameApp, prenomApp, codeGroupe,codeCivilite, numeroBadge, dateDepart) VALUES (:codeApprenant, :nomApprenant, :prenomApprenant, :codeGroupe, :codeCivilite, :numeroBadge, :dateDepart)");
    $sql->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupe' => $codeGroupe,
        'codeCivilite' => $codeCivilite,
        'numeroBadge' => $numeroBadge,
        'dateDepart' => $dateDepart,
    ));
}
function ajouterTabAajout($codeApprenant, $nom, $prenom, $codeGroupe, $dateCreation)
{
    global $bdd;
    $sql = $bdd->prepare('INSERT INTO aAjouter(codeApp, nameApp, prenomApp, codeGroupe, dateCreation) VALUES ( :codeApprenant, :nomApprenant, :prenomApprenant, :codeGroupe, :dateCreation)');
    $sql->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupe' => $codeGroupe,
        'dateCreation' => date("Y-m-d"),
    ));
    echo $nom;
}
function GetAmodifier()
{
    global $bdd;
    $sql = "SELECT * FROM apprenant, appActif WHERE appActif.codeApp = apprenant.codeApp AND (appActif.codeGroupe<>apprenant.codeGroupe) and ((apprenant.dateDepart='') or (apprenant.dateDepart is NULL) )";

    $liste = $bdd->query($sql);
    return $liste;
}
function ajouterTabAmodifier($codeApprenant, $nom, $prenom, $codeGroupeNouveau, $codeGroupeAncien, $dateCreation)
{
    global $bdd;
    $sql = $bdd->prepare('INSERT INTO aModifier(codeApp, nameApp, prenomApp, codeGroupeNouveau, codeGroupeAncien, dateCreation) VALUES ( :codeApprenant, :nomApprenant, :prenomApprenant, :codeGroupeNouveau, :codeGroupeAncien, :dateCreation)');
    $sql->execute(array(
        'nomApprenant' => $nom,
        'prenomApprenant' => $prenom,
        'codeApprenant' => $codeApprenant,
        'codeGroupeNouveau' => $codeGroupeNouveau,
        'codeGroupeAncien' => $codeGroupeAncien,
        'dateCreation' => date("Y-m-d"),
    ));
    echo $nom;
}

/**********/
function modifGrpAppAct($codeApprenant, $codeGroupeNouveau)
{
    global $bdd;
    $sql = "UPDATE appActif SET codeGroupe=$codeGroupeNouveau WHERE codeApp=$codeApprenant";
    $requete = $bdd->query($sql);
    echo $sql;
}
