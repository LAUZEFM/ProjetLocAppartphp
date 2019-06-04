<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 25/03/2019
 * Time: 11:54
 */
session_start();
session_destroy();
header('Location: loginPage.php');

?>