<?php
class SubscribeController extends Controller{

    public function index(){
        $error = "";
        // on verifie si il n'y a pas d'erreures au lancement de la session
        try {
            if (isset($_POST["newusername"]) && isset($_POST["newpassword"])) {
                if (preg_match("/^[A-z]*$/", $_POST["newusername"]) && preg_match("/^[A-z]*$/", $_POST["newpassword"])) {
                    $dataDb = User::getUserByUsername($_POST["newusername"]);                   
                    if ($dataDb == 0) {
                        User::insertNewUser($_POST["newusername"],$_POST["newpassword"]);
                        header("Location:/login");
                        exit();
                    } else {
                        $error = "Username ou mot de passe non valide";
                    }
                } else {
                    $error = "Erreur de saisie";
                }
                // dans le cas ou on peut entrer un username alors on entre dans la condition des caractères que l'on va pouvoir utiliser avec un regex ou preg_match
                // si le if plus haut n'est pas bon alors il y aura une erreur qui s'affichera
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/subscribe.php");
    }
}
?>