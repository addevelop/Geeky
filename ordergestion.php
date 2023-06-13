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

<?php
if (isset($_GET['modifier'])) {
    $sqlorder = "SELECT *, SUM(quantity_ord) as 'quantity', SUM(price_ord) as 'price' FROM orders ord INNER JOIN users usr ON ord.ID_user = usr.ID_user WHERE ord.numero_ord = '" . $_GET['modifier'] . "' GROUP BY ord.numero_ord";
    $sqlorder = mysqli_query($conn, $sqlorder);
    $fetchorder = $sqlorder->fetch_array();

    ?>
    <section id="form_edit_user" class="connection w-100 h-100 d-block backgroundblur" >
        <fieldset class="container_formulary m-auto">
            <legend class="fs-1 title_formulary">
                <h1>Modifier</h1>
            </legend>
            <div class="formulary">
                <form class="row formulary_form" method="POST" action="formulary/formulary_inscription_connection.php">
                    <div class=" w-100" style="position: relative; top: 0; text-align: right; color: white; cursor: pointer;">
                        <p id="back_edit_user" onclick="back_edit_user()">retour</p>
                    </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input type="hidden" name="IDuser" value="<?php echo $fetchorder['ID_user']; ?>"/></div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">N°<input style="background-color: transparent; border: none; color: white;" type="text" name="numero_order" value="<?php echo $fetchorder['numero_ord']; ?>"/></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <p<?php echo $fetchorder['username_user']; ?></p></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input">
                        <p><?php echo $fetchorder['quantity']; ?> produit(s)</p></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-6 col-xl-6 container_input">
                        <p><?php echo $fetchorder['price']; ?>€</p></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input mt-3"><h6>Date de création : </h6></div>


                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <p><?php echo $fetchorder['date_ord']; ?></p>
                    </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Adresse de
                            livraison : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input
                                class="input" type="text" name="delivery_address"
                                placeholder="N° de rue, Nom de rue, Ville, Code postale"
                                value="<?php echo $fetchorder['delivery_address_user']; ?>"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Numero de
                            téléphone : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input
                                class="input" type="text" name="telephone" placeholder="exemple: 0601010101"
                                value="<?php echo $fetchorder['tel_number_user']; ?>"/></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Status : </h6>
                    </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Compte : </h6>
                    </div>


                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                        <?php $status = $fetchorder['status_ord'] == '0' ? "En cours de traitement" : ($fetchorder['status_ord'] == '1' ? "En chemin" : "Livré"); ?>
                        <select name="status">
                            <option value="<?php echo $fetchorder['status_ord']; ?>"><?php echo $status; ?></option>
                            <option value="0">En cours de traitement</option>
                            <option value="1">En chemin</option>
                            <option value="2">Livré</option>
                        </select>
                    </div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">
                        <select name="activate">
                            <?php $activate = $fetchorder['activate_ord']==1?"activer":"desactiver"; ?>
                            <option value="<?php echo $fetchorder['activate_ord']; ?>"><?php echo $activate; ?></option>
                            <option value="1">activer</option>
                            <option value="0">désactiver</option>
                        </select>
                    </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input">
                        <input class="input input_sub" type="submit" name="form_modifier_order" value="Modifier"/></div>

                </form>
            </div>
        </fieldset>
    </section>


    <?php
}
?>



