<!DOCTYPE html>
<html>
<head>
    <?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/shopping_basket.css"/>
    <title>Acceuil</title>
</head>
<body>
<?php require_once("db.php"); ?>


<?php require_once("header.php"); ?>

<section class=" row container_product">

    <?php
    if(isset($_SESSION['ID_connect']))
    {
    $sql = "SELECT * , AVG(note1_opinion) as 'note1_opinion' FROM shopping_basket shb INNER JOIN products prd on shb.ID_prd = prd.ID_prd INNER JOIN opinion opi on prd.ID_prd = opi.ID_prd  WHERE shb.ID_user = " . $_SESSION['ID_connect'] . " AND prd.activate_prd = 1 GROUP BY prd.ID_prd";
    $reqproducts = mysqli_query($conn, $sql);
    $row = mysqli_num_rows($reqproducts);
    if ($row > 0) {
        ?>

        <section class=" col-12 col-xs-12 col-sm-12 col-md-10 col-xl-10 row container_art">
            <?php
            while ($fetch = $reqproducts->fetch_array()) {
                ?>
                <form method="POST" action="formulary/formulary_inscription_connection.php" class="products col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">
                    <article class="product row ">
                        <div class="product_img col-3 col-xs-3 col-sm-3 col-md-3 col-xl-3">
                            <img class="img_product" src="<?php echo $fetch["image1_prd"]; ?>"/>
                        </div>
                        <div class="col-7 col-xs-7 col-sm-6 col-md-6 col-xl-6">
                            <div class="product_title t1 ">
                                <a class="a_" style="max-height: 10%;"
                                   href="product.php?product=<?php echo $fetch["ID_prd"]; ?>"><?php echo $fetch["title_prd"] ?></a>
                                <div class="opinion_img">
                                    <?php if ($fetch["note1_opinion"] > 0) {
                                        ?>

                                        <img class="img_opinion"
                                             src="<?php echo "images/" . floor($fetch["note1_opinion"]) . "-etoile.png"; ?>"/>
                                        <?php
                                    }
                                    ?>
                                </div>
                                <div class="product_price ">
                                    <?php echo $fetch["price_prd"]; ?> €
                                </div>

                            </div>

                        </div>
                        <div class="col-1 col-xs-1 col-sm-1 col-md-1 col-xl-1">
                            <h1 style="width: 100%;"><input style="width: 100%;" name="quantity" type="number" max="<?php echo $fetch['quantity_prd']; ?>"
                                                            value="<?php echo $fetch["quantity_sb"]; ?>"/></h1>
                            <div class="product_price ">
                                Total: <?php echo $fetch["price_prd"] * $fetch['quantity_sb']; ?>€
                            </div>

                        </div>
                        <div class="col-1 col-xs-1 col-sm-2 col-md-2 col-xl-2 text-center">
                                <input type="hidden" name="IDprd" value="<?php echo $fetch['ID_prd']; ?>"/>
                            <i><?php echo $fetch['quantity_prd']; ?> produit(s) restant</i>

                            <div class="product_img">
<input type="submit" class="button_prd w-100" style="position: relative; top: 50%; transform: translateY(-50%);" name="modifier_quantity_sb" value="Modifié"/>
                            </div>
                            <div class="product_img">
                                <a href="formulary/formulary_inscription_connection?delete_sb=<?php echo $fetch['ID_prd']; ?>"
                                   class="a_"><img class="img_product m-auto d-block delete" src="images/poubelle.png"/></a>
                            </div>
                        </div>
                    </article>
                </form>
                <div class="bar w-100"></div>


                <?php
            }

            ?>
        </section>

        <article class="col-12 col-xs-12 col-sm-12 col-md-2 col-xl-2 row">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">
                <fieldset class="container_infos">
                    <legend class="title_infos">
                        Infos panier
                    </legend>
                    <div>
                        <?php
                        $sql = "SELECT *, SUM(shb.quantity_sb * prd.price_prd) as 'price', SUM(quantity_sb) as 'quantity_sb' FROM shopping_basket shb INNER JOIN products prd ON shb.ID_prd = prd.ID_prd WHERE shb.ID_user = '" . $_SESSION['ID_connect'] . "'";
                        $sqli = mysqli_query($conn, $sql);
                        $fetchprice = $sqli->fetch_array();
                        ?>

                        <div class="product_price ">
                            Nombre de produit(s): <?php echo $fetchprice['quantity_sb']; ?><br/>
                            Total : <?php echo round($fetchprice["price"], 2); ?> €
                            <br/>
                            <a href="formulary/basket.php?orders=ok" class="button_prd a_">Commander</a>
                        </div>

                    </div>
                </fieldset>
            </div>
        </article>
        <?php
    } else {
        ?>
        <article class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">

            <h1 class='text-center col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12'>Votre panier est vide</h1>

        </article>
        <?php
    }
    }
    else{
        echo "<h1 class='w-100 text-center'> <a href='#' onclick='connection(1)'>Connectez-vous</a> pour avoir votre panier </h1>";
    }
    ?>


</section>

</body>
</html>