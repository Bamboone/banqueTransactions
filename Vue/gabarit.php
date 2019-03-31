<!-- Affichage -->
<!doctype html>
<html lang="fr">
<head>
    <meta charset="UTF-8" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.10.1/themes/base/minified/jquery-ui.min.css" type="text/css" />
    <title><?= $titre ?></title>   <!-- Élément spécifique -->
</head>
<body>
<div id="global">
    <header>
        <a href="index.php"><h1>La Banque web</h1></a>
        <p>Je vous souhaite la bienvenue sur cette modeste banque web.</p>
    </header>
    <div>
        <?= $contenu ?>   <!-- Élément spécifique -->
    </div> <!-- #contenu -->
    <footer >
        Site réalisé avec PHP, HTML5 et CSS. <a href="./apropos.html">À propos</a>
    </footer>
</div> <!-- #global -->
<script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
<script type="text/javascript" src="Contenu/js/autocompleteType.js"></script>
</body>
</html>