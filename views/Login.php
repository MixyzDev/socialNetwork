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
                    <h2>Page de Login</h2>
                    <p>Si vous etes déjà inscrit, connecter vous ici.</p>
                </div>
                <div>
                    <div class="inp">
                        <input type="text" name="username" placeholder="Your name" />
                    </div>
                    <div class="inp">
                        <input type="text" name="password" placeholder="Your password" />
                    </div>
                    <div class="inp">
                        <button>Se connecter</button>
                    </div>
                </div>
            </form>
            <div class="sub">
                <h2>Pas encore Inscrit?</h2>
                <a href="/subscribe" class="inp">Inscription</a>
                <!-- ici on a un petit code php qui nous indique que si il n'y a rien de rempli dans le champ alors il affiche l'erreure -->
                <?= $error !== "" ? $error : null ?>
            </div>
        </div>
    </main>
    <footer>
        <p>Copyright >< Mixyz.dev 2024</p>
    </footer>
</body>

</html>