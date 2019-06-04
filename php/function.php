<?php
/**
 * Created by PhpStorm.
 * User: FMLauze
 * Date: 27/03/2019
 * Time: 09:09
 */

function getDatabase()
{
    try {
        $bdd = new PDO('mysql:host=127.0.0.1;dbname=locappart', 'root', 'root',
            array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }
    return $bdd;

}


function getDataBaseInscription(){
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=locappart', 'root', 'root');
    $AdminPseudo = 'Admin';
    $mdpAdmin = 'azertyuiop';
    if(isset($_POST['formInscription'])){
        if(!empty($_POST['nomClient']) AND !empty($_POST['prenomClient']) AND !empty($_POST['pseudoClient']) AND !empty($_POST['password']) AND !empty($_POST['cpClient']) AND !empty($_POST['villeClient'])
            AND !empty($_POST['emailClient']) AND !empty($_POST['telClient'])) {
            $nomClient = htmlspecialchars($_POST['nomClient']);
            $prenomClient = htmlspecialchars($_POST['prenomClient']);
            $pseudoClient = htmlspecialchars($_POST['pseudoClient']);
            $password = sha1($_POST['password']);
            $cpClient = htmlspecialchars($_POST['cpClient']);
            $villeClient = htmlspecialchars($_POST['villeClient']);
            $emailClient = htmlspecialchars($_POST['emailClient']);
            $telClient = htmlspecialchars($_POST['telClient']);

            $inscription = $bdd->prepare("INSERT INTO client(nomClient, prenomClient, pseudoClient, password, cpClient, villeClient, emailClient, telClient) 
                                          VALUES (:nomClient, :prenomClient, :pseudoClient, :password, :cpClient, :villeClient, :emailClient , :telClient)");
            $inscription->execute(array(
                'nomClient' => $nomClient,
                'prenomClient' => $prenomClient,
                'pseudoClient' => $pseudoClient,
                'password' => $password,
                'cpClient' => $cpClient,
                'villeClient' => $villeClient,
                'emailClient' => $emailClient,
                'telClient' => $telClient));
            header('Location: ../landingPage/landingpage.php');
        }

    }
    if($AdminPseudo && $mdpAdmin){
        session_start();
        $_SESSION['admin'] = 1;

    }
    $_SESSION['Login'] = 1;
}
getDataBaseInscription();

function getDataBaseConnexion(){
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=locappart', 'root', 'root');
    $AdminPseudo = 'Admin';
    $mdpAdmin = 'azertyuiop';
    if(isset($_POST['formConnexion'])){
        if(!empty($_POST['pseudoClient']) AND !empty($_POST['password'])){
            $pseudo = htmlspecialchars($_POST['pseudoClient']);
            $password = htmlspecialchars($_POST['password']);
            echo 'b';
            $connexion = $bdd->prepare("SELECT idClient, pseudoClient, password FROM client WHERE pseudoClient = :pseudoClient");
            $connexion->execute(array(
                'pseudoClient' => $pseudo));

            $resultat = $connexion->fetch();
            echo 'c';
            $ifpwdOk = ($_POST['password'] == $resultat['password']);
            if(!$resultat){
                echo "Vos identifiants sont incorrects !";
            } else {
                if($ifpwdOk){
                    session_start();
                    $_SESSION['idClient'] = $resultat['idClient'];
                    $_SESSION['pseudoClient'] = $pseudo;
                    $_SESSION['password'] = $password;
                    $_SESSION['Login'] = 1;


                    header('Location: ../landingPage/landingpage.php');
                    if($AdminPseudo && $mdpAdmin){
                        session_start();
                        $_SESSION['admin'] = 1;

                    }
                } else {
                    echo "Vos identifiants sont incorrects !";
                }
            }

        }
    }
}
getDataBaseConnexion();

function getInfosClient($idClient){
    $bdd = null;
    if($bdd == null){
        $bdd = getDatabase();
    }

    if($bdd){
        $resultatReq = $bdd->prepare("SELECT * FROM client WHERE client.idclient = $idClient");
        if ($resultatReq->execute()) {
            $client = $resultatReq->fetchAll(PDO::FETCH_OBJ);
            $resultatReq->closeCursor();
        }
    }
    return $client;
}

function editUserAdmin(){
    if(isset($_POST['modifierAdmin'])){
        extract(array_map("htmlspecialchars", $_POST));
        $bdd = getDatabase();
        $query = "UPDATE client
    SET  nomClient = :nomClient, prenomClient = :prenomClient, pseudoClient = :pseudoClient, password = :password, cpClient = :cpClient, villeClient = :villeClient, emailClient = :emailClient,
    telClient = :telClient, admin = :admin
    WHERE idClient = :idClient";

        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':idClient', $idClient);
        $stmt->bindParam(':nomClient', $nomClient);
        $stmt->bindParam(':prenomClient', $prenomClient);
        $stmt->bindParam(':pseudoClient', $pseudoClient);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':cpClient', $cpClient);
        $stmt->bindParam(':villeClient', $villeClient);
        $stmt->bindParam(':emailClient', $emailClient);
        $stmt->bindParam(':telClient', $telClient);
        $stmt->bindParam(':admin', $admin);

        $stmt->execute();
        header('Location: ../admin/admin.php');
    } else {
        echo 'ntm';
    }
}

