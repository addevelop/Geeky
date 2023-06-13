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
    $sql = "SELECT * FROM products prd INNER JOIN users usr WHERE prd.ID_prd = '" . $_GET['modifier'] . "'";
    $sql = mysqli_query($conn, $sql);
    $fetch = $sql->fetch_array();

    ?>
    <section id="form_edit_user" class="backgroundblur">
        <fieldset class="container_formulary m-auto">
            <legend class="fs-1 title_formulary">
                <h1>Modifier</h1>
            </legend>
            <div class="formulary">
                <form class="row formulary_form" method="POST" action="formulary/formulary_inscription_connection.php">
                    <div class=" w-100" style="position: relative; top: 0; text-align: right; color: white; cursor: pointer;">
                        <p id="back_edit_user" onclick="back_edit_user()">retour</p>
                    </div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><input type="hidden" name="IDprd" value="<?php echo $fetch['ID_prd']; ?>"/></div>

                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input">N°<input style="background-color: transparent; border: none; color: white;" type="text" name="numero_prd" value="<?php echo $fetch['ID_prd']; ?>"/></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Titre : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <input type="text" class="w-100" name="title" value="<?php echo $fetch['title_prd']; ?>"/></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Description : </h6></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <textarea style="color: black; padding: 1%; height: 15vh;" class="input_area" name="description"><?php echo $fetch['description_prd']; ?></textarea></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Quantitée : </h6>
                    </div>
                        <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><h6>Prix : </h6>
                        </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input type="text" name="quantity" value="<?php echo $fetch['quantity_prd']; ?>"/></div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input type="text" name="price" value="<?php echo $fetch['price_prd']; ?>"/>€</div>




                    <?php if(isset($_SESSION['status']) AND $_SESSION['status'] == "admin")
                    {
                        ?>

                        <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                            <?php $activate = $fetch['activate_prd'] == '0' ? "Désactiver" :"Activer"; ?>
                            <select  class="w-100" name="activate">
                                <option value="<?php echo $fetch['activate_prd']; ?>"><?php echo $activate; ?></option>
                                <option value="0">Désactiver</option>
                                <option value="1">Activer</option>
                            </select>
                        </div>
                        <?php
                    }
                    ?>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input submit_input">
                        <input class="input input_sub" type="submit" name="form_product_modifier_admin" value="Modifier"/></div>

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
                <th>Reference</th>
                <th>Titre</th>
                <th>categorie</th>
                <th>sous categorie</th>
                <th>Quantitée</th>
                <th>Prix</th>
                <th>Nom d'utilisateur</th>
                <th>Activer/Désactiver</th>
                <th>Modifs/Suppression</th>
            </tr>
            <?php
            $sql = "SELECT * FROM products prd INNER JOIN users usr on prd.ID_user = usr.ID_user ORDER BY prd.ID_user";
            if ($_GET['value'] != "") {
                $sql = "SELECT * FROM products prd INNER JOIN users usr on prd.ID_user = usr.ID_user WHERE usr.username_user LIKE '%" . $_GET['value'] . "%' OR prd.ID_prd LIKE '%" . $_GET['value'] . "%' OR prd.ref_prd LIKE '%" . $_GET['value'] . "%' OR prd.keyword_prd LIKE '%" . $_GET['value'] . "%'";
            }
            $sqlreq = mysqli_query($conn, $sql);
            while ($fetch = $sqlreq->fetch_array()) {
                ?>
                <tr class="tr_ag">
                    <td><?php echo $fetch['ID_prd']; ?></td>
                    <td><?php echo $fetch['ref_prd']; ?></td>
                    <td><?php echo $fetch['title_prd']; ?></td>
                    <td><?php echo $fetch['category_prd']; ?></td>
                    <td><?php echo $fetch['subcategory_prd']; ?></td>
                    <td><?php echo $fetch['quantity_prd']; ?></td>
                    <td><?php echo $fetch['price_prd']; ?>€</td>
                    <td><?php echo $fetch['username_user']; ?></td>

                    <td class="text-center"><?php
                        $activate = $fetch['activate_prd'] == 1 ? "Activer" :"Désactiver";
                        if($fetch['activate_prd']==1) {
                            echo "<b style='color: green;'>" . $activate . "</b>";
                        }
                        else
                            {
                                echo "<b style='color: red;'>" .$activate. "</b>";
                            }
                        ?>
                    </td>
                    <td class="modif row w-100">
                        <a class="a_ text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_prd']; ?>" data-type="modifier" onclick="modifier(this)"><b>Modifier</b></a>
                        <?php
                        if ($fetch['activate_prd'] == 0)
                        {
                            ?>
                            <a class="a_ modification text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_prd']; ?>" data-type="activer" data-activate="1" onclick="check(this)"><b>activer le produit</b></a>
                            <?php
                        }
                        else
                        {
                        ?>
                        <a class="a_ delete text-center col-12 col-xs-12 col-s-6 col-sm-6 col-md-6 col-xl-6" href="#" data-numeroid="<?php echo $fetch['ID_prd']; ?>" data-type="supprimer" data-activate="0" onclick="check(this)"><b>Désactiver le produit</b></a>
                    <?php
                    } ?>

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
        window.location.href = "productgestion.php?type=1" + name + "";
        console.log('heuuu');
    })

    function check(n) {

        var confirmmodif = confirm("Voulez vous réellement " + $(n).data('type') + " l'utilisateur N° " + $(n).data('numeroid') + "");
        console.log($(n).data('numeroid'));
        var datat = {
            idproduct: $(n).data('numeroid'),
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
        window.location.href = "productgestion.php?type=1&value=&modifier=" + $(n).data('numeroid') + "";
    }

    function back_edit_user() {
        console.log('heuuu');
        window.location.href = "productgestion.php?type=1&value=";
    }
</script>
</body>
</html>

<?php

?>