<?php
session_start();

require_once(__DIR__ . "/../src/models/Db.php");
require_once(__DIR__ . "/../src/models/repositories/UserRespository.php");
require_once(__DIR__ . "/../src/models/repositories/PostRespository.php");
require_once(__DIR__ . "/../src/models/User.php");
require_once(__DIR__ . "/../src/models/Post.php");
require_once(__DIR__ . "/../src/controllers/Controller.php");
require_once(__DIR__ . "/../src/controllers/LogoutController.php");
require_once(__DIR__ . "/../src/controllers/LoginController.php");
require_once(__DIR__ . "/../src/controllers/MainController.php");
require_once(__DIR__ . "/../src/controllers/SubscribeController.php");
require_once(__DIR__ . "/../core/Router.php");

try{
   $app = new Router();
   $app->start();
}
catch(PDOException $e){
    die($e->getMessage());
}

?>