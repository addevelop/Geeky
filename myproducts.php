<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/orders.css"/>
    <title>Acceuil</title>
</head>
<body>
<?php require_once("db.php"); ?>


<?php require_once("header.php"); ?>

<?php

$sql = "SELECT * FROM products prd INNER JOIN users ON prd.ID_user = users.ID_user WHERE prd.ID_user = " .$_SESSION['ID_connect']. "";
$reqproducts = mysqli_query($conn, $sql);
while($fetch = $reqproducts->fetch_array())
{
    ?>


        <?php

        ?>
        <section class="row w-100 container_order">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">
                <section class="col-3 col-xs-3 col-sm-3 col-md-3 col-xl-3 product_img">
                    <img class="img_product" src="<?php echo $fetch["image1_prd"];?>"/>

                </section>
                <section class="col-9 col-xs-9 col-sm-6 col-md-6 col-xl-6 row">
                    <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12"><b><?php echo $fetch['quantity_prd']; ?></b> produit(s)</p>
                    <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12"> Prix : <b><?php echo $fetch['price_prd'];?>€</b> </p>
                <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">Etat :<b>
                    <?php if($fetch['activate_prd'] == 0)
                    {
                        echo "produit non activé";
                    }
                    else if($fetch['activate_prd'] == 1)
                    {
                        echo "Produit activé";
                    }
                    ?>
                    </b>
                </p>
                </section>
<section class="col-12 col-xs-12 col-sm-3 col-md-3 col-xl-3">
    <p class="text-center col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">N° de produit <br />

        <?php
        echo "<b>" .$fetch['ID_prd']. "</b>";
        ?>

    </p>
    <a class=" a_ button_prd" href="product.php?product=<?php echo $fetch['ID_prd']; ?>">Détail produit</a>
</section>

            </div>
        </section>
<?php
}
    ?>
<?php

?>






</body>
</html>