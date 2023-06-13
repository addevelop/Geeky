<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/formulary.css"/>

    <link rel="stylesheet" href="css/admingestion.css"/>
    <title>Acceuil</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

</head>
<body>
<?php require_once("db.php"); ?>


<?php require_once("header.php"); ?>
<!------------------------------------------- MODIFIER USER -------------------------------------------->
<?php
if(isset($_GET['modifier']))
{
    $sqluser = "SELECT * FROM users WHERE ID_user = " .$_GET['modifier']. "";
    $sqluser = mysqli_query($conn, $sqluser);
    $fetchuser = $sqluser->fetch_array();

    ?>
<section id="form_edit_user" class="connection w-100 h-100 d-block" style="z-index: 1000; top:0; padding-top: 1vh; position: fixed;">
    <fieldset class="container_formulary m-auto">
        <legend class="fs-1 title_formulary">
            <h1>Modifier</h1>
        </legend>
        <div class="formulary">
            <form class="row formulary_form" method="POST" action="formulary/formulary_inscription_connection.php">
                <div class=" w-100" style="position: relative; top: 0; text-align: right; color: white; cursor: pointer;">
                    <p id="back_edit_user" onclick="back_edit_user()">retour</p>
                </div>
                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">N°<input style="background-color: transparent; border: none; color: white;" type="text" name="IDuser" value="<?php echo $fetchuser['ID_user']; ?>"/></div>

                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="username" placeholder="Nom d'utilisateur" value="<?php echo $fetchuser['username_user']; ?>"/></div>

                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input"><input class="input" type="text" name="firstname" placeholder="Prénom" value="<?php echo $fetchuser['firstname_user']; ?>"/></div>
                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input"><input class="input" type="text" name="lastname" placeholder="Nom" value="<?php echo $fetchuser['lastname_user']; ?>"/></div>
                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="email" name="email" placeholder="exemple@abcd.com" value="<?php echo $fetchuser['email_user']; ?>"/></div>
                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-4"><h6>Date de naissance : </h6></div>
                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input mt-3"><h6>Sexe :  </h6></div>


                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                    <p><?php echo $fetchuser['birthday_user']; ?></p>
                </div>



                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                    <?php
                    if($fetchuser['sex_user'] == "women")
                        {
                            echo "<p>Femme</p>";

                        }
                    else
                        {
                            echo "<p>Homme</p>";

                        }
                    ?>
                </div>
                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Adresse de livraison : </h6></div>

                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="delivery_address" placeholder="N° de rue, Nom de rue, Ville, Code postale"  value="<?php echo $fetchuser['delivery_address_user']; ?>"/></div>
                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Numero de téléphone : </h6></div>

                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" type="text" name="tel_number" placeholder="exemple: 0601010101"  value="<?php echo $fetchuser['tel_number_user']; ?>"/></div>
                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Status : </h6></div>
                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Compte : </h6></div>


                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                    <?php $status = $fetchuser['status_user']=="admin"?"admin":"membre"; ?>
                    <select name="status">
                        <option value="<?php echo $fetchuser['status_user']; ?>"><?php echo $fetchuser['status_user'] ?></option>
                        <option value="membre">membre</option>
                        <option value="admin">admin</option>
                    </select>
                </div>

                <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                    <select name="activate">
                        <?php $activate = $fetchuser['activate_user']==1?"activer":"desactiver"; ?>
                        <option value="<?php echo $fetchuser['activate_user']; ?>"><?php echo $activate; ?></option>
                        <option value="1">activer</option>
                        <option value="0">désactiver</option>
                    </select>
                </div>

                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input class="input" name="password" type="password" placeholder="Mot de passe"/></div>
                <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input"><input class="input input_sub" type="submit" name="form_modifier_user" value="Modifier"/></div>

            </form>
        </div>
    </fieldset>
</section>



    <?php
}
?>


<!------------------------------------------- APPEAR ALL USERS OR SEARCH USER -------------------------------------------->

