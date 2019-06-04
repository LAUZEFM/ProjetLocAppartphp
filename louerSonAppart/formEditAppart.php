<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 22/05/2019
 * Time: 20:57
 */

include ('../php/header.php');


$idAppart = $_GET['idAppart'];
$editAppart = getInfosAppart($idAppart);
?>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Déjà un compte ? Connectez vous !" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../louerSonAppart/updateAppart.php">
            <!-- <label for="name">Nom : </label> -->
            <input type="text" id="nomClient" class="fadeIn second" name="adresseAppart" value="<?=$editAppart[0]->adresseAppart?>" >
            <input type="text" class="fadeIn second" name="prixAppart" value="<?= $editAppart['0']->prixAppart ?>">
            <input type="text" class="fadeIn second" name="tailleAppart" value="<?= $editAppart['0']->tailleAppart ?>">
            <input type="text" class="fadeIn third" name="dateDebut" value="<?= $editAppart['0']->dateDebut ?>">
            <input type="text" class="fadeIn second" name="dateFin" value="<?= $editAppart['0']->dateFin ?> ">
            <input type="text" class="fadeIn second" name="idAppart" value="<?= $editAppart['0']->idAppart ?>" hidden>
            <input type="text" class="fadeIn second" name="idProprio" value="<?= $editAppart['0']->idProprio ?> " hidden>




            <input type="submit" class="fadeIn fourth" value="Modifier" name="modifierAppart">
        </form>

    </div>
</div>

