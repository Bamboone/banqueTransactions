<!-- Affichage -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8"/>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"
            integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
            crossorigin="anonymous"></script>
    <link rel="stylesheet"
          href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css"
          type="text/css"/>
    <title><?= $titre ?></title>   <!-- Élément spécifique -->
</head>
<body>
<div>
    <div class="container bg-dark">
        <nav class="navbar navbar-dark bg-dark">
            <a class="navbar-brand" href="index.php">La Banque web</a>
            <a class="nav-link" style="color: white" ; href="index.php?action=nouveauCompte">Ajouter un compte</a>
        </nav>
    </div>
    <div class="container bg-light">
        <?= $contenu ?> <!-- Élément spécifique -->
    </div> <!-- #contenu -->
    <footer class="container bg-light">
        <br>
        Site réalisé avec PHP, HTML5 et CSS. <a href="./apropos.html">À propos</a>
    </footer>
</div> <!-- #global -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="Contenu/js/autocompleteMontant.js"></script>
</body>
</html>