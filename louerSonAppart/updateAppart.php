<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 22/05/2019
 * Time: 21:31
 */

include ('../php/function.php');
if (isset($_POST["idAppart"]) && !empty($_POST["idAppart"])) {
    editAppart();
}
else
{
    echo "Erreur d'update";
}

