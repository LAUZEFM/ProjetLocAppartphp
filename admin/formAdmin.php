<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 01/04/2019
 * Time: 11:24
 */

include ('../php/header.php');


$idClient = $_GET['idClient'];
$editAdmin = getInfosClient($idClient);
?>
<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Déjà un compte ? Connectez vous !" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../admin/updateClientAdmin.php">
            <!-- <label for="name">Nom : </label> -->
            <input type="text" id="nomClient" class="fadeIn second" name="nomClient" value="<?=$editAdmin[0]->nomClient?>" >
            <input type="text" class="fadeIn second" name="prenomClient" value="<?= $editAdmin['0']->prenomClient ?>">
            <input type="text" class="fadeIn second" name="pseudoClient" value="<?= $editAdmin['0']->pseudoClient ?>">
            <input type="text" class="fadeIn third" name="password" value="<?= $editAdmin['0']->password ?>">
            <input type="text" class="fadeIn second" name="cpClient" value="<?= $editAdmin['0']->cpClient ?> ">
            <input type="text" class="fadeIn second" name="villeClient" value="<?= $editAdmin['0']->villeClient ?>">
            <input type="text" class="fadeIn second" name="emailClient" value="<?= $editAdmin['0']->emailClient ?> ">
            <input type="text" class="fadeIn second" name="telClient" value="<?= $editAdmin['0']->telClient ?> ">
            <input type="text" class="fadeIn second" name="idClient" value="<?= $editAdmin['0']->idClient ?> " hidden>


            <input type="submit" class="fadeIn fourth" value="Modifier" name="modifierAdmin">
        </form>

    </div>
</div>
