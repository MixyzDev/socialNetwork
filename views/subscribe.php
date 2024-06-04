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
        </div>
    </header>
    <main>
        <div class="princContainer">
            <form method="post">
                <div class="pres">
                    <h2>Page d'inscription'</h2>
                    <p>Si vous etes déjà inscrit, connecter vous <a href="/login">ici</a>.</p>
                </div>
                <div class="postsub">
                    <div class="commsub">
                        <input type="text" name="newusername" placeholder="Your name" />
                        <input type="text" name="newpassword" placeholder="Your password" />
                    </div>
                    <div class="btnsub">
                        <button type="submit" name="sub">S'inscrire</button>
                    </div>
                </div>
            </form>
            <!-- ici on a un petit code php qui nous indique que si il n'y a rien de rempli dans le champ alors il affiche l'erreure -->
            <?= $error !== "" ? $error : null ?>
        </div>
    </main>
    <footer>
        <p>Copyright >< Mixyz.dev 2024</p>
    </footer>
</body>

</html>