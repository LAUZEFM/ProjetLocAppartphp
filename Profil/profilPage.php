<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 26/03/2019
 * Time: 19:52
 */

include ("../php/header.php");
$idclient = $_SESSION['idClient'];
$client = getInfosClient($idclient);
    ?>

    <head>
        <link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet"
              id="bootstrap-css">
        <link href="profil.css">
        <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <!------ Include the above in your HEAD tag ---------->
    </head>
    <div class="container">

        <div class="row">
            <div class="col-xs-12 col-sm-6 col-md-6">

                <div class="well well-sm">
                    Bienvenue sur votre profil <?php echo $client[0]->nomClient; ?>     <?php echo $client[0]->prenomClient; ?> <br>
                    <div class="row">

                        <div class="col-sm-6 col-md-4">
                            <img src="http://placehold.it/380x500" alt="" class="img-rounded img-responsive"/>
                        </div>
                        <div class="col-sm-6 col-md-8">
                            <h4>Prénom : <?= $client[0]->prenomClient; ?> </h4>
                            <h4>Nom de famille : <?= $client[0]->nomClient;  ?></h4>
                            <h4>Pseudo : <?= $client[0]->pseudoClient; ?> </h4>
                            <h4>Ville : <?= $client[0]->villeClient; ?> </h4>
                            <h4>Email : <?= $client[0]->emailClient; ?>  </h4>
                            <h4>Credit : <?= $client[0]->credit; ?> € </h4>
                            <br/>

                            <!-- Split button -->
                            <a type="button" class="btn btn-success" href="../Profil/profilFormEdit.php">Modifier</a>
                            <a type="button" class="btn btn-success" href="../louerSonAppart/louerSonAppart.php">Louer mon appartement</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div class="container">

    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">

            <div class="well well-sm" style="width: 800px">
                Vos appartements mis en location : <br>
                <div class="row" style="overflow: hidden">
                    <table class="table" id="table" >
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Adresse</th>
                            <th>Prix</th>
                            <th>Taille</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                            <th>Locataire</th>

                        </tr>
                        </thead>
                        <?php

                        $bdd = getDatabase();
                        $id = $idclient;
                        $resultatReq = "SELECT * FROM appartement WHERE idProprio = $id";
                        $resultat = $bdd->query($resultatReq);

                        while($ligne = $resultat->fetch()){

                            ?>
                            <tbody>
                            <tr>
                                <td><a href="../louerSonAppart/formEditAppart.php?idAppart=<?=$ligne['idAppart'] ?>"><button type="button" class="btn btn-success" value="<?=$ligne['idAppart'] ?>">Modifier</button>
                                        <a href="../louerSonAppart/deleteAppart.php?idAppart=<?=$ligne['idAppart'] ?>"><button type="button" class="btn btn-danger" value="<?=$ligne['idAppart']; ?>">Supprimer</button></a></td>
                                <td><?php   echo $ligne['adresseAppart']; ?></td>
                                <td><?php   echo $ligne['prixAppart']; ?></td>
                                <td><?php   echo $ligne['tailleAppart']; ?></td>
                                <td><?php   echo $ligne['dateDebut']; ?></td>
                                <td><?php   echo $ligne['dateFin']; ?></td>


                            </tr>
                            </tbody>
                            <?php
                        }


                        ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-6">

            <div class="well well-sm" style="width: 800px">
                L'appartement que vous louez<br>
                <div class="row" style="overflow: hidden">
                    <table class="table" id="table" >
                        <thead>
                        <tr>
                            <th>Action</th>
                            <th>Adresse</th>
                            <th>Prix</th>
                            <th>Taille</th>
                            <th>Date début</th>
                            <th>Date fin</th>
                        </tr>
                        </thead>
                        <?php

                        $bdd = getDatabase();
                        $id = $idclient;
                        $resultatReq = "SELECT * FROM tablelocationappart, client, appartement WHERE appartement.idAppart = tablelocationappart.idAppart AND tablelocationappart.idClient = $id";
                        $resultat = $bdd->query($resultatReq);

                        $ligne = $resultat->fetch();

                        ?>
                        <tbody>
                        <tr>
                            <?php if(!empty($ligne)) { ?>
                            <td><a href="../locationd'UnAppart/deleteLocationdUnAppart.php?idAppart=<?=$ligne['idAppart'] ?>"><button type="button" class="btn btn-success" value="<?=$ligne['idAppart'] ?>">Je ne  loue plus cet appartement</button>
                            <td><?php   echo $ligne['adresseAppart']; ?></td>
                            <td><?php   echo $ligne['prixAppart']; ?></td>
                            <td><?php   echo $ligne['tailleAppart']; ?></td>
                            <td><?php   echo $ligne['dateDebut']; ?></td>
                            <td><?php   echo $ligne['dateFin']; ?></td>
                        </tr>
                        </tbody>
                        <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
