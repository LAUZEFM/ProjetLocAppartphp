<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 30/05/2019
 * Time: 21:18
 */

include ("../php/header.php");

?>


<?php
$bdd = getDatabase();
$infoClient = $_SESSION['idClient'];
$client = getInfosClient($infoClient);
$resultatReq = "SELECT * FROM appartement";
$resultat = $bdd->query($resultatReq);

while($ligne = $resultat->fetch()) {

    $idAppart = $ligne['idAppart'];
    $appart = getInfosAppart($ligne['idAppart']);
    $appart = getInfosTabLocAppart($ligne['idAppart']);
        if (empty($appart)) { ?>
            <div class="jumbotron">
                <h1 class="display-4"><?php echo $ligne['adresseAppart']; ?></h1>
                <p class="lead"><?php echo $ligne['prixAppart']; ?> € </p>
                <hr class="my-4">
                <p>It uses utility classes for typography and spacing to space content out within the larger container.</p>
                <p class="lead">
                <form method="post" action="updateLocationAppClient.php">
                    <input type="hidden" class="fadeIn second" name="idAppart" value="<?= $ligne['idAppart']; ?>">
                    <input type="hidden" class="fadeIn second" name="idClient" value="<?= $infoClient; ?>">
                    <input type="submit" class="fadeIn fourth" value="Louer" name="louerUnAppart">
                </form>
                </p>
            </div>
      <?php
    }
}
?>

