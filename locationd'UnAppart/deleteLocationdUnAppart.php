<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 02/06/2019
 * Time: 17:37
 */
include ('../php/function.php');
if ($_GET) {
    deleteAppartLoue($_GET['idAppart']);
}