function deleteUserAdmin($idClient)
{

        $req = getDatabase()->prepare('DELETE FROM client WHERE idClient = :idClient');
        $req->bindParam(":idClient", $idClient);
        $req->execute();
        header("Location: ../admin/admin.php");


}

function editUserProfil(){
    if(isset($_POST['modifierClientProfil'])){
        extract(array_map("htmlspecialchars", $_POST));
        $bdd = getDatabase();
        $query = "UPDATE client
    SET  nomClient = :nomClient, prenomClient = :prenomClient, pseudoClient = :pseudoClient, password = :password, cpClient = :cpClient, villeClient = :villeClient, emailClient = :emailClient,
    telClient = :telClient, admin = :admin
    WHERE idClient = :idClient";

        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':idClient', $idClient);
        $stmt->bindParam(':nomClient', $nomClient);
        $stmt->bindParam(':prenomClient', $prenomClient);
        $stmt->bindParam(':pseudoClient', $pseudoClient);
        $stmt->bindParam(':password', $password);
        $stmt->bindParam(':cpClient', $cpClient);
        $stmt->bindParam(':villeClient', $villeClient);
        $stmt->bindParam(':emailClient', $emailClient);
        $stmt->bindParam(':telClient', $telClient);
        $stmt->bindParam(':admin', $admin);

        $stmt->execute();
        header('Location: ../Profil/profilPage.php');
    } else {
        echo 'ntm <3';
    }

}

