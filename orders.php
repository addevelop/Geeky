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

$sql = "SELECT * FROM orders ord INNER JOIN products prd ON ord.ID_prd = prd.ID_prd WHERE ord.ID_user = " .$_SESSION['ID_connect']. " GROUP BY ord.numero_ord";
$reqproducts = mysqli_query($conn, $sql);
while($fetch = $reqproducts->fetch_array())
{
    ?>


        <?php
        $sqlprice = "SELECT *, SUM(price_ord) as 'price', SUM(quantity_ord) as 'quantity' FROM orders WHERE numero_ord = '" .$fetch['numero_ord']. "'";
        $reqprice = mysqli_query($conn, $sqlprice);
        $fetch1 = $reqprice->fetch_array();

        $sqlord = "SELECT * FROM orders WHERE numero_ord = '" .$fetch['numero_ord']. "'";
        $reqord = mysqli_query($conn, $sqlord);
        $row = mysqli_num_rows($reqord);
        ?>
        <section class="row w-100 container_order">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">
                <section class="col-2 col-xs-2 col-sm-2 col-md-2 col-xl-2 product_img">
                    <img class="img_product" src="<?php echo $fetch["image1_prd"];?>"/><br/>
                </section>
                <section class="col-1 col-xs-1 col-sm-1 col-md-1 col-xl-1">
                    <p><?php
                        if($row > 1)
                        {
                            echo "+" .($fetch1['quantity']-1). " produit(s)";

                        }
                        ?></p>

                </section>
                <section class="col-9 col-xs-9 col-sm-6 col-md-6 col-xl-6 row">
                    <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12"><b><?php echo $fetch1['quantity']; ?></b> produit(s)</p>
                    <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">Total prix : <b><?php echo round($fetch1['price'], 2);?>€</b> </p>
                <p class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">Etat :<b>
                    <?php if($fetch1['status_ord'] == 0)
                    {
                        echo "en cours de traitement";
                    }
                    else if($fetch1['status_ord'] == 1)
                    {
                        echo "en chemin";
                    }
                    else if($fetch1['status_ord'] == 2)
                    {
                        echo "Livrée";
                    }
                    ?>
                    </b>
                </p>
                </section>
<section class="col-12 col-xs-12 col-sm-3 col-md-3 col-xl-3">
    <p class="text-center col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">N° de commande <br />

        <?php
        echo "<b>" .$fetch['numero_ord']. "</b>";
        ?>

    </p>
    <a class=" a_ button_prd" href="message.php?new_order=<?php echo $fetch['numero_ord']; ?>">Détails commande</a>
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