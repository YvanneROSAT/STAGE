<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./css/style.css" />
    <script src="script.js" defer></script>
    <title>GestUFA-St-Aspais</title>
</head>

<body style="margin: 0;
  padding: 0;
  background:linear-gradient(90deg, rgba(2,0,36,1) 0%, rgba(9,9,121,1) 35%, rgba(0,212,255,1) 91%);">

    <!-- Barre de navigation -->
    <nav class="navbar navbar-expand-lg" style="background-color: #e3f2fd;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php">
                <img src="/img/st_aspais_sans_BG.jpg" alt="" width="50" height="44">
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="app.php">App Actif</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="appSortie.php">App Sortie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="groupe.php">Liste Groupe</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="matiere.php">Liste Matiere</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="ProNet.php">Liste ProNet</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active" href="appnet.php">Liste AppNet</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" data-bs-toggle="dropdown" href="#" role="button" aria-expanded="false">Traitement</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="asupprimer.php">Suppression</a></li>
                            <li><a class="dropdown-item" href="amodifier.php">Modification</a></li>
                            <li><a class="dropdown-item" href="ajouter.php">Insertion</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item disabled" href="/script_import/importAppActif.php">Import AppActif</a></li>
                            <li><a class="dropdown-item" href="/script_import/importApp.php">Import Apprenant</a></li>
                            <li><a class="dropdown-item" href="/script_import/importGroupe.php">Import Groupe</a></li>
                            <li><a class="dropdown-item" href="/script_import/importMat.php">Import Matière</a></li>
                            <li><a class="dropdown-item" href="/script_import/personnelNet.php">Import ProNet</a></li>
                        </ul>
                    </li>

                </ul>
                <form class="d-flex" role="search" action="rechercherApp.php" method="get">
                    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
                    <button class="btn btn-outline-success" type="submit" placeholder="valider" name="submit">Rechercher</button>
                </form>
            </div>

        </div>
    </nav>
    <!-- de la barre de navigation -->
    <div class="container">
        <h1> Bienvenue </h1>
    </div>