function addAppart(){
    $bdd = new PDO('mysql:host=127.0.0.1;dbname=locappart', 'root', 'root');
    if(isset($_POST['formAddAppart'])){
        if(!empty($_POST['adresseAppart']) AND !empty($_POST['prixAppart']) AND !empty($_POST['tailleAppart']) AND !empty($_POST['dateDebut']) AND !empty($_POST['dateFin'])){
            $adresseAppart = htmlspecialchars($_POST['adresseAppart']);
            $prixAppart = htmlspecialchars($_POST['prixAppart']);
            $tailleAppart = htmlspecialchars($_POST['tailleAppart']);
            $dateDebut = htmlspecialchars($_POST['dateDebut']);
            $dateFin = htmlspecialchars($_POST['dateFin']);
            $idProprio = htmlspecialchars($_SESSION['idClient']);

            $ajoutAppart = $bdd->prepare("INSERT INTO appartement(adresseAppart, prixAppart, tailleAppart, dateDebut, dateFin, idProprio)
                                          VALUES (:adresseAppart, :prixAppart, :tailleAppart, :dateDebut, :dateFin, :idProprio)");
            $ajoutAppart->execute(array(
                'adresseAppart' => $adresseAppart,
                'prixAppart' => $prixAppart,
                'tailleAppart' => $tailleAppart,
                'dateDebut' => $dateDebut,
                'dateFin' => $dateFin,
                'idProprio' => $idProprio
            ));
            header('Location: ../Profil/profilPage.php');
        }
    }

}

function getInfosAppart($idAppart){
    $bdd = null;
    if($bdd == null){
        $bdd = getDatabase();
    }

    if($bdd){
        $resultatReq = $bdd->prepare("SELECT * FROM appartement WHERE appartement.idAppart = :idAppart");
        $resultatReq->bindParam(':idAppart', $idAppart);
        if ($resultatReq->execute()) {
            $appart = $resultatReq->fetchAll(PDO::FETCH_OBJ);
            $resultatReq->closeCursor();
        }
    }
    return $appart;
}

function editAppart(){
    if(isset($_POST['modifierAppart'])){
        extract(array_map("htmlspecialchars", $_POST));
        $bdd = getDatabase();
        $query = "UPDATE appartement
    SET  adresseAppart = :adresseAppart, prixAppart = :prixAppart, tailleAppart = :tailleAppart, dateDebut = :dateDebut, dateFin = :dateFin, idProprio = :idProprio
    WHERE idAppart = :idAppart";

        $stmt = $bdd->prepare($query);
        $stmt->bindParam(':idAppart', $idAppart);
        $stmt->bindParam(':adresseAppart', $adresseAppart);
        $stmt->bindParam(':prixAppart', $prixAppart);
        $stmt->bindParam(':tailleAppart', $tailleAppart);
        $stmt->bindParam(':dateDebut', $dateDebut);
        $stmt->bindParam(':dateFin', $dateFin);
        $stmt->bindParam(':idProprio', $idProprio);


        $stmt->execute();
        header('Location: ../Profil/profilPage.php');
    } else {
        echo 'ntm';
    }
}

function deleteAppart($idAppart)
{

    $req = getDatabase()->prepare('DELETE FROM appartement WHERE idAppart = :idAppart');
    $req->bindParam(":idAppart", $idAppart);
    $req->execute();
    header('Location: ../Profil/profilPage.php');


}

function addCredit(){
    if(isset($_POST['formAddCredit'])){
        extract(array_map("htmlspecialchars", $_POST));
        $bdd = getDatabase();
        $req = $bdd->query("SELECT credit FROM client WHERE idClient = :idClient");
        $creditinit = htmlspecialchars($_POST['credit']);

        $credit = intval($req['credit']) + intval($creditinit);

        $query2 = "UPDATE client SET credit = credit + :credit WHERE idClient = :idClient";
        $stmt = $bdd->prepare($query2);
        $stmt->bindParam(':credit', $credit);
        $stmt->bindParam(':idClient', $idClient);
        $stmt->execute();
        header('Location: ../Profil/profilPage.php');
    }
}

function louerUnAppart(){
    if(isset($_POST['louerUnAppart'])) {
        $bdd = getDatabase();
        $req = $bdd->prepare("INSERT INTO tablelocationappart(idClient, idAppart)
                                          VALUES (:idClient, :idAppart)");
        $idClient = htmlspecialchars($_POST['idClient']);
        $idAppart = htmlspecialchars($_POST['idAppart']);

        $req->execute(array(
                'idClient' => $idClient,
                'idAppart' => $idAppart)
        );
        header('Location: ../Profil/profilPage.php');
    } else{
        echo ('erreur');
    }

}

function getInfosTabLocAppart($idAppart){
    $bdd = null;
    if($bdd == null){
        $bdd = getDatabase();
    }

    if($bdd){
        $resultatReq = $bdd->prepare("SELECT * FROM tablelocationappart WHERE tablelocationappart.idAppart = :idAppart");
        $resultatReq->bindParam(':idAppart', $idAppart);
        if ($resultatReq->execute()) {
            $appart = $resultatReq->fetchAll(PDO::FETCH_OBJ);
            $resultatReq->closeCursor();
        }
    }
    return $appart;
}

function deleteAppartLoue($idAppart)
{

    $req = getDatabase()->prepare('DELETE FROM tablelocationappart WHERE tablelocationappart.idAppart = :idAppart');
    $req->bindParam(":idAppart", $idAppart);
    $req->execute();
    header('Location: ../Profil/profilPage.php');


}