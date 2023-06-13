<!DOCTYPE html>
<html>
<head>
    <?php require_once("head.html"); ?>
    <?php if(!isset($_SESSION['ID_connect']))
    {
    ?>
    <link rel="stylesheet" href="css/formulary.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <?php
    }?>
    <link rel="stylesheet" href="css/shopping_basket.css"/>

    <title>Inscription</title>



</head>
<body class="ecran">
<?php require_once("header.php"); ?>

<?php if(!isset($_SESSION['ID_connect']))
    {
        ?>

        <section class="container_center">

        <fieldset class="container_formulary">
            <legend class="fs-1 title_formulary">
                <h1>Inscription</h1>
            </legend>
            <div class="formulary">
                <form class="row formulary_form" id="form_ID" method="POST"  action="formulary/formulary_inscription_connection.php" onsubmit="return inscription()">

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="username" id="username" placeholder="Nom d'utilisateur"/></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input"><input class="input" type="text" name="firstname" placeholder="Prénom"/></div>
                        <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input"><input class="input" type="text" name="lastname" placeholder="Nom"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="email" name="email" placeholder="exemple@abcd.com"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-4"><h6>Date de naissance : </h6></div>

                    <div class="col-4 col-xs-4 col-s-4 col-sm-4 col-md-4 col-xl-4 container_input container_sex">
                        <input class="input" name="day" placeholder="jour" />
                    </div>
                    <div class="col-4 col-xs-4 col-s-4 col-sm-4 col-md-4 col-xl-4 container_input container_sex">
                        <input class="input" name="month" placeholder="mois"/>
                    </div>
                    <div class="col-4 col-xs-4 col-s-4 col-sm-4 col-md-4 col-xl-4 container_input container_sex">
                        <input class="input" name="year" placeholder="année"/>
                    </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-3" id="block_sex_ID"><h6>Sexe :  </h6></div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input" data-sex="block_sex">
                        Homme <input class="input_ins" type="radio" name="sex" data-sex="sex" value="man"/>
                    </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input" data-sex="block_sex">
                        Femme <input class="input_ins" type="radio" name="sex" data-sex="sex" value="women"/>
                    </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" name="password" type="password" onkeyup="inscription_password()" placeholder="Mot de passe"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" name="password2" type="password" placeholder="Confirmation mot de passe"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Le mot de passe de contenir au minimum  : </h6></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input" style="font-weight: normal;">
                    <div data-password="blind-maj">- 1 majuscule.</div>
                    <div data-password="blind-min">- 1 minuscule.</div>
                    <div data-password="blind-number">- 1 chiffre.</div>
                    <div data-password="blind-specialcaracter">- 1 caractère spécial (@$!%?&)</div>
                    <div data-password="blind-caracter">- 8 caractères.</div>
                    </div>


                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input"><input class="input input_sub" type="submit" name="form_inscription" value="inscription"/></div>

                </form>
            </div>
        </fieldset>
    </section>
<?php
    }
    else
    {
        ?>
        <section class="row w-100 container_product " style="height: 100vh; background-color: white;">
            <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 text-center">
                <h1>Vous êtes déjà connecté</h1>
            </div>
        </section>
<?php
    }
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="js/check.js"></script>
</body>
</html>


