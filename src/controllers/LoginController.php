<?php

class LoginController extends Controller
{

    public function index()
    {
        // on verifie si il n'y a pas d'erreures au lancement de la session
        $error = "";
        try {
            if (isset($_POST["username"]) && isset($_POST["password"])) {
                if (preg_match("/^[A-z]*$/", $_POST["username"]) && preg_match("/^[A-z]*$/", $_POST["password"])) {
                    $dataDb = User::getLog($_POST["username"], $_POST["password"]);
                    if ($dataDb != 0) {
                        $_SESSION["id"] = $dataDb["id"];
                        header("Location:/");
                        exit();
                    } else {
                        $error = "Username ou mot de passe incorrect";
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
        require_once(__DIR__ . "/../../views/Login.php");
    }
}
