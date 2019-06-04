<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 23/05/2019
 * Time: 16:05
 */

include ("../php/header.php");
$infoClient = $_SESSION['idClient'];
$client = getInfosClient($infoClient);
?>


<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Combien voulez vous ?" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../Credit/updateClientCredit.php">
            <input type="text"  class="fadeIn second" name="credit" placeholder="Entrez la somme désirée">
            <input type="text" class="fadeIn second" name="idClient" value="<?= $client['0']->idClient ?> " hidden>
            <input type="submit" class="fadeIn fourth" value="Acheter" name="formAddCredit">


        </form>



    </div>
</div>