<!DOCTYPE html>
<html>
<head>
    <?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/product.css"/>
    <link rel="stylesheet" href="css/style.css"/>
    <title>Acceuil</title>
</head>
<body>
<?php require_once("db.php"); ?>
<?php require_once("header.php"); ?>
<?php
if (isset($_GET['modifier'])) {
    $sql = "SELECT * FROM products prd INNER JOIN users usr ON prd.ID_user = usr.ID_user WHERE ID_prd = '" . $_GET['modifier'] . "'";
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

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <p><?php echo $fetch['title_prd']; ?></p></div>

                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <p style="background-color:white; color: black; padding: 1%;"><?php echo $fetch['description_prd']; ?></p></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input">
                        <p><?php echo $fetch['price_prd']; ?>€</p></div>
                    <div class="col-12 col-xs-12 col-s-12 col-sm-12 col-md-12 col-xl-12 container_input"><h6>Quantitée : </h6>
                    </div>
                    <div class="col-6 col-xs-6 col-s-6 col-sm-6 col-md-6 col-xl-6 container_input"><input type="text" name="quantity" value="<?php echo $fetch['quantity_prd']; ?>"/></div>




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
                        <input class="input input_sub" type="submit" name="form_modifier_product" value="Modifier"/></div>

                </form>
            </div>
        </fieldset>
    </section>


    <?php
}
?>
<section class="body_product_prd">
    <?php
    $ID_prd = mysqli_real_escape_string($conn, $_GET["product"]);
    $sql = "SELECT *, AVG(note1_opinion) as 'note1_opinion' FROM products prd INNER JOIN opinion opi on prd.ID_prd = opi.ID_prd WHERE prd.ID_prd =" .$ID_prd. "; ";
    $reqproducts = mysqli_query($conn, $sql);
    while($fetch = $reqproducts->fetch_array())
    {
        ?><div class="container_product_prd row">
        <article class="product_prd col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">
            <div class="product_cote_prd col-12 col-xs-12 col-sm-12 col-md-6 col-xl-6">
                <section class="container_img">
                <div class="img_principal">
                    <a id="link_img_ID" href="<?php echo $fetch["image1_prd"]; ?>"><img id="img_1_ID" class="img_prd" src="<?php echo $fetch["image1_prd"];?>"/></a>
                </div>
                <div class="img_secondaire row">
                    <?php if(isset($fetch["image1_prd"]))
                        { ?>
                    <div class="container_block_img col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
                        <span class="block_img_secondaire"><img class="img_prd" src="<?php echo $fetch["image1_prd"]; ?>"/></span>

                    </div>
                    <?php } ?>
                    <?php if(isset($fetch["image2_prd"]))
                    { ?>
                        <div class="container_block_img col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
                            <span class="block_img_secondaire"><img class="img_prd" src="<?php echo $fetch["image2_prd"]; ?>"/></span>

                        </div>
                    <?php } ?>
                    <?php if(isset($fetch["image3_prd"]))
                    { ?>
                        <div class="container_block_img col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
                            <span class="block_img_secondaire"><img class="img_prd" src="<?php echo $fetch["image3_prd"]; ?>"/></span>

                        </div>
                    <?php } ?>
                    <?php if(isset($fetch["image4_prd"]))
                    { ?>
                        <div class="container_block_img col-6 col-xs-6 col-sm-6 col-md-3 col-xl-3">
                            <span class="block_img_secondaire"><img class="img_prd" src="<?php echo $fetch["image4_prd"]; ?>"/></span>

                        </div>
                    <?php } ?>
                </div>
                </section>
            </div>
            <section class="product_cote_prd col-12 col-xs-12 col-sm-12 col-md-6 col-xl-6">
            <div class="product_title t1 ">
                <a class="a_"><?php echo $fetch["title_prd"]?></a>
            </div>
                <div class="product_description t1 ">
                    <b>Descritpion :</b><br/>
                    <p class=""><?php echo $fetch["description_prd"]?></p>
                </div>
            <div class="product_price">
                <p class="t1"><?php echo $fetch["price_prd"]; ?> €</p>
            </div>
                <form method="POST" action="formulary/basket.php" class="product_button">
                    <input type="hidden" name="ID_product" value="<?php echo $fetch["ID_prd"]; ?> "/>
                    <div class="container_quantity">
                    <a class="a_">Quantitée :</a> <select name="quantity" class="quantity">
                        <?php for($i = 1; $i <= $fetch["quantity_prd"]; $i++)
                            echo "<option value='" .$i. "'> " .$i. "</option>";
                        ?>

                    </select>
                    </div>
                    <?php if(isset($_SESSION['ID_connect']))
                        {
                            ?>
                    <div class="d-flex w-100 text-center">
                    <input type="submit" class="button_prd a_ t1" name="add_basket" value="ajouter au panier"/>
                    <?php if((isset($_SESSION['ID_connect']) && $_SESSION["ID_connect"] == $fetch["ID_user"]) OR (isset($_SESSION["status"]) && $_SESSION["status"] == "admin"))
                    {
                        ?>
                        <a class="a_ modification d-block w-100" href="product.php?product=<?php echo $ID_prd; ?>&modifier=<?php echo $fetch['ID_prd']; ?>"><b>Modifier</b></a>
                        <a class="a_ delete d-block w-100" href="formulary/formulary_inscription_connection.php?desactiver=<?php echo $fetch['ID_prd']; ?>"><b>Supprimer</b></a>
                        <?php
                    }
                    ?>
                    </div>
                    <?php
                        }
                    ?>
                </form>


            <div class="opinion_img" style="position: absolute;width: 100%;top: 0; ">
                <?php if( $fetch["note1_opinion"] > 0)
                {
                    ?>

                    <img class="img_avis_prd" src="<?php echo "images/" .floor($fetch["note1_opinion"]). "-etoile.png";?>"/>

                    <?php
                }
                ?>
            </div>
            </section>
        </div>


        <?php
    }
    ?>



</section>
</body>

<script>
    $(".img_prd").click(function(e)
    {
        console.log(e.target.children.src);
        $("#img_1_ID").attr("src", ""+e.target.src + "");
        $("#link_img_ID").attr("href", "" +e.target.src +"");

    })
    function back_edit_user()
    {
        console.log('heuuu');
        window.location.href = "product.php?product=<?php echo $_GET['product']; ?>";
    }
</script>

</html>
