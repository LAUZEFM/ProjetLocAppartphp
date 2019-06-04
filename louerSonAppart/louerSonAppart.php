<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 21/05/2019
 * Time: 19:37
 */

include ("../php/header.php");
$idclient = $_SESSION['idClient'];
?>


<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Louer mon appartement" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../louerSonAppart/location.php">
            <input type="text"  class="fadeIn second" name="adresseAppart" placeholder="Adresse">
            <input type="text"  class="fadeIn third" name="prixAppart" placeholder="Prix">
            <input type="text"  class="fadeIn third" name="tailleAppart" placeholder="Taille">
            <input type="text"  class="fadeIn third" name="dateDebut" placeholder="Date début">
            <input type="text"  class="fadeIn third" name="dateFin" placeholder="Date Fin">
            <input type="submit" class="fadeIn fourth" value="Ajouter" name="formAddAppart">

        </form>



    </div>
</div>