<?php
if (isset($_GET['type']) and $_GET['type'] == 1) {
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
                <th>N° Commande</th>
                <th>Nom d'utilisateur</th>
                <th>Prénom Nom</th>
                <th>quantitée de produits</th>
                <th>prix total</th>
                <th>Etat</th>
                <th>date</th>
                <th>Modifs/Suppression</th>
            </tr>
            <?php
            $sql = "SELECT *, SUM(quantity_ord) as 'quantity', SUM(price_ord) as 'price' FROM orders ord INNER JOIN users usr ON ord.ID_user = usr.ID_user GROUP BY ord.numero_ord";
            if ($_GET['value'] != "") {
                $sql = "SELECT *, SUM(quantity_ord) as 'quantity', SUM(price_ord) as 'price' FROM orders ord INNER JOIN users usr ON ord.ID_user = usr.ID_user WHERE username_user LIKE '%" . $_GET['value'] . "%' OR numero_ord LIKE '%" . $_GET['value'] . "%' OR status_ord LIKE '%" . $_GET['value'] . "%' OR date_ord LIKE '%" . $_GET['value'] . "%' GROUP BY numero_ord";
            }
            $sqlreq = mysqli_query($conn, $sql);
            while ($fetch = $sqlreq->fetch_array()) {
                ?>
                <tr class="tr_ag">
                    <td><?php echo $fetch['ID_order']; ?></td>
                    <td><?php echo $fetch['numero_ord']; ?></td>
                    <td><?php echo $fetch['username_user']; ?></td>
                    <td><?php echo $fetch['firstname_user'] . " " . $fetch['lastname_user'] . ""; ?></td>
                    <td><?php echo $fetch['quantity']; ?></td>
                    <td><?php echo $fetch['price']; ?>€</td>
                    <td><?php
                        $etat = $fetch['status_ord'] == 0 ? "En cours de traitement" : ($fetch['status_ord'] == 1 ? "En chemin" : "Livré");
                        echo "<b>" . $etat . "</b>";
                        ?>
                    </td>
                    <td><?php echo $fetch['date_ord']; ?></td>
                    <td class="modif row w-100">
                        <a class="a_ text-center col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3" href="#" data-numeroid="<?php echo $fetch['numero_ord']; ?>" data-type="modifier" onclick="modifier(this)"><b>Modifier</b></a>
                        <?php
                        if ($fetch['activate_ord'] == 0)
                        {
                            ?>
                            <a class="a_ modification text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['numero_ord']; ?>" data-type="activer" data-activate="1" onclick="check(this)"><b>activer la commande</b></a>
                            <?php
                        }
                        else
                        {
                        ?>
                        <a class="a_ delete text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['numero_ord']; ?>" data-type="supprimer" data-activate="0" onclick="check(this)"><b>Désactiver la commande</b></a>
                    <?php
                    } ?>

                    <a class=" text-center col-12 col-xs-12 col-s-3 col-sm-3 col-md-3 col-xl-3" style="color: black;" href="message.php?new_order=<?php echo $fetch['numero_ord']; ?>" data-numeroid="<?php echo $fetch['numero_ord']; ?>" data-type="supprimer" data-activate="0">Détail</a>
                    </td>
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
    $(document).ready(function () {
        var name = $("input[name=searchCli]");
        var value = name.val();
        name.focus();
        name.val('');
        name.val(value);


    })
    $("input[name=searchCli]").bind('keyup', function () {
        var name = "&value=" + $('input[name=searchCli]').val();
        window.location.href = "ordergestion.php?type=1" + name + "";
        console.log('heuuu');
    })

    function check(n) {

        var confirmmodif = confirm("Voulez vous réellement " + $(n).data('type') + " l'utilisateur N° " + $(n).data('numeroid') + "");
        console.log($(n).data('numeroid'));
        var datat = {
            numero_order: $(n).data('numeroid'),
            activate: $(n).data('activate')
        }
        if (confirmmodif) {
            $.ajax({
                url: 'formulary/gestion.php',
                type: 'post',
                data: datat,
                success: function (response) {
                    console.log(response);
                }

            });
            location.reload();

        }

    }

    function modifier(n) {
        window.location.href = "ordergestion.php?type=1&value=&modifier=" + $(n).data('numeroid') + "";
    }

    function back_edit_user() {
        console.log('heuuu');
        window.location.href = "ordergestion.php?type=1&value=";
    }
</script>
</body>
</html>

<?php

?>