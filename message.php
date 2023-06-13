<!DOCTYPE html>
<html prefix="og: http://ogp.me/ns#">
<head>
<?php require_once("head.html"); ?>
    <link rel="stylesheet" href="css/shopping_basket.css"/>
    <title>Acceuil</title>
</head>
<body>
<?php require_once("db.php"); ?>


<?php require_once("header.php"); ?>

<?php
if(isset($_GET['new_order']))
{
    ?>
    <section class="row">
        <h1 class="text-center col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">N° de commande <br />
            <?php
            echo $_GET['new_order'];
            ?>

        </h1>

        <div class="bar"></div>

        <h1 class="text-center col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12"> Récapitulatif :</h1>
        <?php
        $sql = "SELECT *, SUM(price_ord) as 'price', SUM(quantity_ord) as 'quantity' FROM orders WHERE numero_ord = '" .$_GET['new_order']. "'";
        $reqproducts = mysqli_query($conn, $sql);
        $fetch1 = $reqproducts->fetch_array();
        ?>
        <section class="row w-100">
            <div class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">
                <h2 class="col-12 col-xs-12 col-sm-6 col-md-6 col-xl-6" style="border: 1px solid #333;">Quantitée de produit(s) : <?php echo $fetch1['quantity']; ?></h2>
                <h2 class="col-12 col-xs-12 col-sm-6 col-md-6 col-xl-6" style="border: 1px solid #333;">Total prix : <?php echo round($fetch1['price'], 2);?>€ </h2>
                <h2 class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12" style="border: 1px solid #333;">Etat :
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
                </h2>


            </div>
        </section>
        <section class="col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12 row">
<?php
$sql = "SELECT * FROM orders ord INNER JOIN products prd ON ord.ID_prd = prd.ID_prd WHERE ord.numero_ord = '" .$_GET['new_order']. "'";
$reqproducts = mysqli_query($conn, $sql);
while($fetch = $reqproducts->fetch_array())
{
    ?>
    <div class="products col-12 col-xs-12 col-sm-12 col-md-12 col-xl-12">
        <article class="product row ">
            <div class="product_img col-3 col-xs-3 col-sm-3 col-md-3 col-xl-3">
                <img class="img_product" src="<?php echo $fetch["image1_prd"];?>"/>
            </div>
            <div class="col-9 col-xs-9 col-sm-7 col-md-7 col-xl-7">
                <div class="product_title t1 ">
                    <a class="a_" style="max-height: 10%;" href="product.php?product=<?php echo $fetch["ID_prd"]; ?>"><?php echo $fetch["title_prd"]?></a>
                    <div class="opinion_img">
                        <?php /*if( $fetch["note1_opinion"] > 0)
                        {
                            ?>

                            <img class="img_opinion" src="<?php echo "images/" .floor($fetch["note1_opinion"]). "-etoile.png";?>"/>
                            <?php
                        }*/
                        ?>
                    </div>
                    <div class="product_price ">
                        <?php echo $fetch["price_prd"]; ?> €
                    </div>

                </div>

            </div>
            <div class="col-12 col-xs-12 col-sm-2 col-md-2 col-xl-2">
                <div class="product_price ">
                    <h2><?php echo "x" .$fetch['quantity_ord'];?></h2>
                    Total: <?php echo $fetch["price_prd"]*$fetch['quantity_ord']; ?>€
                </div>

            </div>
        </article>
    </div>


    <?php
}

?>
        </section>
    </section>
<?php
}
?>






</body>
</html>