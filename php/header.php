<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 08/03/2019
 * Time: 12:01
 */
include '../php/function.php';

$infoClient = $_SESSION['idClient'];
?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loc'Appart</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-homepage.css" rel="stylesheet">
    <link href="../loginPage/loginPage.css" rel="stylesheet">

</head>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
        <a class="navbar-brand" href="#">Loc'Appart</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../landingPage/landingpage.php">Home
                        <span class="sr-only">(current)</span>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../Credit/pageCredit.php">Acheter des credits</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../louerSonAppart/louerSonAppart.php">Je veux louer mon appart</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="../locationd'UnAppart/locationdUnAppartPage.php">Je loue un appartement</a>
                </li>
                <?php
                if( $_SESSION['Login']== 1){
                ?>
                <li class="nav-item">
                    <a class="nav-link" href="../Profil/profilPage.php">Profil</a>
                </li>
                    <li class="nav-item">
                        <a class="nav-link" href="../loginPage/logOut.php">Déconnexion</a>
                    </li>
                <?php
                } else {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Se connecter</a>
                    </li>
                    <?php

                }
                ?>
                <?php
                if( $_SESSION['admin']== 1) {
                    ?>
                    <li class="nav-item">
                        <a class="nav-link" href="../admin/admin.php">Admin</a>
                    </li>
                    <?php
                }
                ?>
            </ul>
        </div>
    </div>
</nav>