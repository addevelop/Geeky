<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/admin.css"/>
    <title>Acceuil</title>
</head>
<body>
<?php require_once("db.php"); ?>


<?php require_once("header.php"); ?>

<section class="container-fluid">
    <nav class="row container_menu_admin">
        <article class="title_menu_admin">
            <h1>Gestion Client</h1>
            <div><a class="a_" href="admingestion.php?type=1&value=">Informations personnelles</a></div>
            <div><a class="a_" href="ordergestion.php?type=1&value=">Commandes Client</a></div>
        </article>
        <article class="title_menu_admin">
            <h1>Gestion produit</h1>
            <div><a class="a_" href="productgestion.php?type=1&value=">Informations produit</a></div>
        </article>
    </nav>
</section>

</body>
</html>