<?php
    if(isset($_GET['type']) AND $_GET['type'] == 1)
    {
        ?>
        <section class="container_search_ag">
            <form class="d-flex" id="form_client_ID" method="POST">
                <img class="d-block" style="width: auto;height: 50px; margin: auto;" src="images/loupe.png"/>
                <input type="search" name="searchCli" class="input_search_ag" placeholder="rechercher" value="<?php echo $_GET['value']; ?>"/>
            </form>
        </section>
        <section class="w-100">
            <table class="table_ag">
                <tr class="tr_ag">
                    <th>N°</th>
                    <th>Nom d'utilisateur</th>
                    <th>Prénom</th>
                    <th>Nom</th>
                    <th>adresse email</th>
                    <th>Date de naissance</th>
                    <th>Sex</th>
                    <th>Status</th>
                    <th>Activation</th>
                    <th>Modifs/Suppression</th>
                </tr>
                <?php
                $sql = "SELECT * FROM users";
                if($_GET['value'] != "") {
                    $sql = "SELECT * FROM users WHERE username_user LIKE '%" .$_GET['value']. "%' OR firstname_user LIKE '%" .$_GET['value']. "%' OR lastname_user LIKE '%" .$_GET['value']. "%' OR email_user LIKE '%" .$_GET['value']. "%' OR birthday_user LIKE '%" .$_GET['value']. "%' OR sex_user LIKE '%" .$_GET['value']. "%' OR status_user LIKE '%" .$_GET['value']. "%' OR activate_user LIKE '%" .$_GET['value']. "%'";
                }
                $sqlreq = mysqli_query($conn, $sql);
                while($fetch = $sqlreq->fetch_array())
                {
                ?>
                <tr class="tr_ag">
                    <td><?php echo $fetch['ID_user'];?></td>
                    <td><?php echo $fetch['username_user'];?></td>
                    <td><?php echo $fetch['firstname_user'];?></td>
                    <td><?php echo $fetch['lastname_user'];?></td>
                    <td><?php echo $fetch['email_user'];?></td>
                    <td><?php echo $fetch['birthday_user'];?></td>
                    <td><?php echo $fetch['sex_user'];?></td>
                    <td><?php echo $fetch['status_user'];?></td>
                    <td class="text-center"><?php
                        if($fetch['activate_user'] == 1) {
                            echo "<b style='color: green;'>Activé</b>";
                        }
                        else
                            {
                                echo "<b style='color:red;'>Desactivé</b>";
                            }
                        ?></td>
                    <td class="modif row w-100">
                        <a class="a_ text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_user']; ?>" data-numeroid="<?php echo $fetch['ID_user']; ?>" data-type="modifier" onclick="modifier(this)"><b>Modifier</b></a>
                        <?php
                        if($fetch['activate_user'] == 0)
                            {
                                ?>
                        <a class="a_ modification text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_user']; ?>" data-type="activer"  data-activate="1" onclick="check(this)"><b>activer le compte</b></a>
                        <?php
                            }
                        else
                            {
                                ?>
                        <a class="a_ delete text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_user']; ?>" data-type="supprimer" data-activate="0" onclick="check(this)"><b>Désactiver le compte</b></a></td>
<?php
}?>
                </tr>
                <?php
                }
                ?>
            </table>
        </section>
<?php
    }
?>
<script>
    $(document).ready(function()
    {
        var name = $("input[name=searchCli]");
        var value = name.val();
        name.focus();
        name.val('');
        name.val(value);



    })
    $("input[name=searchCli]").bind('keyup', function()
    {
        var name = "&value="+$('input[name=searchCli]').val();
        window.location.href = "admingestion.php?type=1"+name+"";
        console.log('heuuu');
    })

    function check(n)
    {

        var confirmmodif = confirm("Voulez vous réellement "+$(n).data('type')+" l'utilisateur N° "+$(n).data('numeroid')+"");
        console.log($(n).data('numeroid'));
        var datat = {numeroid: $(n).data('numeroid'), activate: $(n).data('activate') }
        if(confirmmodif)
        {
            $.ajax({
                url: 'formulary/gestion.php',
                type: 'post',
                data: datat,
                success: function(response){
                    console.log(response);
                }

            });
            location.reload();

        }

    }

    function modifier(n)
    {
        window.location.href = "admingestion.php?type=1&value=&modifier="+$(n).data('numeroid')+"";
    }

    function back_edit_user()
    {
        console.log('heuuu');
        window.location.href = "admingestion.php?type=1&value=";
    }
</script>
</body>
</html>

<?php

?>