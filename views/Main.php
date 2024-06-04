<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/CSS/stylemain.css">
    <title>Document</title>
</head>

<body>
    <header>
        <div class="entete">
            <a href="/">
                <h1>MixyzNetwork V.1</h1>
            </a>
            <a href="/logout" class="decobtn">Se déconnecter</a>
        </div>
    </header>
    <main>
        <div class="princContainer">
            <div class="pres">
                <h2>Welcom <?php echo isset($utilisateur) ? $utilisateur : 'Utilisateur non connecté' ?> to MixyzNetwork V.1</h2>
                <p>Un réseau social dédié au développeurs! A terme, il vous sera possible de partager vos idées, vos codes,
                    vos projet réalisé et en discuter avec d'autres développeurs! ensemble améliorons nos codes!</p>
            </div>
            <div class="contentPost">
                <h3>Publications récentes</h3>
                <form method="post">
                    <?php foreach ($posts as $post) : ?>
                        <?php if (isset($_POST["modify"]) && $_POST["modify"] == $post->getId()) { ?>
                            <div class="post">
                                <div class="comm">
                                    <input type="text" name="newtitle" placeholder="modifier le titre" value="<?= $post->getTitledecrypt() ?>">
                                    <textarea type="text" name="newcontent" placeholder="modifier le contenu"><?= $post->getContentdecrypt() ?></textarea>
                                </div>
                                <div>
                                    <button type="submit" name="repost" value="<?= $post->getId() ?>">Confirmer</button>
                                </div>
                            </div>
                        <?php } else { ?>
                            <div class="post">
                                <div class="comm">
                                    <h4><?= $post->getTitledecrypt() ?></h4>
                                    <p><?= $post->getContentdecrypt() ?></p>
                                </div>
                                <?php if ($post->getIdUser() == $_SESSION["id"]) { ?>
                                    <div class="btncomm">
                                        <button type="submit" name="modify" value="<?= $post->getId() ?>">Modifier</button>
                                        <button type="submit" name="delete" value="<?= $post->getId() ?>">Supprimer</button>
                                        <hr>
                                    </div>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    <?php endforeach ?>
                </form>
                <div class="add">
                    <h3>Ajouter un Poste</h3>
                    <div>
                        <label for="title">Titre</label>
                        <input type="text" name="title" placeholder="Titre">
                    </div>
                    <div>
                        <label for="content">Post</label>
                        <textarea name="content" id="post" placeholder="Votre post"></textarea>
                    </div>
                    <div>
                        <button type="submit" name="add" value="post">Ajouter</button>
                    </div>
                </div>
            </div>

            <!-- ici on a un petit code php qui nous indique que si il n'y a rien de rempli dans le champ alors il affiche l'erreure -->
            <?= $error !== "" ? $error : null ?>
        </div>
    </main>
    <footer>
        <p>Copyright >< Mixyz.dev 2024</p>
    </footer>
</body>

</html>