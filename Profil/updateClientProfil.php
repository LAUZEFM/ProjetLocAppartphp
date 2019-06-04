<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 08/04/2019
 * Time: 15:09
 */

include ('../php/function.php');
if (isset($_POST["idClient"]) && !empty($_POST["idClient"])) {
    editUserProfil();
}
else
{
    echo "Erreur d'update";
}