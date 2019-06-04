<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 01/04/2019
 * Time: 12:03
 */
include ('../php/function.php');
if (isset($_POST["idClient"]) && !empty($_POST["idClient"])) {
    editUserAdmin();
}
else
{
    echo "Erreur d'update";
}