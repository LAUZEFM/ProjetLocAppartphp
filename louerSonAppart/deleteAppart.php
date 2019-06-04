<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 22/05/2019
 * Time: 21:35
 */

include ('../php/function.php');
var_dump($_GET);
if ($_GET) {
    deleteAppart($_GET['idAppart']);
}
