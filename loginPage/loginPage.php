<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 08/03/2019
 * Time: 12:06
 */

?>
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Shop Homepage - Start Bootstrap Template</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Bootstrap core CSS -->
    <link href="../bootstrap-4.3.1-dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/shop-homepage.css" rel="stylesheet">
    <link href="../loginPage/loginPage.css" rel="stylesheet">

</head>

<div class="wrapper fadeInDown">
    <div id="formContent">
        <!-- Tabs Titles -->

        <!-- Icon -->
        <div class="fadeIn first">
            <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="Déjà un compte ? Connectez vous !" />
        </div>

        <!-- Login Form -->
        <form method="post" action="../php/function.php">
            <input type="text"  class="fadeIn second" name="pseudoClient" placeholder="Pseudo">
            <input type="text"  class="fadeIn third" name="password" placeholder="Mot de Passe">
            <input type="submit" class="fadeIn fourth" value="Log In" name="formConnexion">
        </form>

        <!-- Remind Passowrd -->
        <div id="formFooter">
            <a class="underlineHover" href="#">Forgot Password?</a>
        </div>

    </div>
</div>
