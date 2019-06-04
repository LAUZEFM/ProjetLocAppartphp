<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 28/03/2019
 * Time: 18:54
 */
include ("../php/header.php");
$infoClient = $_SESSION['idClient'];
getInfosClient($infoClient);

?>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>

<div class="container">
<div class="row">
  <div class="col-lg-6">
    <button type="button" class="btn btn-primary"> <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Ajouter un utilisateur </button>
  </div><!-- /.col-lg-6 -->
  <div class="col-lg-6">
    <div class="input-group">
      <input type="search" id="search" class="form-control" placeholder="Cari pasien...">
      <span class="input-group-btn">
        <button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search" aria-hidden="true"></span></button>
      </span>
    </div><!-- /input-group -->
  </div><!-- /.col-lg-6 -->
</div><!-- /.row -->

</br>
                <div style="height: 800px; overflow: auto">
                    <table class="table" id="table" >
                        <thead>
                            <tr>
                                <th>Action</th>
                                <th>Nom</th>
                                <th>Prénom</th>
                                <th>Pseudo</th>
                                <th>Code postal</th>
                                <th>Ville</th>
                                <th>Email</th>
                                <th>Téléphone</th>
                            </tr>
                        </thead>
                        <?php
                        $bdd = getDatabase();
                        $req = $bdd->query('SELECT * FROM client');
                            while($infoClient = $req->fetch()) {


                                ?>
                                <tbody>
                                <tr>
                                    <td><a href="formAdmin.php?idClient=<?=$infoClient['idClient'] ?>"><button type="button" class="btn btn-success" value="<?=$infoClient['idClient'] ?>">Modifier</button>
                                        <a href="deleteClientAdmin.php?idClient=<?=$infoClient['idClient'] ?>"><button type="button" class="btn btn-danger" value="<?=$infoClient['idClient']; ?>">Supprimer</button></a></td>
                                    <td><?php   echo $infoClient['nomClient']; ?></td>
                                    <td><?php   echo $infoClient['prenomClient']; ?></td>
                                    <td><?php   echo $infoClient['pseudoClient']; ?></td>
                                    <td><?php   echo $infoClient['cpClient'];     ?></td>
                                    <td><?php   echo $infoClient['villeClient'];  ?></td>
                                    <td><?php   echo $infoClient['emailClient'];  ?></td>
                                    <td><?php   echo $infoClient['telClient'];   ?></td>
                                </tr>
                                </tbody>
                                <?php
                            }
                        ?>
                    </table>
                </div>
</div>

