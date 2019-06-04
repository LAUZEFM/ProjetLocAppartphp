<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 08/04/2019
 * Time: 14:06
 */
include ('../php/header.php');
$idclient = $_SESSION['idClient'];
$client = getInfosClient($idclient);

?>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Modifier vos informations personnelles" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../Profil/updateClientProfil.php">
            <!-- <label for="name">Nom : </label> -->
            <input type="text" id="nomClient" class="fadeIn second" name="nomClient" value="<?=$client[0]->nomClient; ?>" >
            <input type="text" class="fadeIn second" name="prenomClient" value="<?=$client[0]->prenomClient; ?>">
            <input type="text" class="fadeIn second" name="pseudoClient" value="<?=$client[0]->pseudoClient; ?>">
            <input type="text" class="fadeIn third" name="password" value="<?=$client[0]->password; ?>">
            <input type="text" class="fadeIn second" name="cpClient" value="<?=$client[0]->cpClient; ?>">
            <input type="text" class="fadeIn second" name="villeClient" value="<?=$client[0]->villeClient; ?>">
            <input type="text" class="fadeIn second" name="emailClient" value="<?=$client[0]->emailClient; ?>">
            <input type="text" class="fadeIn second" name="telClient" value="<?=$client[0]->telClient; ?>">
            <input type="text" class="fadeIn second" name="idClient" value="<?=$client[0]->idClient; ?>" hidden>


            <input type="submit" class="fadeIn fourth" value="Modifier" name="modifierClientProfil">
        </form>

    </div>
</div>

