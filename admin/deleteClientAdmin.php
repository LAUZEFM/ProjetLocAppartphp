<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 01/04/2019
 * Time: 17:09
 */



include ('../php/function.php');
var_dump($_GET);
if ($_GET) {
    deleteUserAdmin($_GET['idClient']);
}
