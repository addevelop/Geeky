<!DOCTYPE html>
<html>
<head>
    <?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/formulary.css"/>
    <title>Inscription</title>


</head>
<body class="ecran">
<?php require_once("header.php");

if(isset($_SESSION["ID_connect"])) {
$sqluser = "SELECT * FROM users WHERE ID_user = " . $_SESSION["ID_connect"] . ";";
$sqluser = mysqli_query($conn, $sqluser);
$fetchuser = $sqluser->fetch_array();

?>
    <section class="container_center">

        <fieldset class="container_formulary">
            <legend class="fs-1 title_formulary">
                <h1>Infos compte</h1>
            </legend>
            <div class="formulary">
                <form class="row formulary_form" method="POST" action="formulary/formulary_inscription_connection.php">
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-3"><h6>Nom d'utilisateur :  </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="username" disabled="disabled" value="<?php echo $fetchuser['username_user'] ?>"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><span class="input_edit"><i style="font-weight: 100;">(Contactez le service client pour modifier ce champs)</i></span></div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-3"><h6>Prénom :  </h6></div>


                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input_edit" type="text" name="firstname" placeholder="Prénom" value="<?php echo $fetchuser['firstname_user']; ?>"/><img class="img" src="images/edit.png" /></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-3"><h6>Nom :  </h6></div>
                        <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input_edit" type="text" name="lastname" placeholder="Nom" value="<?php echo $fetchuser['lastname_user']; ?>"/><img class="img" src="images/edit.png" /></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-3"><h6>Adresse e-mail :  </h6></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input_edit" type="email" name="email" placeholder="exemple@abcd.com" value="<?php echo $fetchuser['email_user']; ?>"/><img class="img" src="images/edit.png" /></div>
                    <div class="col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><img class="img" src="images/edit.png" /><span class="input_edit">Element modifiable.</span></div>



                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input"><input class="input input_sub" type="submit" name="form_edit" value="enregistrer"/></div>

                </form>
            </div>
        </fieldset>
    </section>

</body>
</html>

<?php
}
?>


