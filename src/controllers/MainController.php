<?php
class MainController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION["id"])) {
            header("Location: /login");
            exit();
        }
        $error = "";
        try {
            $user = User::getUserById($_SESSION["id"]);
            $utilisateur = $user["username"];
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['add'])) {
                if (isset($_POST['title'], $_POST['content']) && !empty($_POST['title']) && !empty($_POST['content'])) {
                    $title = $_POST['title'];
                    $content = $_POST['content'];
                    Post::createPost(new Post($title, $content, $_SESSION["id"]));
                } else {
                    $error = "Les champs titre et contenu sont obligatoires.";
                }
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {
                Post::delPost($_POST["delete"]);
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['repost'])) {
                if (isset($_POST["newtitle"], $_POST["newcontent"]) && !empty($_POST["newtitle"]) && !empty($_POST["newcontent"])) {
                    $title = $_POST["newtitle"];
                    $content = $_POST["newcontent"];
                    Post::modifPost(new Post($title, $content, $_POST["repost"]));
                } else {
                    $error = "Le poste n'a pas été modifié!";
                }
            }
            $postDb = Post::getPost();
            $posts = [];
            foreach ($postDb as $content) {
                $posts[] =  new Post($content["title"], $content["content"], $content["id_user"], $content["id"]);
            }
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        require(__DIR__ . "/../../views/main.php");
    }
}
